<?php 
include 'connect_bdd.php';
session_start();
$select = $bdd->prepare('SELECT * FROM lists WHERE projects_id = :projects_id');
$select->execute(array(
    'projects_id' => $_SESSION['index_project']
));
$data_0 = $select->fetchAll();

$req = $bdd->prepare('SELECT * FROM tasks WHERE lists_id = :lists_id');
$req->execute(array(
    'lists_id' => $data_0[$_GET['index'] - 1]['id']
));
$data = $req->fetchAll();

?>