
<?php
	//Write query to select all info from customers
	$query = "SELECT * FROM customers ORDER BY last_name";
	$result = mysqli_query($connection,$query);
	if (!$result) {
	     die("databases query failed.");
	}

	//definde the column of the table 
	echo "<table border='3' id = results>
	<tr>
	<th>Select Here</th>
	<th>Customer ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>City</th>
	<th>Phone Number</th>
	<th>Agent ID</th>
	</tr>";
	// use while loop to get all data
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<tr>";
		//define row and data cell
		echo "<td>".'<input type="radio" name="customers" value="';
		echo $row["customer_id"];
		echo'">'."</td>";
		echo "<td>". $row[customer_id] . "</td>";
		echo "<td>". $row[first_name] . "</td>";
		echo "<td>". $row[last_name] . "</td>";
		echo "<td>". $row[city] . "</td>";
		echo "<td>" . $row[phone_number] . "</td>";
		echo "<td>" . $row[agent_id] . "</td>";
		echo "</tr>";
		
	}
	echo "</table>";
	// free result
	mysqli_free_result($result);
	
	
?>
