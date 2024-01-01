<?php session_start(); ?>
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
        <h1>Creation de compte</h1>
        <form action="submit_account_creation.php" method="POST">
        <div class="mb-3">
                <label for="full_name" class="form-label">NOM ET PRENOMS</label>
                <input type="text" class="form-control" id="full_name" name="full_name" >
        </div>
        <div class="mb-3">
          <label for="age">Âge </label>
          <input type="number" id="age" name="age" min="0" max="150" >
        </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help">
                <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">mot de passe</label>
                <input type=password class="form-control" placeholder="Entrer un mot de passse d au moins 8 caractere dont au moins une majuscule et avec des caracteres speciaux" id="password" name="password"/>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <br />
    </div>

    <?php include_once('footer.php'); ?>
</body>
</html>
