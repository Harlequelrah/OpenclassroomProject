
<?php session_start(); ?>
<?php include_once('variables.php'); ?>

<?php
$delete=$mysqlClient->prepare('DELETE FROM recipes WHERE recipe_id=:recipe_id');
$delete->execute(['recipe_id'=>$_POST['recipe_id']]) or die(print_r($mysqlClient->errorInfo()));
?>
<?php include_once('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <p>
        Votre recette a été supprimée avec succès
     </p>

</body>
</html>
