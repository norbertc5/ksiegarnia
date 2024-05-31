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
    $action = "";
    $action = $_POST["action"];

    if($action == "create")
        $password = $_POST['clientPassword'];

    echo "<br>";
    
                if($action == "create")
                {    
                    $sql = "SELECT * FROM klient WHERE imie='$name' and nazwisko='$surname'";
                    
                    if(mysqli_num_rows(mysqli_query($connection, $sql)) > 0)
                    {
                        echo "Taki klient już istnieje.";
                    }
                    else
                    {
                        $userFullName = $name.$surname;
                        $sql = "CREATE USER '$userFullName' IDENTIFIED BY '$password'";
                        $query = mysqli_query($connection, $sql);
                        $sql = "GRANT ALL on *.* to '$userFullName'";
                        $query = mysqli_query($connection, $sql);
                        
                        $sql = "INSERT INTO klient VALUES (null, '$name', '$surname', '$password')";
                        $query = mysqli_query($connection, $sql);
                        
                        if($query)
                        echo "Dodano klienta pomyślnie.";
                    else
                    echo mysqli_error($connection);
            }
            
        }
        elseif($action == "delete")
        {
            $sql = "SELECT * FROM klient WHERE imie='$name' and nazwisko='$surname'";
            
            if(mysqli_num_rows(mysqli_query($connection, $sql)) <= 0)
            {
                echo "Nie ma takiego klienta.";
            }
            else
            {
                $userFullName = $name.$surname;
                $sql = "DROP USER '$userFullName'";
                $query = mysqli_query($connection, $sql);
                
                $sql = "DELETE FROM klient where imie='$name' and nazwisko='$surname'";
                $query = mysqli_query($connection, $sql);
                
                if($query)
                echo "Usunięto klienta pomyślnie.";
            else
            echo mysqli_error($connection);
        }
        }
?>

<br><br>
<div id="button" onclick="openURL('adminPanel.html')">Admin panel</div>


<footer>
        <hr>
        Norbert Cierpich 2024
</footer>

</body>
</html>