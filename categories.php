<?php
$categories = $mysqli->query('SELECT * FROM categories');

if (!$categories) {
    echo "erreur sql" . $mysqli->error;
    exit();
}
?>
<?php
    while ($category = $categories->fetch_object()) { ?>
<?= $category->title ?> <br>
   <?php }
?>

<form action="save_cat.php" method="GET">
    <input required type="text" placeholder="Nouvelle categorie" name="titre_cat"><br>

    <input name="submit" type="submit">
</form>