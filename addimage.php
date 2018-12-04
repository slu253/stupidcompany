
<?php
	include "connectdb.php";
	//get data
	$cusid=$_POST["id"];
	$image=$_POST["cusimage"];
	//print message
	echo "customer id you entered is: ".$cusid."<br>";
	echo "image URL is ".$image."<br>";

	//write query
	$query = 'UPDATE customers SET cusimage = "' . $image . '" WHERE customer_id = "'. $cusid . '"';

	$result = mysqli_query($connection, $query);
	if (!$result)
	{
		die("SQL_UPDATE_IMAGE failed. ");
	}
	echo "The image uploaded successfully!!!"."<br>"; 
	// close the connection
	mysqli_close($connection);

?>
