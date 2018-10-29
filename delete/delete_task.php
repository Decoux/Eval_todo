<?php 
include '../connect_bdd.php';
session_start();
$select = $bdd->prepare('SELECT * FROM projects WHERE users_id = :users_id');
$select->execute(array(
    'users_id' => $_SESSION['id_user']
));
$data_0 = $select->fetchAll();

$select_1 = $bdd->prepare('SELECT * FROM lists WHERE projects_id = :projects_id');
$select_1->execute(array(
    'projects_id' => $data_0[$_SESSION['index_project'] - 1]['id']
));
$data_1 = $select_1->fetchAll();

$req = $bdd->prepare('SELECT * FROM tasks WHERE lists_id = :lists_id');
$req->execute(array(
    'lists_id' => $data_1[$_SESSION['index_list']-1]['id']
));
$data_task_index = $req->fetchAll();


$delete = $bdd->prepare('DELETE FROM tasks WHERE id = :id');
$delete->execute(array(
    'id' => $data_task_index[$_GET['index']-1]['id']
));
echo '<pre>';
print_r($data_task_index[$_GET['index']-1]);
echo '</pre>';

header("location:" . $_SERVER['HTTP_REFERER']);