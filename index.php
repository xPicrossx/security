<?php 
require_once "functions.php";

if(isset($_POST) && !empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];

login($email, $password);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>security</title>
</head>
<body>

<main class="container text-center">
<h1 class="text-center">Connexion utilisateur</h1>

<form action="" method="post">
<div>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control">
</div>
<div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control">
</div>
<input type="submit">
</form>

<a href="signup.php">Pas de compte? Inscrivez vous</a>

</main>


</body>
