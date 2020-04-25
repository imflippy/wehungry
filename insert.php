<?php
/**
 * Created by PhpStorm.
 * User: Flippy~
 * Date: 18/03/2019
 * Time: 19:09
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
                    <form action="proveraInsert.php" method="POST">

                        <input type="hidden" name="id" id="id" />

                        <label>First Name</label>
                        <input type="text" name="tbFirst" id="tbFirst" class="form-control" />

                        <label>Last Name</label>
                        <input type="text" name="tbLast" id="tbLast" class="form-control" "/>

                        <label>Email</label>
                        <input type="text" name="tbEmail" id="tbEmail" class="form-control" "/>

                        <label>Password</label>
                        <input type="password" name="tbPassword" id="tbPassword" class="form-control"/>

                        <label>Role</label>
                        <select name="ddlUloga" id="ddlUloga" class="form-control">
                            <option value="0">Choose</option>

                            <?php
                            $upit = "SELECT * FROM uloge";
                            $rezultat = $konekcija->query($upit);
                            $uloge = $rezultat->fetchAll();

                            foreach($uloge as $uloga):
                                if($korisnik_ch->id == $korisnik_ch->uloga_id) :
                                    ?>
                                    <option selected value="<?= $uloga->id ?>"><?= $uloga->naziv ?></option>
                                <?php
                                else:
                                    ?>
                                    <option value="<?= $uloga->id ?>"><?= $uloga->naziv ?></option>
                                <?php
                                endif;
                            endforeach;?>
                        </select>
                        <br/>

                        <button class="bttn black" type="button" name="btnInsert" id="btnInsert">Insert</button>
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
    <script src="js/proveraInsert.js" type="text/javascript"></script>
