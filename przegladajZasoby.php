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
    
    <h2>Przeglądaj zasoby</h2>

    <form action="przegladajZasoby.php" method="post" enctype="multipart/form-data" id="form">

        <table style="margin-bottom: auto">
        <tr>
            <td>Podaj tytuł: </td>
            <td><input type="text" name="bookTitle"></td>
            <td><div id="button" style="padding: 10px; position: static" onclick="send()">Szukaj</div></td>
        </tr>

        </table>
        
    </form>

    <div style="position: relative;  margin: auto">
        <?php

            $connection = mysqli_connect("localhost", "root", "1234root", "ksiegarnia");
            if(isset($_POST["bookTitle"]))
            {
                $bookTitle = $_POST["bookTitle"];
                $like = '%'.$bookTitle.'%';
                $sql = "SELECT tytul from ksiazka where tytul LIKE '$like'";
                $result = mysqli_query($connection, $sql);

                if(mysqli_num_rows($result) > 0 && $bookTitle != "")
                {
                    echo "<b>Znaleziono:</b><br>";
                    while($row = mysqli_fetch_array($result))
                    {
                        echo $row["tytul"]."<br>";
                    }
                }
                else
                {
                    echo "Nie znaleziono szukanej książki.";
                }

                
            }
            echo "<br><br><b>Dostępne ksążki:</b><br>";
            
            $sql = "SELECT tytul from ksiazka";
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_array($result))
            {
                echo $row["tytul"]."<br>";
            }

        ?>
    </div>

    <br>
    <div id="button" onclick="openURL('startup.php')" style="position:relative; top: 100px">Wróć</div>

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