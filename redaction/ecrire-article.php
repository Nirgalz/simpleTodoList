<?php
// recuperer la liste des categories
$categories = $mysqli->query('SELECT * FROM categories');
?>

<form action="enregistrer-article.php" method="GET">
    <input required type="text" placeholder="Titre de l'article" name="titre"><br>
    <textarea placeholder="Texte de l'article" name="texte"></textarea><br>
    <input required type="url" name="image" placeholder="Url de l'image de l'article"><br>
    
    <select name="categorie" required>
        <?php while ($categorie = $categories->fetch_object()) { ?>
        <option value="<?= $categorie->id ?>"><?= $categorie->titre ?></option>
        <?php } ?>
    </select>

    <button>Enregistrer</button>
</form>