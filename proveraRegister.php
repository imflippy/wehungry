<?php

    include "konekcija.php";



    $status = 404;
    $poruka = null;

    if(isset($_POST['send'])){
        $first = $_POST['tbFirst'];
        $last = $_POST['tbLast'];
        $email = $_POST['tbEmail'];
        $password = md5($_POST['tbPassword']);

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
        if(!$email){
            $errors[] = "Email must be filled in.";
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "Email is not in good format!";
        }

        if(count($errors)>0){
            $status = 422;
            $poruka = $greska;
        }
        else{
            $upit_mail = "SELECT * FROM korisnici WHERE email = :email";

            $rez_mail = $konekcija->prepare($upit_mail);
            $rez_mail->bindParam(":email", $email);

            $rez_mail->execute();

            $korisnici = $rez_mail->fetch();

            if($korisnici != null){
                $status = 409;
            } else{
                $upitReg = "INSERT INTO korisnici (	ime, prezime, email, password, token, uloga_id, active) values (:ime, :prezime, :email, :password, :token, 2, 1)";

                $rez_Reg = $konekcija->prepare($upitReg);

                $rez_Reg->bindParam(":ime", $first);
                $rez_Reg->bindParam(":prezime", $last);
                $rez_Reg->bindParam(":email", $email); 
                $rez_Reg->bindParam(":password", $password);
                $token = sha1(md5(time() . $email));
                $rez_Reg->bindParam(":token", $token);
                try{
                $izvesen_Reg = $rez_Reg->execute();
                if($izvesen_Reg){
                    $status = 201;
                    $poruka = "Registation has benn successfully!";
                    
                }else{
                    $status = 500;
                    $poruka = "Error with DB";
                }

            }
            catch(PDOException $ex){
                $status = 412;
                $poruka = "User already exists";
                
            }

            }
        }            
    };
    echo $poruka;
    http_response_code($status); 

    
?>