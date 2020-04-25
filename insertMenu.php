<?php
/**
 * Created by PhpStorm.
 * User: Flippy~
 * Date: 19/03/2019
 * Time: 22:14
 */


    session_start();
    include "konekcija.php";
    require 'views/head.php';
    require 'views/zabrana.php';




?>

    <body data-spy="scroll" data-target=".mainmenu-area">

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

                        <li><a href="index.php">Home</a></li>


                        <?php if(isset($_SESSION['korisnik_id'])) : ?>
                            <li><a href="logout.php">LOGOUT</a></li>
                            <li><a href="
                            <?php if($_SESSION['korisnik']->uloga_id == 1) :?>adminPanel.php
                        <?php endif;?>">Welcome:
                                    <?php
                                    if(isset($_SESSION['korisnik_id'])){
                                        $upit_korisnik = "SELECT ime, prezime FROM korisnici WHERE id = :idKorisnik";
                                        $priprema_korisnik = $konekcija->prepare($upit_korisnik);

                                        $id = $_SESSION['korisnik_id'];

                                        $priprema_korisnik->bindParam(':idKorisnik', $id);
                                        $rez_korisnik = $priprema_korisnik->execute();

                                        if($rez_korisnik){
                                            $korisnik = $priprema_korisnik->fetch();
                                            echo $korisnik->ime. " ". $korisnik->prezime;
                                        }
                                    }
                                    ?></a>
                            </li>
                        <?php endif;?>

                    </ul>

                </div>
            </div>
        </nav>

    </header>
    <section class="relative" id="about">
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <form action="proveraInsertMenu.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="id" id="id" />

                        <label>Name</label>
                        <input type="text" name="tbNaslov" id="tbNaslov" class="form-control" />

                        <label>Price</label>
                        <input type="text" name="tbCena" id="tbCena" class="form-control" "/>

                        <label>Description</label>
                        <input type="text" name="tbOpis" id="tbOpis" class="form-control" "/>

                        <label>Picture</label>
                        <input type="file" name="fSlika" id="fSlika" class="form-control" "/>

                        </select>
                        <br/>


                        <input type="submit" class="bttn black" name="btnInsertMenu" id="btnInsertMenu" value="Insert">
                    </form>

                </div>

            </div>
        </div>

        <div class="space-20"></div>

    </section>
    <div class="row">
        <div class="col-xs-12 col-md-12" id="feedback">
            <div class="space-20"></div>

        </div>

    </div>




<?php
require 'views/footer.php';
?>

