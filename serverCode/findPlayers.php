<?php
	//place your code for STEP 1 of LAB 5 here
	
	// connection to DB
	require ("connect.php");
	
	// player Output SQL statement
	$playerSQL = "SELECT playerID, CONCAT(playerFirstName, ' ', playerLastName) AS 'playerName'
				 FROM player";
	
	// pass the ID from the AJAX call into the SQL WHERE line
	if(isset($_GET["ID"]))
		$playerSQL .= " WHERE teamID = " . $_GET["ID"];
	
	// order output
	$playerSQL .= " ORDER BY playerName";
	
	// execute query and store results
	$result = $mysqli->query($playerSQL);
	
	// loop through SQL data to make formatted rows for table
	while($row = $result->fetch_array())
	{
		$options .= "<option value='" .$row['playerID'] ."'>" .$row['playerName'] ."</option>";
	}
	
	echo $options;
	
	// close connection to DB
	$mysqli->close();
?>