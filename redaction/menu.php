<a href="index.php">Accueil admin</a> - <a href="index.php?page=ecrire">Créer un article</a><br>
Editer un article existant : <br>

<?php
// liste des articles existants
$articles = $mysqli->query('SELECT * FROM articles');
if (!$articles) {
    echo "Echec lors de la requete : " . $mysqli->connect_error;
    exit();
}
?>
<ul>
    <?php while ($article = $articles->fetch_object()) { ?>
        <li>
            <a href="index.php?page=editer&id=<?= $article->id ?>">
                [<?= $article->date ?>] <?= $article->titre ?> écrit par <?= $article->auteur ?><br>
                <img src="<?= $article->image ?>" style="width:200px">
            </a>
        </li>
        <?php
    } ?>
</ul>
<hr>