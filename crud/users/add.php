<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['title']) && isset($_POST['plays']) 
     && isset($_POST['rating'])) {

    // Data validation
    if ( strlen($_POST['title']) < 1 || $_POST['plays'] < 0 || $_POST['rating'] < 0 || !is_numeric($_POST['plays']) || !is_numeric($_POST['rating'])) {
        $_SESSION['error'] = 'Bad value for title, plays, or rating';
        header("Location: index.php");
        return;
    }

    
    $sql = "INSERT INTO tracks (title, plays, rating) 
              VALUES (:title, :plays, :rating)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':title' => $_POST['title'],
        ':plays' => $_POST['plays'],
        ':rating' => $_POST['rating']));
   $_SESSION['success'] = 'Record Added';
   header( 'Location: index.php' ) ;
   return;
}

?>
<html>
<head>
    <title>Xi Huang's CRUD </title>
</head><body>
<p>Add A New Record</p>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorMes = "";
    if ( empty($_POST['title']) || empty($_POST['plays']) || empty($_POST['rating'])) {
      $errorMes = 'All values are required';
      // echo "<p style=\"color:red\"> </p>\n";
      echo '<p style="color:red">'.$errorMes."</p>\n";
      unset($_SESSION['error']);
  }
}
?>

<form method="post">
<p>Title:
<input type="title" name="title"></p>
<p>Plays:
<input type="plays" name="plays"></p>
<p>Rating:
<input type="rating" name="rating"></p>
<p><input type="submit" value="Add New"/>
<a href="index.php">Cancel</a></p>
</form>
</body>
</html>

