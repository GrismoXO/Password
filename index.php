<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">

    <title>Document</title>
</head>
<body>
    <h1>Password locker</h1>
    <p>Générateur de mot de passe By GrismoXO</p>
    <form action="php/traitement.php" method="post">
        <select name="level" id="level">
            <option value="easy">Easy</option>
            <option value="normal">Normal</option>
            <option value="hard">Hard</option>
        </select>
        <button type="submit">Start</button>
    </form>
    <p>Mot de passe généré : 
    <?php 
    if (isset($_SESSION['password'])) {
        echo  $_SESSION['password'] ;
        unset($_SESSION['password']);
    }
    ?></p>
</body>
</html>