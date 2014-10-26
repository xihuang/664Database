<?php
    session_start();
    // echo session_id();
    if ( isset($_POST["sugar"]) && isset($_POST["spice"]) && 
    	isset($_POST["vanilla"])) {
    	$_SESSION['sugar'] = $_POST['sugar'];
        $_SESSION['spice'] = $_POST['spice'];
        $_SESSION['vanilla'] = $_POST['vanilla'];
    	// redirect to GET method
    	header( 'Location: index.php' );
    	return;
    	
	}
	if ( isset($_SESSION["success"]) ) {
        echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");
        unset($_SESSION["success"]);
    }  

  
    // Retrieve data form the session for the view
    $sugar = isset($_SESSION['sugar']) ? $_SESSION['sugar'] : '';
    $spice = isset($_SESSION['spice']) ? $_SESSION['spice'] : '';
    $vanilla = isset($_SESSION['vanilla']) ? $_SESSION['vanilla'] : '';   
    $orderTotal = $sugar * 4.5 + $spice * 2.25 + $vanilla * 3.35 ;  
    ?>
<html>
	<head>
		<title> Xi Huang </title>
	</head>
	<body style="font-family: sans-serif;">
		<?php
			if ( ! isset($_SESSION["account"]) ) { ?>
			Please <a href="login.php">Log In</a> to start.
			<?php } else { ?>
		<h1> Welcome to Xi Huang Shopping Cart</h1>

		Please indicate how many of the following items you would like to purchase:


		<form method="post">
			<p><input type="text" name="sugar" size="10" 
			  value="<?php echo(htmlentities($sugar)); ?>"> Sugar 4.50</p>
			<p><input type="text" name="spice" size="10" 
			  value="<?php echo(htmlentities($spice)); ?>"> Spice 2.25</p>
			<p><input type="text" name="vanilla" size="10" 
			  value="<?php echo(htmlentities($vanilla)); ?>"> Vanilla 3.35 </p>
			<strong> Order total: <?php echo $orderTotal; ?> </strong>
			<p><input type="submit" value="Update"></p>


			<a href = "logout.php">Logout</a>

		</form>
		<?php } ?>
	</body>
</html>
