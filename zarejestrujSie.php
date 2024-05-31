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

        $connection = mysqli_connect("localhost", "root", "1234root", "ksiegarnia");
        if(!isset($connection))
        {
            echo "Nie udało się nawiązać połączenia z bazą danych.";
            exit();
        }
        else
            echo "Połączono z bazą danych.";

        $name = $_POST['clientName'];
        $surname = $_POST['clientSurname'];
        $password = $_POST['clientPassword'];
        $userFullName = $name."".$surname;
        echo "<br>";

        $sql = "SELECT * FROM klient WHERE imie='$name' and nazwisko='$surname'";
        
        if(mysqli_num_rows(mysqli_query($connection, $sql)) > 0)
        {
            echo "Taki użytkownik już istnieje.";
        }
        else
        {
            $sql = "CREATE USER '$userFullName' IDENTIFIED BY '$password'";
            $query = mysqli_query($connection, $sql);
            $sql = "GRANT ALL ON *.* TO '$userFullName'";
            $query = mysqli_query($connection, $sql);
            
            if($query)
            {
                echo "Użytkownik został zarejestrowany pomyślnie.";
                $sql = "INSERT INTO klient VALUES (null, '$name', '$surname', '$password')";
                $query = mysqli_query($connection, $sql);
                echo mysqli_error($connection);
            }
            else
                echo mysqli_error($connection);
        }
    ?>

    <br><br>
    <div id="button" onclick="openURL('ksiegarniaIndex.php')">Strona główna</div>

    <footer>
        <hr>
        Norbert Cierpich 2024
    </footer>

</body>
</html>
