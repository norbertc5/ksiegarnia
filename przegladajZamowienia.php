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
    
    <h2>Złożone zamówienia</h2>

    <table>
        <tr id="borderTable">
            <td id="borderTable"><b>Użytkownik</b></td>
            <td id="borderTable"><b>Książka</b></td>
            <td id="borderTable"><b>Ilość</b></td>
        </tr>
        <?php 
            $connection = mysqli_connect("localhost", "root", "1234root", "ksiegarnia");
            $sql = "SELECT * FROM zamowienie";
            $result = mysqli_query($connection, $sql);

            while($row = mysqli_fetch_row($result))
            {
                $sql = "SELECT imie, nazwisko FROM klient where id = '$row[1]'";
                $result2 = mysqli_query($connection, $sql);
                $row2 = mysqli_fetch_row($result2);

                $sql = "SELECT tytul FROM ksiazka where id = '$row[2]'";
                $result2 = mysqli_query($connection, $sql);
                $row3 = mysqli_fetch_row($result2);

                echo "<tr><td id='borderTable'>".$row2[0]." ".$row2[1]."</td><td id='borderTable'>".$row3[0]."</td><td id='borderTable'>".$row[3]."</td></tr>";
            }
        ?>
        <tr><td colspan = 2> <div id="button" onclick="openURL('adminPanel.html')">Wróć</div> </td></tr>
    </table>

    <footer>
        <hr>
        Norbert Cierpich 2024
    </footer>

</body>
</html>