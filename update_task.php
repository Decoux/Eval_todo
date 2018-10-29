<?php

include 'connect_bdd.php';
session_start();
$_SESSION['index_task'] = intval($_GET['index']);
// Selecte sql for add projects
$req_0 = $bdd->prepare('SELECT * FROM projects WHERE users_id = :users_id');
$req_0->execute(array(
    'users_id' => $_SESSION['id_user']
));
$data_0 = $req_0->fetchAll();

// Select sql for add lists
$select = $bdd->prepare('SELECT * FROM lists WHERE projects_id = :projects_id and users_id = :users_id');
$select->execute(array(
    'projects_id' => $data_0[$_SESSION['index_project'] - 1]['id'],
    'users_id' => $_SESSION['id_user']

));
$data_1 = $select->fetchAll();

//select for add tasks
$req = $bdd->prepare('SELECT * FROM tasks WHERE lists_id = :lists_id');
$req->execute(array(
    'lists_id' => $data_1[$_SESSION['index_list'] - 1]['id']
));
$data = $req->fetchAll();



//if value of post['done'] and $data_0[$_GET['index'] - 1]['done'] null -> update
if ($_POST['done']=='done' AND $data_0[$_GET['index'] - 1]['done']==NULL){

    $req_1 = $bdd->prepare('UPDATE tasks SET done = :done WHERE id = :id');
    $req_1->execute(array(
        'done' => $_POST['done'],
        'id' => $data[$_GET['index'] - 1]['id']
    ));
//else if -> update
}else if (is_null($_POST['done'])){

    $req_2 = $bdd->prepare('UPDATE tasks SET done = :done WHERE id = :id');
    $req_2->execute(array(
        'done' => NULL,
        'id' => $data[$_GET['index'] - 1]['id']
    ));

}



header("location:" . $_SERVER['HTTP_REFERER']);
?>
