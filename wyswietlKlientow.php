<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="ksiegarniaStyle.css">
</head>
<body>
    
    <table>
        <tr id="borderTable">
            <td id="borderTable"><b>Imie</b></td>
            <td id="borderTable"><b>Nazwisko</b></td>
            <td id="borderTable"><b>Hasło</b></td>
        </tr>
        <?php 
            $connection = mysqli_connect("localhost", "root", "1234root", "ksiegarnia");
            $sql = "SELECT * FROM klient";
            $result = mysqli_query($connection, $sql);

            while($row = mysqli_fetch_row($result))
            {
                echo "<tr><td id='borderTable'>".$row[1]."</td><td id='borderTable'>".$row[2]."</td><td id='borderTable'>".$row[3]."</td></tr>";
            }
        ?>
        <tr><td colspan = 2> <a href="adminPanel.html"><div id="button">Wróć</div></a> </td></tr>
    </table>

    <footer>
        <hr>
        Norbert Cierpich 2024
    </footer>

</body>
</html>