<?php

    include "konekcija.php";
    require 'views/head.php';
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
                    <h3 class="page-title">Register</h3>
                        <form action="proveraRegister.php" method="POST" id="booktable">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        
                                        <input type="text" name="tbFirst" id="tbFirst" class="form-control" placeholder="First Name_">
                                    </div>
                                    <div class="space-10"></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        
                                        <input type="text" name="tbLast" id="tbLast" class="form-control" placeholder="Last Name_">
                                    </div>
                                    <div class="space-10"></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        
                                        <input type="text" name="tbEmail" id="tbEmail" class="form-control" placeholder="Email_">
                                    </div>
                                    <div class="space-10"></div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        
                                        <input type="password" name="tbPassword" id="tbPassword" class="form-control" placeholder="Password_">
                                    </div>
                                    <div class="space-10"></div>
                                </div>
                                <div class="col-xs-4 col-md-4">
                                    <div class="space-20"></div>
                                    <button class="bttn black" type="button" name="btnRegister" id="btnRegister">Register</button>
                                    
                                </div>
                                <div class="col-xs-8 col-md-8" id="feedback">
                                    <div class="space-20"></div>
                                    
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
<?php require 'views/footer.php';?>
<script src="js/proveraRegister.js" type="text/javascript"></script>
