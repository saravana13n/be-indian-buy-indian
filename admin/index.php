<?php include('config.php');
	if($_POST){
		$product_name=$_POST['product_name'];
		$sql="insert into products (product_name) values('".$product_name."')";
		$result = pg_query($db,$sql);
    	// pg_query($sql);
	}
	$sql="select * from products";
	$res = pg_query($db,$sql);
    // $res=pg_query($sql);
?>
<html>
<title>Admin Panel</title>
<body>
	<form method="post" action="">
		<input type="text" name="product_name">
		<input type="submit">
	</form>
	<section>
		<ul>
			<?php 
				while($row=pg_fetch_array($res)) 
				{
			?>
				<li><a href="product.php?id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name'];?></a></li>
			<?php
				}
			?>
		</ul>
	</section>
</body>
</html>