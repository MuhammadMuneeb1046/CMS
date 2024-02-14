<?php
    include('query.php');
    // include('header.php');
?>

    <?php
function filterData(&$str){

    $str =  preg_replace("/\t/","\\t",$str);
    $str =  preg_replace("/\r?\n/","\\n",$str);
    if(strstr($str,'"')) $str  = '"' .str_replace('"','""',$str) . '"';
    
}
	$filename = "members-data_".date('Ymd') . ".xls";			
		
	$fileds = array("Id","Sender Name","Sender Address","City","Receiver Name","Receiver Address");

    $excelData = implode("\t",array_values($fileds)) . "\n";

    $query = $pdo->query("select * from couriers order by id ASC");
    $allFaculties = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach(   $allFaculties as $faculty){

                $data = array( $faculty['id'] , $faculty['sender_name'], $faculty['sender_address'] ,$faculty['city'],$faculty['receiver_name'],$faculty['receiver_address']);
                $excelData .= implode("\t",array_values($data )) . "\n";
    }
    header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$filename\"");
echo $excelData;
"<script>location.assign('index.php');</script>";
exit();
?>
<?php
    include('footer.php');
?>