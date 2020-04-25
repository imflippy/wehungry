<?php
/**
 * Created by PhpStorm.
 * User: Flippy~
 * Date: 19/03/2019
 * Time: 16:07
 */

    session_start();
    include "konekcija.php";



    $status = 404;
    $poruka = null;

    if(isset($_POST['send'])){
        $telefonBr = $_POST['bookPhone'];

        $trenutniKorisnik = $_SESSION['korisnik_id'];

        $errors = [];

        $retelefonBr = "/^\d{10,}/";

        if(!preg_match($retelefonBr, $telefonBr)){
            $errors[] = "Number is not in good format!";
        }


        if(count($errors)>0){
            $status = 422;
            $poruka = $greska;
        }

             else{
                $upitReg = "INSERT INTO rezervacije values ('', :telefonBr, '".$trenutniKorisnik."')";

                $rez_Reg = $konekcija->prepare($upitReg);

                $rez_Reg->bindParam(":telefonBr", $telefonBr);


                try{
                    $izvesen_Reg = $rez_Reg->execute();
                    if($izvesen_Reg){
                        $status = 201;
                        $poruka = "We will call you!";

                    }else{
                        $status = 500;
                        $poruka = "Error with DB";
                    }

                }
                catch(PDOException $ex){
                    $status = 412;
                    $poruka = "Number is not valid";

                }

            }

    };
    echo $poruka;
    http_response_code($status);


?>