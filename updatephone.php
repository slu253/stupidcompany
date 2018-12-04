<?php
	include "connectdb.php";
?>	
<?php
	$cusid=$_POST['customerid'];
	$phone=$_POST['new_num']; 

	//query to select current phone number
	$query = "SELECT phone_number FROM customers WHERE customer_id = $cusid";
	$result=mysqli_query($connection,$query);
	if (!$result)
	{
		die("SQL_SELECT failed ");
	}
	//print current phone number
	while ($row=mysqli_fetch_assoc($result)){
		echo "<h2>". "This customer has original phone number: ". $row["phone_number"]."</h2>";
		echo "<br>";
	}

	echo "The customer with id: " .$cusid . " has new phone number" . $phone . " ";
	//query to update phone
	$query= "UPDATE customers SET phone_number = '$phone' WHERE customer_id = $cusid";
	
	$result = mysqli_query($connection, $query);
	if (!$result)
	{
		die("SQL_UPDATE failed ");
	}
	//print 
	echo "Update phone number successfully"."<br>";
	//close connection
	mysqli_close($connection);

?>
