<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['make']) && isset($_POST['model']) 
     && isset($_POST['year']) && isset($_POST['miles']) && isset($_POST['price']) && isset($_GET['id']) ) {

    
    // if ( empty($_POST['make']) == 1 || empty($_POST['model']) == 1|| empty($_POST['year']) == 1 || empty($_POST['miles']) == 1 || empty($_POST['price']) == 1) {
    //     // echo "error";
        
    //     $_SESSION['error'] = 'All values are required';
        
    //     header("Location: edit.php");
    //     // unset($_SESSION['error']);
    //     return;
    // }
    // Data validation should go here (see add.php)
    if ( empty($_POST['year']) == 1 ||  empty($_POST['miles']) == 1 || empty($_POST['price']) == 1 || empty($_POST['make']) == 1 || empty($_POST['model']) == 1 || $_POST['price'] < 0 || $_POST['miles'] < 0 || $_POST['year'] < 0 ) {
        $_SESSION['error'] = 'Error in input data';
        header("Location: index.php");
        return;
    }
    $sql = "UPDATE autos SET make = :make, model = :model, year = :year, miles = :miles, price = :price WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':make' => $_POST['make'],
        ':model' => $_POST['model'],
        ':year' => $_POST['year'],
        ':miles' => $_POST['miles'],
        ':price' => $_POST['price'],
        ':id' => $_GET['id']));
    $_SESSION['success'] = 'Record updated';
    header( 'Location: index.php' ) ;
    return;
}


$stmt = $pdo->prepare("SELECT * FROM autos where id = :xyz");
$stmt->execute(array(":xyz" => $_GET['id']));

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ( $row === false ) {
    $_SESSION['error'] = 'Bad value for id';
    header( 'Location: index.php' ) ;
    return;
}

?>
<html>
<head>
    <title>Xi Huang's CRUD </title>
</head><body>
<?php
$n = htmlentities($row['make']);
$e = htmlentities($row['model']);
$p = htmlentities($row['year']);
$l = htmlentities($row['miles']);
$f = htmlentities($row['price']);
$id = htmlentities($row['id']);

// Flash message disemail would go here


// if deleted, form would disappear.
// if not use php, values will disappear.

echo <<< _END

<p>Edit Car</p>
<form method="post">
<p>Make:
<input type="text" title="make" name="make" value="$n"></p>
<p>Model:
<input type="text" title="model" name="model" value="$e"></p>
<p>Year:
<input type="text" title="year" name="year" value="$p"></p>
<p>M:
<input type="text" title="miles" name="miles" value="$l"></p>
<p>Price:
<input type="text" title="price" name="price" value="$f"></p>
<input type="hidden" title="id" value="$id">
<p><input type="submit" value="Update"/>
<a href="index.php">Cancel</a></p>
</form>
</body>
</html>
_END
?>

