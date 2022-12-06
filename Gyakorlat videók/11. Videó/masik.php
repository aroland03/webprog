<?php
session_start();

//beolvasás
$bgcolor= '#888888';

if(isset($_SESSION['bgcolor'])){
    $bgcolor=$_SESSION['bgcolor'];
}

//kiírás
$_SESSION['bgcolor']=$bgcolor;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background color</title>
    <style>
        body {
            background-color: <?= $bgcolor ?>;
        }
</style>
</head>
<body>
    <a href="szin.php">Háttérszín beállítása</a>
</body>
</html>