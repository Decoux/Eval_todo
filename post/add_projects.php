<?php 
  include '../connect_bdd.php';
  $name_project = htmlspecialchars($_POST['name_project']);
  $description_project = htmlspecialchars($_POST['description_project']);

$req_1 = $bdd->prepare('INSERT INTO projects(name_project, description_project, deadline, categorie) VALUES (:name_project, :description_project, :deadline, :categorie)');
$req_1->execute(array(
  'name_project' => $name_project,
  'description_project' => $description_project,
  'deadline' => $_POST['deadline'],
  'categorie' => $_POST['categorie']
));

var_dump($name_project);
var_dump($description_project);
var_dump($_POST['deadline']);
var_dump($_POST['categorie']);
?>