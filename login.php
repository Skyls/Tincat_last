<?php require "head.php"; ?>

<body>
    <div class="form-container">
        <h1>TINCAT</h1>
        <form action="functions/setUser.php" method="post">
            <input type="text" placeholder="pseudo" name="pseudo">
            <input type="password" placeholder="password" name="password">
            <input type="submit" value="login">
        </form>
    

        <a href="register.php">Pas encore de compte?</a>

        <div class="message">
            <?php 
                if(isset($_GET["message"])){
                    echo $_GET["message"];
                }
            ?>
        </div>
    </div>
</body>
</html>