<?php
	include('config.php');
	$type=$_GET['type'];
	$id=$_GET['id'];
	$product_id=$_GET['product_id'];

	if($type=='i'){
		$sql ='DELETE FROM indian_product WHERE indian_product_id='.$id;
	}
	if($type=='f'){
		$sql ='DELETE FROM foreign_product WHERE foreign_product_id='.$id;
	}
	if($type=='p'){
		$sql ='DELETE FROM products WHERE product_id='.$id;
	}
	pg_query($sql);
	header("Location: product.php?id=$product_id");
?>