<?php

include 'connect_bdd.php';

session_start();
$_SESSION['index_task'] = intval($_GET['index']);
$select = $bdd->prepare('SELECT * FROM lists WHERE projects_id = :projects_id');
$select->execute(array(
    'projects_id' => $_SESSION['index_project']
));
$data_0 = $select->fetchAll();


$req = $bdd->prepare('SELECT * FROM tasks WHERE lists_id = :lists_id');
$req->execute(array(
    'lists_id' => $data_0[$_SESSION['index_list'] - 1]['id']
));
$data = $req->fetchAll();
echo '<pre>';
print_r($data);
echo '</pre>';
var_dump(intval($_GET['index'] + 1));



if ($_POST['done']=='done' AND $data_0[$_GET['index'] - 1]['done']==NULL){

    $req_1 = $bdd->prepare('UPDATE tasks SET done = :done WHERE id = :id');
    $req_1->execute(array(
        'done' => $_POST['done'],
        'id' => $data[$_GET['index'] - 1]['id']
    ));
    var_dump(intval($data[$_GET['index'] - 1]['id']));
    var_dump($_POST['done']);
}else if (is_null($_POST['done'])){

    $req_2 = $bdd->prepare('UPDATE tasks SET done = :done WHERE id = :id');
    $req_2->execute(array(
        'done' => NULL,
        'id' => $data[$_GET['index'] - 1]['id']
    ));
    var_dump($_POST['done']);

}
header("location:" . $_SERVER['HTTP_REFERER']); 
?>