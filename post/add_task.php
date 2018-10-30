<?php 
session_start();
//connexion data base
include '../connect_bdd.php';
//recuperer les id des listes
$select = $bdd->prepare('SELECT * FROM projects WHERE users_id = :users_id');
$select->execute(array(
    'users_id' => $_SESSION['id_user']
));
$data_0 = $select->fetchAll();

$select_1 = $bdd->prepare('SELECT * FROM lists WHERE projects_id = :projects_id');
$select_1->execute(array(
    'projects_id' => $data_0[$_SESSION['index_project'] - 1]['id']
));
$data = $select_1->fetchAll();
//recuperer les id des projets

$name_task = htmlspecialchars($_POST['name_task']);
//insert in task table
$req = $bdd->prepare('INSERT INTO tasks(name_task, deadline, lists_id, lists_projects_id) VALUES (:name_task, :deadline, :lists_id, :lists_projects_id)');
$req->execute(array(
    'name_task' => $name_task,
    'deadline' => $_POST['deadline'],
    'lists_id' => $data[$_SESSION['index_list']-1]['id'],
    'lists_projects_id' => $data[$_SESSION['index_list'] - 1]['projects_id']
));
 var_dump($name_task);
var_dump($_POST['deadline']);

var_dump($data[$_SESSION['index_list'] - 1]);
var_dump($_SESSION['index_project']);
header('Location: ../index.php');


?>