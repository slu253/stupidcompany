<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to stupid company database</title>
</head>
<body>
<?php
   include 'connectdb.php';
?>
<h1>Customer adding result:</h1>
<ol>
<?php
	//get all information from main page
    $custid = $_POST["custid"];
    $whichAgent = $_POST["agentid"];
    $firstname = $_POST["fname"];
    $lastname =$_POST["lname"];
    $city = $_POST["city"];
    $number = $_POST["pnumber"];
    $max = 0;
	//query1 to select max id
    $query1 = 'SELECT MAX(customer_id) AS max FROM customers';
    $result=mysqli_query($connection,$query1);
    if (!$result) {
        die("database max query failed.");
    }
	//print max id and set value in it
    while ($row=mysqli_fetch_assoc($result)){
      echo "The max customer id is " .$row["max"]."<br>";
      $max = $row["max"];
    }
	//query2 to see if the id is duplicated 
    $query2 = "SELECT COUNT(customer_id) AS count FROM customers WHERE customer_id = $custid";
    $result=mysqli_query($connection,$query2);
    if (!$result) {
        die("database count query failed.");
    }
    while ($row=mysqli_fetch_assoc($result)){
	//if id is duplicated, add 1 to max id
        if($row["count"] == 1){
          echo "You enter the duplicated customer id: ". $custid. "<br>";
          $custid = $max + 1;
          echo "We add 1 customer id on max ";
        }
    }


	//write query to insert customer into database
$query = 'INSERT INTO customers values("' . $custid . '","' . $firstname . '","' . $lastname . '","' . $city . '","' . $number . '","' .$whichAgent . '","NULL")';
    if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
    echo "Your customer was added!"."<br>";
	//close connection
    mysqli_close($connection);
?>
</ol>
</body>
</html>
