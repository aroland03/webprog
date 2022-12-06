<?php
include ('moviestorage.php');
$movieStorage = new MovieStorage();

$id = $_GET['id'];
$movieStorage->delete($id);
header('Location: index.php');
?>