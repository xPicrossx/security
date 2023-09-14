<?php
session_start();
require_once 'functions.php';


if(isset($_POST) && !empty($_POST)){ 
$email = secure_email($_POST['email']);
if ($email){ 
//on hash le mot de passe ici. On le verify dans les functions, dans la fonction login
$password = $_POST['password'];
$hashpassword = password_hash ($password, PASSWORD_ARGON2I); // on peut mettre aussi PASSWORD_DEFAULT (il se met a jour automatic)
addMember($email, $hashpassword);
}else {
    echo "cette adresse mail n'est pas valide";
}

}


?>

<main class="container text-center">
<form action="" method="post">


<label for="email">Email</label>
<input id="email" name="email" type="email" class="form-control">

<label for="password">Password</label>
<input id="password" name="password" type="text" class="form-control">

<input type="submit" value="Ajouter" class="btn bg-primary-subtle bg-warning-subtle  ">

</form>