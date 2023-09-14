<?php 
session_start();
require_once "functions.php";

var_dump($_SESSION);


if(isset($_POST) && !empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    login($email, $password);
    if($_SESSION['user']) { //la on dit si le login a fonctionné
header('location:index.php?message=Vous êtes connecté&status=success'); //permet la redirection apres s'etre connecté a la session
} else {
    header('location:index.php?message=Vous n\'êtes pas connecté&status=danger');
}
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
  <?php  if(isset($_GET['message']) && !empty($_GET['message'])) {
    ?>

<div class="alert alert-success alert-<?php echo $_GET['status'] ?> dismissible fade show" role="alert">
<strong><?php echo $_GET['message'] ?> </strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php }?>

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

<?php if (isset($_SESSION['user'])) { ?>
    <a href="logout.php">Deconnexion</a>;
<?php }?>

<a href="signup.php">Pas de compte? Inscrivez vous</a>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
