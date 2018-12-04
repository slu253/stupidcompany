<!DOCTYPE html>
<html>
<head>
	<!-- web title-->
	<title>Assignment3 database</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	include 'connectdb.php';
	?>
	<!-- part1: show all customer information -->
	<h1>Welcome to stupid company database</h1>
	<img src="https://www.wintersportscompany.com/wp/wp-content/uploads/the-winter-sports-company-compact-logo-jpeg-2.jpg" width="500" height="260">
	<h2>Information of all customers:</h2>
	Choose one customer
	<!-- choose a customer to see their purchase-->
	<form action="getpurchase.php" method="post">
	<?php
	   include 'selectcustomer.php';
	?>
	<br>
	<input type="submit" value="Get purchase info">
	</form>
	<p>
	<hr>
	<p>
	<!-- choose a way to display description and price -->
	<div>
		<h2>Information of products</h2>
		Choose price or description in ascending or descending order:
		<form action="getproducts.php" method="post">
		<select name="pickaproduct" id="pickaproduct">
		<option value="price_ascending">Price ascending</option>
		<option value="price_descending">Price desscending</option>
		<option value="order_ascending">Order ascending</option>
		<option value="order_descending">Order descending</option>	
		</select>
		<input type="submit" name="submit" value="Get selected types">
		</form>
	</div>
	<p>
	<hr>
	<p>	
		<!-- add a purchase when you enter the information in it -->
		<h2> Add a purchase:</h2>
		<form action="addpurchase.php" method="post">
		Select a customer:
		<select name="cusid" id="cusid">
		<option value="10">Barney Rubble</option>
		<option value="12">Monty Burns</option>
		<option value="13">Wonder Woman</option>
		<option value="14">Peter Griffens</option>
		<option value="15">Fred Flinstone</option>
		<option value="21">Homer Simpson</option>
		<option value="31">Sideshow Bob</option>	
		</select>
		<br>
		<!-- choose a product-->
		Choose a product:
		<select name="proid" id="proid">
		<option value="11">Bike</option>
		<option value="12">Socks</option>
		<option value="66">Elbow Pads</option>
		<option value="78">Knee Pads</option>
		<option value="88">Roller Blades</option>
		<option value="99">Helmet</option>	
		</select>
		<br>
		Enter quantity purchased(Please choose a positve number): <input type="text" name="quantity"><br>
		<input type="submit" name="submit" value="Add new order">
		</form>

	<p>
	<hr>
	<p>
		<!-- add a customer when you enter the information in it -->
		<h2> Add a new customers:</h2>
		Please enter the customer's information below:
		<form action="addcustomer.php" method="post">
		New customers ID: <input type="text" name="custid"><br>
		First Name: <input type="text" name="fname"><br>
		Last Name: <input type="text" name="lname"><br>
		City: <input type="text" name="city"><br>
		Phone_number(xxx-xxxx): <input type="text" name="pnumber"><br>
		Choose an agent you want:<br>
		<input type="radio" name="agentid" value="11">Regis Philbin<br>
		<input type="radio" name="agentid" value="12">Rosie Cox<br>
		<input type="radio" name="agentid" value="22">Countney Cox<br>
		<input type="radio" name="agentid" value="23">Sheng Lu<br>
		<input type="radio" name="agentid" value="33">David Letterman<br>
		<input type="radio" name="agentid" value="66">Rosie Odonnell<br>
		<input type="radio" name="agentid" value="99">Hugh Grant<br>
		<br>
		<input type="submit" value="Add New Customer">
		</form>
	<p>
	<hr>
	<p>
		<!-- update customer phone number-->
		<h2>Update phone number</h2>
		<form action="updatephone.php" method="post">
		Please enter customerID: <input type="text" name="customerid"><br>
		Please enter new phone number: <input type="text" name="new_num"><br>
		<input type="submit" name="submit" value="Update phone number">
		</form>
		<br>

	<p>
	<hr>
	<p>	
		<!-- delete a customer when you choose id in the table-->
		<h2>Delect a customer</h2>
		Choose a customer below:
		<form action="deletecustomer.php" method="post">
		<?php
		   include 'selectcustomer.php';
		?>
		<br>
		<input type="submit" value="Delete this customer">
		</form>
	<p>
	<hr>
	<p>
		<!--list the number of products that cust purcahsed-->
		<h2>List the number of product that customers purchased</h2>
		<form action="getcustomerpurchase.php" method="post">
		Please enter the quantity to search: <input type="text" name="quantity"><br>
		<input type="submit" name="submit" value="Show list">	
		</form>
		<br>
	<p>
	<hr>
	<p>	
		<!-- list all products that are never pruchased-->
		<h2>List all the product that are never purchased</h2>
		<?php include "neverpurchase.php";
		?>
	<p>
	<hr>
	<p>	
		<!-- show revenue table -->
		<h2>List the total cost for a product</h2>
		<form action="totalcost.php" method="post">
		Please enter product id to start: <input type="text" name="proid"><br>
		<input type="submit" name="submit" value="Calculate total cost">	
		</form>
	<!-- clsoe database connection-->
	<?php
	mysqli_close($connection);
	?> 



</body>
</html>
