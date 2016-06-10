<?php
$tasks = $mysqli->query('SELECT * FROM tasks');

if (!$categories) {
    echo "erreur sql" . $mysqli->error;
    exit();
}
?>
<?php
while ($task = $tasks->fetch_object()) { ?>
    <?= $task->title ?> <?= $task->deadline ?> <?= $task->c_id ?> <?= $task->p_id ?><br>
<?php }
?>