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

$delete = $bdd->prepare('DELETE FROM lists WHERE id = :id');
$delete->execute(array(
   'id' => $data_1[$_GET['index']]['id']
));
echo '<pre>';
print_r($data_1);
echo '</pre>';

header("location:" . $_SERVER['HTTP_REFERER']);