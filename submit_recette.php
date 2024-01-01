<?php session_start();
if(
!isset($_POST['title'])
||
!isset($_POST['recipe']))
{
    echo 'Il faut un titre et une recette pour soumettre le formulaire';
    return ;
}
$title=$_POST['title'];
$recipe=$_POST['recipe'];
include_once('variables.php');

$request=('INSERT INTO recipes(title,recipe,author,is_enabled) VALUES(:title,:recipe,:author,:is_enabled)');
$insertion=$mysqlClient->prepare($request);
$insertion->execute([
    'title' => $title,
    'recipe' => $recipe,
    'author'=>$_SESSION['LOGGED_USER'],
    'is_enabled'=>1,
]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Contact reçu</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Recettes ajoutée avec succès!</h1>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>email de l auteur</b> : <?php echo($_SESSION['LOGGED_USER']); ?></p>
                <p class="card-text"><b>titre</b> : <?php echo($title); ?></p>
                <p class="card-text"><b>recette</b> : <?php echo strip_tags($recipe); ?></p>
            </div>
        </div>
