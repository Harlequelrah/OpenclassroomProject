<?php

try
{
	// On se connecte à MySQL
	$mysqlClient = new PDO('mysql:host=localhost;dbname=my_recipes;charset=utf8', 'root', 'root',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],);
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

$a=$mysqlClient->prepare('SELECT * FROM recipes');
$a->execute();
$recipes=$a->fetchAll();
$b=$mysqlClient->prepare('SELECT * FROM users');
$b->execute();
$users=$b->fetchAll();
// $c=$mysqlClient->prepare('SELECT recipe_id FROM recipes');
// $c->execute();
// $ids=$c->fetchAll();
$sqlquerry_1=('SELECT u.full_name , c.comment,r.title
FROM users u
INNER JOIN comments c
ON u.user_id = c.user_id
INNER JOIN recipes r
On c.recipe_id = r.recipe_id
WHERE r.is_enabled=TRUE
ORDER BY c.created_at ASC
LIMIT 20
');
// $z=$mysqlClient->prepare($sqlquerry_1);
// $z->execute();
// $comments_1=$z->fetchAll();
// $sqlquerry_2=('SELECT u.full_name , c.comment , r.title
// FROM users u
// LEFT JOIN comments c
//    ON u.user_id = c.user_id
// LEFT JOIN recipes r
//    ON c.recipe_id = r.recipe_id
// WHERE r.is_enabled=TRUE
// ORDER BY c.created_at ASC
// LIMIT 20
// ');
// $X=$mysqlClient->prepare($sqlquerry_2);
// $X->execute();
// $comments_2=$X->fetchAll();
// $sqlquerry_3='SELECT AVG(review) AS rating, recipe_id FROM comments GROUP BY recipe_id HAVING rating >= 3';


if(isset($_GET['limit']) && is_numeric($_GET['limit'])) {
    $limit = (int) $_GET['limit'];
} else {
    $limit = 100;
}

