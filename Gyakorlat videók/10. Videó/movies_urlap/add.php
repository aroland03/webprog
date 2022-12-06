<?php
include('moviestorage.php');
//függvények
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

// főprogram
$data = [];
$errors = [];
if(count($_POST)>0)
{
    if(validate($_POST, $data, $errors))
    {
        //beolvasás
        // $title = $data['title'];
        // $year = $data['year'];
        // extract($data);
        //feldolgozás
        $movieStorage = new MovieStorage();
        $movieStorage->add($data);
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
    <h2>Új film hozzáadása</h2>
    <form action="add.php" method="post">
        Cím: <input type="text" name="title" value="<?= $_POST['title'] ?? '' ?>"> 
        <?php if(isset($errors['title'])): ?>
            <span style="color:red"><?= $errors['title'] ?></span>
        <?php endif; ?>
        <br>

        Év: <input type="number" name="year" value="<?= $_POST['year'] ?? '' ?>" >
        <?php if(isset($errors['year'])): ?>
            <span style="color:red"><?= $errors['year'] ?></span>
        <?php endif; ?>
        <br>
        <button type="submit">Hozzáadás</button>
</body>
</html>