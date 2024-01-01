<?php session_start();
if((!isset($_POST['age']))||(!isset($_POST['full_name']))||(!isset($_POST['email']))||(!isset($_POST['password'])))
{
    echo 'Veuillez remplir tous les champs';
    return ;
}
$age=$_POST['age'];
$full_name=$_POST['full_name'];
$email=$_POST['email'];
$password=$_POST['password'];

include_once('variables.php');

$request=('INSERT INTO users(full_name,email,password,age) VALUES(:full_name,:email,:password,:age)');
$insert=$mysqlClient->prepare($request);
$insert->execute([
    'full_name' => $full_name,
    'email'=>$email,
    'password'=>$password,
    'age' => $age,
]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Compte ajouté</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>
    <div class="container">

    <?php include_once('header.php'); ?>
        <h1>Votre compte a été ajouté avec succès!</h1>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>email </b> : <?php echo($email); ?></p>
            </div>
        </div>
