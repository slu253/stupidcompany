<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to stupid company database</title>
</head>
<body>
<h1>Customer purchased over quantity</h1>
<?php include "connectdb.php"; ?>
<?php
	//get data
	$quantity = $_POST["quantity"];
	//query to select name and quantity
	$query = "SELECT CONCAT(customers.first_name, ' ', customers.last_name) AS customer_name, purchases.quantity AS quantity, products.description AS description FROM customers, purchases, products WHERE customers.customer_id = purchases.customer_id AND products.product_id = purchases.product_id AND purchases.quantity > $quantity;";
	$result = mysqli_query($connection, $query);
	if (!$result)
	{
		die("databases query on purchases failed. ");
	}

    echo "<ul>";
	//print data and format it
    while ($row = mysqli_fetch_assoc($result)) {
    	echo "<li>" .$row[customer_name] ."has purchased ". $row["quantity"] ." units of " . $row["description"]."</li>";
	}
          
    echo "</ul>";
	//free result
    mysqli_free_result($result);
?>



</body>
</html>	
