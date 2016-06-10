<?php include('config.php'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Accueil salle de rédaction</title>
</head>

<body>

<?php include('menu.php'); ?>

<?php
$page = null;
if (isset($_GET['page'])){
    $page = $_GET['page'];
};
switch ($page){
    case 'ecrire':
        include('ecrire-article.php');
        break;
    case 'editer':
        include('editer-article.php');
        break;
    default:
        echo "<h1>Bienvenue dans l'admin</h1>";
}
?>

</body>
</html>