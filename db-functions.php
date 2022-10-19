<?php

    function connexion(){
        try{
            return new PDO(
                "mysql:host=127.0.0.1:3306;dbname=argos",
                "root",
                "",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                ]
            );
        }
        catch(PDOException $error) {
            echo "<mark>",$error,"</mark>";
        }
        return $dbh;
    }

    function findAll() {
        $dbh = connexion();
        $stmt = $dbh->query ("SELECT * 
                            FROM crew
                            ");  
        return $stmt->fetchAll();
    }

    function insertCrew($name) {
        $dbh = connexion();
        $stmt = $dbh->prepare ("INSERT INTO crew (name)
                                VALUES (:name);
                            ");
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    Function countCrew(){
        $dbh = connexion();
        $stmt = $dbh->prepare ("SELECT COUNT(id) AS nbCrew
                                FROM crew
                            ");
        $stmt->execute();
        return $stmt->fetch();
    }