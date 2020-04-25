<?php
    session_start();
    include "konekcija.php";


    require 'views/head.php';
    require 'views/header.php';

?>


        <!--Mainmenu-Area / -->
        <!-- Revolution Slider -->
        <div id="slider" class="tp-banner-container index-rev-slider clearfix">
            <div class="round-bottom"></div>
            <div class="tp-banner">
                <ul>
                <?php
                    $upit_slajder = "SELECT * FROM slajder";

                    $rez_slajder = $konekcija->query($upit_slajder);

                    $slajder = $rez_slajder->fetchAll();

                    foreach($slajder as $slajd) :
                ?>
                    <!-- Slide Right
					============================================= -->
                    <li data-transition="fade" data-slotamount="6" data-thumb="">
                        <img src="<?= $slajd->slika ?>" alt="image" />
                        <div class="caption sft big_white" data-x="260" data-y="260" data-speed="1500" data-start="1700" data-easing="easeOutExpo"><strong> <?= $slajd->naziv ?> </strong></div>
                        <div class="caption sfb medium_grey text-center" data-x="140" data-y="350" data-speed="1500" data-start="2500" data-easing="easeOutExpo"><?= $slajd->text ?></div>
                        <!-- <div class="caption sfb" data-x="492" data-y="440" data-speed="2000" data-start="3000" data-easing="easeOutExpo"><a href="index5.html" class="bttn white">Read More</a></div> -->
                    </li>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!-- Revolution Slider / -->
    </header>
    <section class="relative" id="about">
        <div class="space-80"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <h3 class="page-title">About</h3>
                    <h4 class="page-subtitle">WE ARE THE BEST QUALITY AND TRAEDITIONAL <br> RESTAURANT</h4>
                    <p>We Hungry is a locally owned Mexican restaurant located in Larchmont, New York. We bring our best to the table every day, and specialize in Mexican cuisine packed with exceptional flavor. We make it a goal to give you the best dining experience when you visit us.</p>
                    <p>One visit is all it takes to fall in love with our flavor-packed dishes and refreshing drinks. No matter what your preference is, you can find it here at We Hungry. If you like your meals picante, we’ll make it pure fire.</p>
                    <div class="space-20"></div>
                    <a href="#book-table" class="bttn black">Book Table</a>
                </div>
                <div class="hidden-xs col-sm-6">
                    <div class="chif-story relative text-center">
                        <img src="images/about/about-2.jpg" class="dark-image" alt="about">
                        <div class="vcenter text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-80"></div>
    </section>
    <!--Video-Section-->
    <section class="relative text-white">
        <div class="section-bg color hidden visible-xs">
            <div class="section-bg bg1"></div>
        </div>
        <div class="section-video hidden-xs">

        </div>
        <div class="space-100"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="page-title">Surprise For Your Plate</h2>
                    <div class="space-20"></div>
                    <div class="vd-icon">
                        <i class="icofont icofont-restaurant"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-100"></div>
    </section>
    <!--Video-Section / -->
    <!--special-area-->
    <section class="relative">
        <div class="space-100"></div>
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12">
                    <h2 class="page-title">This Week Special</h2>
                </div>
            </div>
            <div class="space-40"></div>
            <div class="row text-white">
            <?php 
                $upit_special = "SELECT * FROM special";

                $rez_special = $konekcija->query($upit_special);

                $special = $rez_special->fetchAll();
                foreach($special as $spec):
            ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="single-special relative">
                        <img src="<?= $spec->slika ?>" alt="<?= $spec->naslov ?>">
                        <div class="vcenter text-center">
                            <div class="special-dtls">
                                <h3><?= $spec->naslov ?></h3>
                                <p><?= $spec->opis ?></p>
                                <a href="#book-table" class="bttn tr white">Book table</a>
                            </div>
                        </div>
                    </div>
                    <div class="space-30"></div>
                </div>
                <?php endforeach; ?> 
            </div>
        </div>
    </section>
    <!--special-area / -->
    <!--Menu-Area-->
    <section class="relative" id="menu">
        <div class="space-100"></div>
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12">
                    <h2 class="page-title">Menu Card</h2>
                </div>
            </div>
            <div class="space-40"></div>
            <div class="row">
            <?php

                $strana = 0;
                if(isset($_GET['strana'])){
                    $strana = ($_GET['strana'] - 1) * 4;
                }
                
                $upit_meni = "SELECT * FROM meni LIMIT $strana, 4";

                $rez_meni = $konekcija->query($upit_meni);

                $meni = $rez_meni->fetchAll();
                foreach($meni as $men) :
            ?>
               <div class="col-xs-12 col-sm-6">
                    <div class="single-menu">
                        <div class="media">
                            <div class="media-left">
                                <div class="menu-img" style="background-image: url('<?php echo $men->slika; ?>')">
                                    <img src="images/menu/ovr.png" alt="<?php echo $men->naslov; ?>">
                                </div>
                            </div>
                            <div class="media-right">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <a href="#">
                                                <h3 class="menu-title"><?php echo $men->naslov; ?></h3>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="menu-rate">&#36;<?= $men->cena ?>,00</div>
                                        </td>
                                    </tr>
                                </table>
                                <p><?php echo $men->opis; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="space-30"></div>
                </div> 
                <?php endforeach;?>
                
                <div class="col-xs-12 col-sm-12">
                    <ul id="pag">   
                        <?php
                            $upit_pag = "SELECT COUNT(*) AS brojMeni FROM meni";

                            $rez_pag = $konekcija->query($upit_pag)->fetch();

                            $brojMeni = $rez_pag->brojMeni;

                            $brojLinkova = ceil($brojMeni/4);

                            for($p=1; $p <= $brojLinkova; $p++):
                        ?>
                        <li>
                            <a href="index.php?strana=<?= $p?>">
                                <b><?= $p ?></b>
                        </li>
                            <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="space-100"></div>
    </section>
    <!--Menu-Area / -->
    <!--Plan-Area-->
    <section class="relative text-white">
        <div class="section-bg color">
            <div class="section-bg plan-bg" style="background-image: url('images/sc-2.jpg')"></div>
        </div>
        <div class="space-100"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2  text-center">
                    <div class="single-plan relative">
                        <h2 class="plan-title">Birthday Party</h2>
                        <h5 class="plan-subtitle">TODAY FROM 7 PM</h5>
                        <div class="space-20"></div>
                        <p>For an event that everyone will be talking about, we can cater your event – no matter how big or small it will be. Browse our catering menu for your favorite plate ideas!</p>
                        <a href="#book-table" class="bttn tr golden">Book A Table</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="space-100"></div>
    </section>
    <!--Plan-Area / -->
    <!--Shafes-Team-->
    <section class="relative" id="team">
        <div class="space-100"></div>
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12">
                    <h2 class="page-title">Our Shafes</h2>
                </div>
            </div>
            <div class="space-40"></div>
            <div class="row img-full">
            <?php
                $upit_sefovi = "SELECT * FROM sefovi";

                $rez_sefovi = $konekcija->query($upit_sefovi);

                $sefovi = $rez_sefovi->fetchAll();

                foreach($sefovi as $sef):
            ?>
                <div class="col-xs-12 col-sm-4">
                    <div class="relative single-shafe">
                        <img src="<?= $sef->slika ?>" alt="ja">
                        <ul class="list-unstyled shafe-socil">
                            <li><a href="#"><i class="icofont icofont-social-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-linkedin"></i></a></li>
                            <li><a href="#"><i class="icofont icofont-social-google-plus"></i></a></li>
                        </ul>
                        <div class="shafe-dtls">
                            <h4 class="shafe-name"><?= $sef->ime ?></h4>
                            <h5 class="shafe-pos"><?= $sef->opis ?></h5>
                        </div>
                    </div>
                    <div class="space-30"></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--Shafes-Team / -->
    <!--Book-A-Table-->
    <section class="relative" id="book-table">
        <div class="space-100"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="page-title">Book a table</h2>
                    <div class="space-20"></div>
                    <p>Get in touch with us or stop by today to discover the culture and flavor of We Hungry!</p>
                    <div class="space-30"></div>
                    <div class="book-form">
                        <form action="proveraBook.php" method="POST" id="booktable">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="book-guest" class="sr-only">guest</label>
                                        <input type="text" class="form-control " name="bookPhone" id="bookPhone" placeholder="Phone number_">
                                    </div>
                                    <div class="space-10"></div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="space-20"></div>
                                    <button type="button" class="bttn black" name="btnBook" id="btnBook" >Book A Table</button>
                                </div>
                                 <div class="col-xs-8 col-md-8" id="feedback">
                                <div class="space-20"></div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Book-A-Table / -->
    
    
    <!--Footer-Area-->
    <?php require 'views/footer.php'?>
    <script src="js/proveraBook.js" type="text/javascript"></script>
