<?php 
session_start();
//connexion data base
include '../connect_bdd.php';
//recuperer les id des listes
$select = $bdd->prepare('SELECT * FROM lists WHERE projects_id = :projects_id');
$select->execute(array(
    'projects_id' => $_SESSION['index_project']
));
$data = $select->fetchAll();
//recuperer les id des projets

$name_task = htmlspecialchars($_POST['name_task']);
//insert in task table
$req = $bdd->prepare('INSERT INTO tasks(name_task, deadline, lists_id, lists_projects_id) VALUES (:name_task, :deadline, :lists_id, :lists_projects_id)');
$req->execute(array(
    'name_task' => $name_task,
    'deadline' => $_POST['deadline'],
    'lists_id' => $data[$_SESSION['index_list']-1]['id'],
    'lists_projects_id' => $_SESSION['index_project']
));
 var_dump($name_task);
var_dump($_POST['deadline']);

var_dump($_SESSION['index_list']);
var_dump($_SESSION['index_project']);
//header('Location: ../index.php');


?>