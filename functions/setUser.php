<?php
require("database.php");

//Post
$pseudo = $_POST["pseudo"];
$password = $_POST["password"];
$cf_password = $_POST["cf_password"];
$nextpage = false;

echo " | pseudo: " . $pseudo . " | mot de passe: " . $password ;

// Avant d'insérer en base de données faire les vérifications suivantes
    // Vérifier si le pseudo ou le mot de passe est vide
    $message = "";

    if( empty($pseudo) && empty($password)){
        $message = "Vous devez remplir les deux champs";
        header("Location: ../register.php?message=$message");
    }
    else if(empty($pseudo) && !empty($password)){
        $message = "Vous devez remplir un pseudo";
        header("Location: ../register.php?message=$message");
    }
    else if( !empty($pseudo) && empty($password)){
        $message = "Vous devez remplir un password";
        header("Location: ../register.php?message=$message");
    }

    var_dump($message);
    

// Ajouter un champ email: fait

// Etape 3 : prepare request
if( !empty($password) && !empty($cf_password) && !empty($pseudo)){
    if($password === $cf_password){
        $req = $db->prepare("INSERT INTO users ( pseudo, password) VALUES( :pseudo, :password)");
        $req->bindParam(":pseudo", $_POST["pseudo"]);
        $req->bindParam(":password", $_POST["password"]);
        $req->execute();
        
        $message = "Votre compte à bien été créé";
        header("Location: ../login.php?message=$message");
    }else{
        $message = "Les deux mdp ne sont pas identiques";
        header("Location: ../register.php?message=$message");
    }
}


// Ajouter un input confirm password et vérifier si les deux sont égaux
/*

*/