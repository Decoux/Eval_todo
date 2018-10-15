<?php 
session_start();
  include '../connect_bdd.php';
  $name_project = htmlspecialchars($_POST['name_project']);
  $description_project = htmlspecialchars($_POST['description_project']);

$req_1 = $bdd->prepare('INSERT INTO projects(name_project, description_project, deadline, categorie, users_id) VALUES (:name_project, :description_project, :deadline, :categorie, :users_id)');
$req_1->execute(array(
  'name_project' => $name_project,
  'description_project' => $description_project,
  'deadline' => $_POST['deadline'],
  'categorie' => $_POST['categorie'],
  'users_id' => $_SESSION['id']
));

header('Location:../index.php');
?>