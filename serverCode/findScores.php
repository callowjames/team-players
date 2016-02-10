<?php
	//place your code for STEP 2 of LAB 5 here
	
	// connection to DB
	require ("connect.php");
	
	// find scores output SQL statement
	$findScoresSQL = "SELECT gameID, CONCAT(gameName, ' - ', score) AS 'Scores'
					 FROM videogame
					 INNER JOIN highscores USING (gameID)";
	
	// pass the ID from the AJAX call to the SQL WHERE line
	if(isset($_GET["ID"]))
		$findScoresSQL .= " WHERE playerID = " . $_GET["ID"];
	
	// execute query and store results
	$result = $mysqli->query($findScoresSQL);
	
	// loop through SQL data to make formatted rows for table
	while($row = $result->fetch_array())
	{
		$options .= "<option value='" . $row['gameID'] . "'>" .$row['Scores'] . "</option>";
	}
	
	echo $options;
	
	// close connection to DB
	$mysqli->close();
	
?>