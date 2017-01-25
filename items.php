<?php include('config.php');
	
	$id=$_GET['id'];
	$sql_indian="select * from indian_product where product_id=$id";
    $res_indian=pg_query($sql_indian);
    $rows_indian = array();
	while($r_indian = pg_fetch_assoc($res_indian)) {
	    $rows_indian[] = $r_indian;
	}

	$sql_foreign="select * from foreign_product where product_id=$id";
    $res_foreign=pg_query($sql_foreign);
    $rows_foreign = array();
	while($r_foreign = pg_fetch_assoc($res_foreign)) {
	    $rows_foreign[] = $r_foreign;
	}
	$items= array('indian' => $rows_indian ,'foreign' => $rows_foreign );
	print json_encode($items);
?>