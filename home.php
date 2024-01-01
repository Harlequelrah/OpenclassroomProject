<?php session_start(); // $_SESSION ?>


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
    <?php include_once('variables.php'); ?>
    <?php include_once('functions.php'); ?>
    <div class="container">
    <?php include_once('header.php'); ?>



    <!-- Formulaire de connexion -->

    <?php include_once('login.php'); ?>

    <!-- Fin du Formulaire de connexion -->












        <?php if(isset($_SESSION['LOGGED_USER'])): ?>
            <h1>Site de Recettes !</h1>
             <!-- Plus facile à lire -->
        <?php foreach(get_recipes($recipes, $limit) as $recipe) : ?>
            <article>
                <?php
                 $id=$recipe['recipe_id'];
                 ?>


                <?php ?>
                <h3><?php echo $id.'  '.$recipe['title']; ?></h3>
                <div><?php echo $recipe['recipe']; ?></div>
                <i><?php echo $recipe['author']; ?></i>

            </article>

            <?php if($recipe['author']==$_SESSION['LOGGED_USER']): ?>

            <a id="update" href="update_recipe.php" title="Seul l 'auteur de la recette peut la modifier" >
            <form action="update_recipe.php" method="POST" id="update_form">
                <input type='hidden' name="id" value="<?php echo $id ?>">
                <input type="submit" value="Modifier la recette">
            </form>
            </a>
            <a  href="delete_recipe.php" title="Seul l 'auteur de la recette peut la supprimer" >
            <form action="delete_recipe.php" method="POST" >
                <input type='hidden' name="recipe_id" value="<?php echo $id ?>">
                <input type="submit" value="Supprimer la recette">
            </form>
            </a>



            <?php endif; ?>
        <?php endforeach ?>
        <?php endif; ?>
    </div>
    <?//php include_once('logout.php'); ?>
    <?php include_once('footer.php'); ?>
    <!-- <script language="text/javascript" src=send_submit.js></script> -->
    <!-- <script>
        document.getElementById("update").addEventListener("click",function(){

        document.getElementById("update_form").submit();

      })
    </script> -->
</body>
</html>
