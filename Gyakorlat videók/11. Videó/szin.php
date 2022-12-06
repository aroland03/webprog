<?php
session_start();
print_r($_GET);
print_r($_SESSION);
//beolvasás
$bgcolor= '#888888';

if(isset($_SESSION['bgcolor'])){
    $bgcolor=$_SESSION['bgcolor'];
}

if (isset($_GET['bgcolor'])) {
    $re = '/^#[0-9a-f]{6}$/i';
    $str = $_GET['bgcolor'];
    if(preg_match($re, $str) === 1 ) {
        $bgcolor = $str;
    }
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
    <a href="szin.php?bgcolor=%23ff0000">Piros</a>
    <a href="szin.php?bgcolor=%2300ff00">Zöld</a>
    <a href="szin.php?bgcolor=%230000ff">Kék</a>
    <form action="" method="get">
        <input type="color" name="bgcolor" id="bgcolor" value="<?= $bgcolor ?>">
        <button>Háttérszín</button>
    </form>
    <a href="masik.php">Másik oldal</a>
</body>
</html>