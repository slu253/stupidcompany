<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dr. Western's Vet Clinic-Your Pets</title>
</head>
<body>
<?php include "connectdb.php";
?>

<h1>Customer adding result:</h1>
<ol>
<?php
	//get data from post method
	$proid = $_POST["proid"];
	$cusid = $_POST["cusid"];
	$quantity = $_POST["quantity"];
	//initialize count =0
	$count = 0;
	//select which customer buys what
	$query = "SELECT * FROM purchases WHERE customer_id = $cusid AND product_id = $proid";
	$result = mysqli_query($connection, $query);
	if (!$result) {
        die("databases insert failed.");
    }
    //check how many row we can after query
    while ($row = mysqli_fetch_assoc($result)) {
                
        $count = $count + 1;
    }

    // if already purchased this item
    if($count > 0){
    	// if quantity is greater than zero, add it
    	if($quantity > 0){
		//add new quantity to original
    		$query1 = "UPDATE purchases SET quantity = quantity + $quantity WHERE customer_id = $cusid AND product_id = $proid";
    		    if (!mysqli_query($connection, $query1)) {
                    die("SQL_UPDATE failed: " . mysqli_error($connection));
                }
		//print message
		echo "Purchases quantity updated successfully";
    	}
    	else{	
		// cannot add negative quantity
    		echo "Cannot add negative quantity into purchases";
    	}	
    }
    // if no product purchased, add value in it

    else{
	//another case
        if($quantity < 0){
            die("Cannot add negative quantity of product");
        }
	//insert data into puchase table
    	$query2 = 'INSERT INTO purchases VALUES("' . $cusid . '","' . $proid .'","' . $quantity .'")';
    	if (!mysqli_query($connection, $query2)) {
            die("SQL_INSERT failed: " . mysqli_error($connection));
        }
        echo "Purchases added successfully";


    }
	//connecttion close
    mysqli_close($connection);


?>
</ol>
</body>
</html>
