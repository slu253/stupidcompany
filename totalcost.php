<!DOCTYPE html>
<html>
<head>
	<title>Assignment3 database</title>
</head>
<body>
<?php include "connectdb.php"; ?>
<?php
	//get data from main page
	$proid = $_POST["proid"];
	echo "The product id you entered is: " .$proid."<br>";
	//query to selcct product id
    $checkid = "SELECT COUNT(product_id) AS count FROM products WHERE product_id = $proid";
    $result = mysqli_query($connection, $checkid);
    if (!$result) {
        die("SQL_SELECT failed----");
    }
	
    while ($row = mysqli_fetch_assoc($result)){
	//if count =1
        if($row["count"] == 1){
		//join product and purchase table
                $query = "SELECT products.description AS description, SUM(purchases.quantity) AS total_quantity, (SUM(purchases.quantity) * products.item_cost) AS money_made FROM purchases, products WHERE products.product_id = purchases.product_id GROUP BY purchases.product_id AND products.product_id = $proid";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                die("SQL_SELECT failed");
                }
		//calculate revenue and return result
                echo "<h1>" ."Here is the revenue list". "</h1>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "The total number we purchased " .$row["description"] ." is " .$row["total_quantity"]." " ."<br>";
                    echo "The revenue we made is $" . $row["money_made"] ."<br>";
                    echo "<br> ";
                }
        }	
        else{
		//else id is invalid
            echo "Your entered a invalid product_id."."<br>";
	    echo "Please go back to main page and re-enter it"."<br>";
        }
    }


	//free result
    mysqli_free_result($result);

?>
</body>
</html>
