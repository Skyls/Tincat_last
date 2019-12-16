<?php
require("database.php");


if( empty($pseudo) && empty($password)){
    $message = "Vous devez remplir les deux champs";
    header("Location: ../login.php?message=$message");
}
else if(empty($pseudo) && !empty($password)){
    $message = "Vous devez remplir un pseudo";
    header("Location: ../login.php?message=$message");
}
else if( !empty($pseudo) && empty($password)){
    $message = "Vous devez remplir un password";
    header("Location: ../login.php?message=$message");
}

if( !empty($pseudo) && !empty($password)){
    $req = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo AND password = :password");
    $req->bindParam(":pseudo,$pseudo")
    $req->bindParam(":password,$password")

    $result = $req->fetch(PDO::FETCH_ASSOC);

    if($result == false){
        $message = "User not exist";
        header("Location: ../login.php?message=$message");
    }else{
        header("Location: ../profils.php")
    }
    
}

?>