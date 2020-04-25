<?php
/**
 * Created by PhpStorm.
 * User: Flippy~
 * Date: 18/03/2019
 * Time: 17:45
 */
    session_start();
    include "konekcija.php";
    require 'views/zabrana.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $upit_delete = "DELETE FROM korisnici WHERE id = :id";

        $rez_delete = $konekcija->prepare($upit_delete);
        $rez_delete->bindParam(":id", $id);

        $rez_delete->execute();

        header("Location: adminPanel.php");
    }