<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Customer's purchase information</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are the products customer purchased:</h1>
<?php
	//define the row in the table
	echo "<table border='1'>
	<tr>
	<th>Product_id</th>
	<th>Description</th>
	<th>Cost per item</th>
	<th>Quantity purchased</th>
	</tr>";
	//get customer selected
	$whichcustomer= $_POST["customers"];
	//inner join three tables
	$query = "SELECT * FROM products, purchases, customers WHERE products.product_id=purchases.product_id AND customers.customer_id = purchases.customer_id AND customers.customer_id = $whichcustomer";
   	$result=mysqli_query($connection,$query);
    	if (!$result) {
         die("database query2 failed.");
     	}
	//use while loop to get all data
    while ($row=mysqli_fetch_assoc($result)) {
	echo "<tr>";
	//define row and data cell
	echo "<td>". $row["product_id"] . "</td>";
	echo "<td>". $row["description"] . "</td>";
	echo "<td>". $row["item_cost"] . "</td>";
	echo "<td>". $row["number_of_item"] . "</td>";
	echo "</tr>";
     }
     mysqli_free_result($result);
     echo "</table>";
	//select image and customer id
    $query1 = "SELECT cusimage, customer_id FROM customers WHERE customer_id = $whichcustomer";

    $result=mysqli_query($connection,$query1);
    if (!$result) {
         die("database query2 failed.");
    }
	//print result
    while ($row=mysqli_fetch_assoc($result)){
    	$custid = $row["customer_id"];
    	$img = $row["cusimage"];
	//if cusimage is null, enter the URL and upload
    	if($row["cusimage"] == ""){
    		echo "<h1>" . "Please upload an imgae you like" . "</h1>";
    		echo "<form action='addimage.php' method='post' enctype='multipart/form-data'>
    		<input type='hidden' name='id' value='$custid'>
			<input type='text' name='cusimage'>
			<input type='submit' value='upload'>
			</form>";
    	}
	//else print the image
    	else{
    		echo "<a style='display: block; position: relative;' href='$img'>
			<img style='width: 360px; height:auto;' src='$img'></img>
			</a>";
    	}
    }

?>

<?php
   mysqli_close($connection);
?>
</body>
</html>
