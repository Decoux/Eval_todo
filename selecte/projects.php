<?php 
session_start();
include 'connect_bdd.php';

$req_project = $bdd-> prepare('SELECT * FROM projects WHERE users_id = :users_id');
$req_project->execute(array(
 'users_id' => $_SESSION['id_user']
 ));
$data_project = $req_project->fetchAll();



?>