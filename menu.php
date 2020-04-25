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
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Change</th>
                        <th>Delete</th>
                    </tr>

                    <!--  Lista Food   -->
                    <?php
                    $strana = 0;
                    if(isset($_GET['strana'])){
                        $strana = ($_GET['strana'] - 1) * 6;
                    }

                    $upit_meni = "SELECT * FROM meni LIMIT $strana, 6";

                    $rez_meni = $konekcija->query($upit_meni);

                    $meni = $rez_meni->fetchAll();
                    $br = 1;
                    foreach($meni as $men) :
                        ?>
                        <tr>
                            <td><?= $br++ ?></td>
                            <td id="slikaPanel"><img src="<?= $men->slika ?>" alt="<?= $men->naslov ?>"></td>
                            <td><?= $men->naslov ?></td>
                            <td><?= $men->cena ?></td>
                            <td><?= $men->opis ?></td>
                            <td><a href="changeMenu.php?id=<?= $men->id ?>">Change</a></td>
                            <td><a href="deleteMenu.php?id=<?= $men->id ?>">Delete</a></td>
                        </tr>

                    <?php endforeach; ?>
                </table>

            </div>
            <div class="col-xs-12 col-sm-12">
                <ul id="pag">
                    <?php
                    $upit_pag = "SELECT COUNT(*) AS brojMeni FROM meni";

                    $rez_pag = $konekcija->query($upit_pag)->fetch();

                    $brojMeni = $rez_pag->brojMeni;

                    $brojLinkova = ceil($brojMeni/6);

                    for($p=1; $p <= $brojLinkova; $p++):
                        ?>
                        <li>
                            <a href="menu.php?strana=<?= $p?>">
                                <b><?= $p ?></b>
                        </li>
                    <?php endfor;?>
                </ul>
            </div>
        </div>
    </div>
    <div class="space-30"></div>
    <a href="adminPanel.php" id="insert" class="bttn black">Users</a>
    <a href="insertMenu.php" id="menu" class="bttn black">Insert Food</a>
    <div class="space-50"></div>
</section>







<?php
require 'views/footer.php';
?>