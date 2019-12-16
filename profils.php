<?php
require("head.php");

    //Si sessions pseudo vide
    if(empty($_SESSION)){
        header("Location: login.php")
    }

?>

<a href="functions/disconnect.php">Disconnect</a>

<!-- Afficher les utilisateurs stocké dans la BDD sauf moi -->

<?php
    echo "Bonjour" . $_SESSION["pseudo"];
?>