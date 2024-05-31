<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ksiegarniaStyle.css">
    <script src="ksiegarniaJs.js"></script>
</head>
<body>

    <?php
        setcookie("user", "", time()-100, "/", "localhost");
    ?>

    <h2>Witamy w księgarni internetowej.</h2>
    <div id="button" onclick="openURL('ksiegarniaLogin.html')">Zaloguj się</div>
    <div id="button" onclick="openURL('ksiegarniaRegistry.html')">Zarejestruj się</div>
    <div id="button" onclick="openURL('przegladajZasoby.php')">Przeglądaj zasoby</div>
    
    <footer>
        <hr>
        Norbert Cierpich 2024
    </footer>

</body>
</html>