<?php
$page = null;
if (isset($_GET['page'])){
    $page = $_GET['page'];
};
switch ($page){
    case 'ecrire':
        include('create_todo.php');
        break;
    case 'editer':
        include('edit_todo.php');
        break;
    default:
        echo "<h1>default</h1>";
}
?>
<?php

$task = $mysqli->query("SELECT * FROM tasks");
$categories = $mysqli->query('SELECT * FROM categories');
$priorities = $mysqli->query('SELECT * FROM priority');

if (!$task || !$categories || !$priorities) {
    echo "Erreur sql : " . $mysqli->error;
    exit();
}

?>

<form action="enregistrer-article.php" method="get">
    <input type="hidden" name="id" value="">

    <input required type="text" placeholder="creer une tache" name="title" value=""><br>
    <input required type="date"><br>
    <select required name="categorie">
        <?php while ($categorie = $categories->fetch_object()) { ?>
            <option value="<?= $categorie->c_id ?>"
                <?php if ($categorie->c_id == $categorie->c_id) {
                    echo 'selected';
                } ?>
            >
                <?= $categorie->title ?>
            </option>
        <?php } ?>
    </select>
    <select required name="priority">
        <?php while ($priority = $priorities->fetch_object()) { ?>
            <option value="<?= $priority->p_id ?>"
                <?php if ($priority->p_id == $priority->p_id) {
                    echo 'selected';
                } ?>
            >
                <?= $priority->title ?>
            </option>
        <?php } ?>
    </select>

    <button>Enregistrer</button>
</form>