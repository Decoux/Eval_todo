<?php 
include 'connect_bdd.php';
session_start();
$select = $bdd->prepare('SELECT * FROM projects WHERE users_id = :users_id');
$select->execute(array(
    'users_id' => $_SESSION['id']
));
$data_0 = $select->fetchAll();

$req = $bdd->prepare('SELECT * FROM lists WHERE users_id = :users_id AND projects_id = :projects_id');
$req->execute(array(
    'users_id' => $_SESSION['id'],
    'projects_id' => $data_0[$_GET['index']-1]['id']
));
$data = $req->fetchAll();

?>