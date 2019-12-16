<?php
// Etape 1 : config database
$DB_HOST = "localhost";
$DB_NAME = "v1_tincat";
$DB_USER = "root";
$DB_PASSWORD = "root";
// Etape 2 : Connexion to database
try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
var_dump($_POST);

//Post
$email = $_POST["emailUser"];
$pseudo = $_POST["pseudo"];
$password = $_POST["password"];
$cf_password = $_POST["cf_password"];
$nextpage = false;

echo " | email: " . $email . " | pseudo: " . $pseudo . " | mot de passe: " . $password ;

// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide
    if ( empty( $email ) || empty( $pseudo ) || empty( $password ) ) {
        $nextpage = true;
    }
    // Ajouter un input confirm password et vérifier si les deux sont égaux
    if ( "$password" !== "$cf_password" ) {
        $nextpage = true;
    }
    //redirection en cas de champs vide ou incorrect
    if ( "$nextpage" ) {
        header("Location: ../register.php");
    }
    

// Ajouter un champ email: fait

// Etape 3 : prepare request
$req = $db->prepare("INSERT INTO users (emailUser, pseudo, password) VALUES(:emailUser, :pseudo, :password)");
$req->bindParam(":emailUser", $email);
$req->bindParam(":pseudo", $_POST["pseudo"]);
$req->bindParam(":password", $_POST["password"]);
$req->execute();