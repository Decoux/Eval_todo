<?php 
session_start();
include 'connect_bdd.php';
$req = $bdd-> prepare('SELECT * FROM projects WHERE users_id = :users_id');
$req->execute(array(
  'users_id' => $_SESSION['id_user']
  ));
$data = $req->fetchAll();
?>