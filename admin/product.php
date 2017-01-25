<?php include('config.php');
	$id=$_GET['id'];
	$sql="select * from products where product_id=$id";
    $res=pg_query($db,$sql);
    $row=pg_fetch_array($res);
    $product_name=$row["product_name"];

	if(isset($_POST['indian_product_name'])){
// 		$indian_product_name=pg_escape_string($_POST['indian_product_name']);
// 		$product_id=pg_escape_string($_POST['product_id_indian']);
// 		$sql="INSERT INTO indian_product (indian_product_name,product_id) VALUES ('$indian_product_name','$product_id')";
//     		pg_query($sql);
		$query = "INSERT INTO indian_product(indian_product_name, product_id) VALUESVALUES ('$indian_product_name','$product_id')";
		$result = pg_query($query);
		if (!$result) {
		    $errormessage = pg_last_error();
		    echo "Error with query: " . $errormessage;
		    exit();
		}
		printf ("These values were inserted into the database - %s %s %s", $indian_product_name, $product_id);
		pg_close(); 
	}
	if(isset($_POST['foreign_product_name'])){
		$foreign_product_name=pg_escape_string($_POST['foreign_product_name']);
		$product_id=$_POST['product_id_foreign'];
		$sql="INSERT INTO foreign_product (foreign_product_name,product_id) VALUES ('$foreign_product_name','$product_id')";
    		pg_query($sql);
	}	
	if(isset($_POST['product_name'])){
		$product_name=$_POST['product_name'];
		$product_id=$_POST['product_id'];
		$sql_update="update products set product_name='$product_name' where product_id=$product_id";
    		pg_query($db,$sql_update);

	}

	$sql_foreign="select * from foreign_product where product_id=$id";
    $res_foreign=pg_query($db,$sql_foreign);
    $sql_indian="select * from indian_product where product_id=$id";
    $res_indian=pg_query($db,$sql_indian);

?>
<html>
<head>
<title>Admin Panel</title>
<style type="text/css">

	section ul li button {
	    float: right;
	    height: 18px;
	    width: 18px;
	    margin: 0;
	    padding: 0;
	    font-size: 13px;
	    line-height: 12px;
	    background: red;
	    border-radius: 50%;
	    color: white;
	}
	table{
		background: #f2f2f2;
    	padding: 16px;
	}
</style>
</head>
<body>
	<section>
		<h2><a href="index.php"><button >Go To Products View</button></a></h2>
	</section>
	<section>
		<form method="post" action="">
			<input type="hidden" name="product_id" value='<?php echo $id; ?>'>
			<input type="text" name="product_name" value="<?php echo $product_name; ?>">
			<input type="submit" value="update">
		</form>
	</section>
	<table cellspacing="4">
		<thead>
			<th align="left">Indian Products</th>
			<th align="left">Foreign Products</th>
		</thead>
		<tbody>
			<tr>
				<td>
					<form method="post" action="">
						<input type="hidden" name="product_id_indian" value='<?php echo $id; ?>'>
						<input type="text" name="indian_product_name">
						<input type="submit">
					</form>
				</td>
				<td>
					<form method="post" action="">

						<input type="hidden" name="product_id_foreign" value='<?php echo $id; ?>'>
						<input type="text" name="foreign_product_name">
						<input type="submit">
					</form>
				</td>
			</tr>
			<tr>
				<td>
					<section>
						<ul style="padding: 0 22px">
							<?php 
								while($row_indian=pg_fetch_array($res_indian)) 
								{
									$delete_url="delete.php?type=i&id=".$row_indian['indian_product_id']."&product_id=".$id;
							?>
								<li>
									<?php echo $row_indian['indian_product_name'];?> 
									<a  href="<?php echo $delete_url;?>">
											<button>x</button>
									</a>
								</li>
							<?php
								}
							?>
						</ul>
					</section>
				</td>
				<td>
					<section>
						<ul style="padding: 0 22px">
							<?php 		
								while($row_foreign=pg_fetch_array($res_foreign)) 
								{
									$delete_url="delete.php?type=f&id=".$row_foreign['foreign_product_id']."&product_id=".$id;
							?>
								<li>
									<?php echo $row_foreign['foreign_product_name'];?> 
									<a  href="<?php echo $delete_url;?>">
											<button>x</button>
									</a>
								</li>
							<?php
								}
							?>
					</section>
				</td>
			</tr>

		</tbody>
	</table>

</body>
</html>
