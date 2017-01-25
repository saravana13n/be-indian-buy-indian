<?php include('config.php');
    
    $sql="select * from products";
    $res=pg_query($sql);
    $rows = array();
	while($r = pg_fetch_assoc($res)) {
	    $rows[] = $r;
	}
	print json_encode($rows);
?>