<?php
require_once "pdo.php";
session_start();
?>
<html>
<head>
    <title>Xi Huang's CRUD </title>
</head><body>
<?php
if ( isset($_SESSION['error']) ) {
    echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
    unset($_SESSION['error']);
}
if ( isset($_SESSION['success']) ) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}
echo('<table border="1">'."\n");
$stmt = $pdo->query("SELECT title, plays, rating, id FROM tracks");
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr><td>";
    echo(htmlentities($row['title']));
    echo("</td><td>");
    echo(htmlentities($row['plays']));
    echo("</td><td>");
    echo(htmlentities($row['rating']));
    echo("</td><td>");
    echo('<a href="edit.php?id='.$row['id'].'">Edit</a> / ');
    echo('<a href="delete.php?id='.$row['id'].'">Delete</a>');
    echo("</td></tr>\n");
}
?>
</table>
<a href="add.php">Add New</a>
</body>
</html>





