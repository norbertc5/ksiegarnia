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
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];
        $userFullName = $name."".$surname;

        try
        {
            $connection = mysqli_connect("localhost", "$userFullName", "$password", "ksiegarnia");
        }
        catch(Exception $e)
        {
            echo "Nie udało się zalogować. Błędna nazwa użytkownika lub hasło lub użytkownik nie istnieje.<br>";
        }

        if(!isset($connection))
        {
            echo "Nie udało się nawiązać połączenia z bazą danych.";
            echo "<br><a href='ksiegarniaLogin.html'> <div id='button'>Wróć</div> </a>";
            exit();
        }
        else
        {
            echo "Połączono z bazą danych.<br>Zalogowano pomyślnie jako ".$name." ".$surname;
            setcookie("user", $name." ".$surname, time()+7200, "/", "localhost");
        }

        function GetNextSite($user)
        {
            if($user == "root")
                return "adminPanel.html";
            else
                return "clientPanel.php";
        }
    ?>

    <br><br>
    <div id="button" onclick="window.location.href='<?php echo GetNextSite($userFullName); ?>'">Ok</div>

    <footer>
        <hr>
        Norbert Cierpich 2024
    </footer>

</body>
</html>