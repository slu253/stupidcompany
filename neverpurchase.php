<?php include "connectdb.php";
?>

<?php 
	//write query to select id not in pruchase table
	$query ="SELECT * FROM products WHERE product_id NOT IN (SELECT product_id FROM purchases)";
	$result = mysqli_query($connection, $query);
	if (!$result) {
        die("SQL_SELECT failed");
    }
	//print all product description and cost of it 
    echo "Here are the product list that never been purchased:";
    while ($row = mysqli_fetch_assoc($result)){
    	echo "<li>" .$row["description"] ." with price $". $row["item_cost"] ."</li>";
    }
    echo "Please buy me !!!!";	
	//free resuult
    mysqli_free_result($result);
?>
