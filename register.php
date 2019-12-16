<?php require "head.php"; ?>

<body>
    <div class="form-container">
        <h1>TINCAT</h1>
        <form action="functions/setUser.php" method="post">
            <input type="text" placeholder="pseudo" name="pseudo">
            <input type="email" name="emailUser" placeholder="email">
            <input type="password" placeholder="password" name="password">
            <input type="password" name="cf_password" placeholder="confirm password">
            <input type="submit" value="register">
        </form>
    </div>



</body>
</html>
