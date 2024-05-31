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
    <br><br>
    <h2 style="margin-bottom: 10px">Client panel</h2>
    <?php
        echo "<br><p>".$_COOKIE["user"]."</p>";
    ?>
    <div id="button" onclick="openURL('zlozZamowienie.php')">Złóż zamówienie</div>
    <div id="button" onclick="openURL('przegladajZasoby.php')">Przeglądaj zasoby</div>
    <div id="button" onclick="openURL('ksiegarniaIndex.php')">Wyloguj się</div>

    <footer>
        <hr>
        Norbert Cierpich 2024
    </footer>

</body>
</html>