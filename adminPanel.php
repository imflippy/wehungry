<?php
/**
 * Created by PhpStorm.
 * User: Flippy~
 * Date: 17/03/2019
 * Time: 20:23
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
                    <table class="table">
                        <tr>
                            <th>ON</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Change</th>
                            <th>Delete</th>
                        </tr>

                        <!--  Korisnici   -->
                        <?php
                        $upit_panel = "SELECT k.id, k.ime, k.prezime, k.email, u.naziv FROM korisnici k INNER JOIN uloge u ON k.uloga_id = u.id";

                        $rezultat_panel = $konekcija->query($upit_panel);
                        
                        $korisnici_panel = $rezultat_panel->fetchAll();
                        $br = 1;
                        foreach($korisnici_panel as $korisnik_p) :
                            ?>
                            <tr>
                                <td><?= $br++ ?></td>
                                <td><?= $korisnik_p->ime ?></td>
                                <td><?= $korisnik_p->prezime ?></td>
                                <td><?= $korisnik_p->email ?></td>
                                <td><?= $korisnik_p->naziv ?></td>
                                <td><a href="change.php?id=<?= $korisnik_p->id ?>">Change</a></td>
                                <td><a href="delete.php?id=<?= $korisnik_p->id ?>">Delete</a></td>
                            </tr>

                        <?php endforeach; ?>
                    </table>

                </div>

            </div>
        </div>
        <div class="space-30"></div>
        <a href="insert.php" id="insert" class="bttn black">Insert new user</a>
        <a href="menu.php" id="menu" class="bttn black">Menu</a>
        <div class="space-50"></div>
    </section>


















<?php
    require 'views/footer.php';
?>