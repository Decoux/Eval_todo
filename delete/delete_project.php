<?php 
include '../connect_bdd.php';
session_start();
$select = $bdd->prepare('SELECT * FROM projects WHERE users_id = :users_id');
$select->execute(array(
    'users_id' => $_SESSION['id_user']
));
$data_0 = $select->fetchAll();

$delete = $bdd->prepare('DELETE FROM projects WHERE id = :id');
$delete->execute(array(
    'id' => $data_0[$_GET['index']]['id']
));
echo '<pre>';
print_r($data_0[$_GET['index']]);
echo '</pre>';

header("location:" . $_SERVER['HTTP_REFERER']);