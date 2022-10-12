<?php

    require "db-functions.php";

    $nbCrew = countCrew();

    if(isset($_POST['submit'])){
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
        if ($nbCrew['nbCrew'] < 50) {
            if ($name) {
            $crew = insertCrew($name);
            }
        }
        
        header("Location: index.php");
        die();
    }
?>