<?php session_start();

include_once('variables.php');
$title=$_POST['title'];
$recipe=$_POST['recipe'];
$id=$_POST["recipe_id"];

$request = "UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :recipe_id";
$update = $mysqlClient->prepare($request);
$update->execute([
    'title' => $title,
    'recipe' => $recipe,
    'recipe_id' => intval($id),
]) or die(print_r($mysqlClient->Errorinfo()));



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes -Recette modification</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Recettes modifiée avec succès!</h1>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>email de l auteur</b> : <?php echo($_SESSION['LOGGED_USER']); ?></p>
                <p class="card-text"><b>titre</b> : <?php echo($title); ?></p>
                <p class="card-text"><b>recette</b> : <?php echo strip_tags($recipe); ?></p>
            </div>
        </div>
