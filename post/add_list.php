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
$req = $bdd->prepare('INSERT INTO lists(name_list, deadline, projects_id, users_id) VALUES (:name_list, :deadline, :projects_id, :users_id)');
$req->execute(array(
  'name_list' => $name_list,
  'deadline' => $_POST['deadline'],
  'projects_id' => $data_0[$_SESSION['index_project'] - 1]['id'],
  'users_id' => $_SESSION['id_user']
  ));
header('Location: ../index.php');
var_dump($name_list);
var_dump($_POST['deadline']);
print_r($_SESSION['index_project'] - 1);
var_dump($_SESSION['id_user']);

?>