<?php
/**
 * Created by PhpStorm.
 * User: Alien
 * Date: 03/06/2019
 * Time: 13:38
 */


$connect = new PDO("mysql:host=localhost:8889;dbname=EatLike", "root", "root");


if (isset($_POST)) {
    $output = '';

    $moment = $_POST["moment"];
    $nom_recette = $_POST["nom_recette"];
    $description = $_POST["description"];
    $jour = $_POST["jour"];




    $query =
        "INSERT INTO `menu` (`moment`,`nom_recette`,`description_recette`,`jour`) 
            VALUES ('$moment','$nom_recette','$description','$jour')";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();


    if ($output == '') {
        echo 'ok';
    } else {
        echo $output;
    }

}


