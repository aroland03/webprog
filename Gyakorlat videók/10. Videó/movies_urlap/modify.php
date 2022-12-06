<?php
include('moviestorage.php');

function validate($post, &$data, &$errors)
{
    if(!isset($post['title']))
    {
        $errors['title'] = 'Cím megadása kötelező!';
    }
    else if(trim($post['title']) === '') {
        $errors['title'] = 'Cím nem lehet üres!';
    }
    else {
        $data['title'] = $post['title'];
    }

    if(!isset($post['year']) || trim($post['year']) === '')
    {
        $data['year'] = null;
    }
    else if(filter_var($post['year'], FILTER_VALIDATE_INT) === false) {
        $errors['year'] = 'Az év rossz számformátumú!';
    }
    else {
        $year = (int)$post['year'];
        if($year < 1900 || $year > 2100) {
            $errors['year'] = 'Az év 1900 és 2100 közötti érték lehet!';
        }
        else {
            $data['year'] = $year;
        }
    }
    return count($errors) === 0;
}
$data = [];
$errors = [];
// beolvasás
if(!isset($_GET['id']))
{
    header('Location: add.php');
    exit();
}
$id = $_GET['id'];
$movieStorage = new MovieStorage();
$movie = $movieStorage->findById($id);
if(!$movie)
{
    $errors['global'] = "Nem létező ID!";
}

// űrlapfeldolgozás

if(count($_POST)>0)
{
    if(validate($_POST, $data, $errors))
    {
        $data['id'] = $id;
        $movieStorage->update($id, $data);
        header('Location: index.php');
        exit();
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
    <title>Új film hozzáadása</title>
</head>
<body>
    <h1>Mozifilmek</h1>
    <?php if(isset($errors['global'])): ?>
        <p style="color: red;"><?= $errors['global'] ?></p>
    <?php endif; ?>
    <h2>Film módosítása</h2>
    <form action="" method="post">
        Cím: <input type="text" name="title" value="<?= $_POST['title'] ?? $movie['title'] ?? '' ?>"> 
        <?php if(isset($errors['title'])): ?>
            <span style="color:red"><?= $errors['title'] ?></span>
        <?php endif; ?>
        <br>

        Év: <input type="number" name="year" value="<?= $_POST['year'] ?? $movie['year'] ?? '' ?>" >
        <?php if(isset($errors['year'])): ?>
            <span style="color:red"><?= $errors['year'] ?></span>
        <?php endif; ?>
        <br>
        <button type="submit">Módosítás</button>
</body>
</html>