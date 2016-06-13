<?php

if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
}

$tasks = $mysqli->query("SELECT * FROM tasks INNER JOIN categories ON tasks.c_id=categories.c_id INNER JOIN priority ON tasks.p_id=priority.p_id");

if (!$categories) {
    echo "erreur sql" . $mysqli->error;
    exit();
}

if (isset($_GET['cat'])) {
    $taskscat = $mysqli->query("SELECT * FROM tasks INNER JOIN categories ON tasks.c_id=categories.c_id INNER JOIN priority ON tasks.p_id=priority.p_id WHERE tasks.c_id='$cat'");
    while ($taskc = $taskscat->fetch_object()) { ?>
        <a href="index.php?id=<?= $taskc->t_id ?>"><?= $taskc->title ?> <?= $taskc->deadline ?> <?= $taskc->c_title ?> <?= $taskc->p_title ?></a><br>
    <?php }
}
else {
    while ($task = $tasks->fetch_object()) { ?>
        <a href="index.php?id=<?= $task->t_id ?>"><?= $task->title ?> <?= $task->deadline ?> <?= $task->c_title ?> <?= $task->p_title ?></a><br>
    <?php }
}


?>