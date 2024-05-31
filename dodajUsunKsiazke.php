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

    $title = $_POST['bookTitle'];
    $price = $_POST['bookPrice'];
    $amount = $_POST['bookAmount'];
    if(isset($_POST["action"]))
    {
        $action = $_POST["action"];
    }

    echo "<br>";
    
    if($title != "" && $price != "" && $action != "" && $amount != "")
    {
        if($action == "create")
        {    
            $sql = "SELECT * FROM ksiazka WHERE tytul='$title'";
            
            if(mysqli_num_rows(mysqli_query($connection, $sql)) > 0)
            {
                echo "Taka książka już istnieje.";
            }
            else
            {
                $sql = "INSERT INTO ksiazka VALUES (null, '$title', '$price', '$amount')";
                $query = mysqli_query($connection, $sql);
        
                if($query)
                    echo "Dodano książkę pomyślnie.";
                else
                    echo mysqli_error($connection);
            }        
        }
        elseif($action == "delete")
        {
            $sql = "SELECT * FROM ksiazka WHERE tytul='$title'";
            
            if(mysqli_num_rows(mysqli_query($connection, $sql)) <= 0)
            {
                echo "Nie ma takiej książki.";
            }
            else
            {
                $sql = "DELETE FROM ksiazka where tytul='$title'";
                $query = mysqli_query($connection, $sql);
        
                if($query)
                    echo "Usunięto książkę pomyślnie.";
                else
                    echo mysqli_error($connection);
            }
        }
    }
    else
    {
        echo "Nie udało się dodać książki.";
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