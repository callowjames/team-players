<?php
	require "connect.php";

	$player = $_GET["player"];
	$game = $_GET["game"];
	$score = $_GET["score"];

	$sql = "INSERT INTO highscores (playerID, gameID, score) VALUES ($player, '$game', $score)";

	$result = $mysqli->query($sql);

	if($result && $mysqli->affected_rows > 0)
		echo "New Score Added!";
	else
		echo "Unable to Add Score.";

	$mysqli->close();
?>