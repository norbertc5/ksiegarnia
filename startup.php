<?php

    if(!isset($_COOKIE["user"]))
        $user = "";
    else
        $user = $_COOKIE["user"];


    echo $user;

    if(!str_contains($user, "root") && $user != "")
    {
        header("Location: clientPanel.php");
    }
    else if(str_contains($user, "root"))
    {
        header("Location: adminPanel.html");
    }
    else
    {
        header("Location: ksiegarniaIndex.php");
    }
?>