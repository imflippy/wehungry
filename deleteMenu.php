<?php
/**
 * Created by PhpStorm.
 * User: Flippy~
 * Date: 19/03/2019
 * Time: 22:14
 */

    session_start();
    include "konekcija.php";
    require 'views/zabrana.php';

    if(isset($_GET['id'])){



        $id = $_GET['id'];



        $upiti = "SELECT * FROM meni WHERE id = :id";
        $rezultat = $konekcija->prepare($upiti);
        $rezultat->bindParam(':id', $id);

        $rezultat->execute();

        $slika = $rezultat->fetch();


        $path = $slika->slika;




        if(file_exists($path)){

            unlink($path);
        }

        $upiti = "DELETE FROM meni WHERE id = :id";
        $rezultat = $konekcija->prepare($upiti);
        $rezultat->bindParam(':id', $id);

        $rezultat->execute();

        header("Location: menu.php");
    }