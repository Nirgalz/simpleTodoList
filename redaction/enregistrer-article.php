<?php
// cette page sert à enregistrer les données et ne génère pas de html, elle redirigera vers une autre page à la fin du traitement
include('config.php');

// si l'id existe, c'est une mise à jour
$id = null;
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
}

$titre = $_REQUEST['titre'];
$texte = $_REQUEST['texte'];
$auteur = "Nicolas";
$image = $_REQUEST['image'];
$date = date("Y-m-d H:i:s");
// id de la categorie
$id_categorie = $_REQUEST['categorie'];

if ($id === null) {
    // creation
    $sql = "INSERT INTO 
      articles(titre, text, auteur, image, date, id_categorie) 
      VALUES (`$titre`, '$texte', '$auteur', '$image', '$date', $id_categorie)";
    
    $query = $mysqli->query($sql);
} else {
    // update
    $query = $mysqli->query("UPDATE articles SET
        titre = '$titre',
        text = '$texte',
        image = '$image',
        date = '$date',
        id_categorie = $id_categorie
        WHERE id = $id
    ");
}

if (!$query) {
    echo "Erreur lors de la requête : $mysqli->error";
    exit();
}

header('Location: index.php');
exit();