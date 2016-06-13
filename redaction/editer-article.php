<?php
// on récupère l'article existant par le parametre GET id
$id = $_GET['id'];
$task = $mysqli->query("SELECT * FROM articles WHERE id = $id");
$categories = $mysqli->query('SELECT * FROM categories');

if (!$task || !$categories) {
    echo "Erreur sql : " . $mysqli->error;
    exit();
}
$task = $task->fetch_object();
?>

<form action="enregistrer-article.php" method="get">
    <input type="hidden" name="id" value="<?= $task->id ?>">

    <input required type="text" placeholder="Titre de l'article" name="titre" value="<?= $task->titre ?>"><br>
    <textarea placeholder="Texte de l'article" name="texte"><?= $task->text ?></textarea><br>
    <input required type="text" name="image" placeholder="Url de l'image de l'article"
           value="<?= $task->image ?>"><br>

    <select required name="categorie">
        <?php while ($categorie = $categories->fetch_object()) { ?>
            <option value="<?= $categorie->id ?>"
                <?php if ($categorie->id == $task->id_categorie) {
                    echo 'selected';
                } ?>
            >
                <?= $categorie->titre ?>
            </option>
        <?php } ?>
    </select>

    <button>Enregistrer</button>
</form>
