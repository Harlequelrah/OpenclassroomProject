<?php
session_start();
include_once('variables.php');
?>

<?php
$titre = $mysqlClient->prepare("SELECT title FROM recipes WHERE author =:author AND recipe_id=:recipe_id");
$titre->execute(['author'=>$_SESSION['LOGGED_USER'],'recipe_id'=>intval($_POST['id']),]);
$titre_valeur=$titre->fetchAll();
$t = $mysqlClient->prepare("SELECT recipe FROM recipes WHERE author =:author AND recipe_id=:recipe_id");
$t->execute(['author'=>$_SESSION['LOGGED_USER'],'recipe_id'=>intval($_POST['id']),]);
$t_valeur=$t->fetchAll();
 ?>
<?php include_once('variables.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Modifier une recette</h1>
        <form action="submit_update_recipe.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $titre_valeur[0]['title']  ?>" />
                <div class="form-text">Entrer le nouveau titre de votre recette</div>
            </div>
            <div class="mb-3">
                <label for="recipe" class="form-label">Votre nouvelle recette</label>
                <input type="text" class="form-control"  id="recipe" name="recipe" value=" <?php echo $t_valeur[0]['recipe']  ?>"/>
            </div>
            <div class="mb-3">
                <input  type="hidden" class="form-control"  id="recipe_id" name="recipe_id" value="<?php echo $_POST['id']?>"/>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>

