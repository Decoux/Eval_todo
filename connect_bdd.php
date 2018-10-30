<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', '', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
?>