<?php
	require "connect.php";

	$player = $_GET["player"];
	$game = $_GET["game"];

	$sql = "DELETE FROM highscores WHERE playerID = $player AND gameID = '$game'";

	$result = $mysqli->query($sql);

	if($result && $mysqli->affected_rows > 0)
		echo "Score Deleted!";
	else
		echo "Unable to delete score.";

	$mysqli->close();
?>