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
    <h2>Złóż zamówienie.</h2>

    <form method="post" enctype="multipart/form-data" action="podsumowanieZamowienia.php" id="form">
        <table>
            <tr>
                <td>Książka</td>
                <td><select name="bookToBuy">
                    <?php

                        $connection = mysqli_connect("localhost", "root", "1234root", "ksiegarnia");
                        $sql = "SELECT tytul from ksiazka";
                        $result = mysqli_query($connection, $sql);

                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<option value=".str_replace(' ', '/-/', $row["tytul"]).">".$row["tytul"]."</option>";
                        }
                        ?>
                </select></td>
            </tr>
            <tr>
                <td>Ilość</td>
                <td><input type="number" value=1 name="amount"></td>
            </tr>
                
                <tr>
                    <td colspan=2><div id="button" onclick="send()">Złóż zamówienie</div>
                </tr>
                <tr>
                    <td colspan=2><div id="button" onclick="openURL('clientPanel.php')">Wróć</div>
                </tr>
            </table>
        </form>

        <script>
            function send()
            {
                document.getElementById("form").submit()
            }
        </script>

        <footer>
        <hr>
        Norbert Cierpich 2024
    </footer>
</body>
</html>