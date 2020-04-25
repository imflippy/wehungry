<?php
    session_start();
    include "konekcija.php";

    require 'views/head.php';

    if(isset($_POST['btnLogin'])){
        $mailLogin = $_POST['tbLoginEmail'];
        $passLogin = $_POST['tbLoginPassword'];

        $reMailLogin = "/^[A-z]+\d*\@(gmail|hotmail|yahoo|(ict.edu))\.(com)$/";
        $rePassLogin = "/^[A-z0-9]{6,20}$/";

        $errorsLogin = [];

        if(!preg_match($reMailLogin, $mailLogin)){
            $errorsLogin[] = "Email nije u dobrom formatu.";
        }
        if(!preg_match($rePassLogin, $passLogin)){
            $errorsLogin[] = "Password nije u dobrom formatu.";
        }

        if(count($errorsLogin) != 0){
            $codeLogin = 422;
        }
        else{
            $mailLogin2 = $_POST['tbLoginEmail'];
            $passLogin2 = md5($_POST['tbLoginPassword']);

            $upitLogin = "SELECT * FROM korisnici WHERE
            email = :email AND password = :password
            ";

            $pripremaLogin = $konekcija->prepare($upitLogin);
            $pripremaLogin->bindParam(':email', $mailLogin2);
            $pripremaLogin->bindParam(':password', $passLogin2);

            $rezultatLogin = $pripremaLogin->execute();
            if($rezultatLogin){
                if($pripremaLogin->rowCount()==1){
                    $korisnikLogin = $pripremaLogin->fetch();
                    $_SESSION['korisnik_id'] = $korisnikLogin->id;
                    $_SESSION['korisnik'] = $korisnikLogin;

                    if($_SESSION['korisnik']->uloga_id == 1){
                        header("Location: adminPanel.php");
                    }else{
                        header("Location: index.php");
                    }
                }
            }

        }
    }



?>


<body data-spy="scroll" data-target=".mainmenu-area">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="preloader">
    <div class="sk-wave">
        <div class="sk-rect sk-rect1"></div>
        <div class="sk-rect sk-rect2"></div>
        <div class="sk-rect sk-rect3"></div>
        <div class="sk-rect sk-rect4"></div>
        <div class="sk-rect sk-rect5"></div>
    </div>
</div>
<header class="relative text-white" id="home">
    <!--Mainmenu-Area-->
    <nav class="navbar navbar-inverse navbar-fixed-top mainmenu-area smoth-scroll">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand"><img src="images/logo.png" alt="logo"></a>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#mainmenu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="mainmenu">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">
                    Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>    
                </ul>

            </div>
        </div>
    </nav>

</header>

<section class="relative" id="about">
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h3 class="page-title">Login</h3>
                         <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" id="booktable">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        
                                        <input type="text" name="tbLoginEmail" class="form-control" placeholder="Email_">
                                    </div>
                                    <div class="space-10"></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        
                                        <input type="password" name="tbLoginPassword" class="form-control" placeholder="Password_">
                                    </div>
                                    <div class="space-10"></div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="space-20"></div>
                                    <input type="submit" class="bttn black" name="btnLogin" value="Login"/>
                                </div>
                            </div>
                        </form>

                </div>
                <div class="hidden-xs col-sm-6">
                    <div class="chif-story relative text-center">
                        <img src="images/about/about-2.jpg" class="dark-image" alt="">
                        <div class="vcenter text-center">
                            <a href="#" class="bttn tr white">Restautant Story</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-80"></div>
    </section>














<!--Footer-Area-->
<?php require 'views/footer.php'?>