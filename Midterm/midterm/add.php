<?php
require_once "pdo.php";
session_start();


if ( isset($_POST['make']) && isset($_POST['model']) 
     && isset($_POST['year']) && isset($_POST['miles']) && isset($_POST['price'])) {
    
    // if ( empty($_POST['make']) == 1 || empty($_POST['model']) == 1|| empty($_POST['year']) == 1 || empty($_POST['miles']) == 1 || empty($_POST['price']) == 1) {
    //     // echo "error";
        
    //     $_SESSION['error'] = 'All values are required';
        
    //     header("Location: add.php");
    //     // unset($_SESSION['error']);
    //     return;
    // }

        // count($emailVal) == 0 
    

    if (  empty($_POST['year']) == 1 ||  empty($_POST['miles']) == 1 || empty($_POST['price']) == 1 ||empty($_POST['make']) == 1 || empty($_POST['model']) == 1 || $_POST['price'] < 0 || $_POST['miles'] < 0 || $_POST['year'] < 0 ) {
        // echo "error";
        $_SESSION['error'] = 'Error in input data';
        header("Location: index.php");
        return;
    }
    
        
    $sql = "INSERT INTO autos (make, model, miles, year, price) VALUES (:make, :model, :miles, :year, :price)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':model' => $_POST['model'],
        ':miles' => $_POST['miles'],
        ':price' => $_POST['price'],
        ':year' => $_POST['year']));
   $_SESSION['success'] = 'Record Added';
   // echo "sdg";
   header( 'Location: index.php' ) ;
   return;
}

  if( isset($_SESSION['error'])){
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
  


?>
<html>
    
<head>
    <title>Xi Huang's CRUD </title>
</head><body>
<p>Add A New Car</p>


<form method="post">
<p>Make:
<input type="text" name="make"></p>
<p>Model:
<input type="text" name="model"></p>
<p>Year:
<input type="text" name="year"></p>
<p>Miles:
<input type="text" name="miles"></p>
<p>Price:
<input type="text" name="price"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
</body>
</html>

