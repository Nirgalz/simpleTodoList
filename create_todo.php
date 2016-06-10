<?php
// recuperer la liste des categories et les 
$categories = $mysqli->query('SELECT * FROM categories');
$priorities = $mysqli->query('SELECT * FROM priority');
?>

<form action="save_todo.php" method="GET">
    <input required type="text" placeholder="New Task" name="title"><br>
    <input required name="deadline" type="date"><br>

    <select name="c_id" required>
        <?php while ($categorie = $categories->fetch_object()) { ?>
            <option value="<?= $categorie->c_id ?>"><?= $categorie->title ?></option>
        <?php } ?>
    </select>

    <select name="p_id" required>
        <?php while ($priority = $priorities->fetch_object()) { ?>
            <option value="<?= $priority->p_id ?>"><?= $priority->title ?></option>
        <?php } ?>
    </select>

    <button>Enregistrer</button>
</form>