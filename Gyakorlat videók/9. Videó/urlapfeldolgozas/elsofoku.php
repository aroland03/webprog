<?php
declare(strict_types=1);
//függvények
function elsofoku(float $a, float $b) : float
{
    return -$b / $a;
}
function validate($get, &$data, &$hibak): bool
{
    if (!isset($get['a'])) {
        $hibak['a'] = 'Hiányzik az "a" paraméter!';
    }
    else if(trim($get['a']) === '') {
        $hibak['a'] = 'Hiányzik az "a" paraméter értéke!';
    }
    else if (filter_var($get['a'], FILTER_VALIDATE_FLOAT) === false) {
        $hibak['a'] = 'Az "a" paraméter nem szám!';
    }
    else {
        $a = (float)$get['a'];
        if($a === 0.0) {
            $hibak['a'] = "Az 'a' paraméter nem lehet 0!";
        } else {
            $data['a'] = $a;
        }
    }
    
    if (!isset($get['b'])) {
        $hibak['b'] = 'Hiányzik a "b" paraméter!';
    }
    else if(trim($get['b']) === '') {
        $hibak['b'] = 'Hiányzik a "b" paraméter értéke!';
    }
    else if (filter_var($get['b'], FILTER_VALIDATE_FLOAT) === false) {
        $hibak['b'] = 'A "b" paraméter nem szám!';
    }
    else {
        $b = (float)$get['b'];
        if($b === 0.0) {
            $hibak['b'] = "A 'b' paraméter nem lehet 0!";
        } else {
            $data['b'] = $b;
        }
    }
    return count($hibak) === 0;
}

// beolvasás + ellenőrzés
$hibak = [];
$data = [];
if(count($_GET) > 0)
{
    if(validate($_GET, $data, $hibak)) {
        // Beolvasás
        $a = $data['a'];
        $b = $data['b'];
    
        // Feldolgozás
        $x = elsofoku($a, $b);
    }
}
// kiírás
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elsőfokú egyenlet megoldása</title>
</head>
<body>
    <h1>Elsőfokú egynlet: ax + b = 0</h1>
    
    <?php if (count($hibak) > 0) : ?>
    <ul>
        <?php foreach ($hibak as $hiba) : ?>
        <li><?= $hiba ?></li>
        <?php endforeach ?>
    </ul>
    <?php endif ?>

    <form action="http://localhost:3000/elsofoku.php/" method="get">
        a = <input type="text" name="a" value="<?= $_GET['a'] ?? '1' ?>"> 
        <?php if (isset($hibak['a'])) : ?>
            <span><?= $hibak['a'] ?></span>
        <?php endif ?>
        <br>

        b = <input type="text" name="b" value="<?= $_GET['b'] ?? '1' ?>"> 
        <?php if (isset($hibak['b'])) : ?>
            <span><?= $hibak['b'] ?></span>
        <?php endif ?>
        <br>
        <button>Számol</button>
    </form>

    <?php if (isset($x)) : ?>
        <p>x = <?= $x?></p>
    <?php endif; ?>
</body>
</html>