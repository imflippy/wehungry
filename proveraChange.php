<?php
/**
 * Created by PhpStorm.
 * User: Flippy~
 * Date: 18/03/2019
 * Time: 13:13
 */
    session_start();
    include 'konekcija.php';

    $status = 404;
    $poruka = null;

    if(isset($_POST['send'])){

        $id = $_POST['id'];
        $first = $_POST['tbFirst'];
        $last = $_POST['tbLast'];
        $password = md5($_POST['tbPassword']);
        $uloga = $_POST['ddlUloga'];

        $errors = [];
        $reFirstLastName = "/^[A-Z][a-z]{2,15}$/";
        $rePassword = "/^[A-z0-9]{6,20}$/";

        if(!$first){
            $errors[] = "First name must be filled in.";
        }elseif(!preg_match($reFirstLastName, $first)){
            $errors[] = "First Name is not in good format!";
        }

        if(!$last){
            $errors[] = "Last name must be filled in.";
        }elseif(!preg_match($reFirstLastName, $last)){
            $errors[] = "Last Name is not in good format!";
        }

        if(!$_POST['tbPassword']){
            $errors[] = "Password must be filled in.";
        }elseif(!preg_match($rePassword, $_POST['tbPassword'])){
            $errors[] = "Password is not in good format!";
        }

        if($uloga == 0){
            $errors[] = "Choose role";
        }


        if(count($errors)>0){
            $status = 422;
            $poruka = $greska;
        }
        else
            {
                $upitReg = "UPDATE korisnici SET ime = :ime, prezime = :prezime, password = :password, uloga_id = :uloga WHERE id = :id";

                $rez_Reg = $konekcija->prepare($upitReg);

                $rez_Reg->bindParam(":ime", $first);
                $rez_Reg->bindParam(":prezime", $last);
                $rez_Reg->bindParam(":password", $password);
                $rez_Reg->bindParam(":uloga", $uloga);
                $rez_Reg->bindParam(":id", $id);
                try{
                    $izvesen_Reg = $rez_Reg->execute();
                    if($izvesen_Reg){
                        $status = 201;
                        $poruka = "Update has benn successfully!";

                    }else{
                        $status = 500;
                        $poruka = "Error with DB";
                    }

                }
                catch(PDOException $ex){
                    $status = 409;
                    $poruka = "User already exists";

                }

            }

    };
    echo $poruka;
    http_response_code($status);
