
<?php include 'connectdb.php';?>

<?php

	//select products table data	
    $query = "SELECT * FROM products ORDER BY ";
   	// prince ascending 
     if ($_POST['pickaproduct'] == 'price_ascending')
    {
        $query .= "item_cost ASC";
    }
	//price descending
    elseif ($_POST['pickaproduct'] == 'price_descending')
    {
        $query .= "item_cost DESC";
    }
	//order ascending
    elseif ($_POST['pickaproduct'] == 'order_ascending')
    {
        $query .= "description ASC";
    }
	//order descending
    else
    {
        $query .= "description DESC";
    }

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("databases query failed.");
    }
    echo "<ul>";
	//print all data with bullet point
    while ($row = mysqli_fetch_assoc($result)) {
    	echo "<li>" ."Price for " .$row[description] ." is $". $row[item_cost] ."</li>";
	}
          
    echo "</ul>";
	//free result
    mysqli_free_result($result);

?>
