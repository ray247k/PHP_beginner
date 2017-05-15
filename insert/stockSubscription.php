<?php
header("Content-Type:text/html; charset=utf-8");
define("RYSERVER","10.100.150.80");

$CSEQ = "5260";

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '33064598';
$dbname = 'rayin';//login
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);//連接資料庫
mysqli_query($conn,"SET NAMES 'utf8'");//設定語系
if ( !$conn ) { die ("無連連線資料庫"); }
$sql = "SELECT * FROM RSTAN";
$result = mysqli_query($conn,$sql);
//echo mysqli_num_rows($result);

function microSec() {
    // 設定microtime 為 true 令他可以輸出 Unix timestamp with microseconds
    $timestamp = microtime(true);
    
    // 取出microseconds
    $microseconds = (int) round(($timestamp - floor($timestamp)) * 1000.0, 0);
    return substr(str_pad($microseconds,0,2),0,2);
}

function getRYSocket($server,$port,$content) {
    $content = urldecode($content);
    $ret = "";
    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $connection = socket_connect($socket,$server,$port);
    $sendContent = chr("0x02").$content.chr("0x03")."\n";
    socket_write($socket,$sendContent,strlen($sendContent));
    while($buffer = socket_read($socket, 1024, PHP_BINARY_READ)) {
        //$buffer = iconv("big5","UTF-8//TRANSLIT//IGNORE",$buffer);
        $buffer = str_replace("encoding='MS950'"," encoding='Big5' ",$buffer);  
        $ret .= $buffer;
        if ( trim($buffer) == "</apgw>" || strpos($buffer,chr("0x03")) ) { break; }
    }
    
    $ret = str_replace(chr("0x02"),"",$ret);
    $ret = str_replace(chr("0x03"),"",$ret);
    //file_put_contents("/home/wwwroot/imGW/socket.log",$ret,FILE_APPEND);
    return trim($ret);
}

$retStr = "";
$reqNo = date("His").microSec();
				$sendReq = "<req sys_code='TE' request_no='$reqNo' gate_func='520' branch_id='5260' cust_id='9801854' qrytype='0' />";
				$soc = getRYSocket(RYSERVER,"10520",$sendReq);
				$xml = simplexml_load_string($soc);
				//print_r($xml);
				//9805025
