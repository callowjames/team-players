<?php
	require "serverCode/connect.php";

	$selectTeam = "<select name='cboTeam' id='cboTeam'>";
	$sql = "SELECT teamID, teamName FROM team ORDER BY teamName";
	$result = $mysqli->query($sql);
	
	while($row = $result->fetch_array())
		$selectTeam .= "<option value='" . $row["teamID"] . "'>" . $row["teamName"] . "</option>";

	$selectTeam .= "</select>";

	$selectGames = "<select name='lstAvailGame' id='lstAvailGame' size='7' style='width:200px'>";
	$sql = "SELECT * FROM videogame ORDER BY gameName";
	$result = $mysqli->query($sql);
	
	while($row = $result->fetch_array())
		$selectGames .= "<option value='" . $row["gameID"] . "'>" . $row["gameName"] . "</option>";

	$selectGames .= "</select>";

	$mysqli->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    	<title>High Scores Entry Page</title>
	<script type="text/javascript" src="clientCode/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="clientCode/Lab5.js"></script>
  </head>

<body>

	<p>Team: <?php echo $selectTeam; ?> </p>
	<p>	Search Results:<br />
			<select id='lstPlayers' name='lstPlayers' size='10' style='width:200px'></select>
			<select id='lstHighScores' name='lstHighScores' size='10' style='width:200px'></select>
	</p>
	<a href="#">Available Game List</a>
	<div id="games" style="display: none">
		<?php echo $selectGames; ?>
	</div>	
</body>
</html>
