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
        <p><?= $taskc->title ?> <?= $taskc->deadline ?> <?= $taskc->c_title ?> <?= $taskc->p_title ?></p><a href="index.php?id=<?= $taskc->t_id ?>">EDITER</a> <br> <a href="index.php?ids=<?= $taskc->t_id ?>">SUPPR</a><br>
    <?php }
}
else {
    while ($task = $tasks->fetch_object()) { ?>
        <p><?= $task->title ?> <?= $task->deadline ?> <?= $task->c_title ?> <?= $task->p_title ?></p><a href="index.php?id=<?= $task->t_id ?>">EDITER</a> <br> <a href="index.php?ids=<?= $task->t_id ?>">SUPPR</a><br>
    <?php }
}


?>