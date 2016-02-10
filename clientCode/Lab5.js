$(function() 
{
	// AJAX call to findPlayers.php when a team is selected
	$("#cboTeam").change(function()
	{
		$("#games").hide(); // hide the div containing the games list for intial team change
		
		
		var URL = "serverCode/findPlayers.php";
		var teamIDval = $(this).val(); // or $("#cboTeam").val();
		
		$.get(URL,
			  {ID:teamIDval},
			  function(data) // inject data in lstPlayers
			  {
				$("#lstPlayers").html(data);
				$("#lstHighScores").html(''); // clears the high score table list when changing teams
			  }
			  );
	}); // end of team change function

	$("#cboTeam").trigger("change"); // displays table data for initial page load

	// AJAX call to findScores.php when a player is selected
	$("#lstPlayers").change(function() // or .click(function()
	{
		var URL = "serverCode/findScores.php";
		var playerIDval = $(this).val(); // or $("#lstPlayers").val();
		
		$.get(URL,
			 {ID:playerIDval},
			 function(data) // inject data into lstHighScores
			 {
			 	$("#lstHighScores").html(data);
			 }
			 );
	}); // end of player list click function
	
	// verifies whether the user has selected a player when the anchor tag is clicked
	$("a").click(function()
	{
		var optionSelect = $("#lstPlayers option:selected").length;
		
		// alerts to select a player
		if(optionSelect == 0)
			alert("Please select a player first.");
		// otherwise reveals the div containing to games list
		else
			$("#games").show();
	});
	
	// AJAX call to addScore.php when the user doubleclicks on a game from the game list
	$("#games").dblclick(function()
	{
		var URL = "serverCode/addScore.php";
		var playerIDval = $("#lstPlayers").val();
		var gameIDval = $("#lstAvailGame").val();
		var newScore = prompt("Please enter a new score:", "");

		$.get(URL,
			 {player:playerIDval, game:gameIDval, score:newScore}, 
			 function(data)
			 {
				alert(data);
				$("#lstPlayers").trigger("change"); // refreshes data after insert
			 }
			 );
	}); // end of games dblclick function
	
	// AJAX call to deleteScore.php when the user doubleclicks on a highscore record
	$("#lstHighScores").dblclick(function()
	{
		var URL = "serverCode/deleteScore.php";
		var playerIDval = $("#lstPlayers").val();
		var gameIDval = $(this).val(); // or $("#lstHighScores").val();
		
		$.get(URL,
			 {player:playerIDval, game:gameIDval},
			 function(data)
			 {
				alert(data);
				$("#lstPlayers").trigger("change"); // refreshes data after delete
			 }
			 );
	});// end of high scores dblclick function
}); // end of js function