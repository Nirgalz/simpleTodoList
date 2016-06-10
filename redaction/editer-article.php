<?php
// on récupère l'article existant par le parametre GET id
$id = $_GET['id'];
$article = $mysqli->query("SELECT * FROM articles WHERE id = $id");
$categories = $mysqli->query('SELECT * FROM categories');

if (!$article || !$categories) {
    echo "Erreur sql : " . $mysqli->error;
    exit();
}
$article = $article->fetch_object();
?>

<form action="enregistrer-article.php" method="get">
    <input type="hidden" name="id" value="<?= $article->id ?>">

    <input required type="text" placeholder="Titre de l'article" name="titre" value="<?= $article->titre ?>"><br>
    <textarea placeholder="Texte de l'article" name="texte"><?= $article->text ?></textarea><br>
    <input required type="text" name="image" placeholder="Url de l'image de l'article"
           value="<?= $article->image ?>"><br>

    <select required name="categorie">
        <?php while ($categorie = $categories->fetch_object()) { ?>
            <option value="<?= $categorie->id ?>"
                <?php if ($categorie->id == $article->id_categorie) {
                    echo 'selected';
                } ?>
            >
                <?= $categorie->titre ?>
            </option>
        <?php } ?>
    </select>

    <button>Enregistrer</button>
</form>
