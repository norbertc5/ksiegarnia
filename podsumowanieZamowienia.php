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
    <h2>Podsumowanie zamówienia.</h2>
    <?php

        $connection = mysqli_connect("localhost", "root", "1234root", "ksiegarnia");
        if(isset($_POST["bookToBuy"]))
        {                            
            $bookToBuy = str_replace("/-/", " ",$_POST["bookToBuy"]);
            $sql = "SELECT ilosc FROM ksiazka WHERE tytul='$bookToBuy'";
            $result = mysqli_query($connection, $sql);
            $bookAmount = mysqli_fetch_row($result)[0];
            $amountToBuy = $_POST["amount"];
            
            if(($bookAmount - $amountToBuy) >= 0)
            {
                $newAmount = $bookAmount - $_POST["amount"];
                $sql = "UPDATE ksiazka set ilosc = '$newAmount' WHERE tytul='$bookToBuy'";
                $result = mysqli_query($connection, $sql);
                $sql = "SELECT cena FROM ksiazka WHERE tytul='$bookToBuy'";
                $result = mysqli_query($connection, $sql);
                $price = mysqli_fetch_row($result)[0];
                echo "<br>Zamówiono: ".$bookToBuy."<br>Ilość: ".$amountToBuy."<br>Cena: ".$price*$amountToBuy;

                $currUser = explode(" ", $_COOKIE["user"]);

                $sql = "SELECT id FROM klient WHERE imie='$currUser[0]' and nazwisko='$currUser[1]'";
                $result = mysqli_query($connection, $sql);
                $idKlienta = mysqli_fetch_row($result)[0];

                $sql = "SELECT id FROM ksiazka WHERE tytul='$bookToBuy'";
                $result = mysqli_query($connection, $sql);
                $idKsiazki = mysqli_fetch_row($result)[0];

                $sql = "INSERT INTO zamowienie VALUES(null, '$idKlienta', '$idKsiazki', '$amountToBuy')";
                $result = mysqli_query($connection, $sql);
            }
            else
            {
                echo "<br>Nie mamy tyle książek.";
            }
        }

    ?>

    <div id="button" onclick="openURL('clientPanel.php')">Wróć</div>

    <footer>
        <hr>
        Norbert Cierpich 2024
    </footer>
</body>
</html>