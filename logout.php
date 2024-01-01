<?php session_start(); ?>

<?php
// retenir l'email de la personne connectée pendant 1 an
if(isset($_SESSION['LOGGED_USER']))
setcookie(
    'LOGGED_USER',
    $_SESSION['LOGGED_USER'],
    [
        'expires' => time() + 365*24*3600,
        'secure' => true,
        'httponly' => true,
    ]
);
//'secure' => true: Cette option indique que le cookie ne doit être envoyé que via une connexion sécurisée (HTTPS). Cela renforce la sécurité en s'assurant que le cookie est transmis de manière cryptée.

//'httponly' => true: Cette option indique que le cookie ne peut être accédé que via le protocole HTTP, et non pas via des scripts côté client (comme JavaScript). Cela aide à protéger le cookie contre certaines attaques potentielles.
?>
<?php session_destroy() ; ?>
<?php echo 'Deconnexion effectuée avec succès'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="home.php"><button type="button">Ouvrir une nouvelle session</button></a>
    <div>
    <?php if(isset($_COOKIE['LOGGED_USER'])) : ?>
        <em><?php //echo $_COOKIE['LOGGED_USER'] ; ?></em>
        <?php endif ; ?>
    </div>

</body>
</html>
