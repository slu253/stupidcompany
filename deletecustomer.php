<?php include "connectdb.php"; 
	//get customer id
	$custid = $_POST["customers"];
	echo $custid;
	echo "<br>";
	
	//write query to delete purchase if customer purchase something
	$query_delect_purchases = "DELETE FROM purchases WHERE customer_id = $custid";
	$result = mysqli_query($connection, $query_delect_purchases);
	if (!$result) {
       		 die("SQL_DELETE failed, cannot delete purchases");
   	 }
    	else{
		//print indicate message
    		echo "customer purchase was deleted";
    		echo "<br>";
    	}
	//query to delete customer 
    	$query_delect_customer = "DELETE FROM customers WHERE customer_id = $custid";
		$result = mysqli_query($connection, $query_delect_customer);
		if (!$result) {
        	die("SQL_DELETE failed, cannot delete customer");
    	}
    	else{
		//print message
    		echo "customer was deleted";
    		echo "<br>";
	//close connection
	mysqli_close($connection);
    }


?>
