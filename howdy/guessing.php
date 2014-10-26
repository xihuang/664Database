<!DOCTYPE HTML> 
<html>
	<head>
		<title> Guessing game for Xi Huang </title>
	</head>
	<body>
		<h1>Welcome to Xi Huang's guessing game</h1>
		<p>
		<?php

			$guess = $_GET['guess'];
			if ( empty($guess) ){
			   	echo "Missing guess parameter";
			   } elseif (!is_numeric($guess) ){
			   	echo "Your guess is not valid";
			   }
			   elseif ($guess > 42) {
			   		echo "Your guess is too high";
			   } elseif ($guess < 42) {
			   		echo "Your guess is too low";
			   } else {
			   		echo "Congratulations - You are right";
			   	}
			   


		?>
		</p>
		<p>Yet another paragraph.</p>
		</body>	
</html>