<?php 

function dbconnect() {
try{
$pdo = new PDO('mysql:host=localhost;dbname=security_demo', 'root', ''); 
return $pdo;
} catch (PDOException $e) {
echo 'ça marche pas';
}
}

function login($email, $password) {
$dbh = dbconnect();

//on metprepare au lieu de query pour plus de securité. On prepare la requete.
$stmt = $dbh->prepare("SELECT * FROM users WHERE users.email=:toto");
//on utilise :toto par ex a la place de $email pour aller avec le prepape

// on definit a quelle variable va etre affectée le marqueur :toto qu'on a utilisé dans la preparation
$stmt->bindParam(':toto', $email);

 // la on execute notre requete prepare
$stmt->execute();

$user= $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($user);
if($user){
    
    // comparaison du pass saisi avec celui de la bdd
    //$password est la valeur entrée par l'user, $user[password] est la valeur hashée
    if(password_verify($password, $user['password'])) {
       // echo 'utilisateur connecté';
        session_start(); //sert a donner acces a $_SESSION du dessous
        $_SESSION['user'] = [
            'id' => $user['id_users'],
            'email' => $user['email']
        ];
        //ensuite on fait echo au session start en haut dans les autres pages
    }else{
        echo 'mauvais identifiant';
    }
} else {
    echo 'Adresse Email inconue';
}
}



// function signup();
// depuis une nouvelle page, formulaire pour inscrire un utilisateur (mail / mdp), en utilisant 
//une requete préparée


//on refait avec prepare en dessous. AUSSI on a remis une partie de la fonction login pour palier si l'adresse mail existe deja.
function addmember($email, $password){

$dbh = dbconnect();
$stmt = $dbh->prepare("SELECT * FROM users WHERE users.email=:toto");
$stmt->bindParam(':toto', $email);
$stmt->execute();

$user= $stmt->fetch(PDO::FETCH_ASSOC);
if($user){
    echo 'Adresse mail deja utilisée';
                } else {
                    $connect = dbConnect();
                    $stmt = $connect->prepare("INSERT INTO users VALUES (null, :mail, :pass)");
                    $stmt->bindParam(':mail', $email);
                    $stmt->bindParam(':pass', $password);
                    $stmt->execute();
                }
            }


// Function pour cleaner notre email
    function secure_email($email){
$sanitize = filter_var($email, FILTER_SANITIZE_EMAIL); //filtre pour clear tous les espaces et caracteres non reconus
$validate = filter_var($sanitize, FILTER_VALIDATE_EMAIL);//filtre pour tester si ça a l'apparence d'un email
if($sanitize){
return $validate;
}
            }