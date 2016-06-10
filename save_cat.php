<?php
include('config.php');

$title = $_REQUEST['titre_cat'];
$sql = "INSERT INTO categories(title) VALUES ('$title')";
$query = $mysqli->query($sql);

header('Location: index.php');
exit();

?>