?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jqc-1.12.4/dt-1.10.14/r-2.1.1/datatables.min.css"/>

		<!--Responsive builder-->
    <style type="text/css">
    	td {text-align: center;}
    	th {text-align: center;}
	    .odd{background-color: #c4e3ff;}
    	tr:hover{background-color: #71b9fb;}
        h1 { color:#CC0001;}
        .red{color:#CC0001;}
        /*第一列不要排序icon*/	
        .dataTable > thead > tr > th[class*="nosort"]::after{display: none}
        /*排序前後的CSS*/
		table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting{
			padding-right: 20px;
		}
		.nosort{
			padding-right: 8px !important;
		}
		/*摺疊部分如果要置中，文字靠左*/
/*		.dtr-details{
			text-align: left;
		}*/
		/*被摺疊的部分整個靠左*/
		.child{
			text-align: left;
		}
/*		@media screen and (max-width: 992px) and (orientation : portrait){小螢幕手機直向時後隱藏欄位
			body {background-color: #f0e8ae}
			.moblieHide{display: block;}
		}*/
    </style>
    <title>股票申購</title>
</head>
<body>
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-12 col-sm-12">
                <h1 class="text-center">股 票 申 購</h1>
            </div>
        </div>
        <div style="display:inline;">
            <span class = "glyphicon glyphicon-user"></span>
            5260 - 9803632　江國維
        </div>
        <div id = "myForm">
            <span class = "glyphicon glyphicon-search"></span>
            <label><input type="radio" name="status" value="alll1" checked>
            全部&nbsp;</label>
            <label><input type="radio" name="status" value="unbuy1">
            未申購&nbsp;</label>
            <label><input type="radio" name="status" value="albuy1">
            已申購&nbsp;</label>
            <label><input type="radio" name="status" value="voted1">
            中籤</label><span id="display">　　公債顯示</span>
            <label class="display"><input type='radio' name='print1' value='yes' CHECKED>  是  </label>
			<label class="display"><input type='radio' name='print1' value='no'>  否  </label>
        </div>
        <img src="https://aq.tcstock.com.tw/funcdir/arr.PNG" border="0">
        <input type="button" style="width:80px;height:25px;font-size:15px;font-weight:bold;background-color:#DDDDDD;" name="i1" value="批次申購" title="請先勾選再點我" onclick="t1(this.form,'I');" class="btn btn-default btn-xs">
        &nbsp;
        <input type="button" style="width:80px;height:25px;font-size:15px;font-weight:bold;background-color:#DDDDDD;" name="i1" value="批次取消" title="請先勾選再點我" onclick="t1(this.form,'D');" class="btn btn-default btn-xs">
        <table id="myTable" class="table table-bordered">
                <thead>
                    <tr class="tableHead">
                        <th class='nosort'><input type="checkbox" name="clickAll" id="clickAll"></th>
                        <th>功能</th>
                        <th>股票名稱</th>
                        <th class="moblieHide">市場別</th>
                        <th>申購起日</th>
                        <th>申購迄日</th>
                        <th class="moblieHide">扣款日</th>
                        <th class="moblieHide">抽籤日</th>
                        <th class="moblieHide">退款日</th>
                        <th class="moblieHide">撥券日</th>
                        <th>申購價格</th>
                        <th class="moblieHide">參考價</th>
                        <th>申購數量</th>
                        <th>承銷總數量</th>
                        <th class="moblieHide">承銷商</th>
                        <th>申購狀況</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        mysqli_data_seek($result,0);
                        while($row = mysqli_fetch_array($result)){
                        	//撥券日Cdate超過今天就整筆不要顯示
                        	if ($row['Cdate'] < date("Ymd")) {
                        		continue;	
                        	}
                        	else{
	                            $sql = "SELECT * FROM `stockSubscription` WHERE 1";
		                            echo "<tr>";
		                                $dbname = 'rayin';
		                                $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);//連接資料庫
		                                mysqli_query($conn,"SET NAMES 'utf8'");//設定語系
		                                if ( !$conn ) { die ("無連連線資料庫"); }
		                                $sql = "SELECT * FROM `RAPST` WHERE `CSEQ`='".$CSEQ."' AND `STOCK` ='".$row['stock']."'";
		                                 $resultRAPST = mysqli_query($conn,$sql);
		                            	//判斷在申購期間
		                                if (mysqli_num_rows($resultRAPST) == 0) {
		                                	//是否超過申購期限
		                                	if ($row['E3date'] > date("Ymd")) {
		                                		echo "<td><input type='checkbox' name='chkbox[]''></td><td><input type='button' name='chk2' value='申購' class='btn btn-danger btn-xs'></td>";
		                                	}
		                                	else{
		                                		echo "<td></td><td></td>";
		                                	}
		                                }
		                                else{
		                                	echo "<td></td><td></td>";
		                                }
		                                //股票名稱
		                                echo "<td>".$row['stock']." ".$row['Sname']."</td>";
		                                //市場
		                                switch ($row['Market']) {
		                                    case 'T':
		                                        echo "<td class='moblieHide'>發行後上市</td>";
		                                        break;
		                                    case 'C':
		                                        echo "<td class='moblieHide'>發行後上櫃</td>";
		                                        break;
		                                    case 'S':
		                                        echo "<td class='moblieHide'>集中交易</td>";
		                                        break;
		                                    case 'O':
		                                        echo "<td class='moblieHide'>櫃臺交易</td>";
		                                        break;
		                                    case 'B':
		                                        echo "<td class='moblieHide isBond'>中央公債</td>";
		                                        break;
		                                    case 'U':
		                                        echo "<td class='moblieHide'>未上市櫃</td>";
		                                        break;
		                                    case '1':
		                                        echo "<td class='moblieHide'>集中交易</td>";
		                                        break;
		                                    case '2':
		                                        echo "<td class='moblieHide'>櫃臺交易</td>";
		                                        break;
		                                }
		                                //申購起日
		                                echo "<td>".$row['Bdate']."</td>";
		                                //申購迄日
		                                echo "<td>".$row['E3date']."</td>";
		                                //扣款日
		                                echo "<td class='moblieHide'>".$row['E13date']."</td>";
		                                //抽籤日
		                                echo "<td class='moblieHide'>".$row['E5date']."</td>";
		                                //退款日
		                                echo "<td class='moblieHide'>"."</td>";
		                                //撥券日
		                                echo "<td class='moblieHide'>".$row['Cdate']."</td>";
		                                //申購價格
		                                echo "<td>".number_format($row['Price'],4)."</td>";
		                                //參考價
		                                echo "<td class='moblieHide'>"."</td>";
		                                //申購數量  
		                                echo "<td>".number_format($row['Qty'])."</td>";
		                                //承銷總數量
		                                echo "<td>".number_format($row['Isuqty'])."</td>";
		                                //承銷商
		                                echo "<td class='moblieHide'>".$row['Lname']."</td>";
		                                //申購狀況
		                                //撈RAPST抓出是否有申購過
		                                $dbname = 'rayin';
		                                $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);//連接資料庫
		                                mysqli_query($conn,"SET NAMES 'utf8'");//設定語系
		                                if ( !$conn ) { die ("無連連線資料庫"); }
		                                $sql = "SELECT * FROM `RAPST` WHERE `CSEQ`='".$CSEQ."' AND `STOCK` ='".$row['stock']."'";
		                                //跑RAPST的使用者資料做比對
		                                $resultRAPST = mysqli_query($conn,$sql);
		                                // echo "<td>".$sql."</td>";
		                                // echo "<td>".mysqli_num_rows($resultRAPST)."</td>";
		                                // 若是客戶資料無記錄代表尚未收購過，否則顯示已申購
		                                if (mysqli_num_rows($resultRAPST) == 0) {
		                                	//是否超過申購期限
		                                	if ($row['E3date'] > date("Ymd")) {
		                                		echo "<td class = 'red'></td>";
		                                	}
		                                	else{
		                                		echo "<td class = 'red'>申購期間已過</td>";
		                                	}
		                                }
		                                else{
		                                	echo "<td class = 'red'>已申購</td>";
		                                }

		                            echo "</tr>";
		                        }
                        }
                    ?>
                </tbody>
        </table>
        <br>
        <div>
            <b>申購注意事項</b>
            <ul>
                <li>同一檔股票不得重覆參加申購，只可選擇一家券商的一家分公司參加申購。</li>
                <li>申購款最晚應於截止日當天存入。</li>
                <li>申購時，如已超過迄日截止時間申購，則為無效申購。</li>
                <li>申購人時間至14:00，逾時視為次一營業日或洽營業員。</li>
                <li>案件採「預扣款項」，須另加收處理費20元及工本費50元。</li>
                <li class = "red">申購後不得撤回或更改，中籤後不能放棄認購及要求退還價款。</li>
            </ul>
        </div>
    </div>
<!--     <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.14/r-2.1.1/datatables.min.js"></script> -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jqc-1.12.4/dt-1.10.14/r-2.1.1/datatables.min.js"></script>
	<!--Responsive builder-->

	<script type="text/javascript">
	//公債顯示
	$(document).ready(function(){
  		$(".display input").change(function(){
  			//alert("oh oh hot dog");
    		var print1 = $('input[name="print1"]:checked','.display').val();
    		//alert(print1);
    		if (print1 == "yes") {
    			$(".isBond").parent().show();
    		}else{
    			$(".isBond").parent().hide();
    		}
  		});
	});
	// $('#myForm input').on('change', function() {
	// 	var print1 = $('input[name="print1"]:checked','#myForm').val();
	// 	if ( print1 == "yes" ) {
	// 		$(".isBond").show();
	// 	} else {
	// 		$(".isBond").hide();
	// 	}
	// });

		$(document).ready(function() {
			//中斷點設定
			// $.fn.dataTable.Responsive.breakpoints = [
			//     { name: 'desktop', width: Infinity },
			//     { name: 'tablet',  width: 1024 },
			//     { name: 'fablet',  width: 768 },
			//     { name: 'phone',   width: 480 }
			// ];
	    	$('#myTable').DataTable({
	    		//自動分配col寬度，預設是true
	    		autoWidth : true,
	    		//響應式表格擴充功能
	    		responsive : true,
	   			//設定各columns顯示優先權
	    		columns : [
	       			{ responsivePriority: 1 },
	       			{ responsivePriority: 2 },
		       		{ responsivePriority: 3 },
		       		{ responsivePriority: 10 },
		       		{ responsivePriority: 4 },
		       		{ responsivePriority: 5 },
		       		{ responsivePriority: 11 },
		        	{ responsivePriority: 12 },
		       		{ responsivePriority: 13 },
		       		{ responsivePriority: 14 },
		       		{ responsivePriority: 6 },
		       		{ responsivePriority: 15 },
		       		{ responsivePriority: 7 },
		        	{ responsivePriority: 8 },
		       		{ responsivePriority: 16 },
		       		{ responsivePriority: 9 },
	    		],
	            paging : false,//換頁
	            info : true,//資訊
	            searching: false,//搜尋
	            //"ordering": false,//是否提供排序功能
	            //能申購的預設在最上面(降冪排列)
	            order: [[ 0, 'desc' ]],
	            //設定class = "nosort"的排序功能不開啟(checkbox)
	    		aoColumnDefs: [
	        	{ 'bSortable': false, 'aTargets': [ 'nosort' ] }
	       		],
	  			//語言設定              
	            language: {
	                "sProcessing": "處理中...",
	                "sLengthMenu": "顯示 _MENU_ 項結果",
	                "sZeroRecords": "沒有符合的結果",
	                "sInfo": "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
	                "sInfoEmpty": "顯示第 0 至 0 項結果，共 0 項",
	                "sInfoFiltered": "(由 _MAX_ 項結果過濾)",
	                "sInfoPostFix": "",
	                "sSearch": "搜索：",
	                "sUrl": "",
	                "sEmptyTable": "表中資料為空",
	                "sLoadingRecords": "載入中...",
	                "sInfoThousands": ",",
	                "oPaginate": {
	                    "sFirst": "第一頁",
	                    "sPrevious": "上一頁",
	                    "sNext": "下一頁",
	                    "sLast": "最後一頁"
	                },
	                "oAria": {
	                    "sSortAscending": "：以升序排列此列",
	                    "sSortDescending": "：以降序排列此列"
	                }
	            }        
	        });         
		});
			
		$("#clickAll").click(function(){//checkbox全選功能
			if($("#clickAll").prop("checked")) {
	   			$("input[name='chkbox[]']").prop("checked",true);
	   		} else {
	     		$("input[name='chkbox[]']").prop("checked",false);           
	   		}
		});
	</script>
</body>
</html>