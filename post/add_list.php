<?php 
session_start();
//connexion data base
include '../connect_bdd.php';
//select all projects for user_id
$select = $bdd->prepare('SELECT * FROM projects WHERE users_id = :users_id');
$select->execute(array(
  'users_id' => $_SESSION['id_user']
));
$data_0 = $select->fetchAll();

//security html
$name_list = htmlspecialchars($_POST['name_list']);
//insert in lists table
$req = $bdd->prepare('INSERT INTO lists(name_list, deadline, projects_id) VALUES (:name_list, :deadline, :projects_id)');
$req->execute(array(
  'name_list' => $name_list,
  'deadline' => $_POST['deadline'],
  'projects_id' => $data_0[$_SESSION['index']-1]['id']
  ));
  header('Location: ../index.php');
?>