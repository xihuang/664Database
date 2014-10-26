<?php
  // Set up the values for the game...
	$names = array('Rock', 'Paper', 'Scissors');
	$human = -1;
	if ( isset($_POST["human"]) ) $human = intval($_POST["human"]);
	$computer = rand(0,2);

// This function takes as its input the computer and human play
// and returns "Tie", "You Lose", "You Win" depending on play
// where "You" is the human being addressed by the computer
	function check($computer, $human) {
		// $ans = "Need some code here";
		

		$hum = ( $human + 1 ) % 3;
		
		if ( $hum == $computer ){
				$ans = "You Lose";
		} elseif ( $human == $computer ) {
			
				$ans = "Tie";
			} else {
				$ans = "You Win";
			}
		
		return $ans;
	}

	// This function tests all possible combinations of human / computer play
	function tester() {
	    global $names;
	    echo("<b>Testing all combinations...</b><br/>\n");
	    for ( $i=0; $i<3; $i++) {
	      for ( $j=0; $j<3; $j++) {
	         echo("Your play=".$names[$j]." Computer Play=".$names[$i]." Result=".check($i,$j)."<br/>\n");
	      }
	    }
	}

?>
<html>
	<head>
		<title>This is Xi Huang Rock, Paper, Scissors Game</title>
	</head>
	<body>
		<h1>Welcome to Rock Paper and Scissors</h1>
		<form method="post">
		<select name="human">
			<option value="-1">Select</option>
			<option value="0">Rock</option>
			<option value="1">Paper</option>
			<option value="2">Scissors</option>
			<option value="3">Test</option>
		</select>
		<input type="submit" value="Play">
		</form>

		<p>
			<?php
			  if ( $human == -1 ) {
			    echo("Please select a strategy and press Play.");
			  } else if ( $human == 3 ) {
			    tester();
			  } else {
			    echo("Your Play=".$names[$human]." Computer Play=".$names[$computer]." Result=".check($computer,$human)."</br>\n");
			  }
			?>
		</p>
	</body>
</html>