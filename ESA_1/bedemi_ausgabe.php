<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>BeDeMi</title>
        <meta name="author"           content="Salim Oussayfi">
        <meta name="description"      content="ESA_1_ISP">
        
        <!----------------------------------------------------------------------------------->
        <!-- IMPORTE -->

        <!-- Google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
        <!-- font awesome -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- bootstrap -->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
        <!-- animate.css -->
        <link rel="stylesheet" href="assets/bootstrap/css/animate/animate.css" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="images/favicon.ico" type="image/x-icon">

        <!-- individuelle CSS-Anpassungen -->
        <link rel="stylesheet" href="assets/style.css">
        
    </head>
    
    <!----------------------------------------------------------------------------------->
    
    <body id="home">
        <div class="navbar-wrapper">
            <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
                <div class="container">
                    
                    <!----------------------------------------------------------------------------------->
                    
                    <div class="navbar-header">
                        <!-- LOGO -->
                        <a href="index.php" ><img src="images/BeDeMi.jpg"  title="Startseite" alt="Logo"></a>

                    <!----------------------------------------------------------------------------------->
                        
                    <!-- TOGGLE NAVIGATION -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    </div><!-- ENDE NAVBAR-HEADER -->
                    
                    <!----------------------------------------------------------------------------------->
                    
                    <!-- NAVIGATION -->
                    <div class="navbar-collapse  collapse">
                        <ul class="nav navbar-nav navbar-right ">
                            <li ><a href="index.php" title="Startseite">Start</a></li>
                            <li class="active"><a href="bedemi_ausgabe.php" title="Bewertungen">Bewertungen</a></li>
                            <li ><a href="bedemi_eingabe.php" title="Neu">Neu</a></li>
                        </ul>
                    </div><!-- ENDE navbar-collapse  collapse --> 
                    
                    <!----------------------------------------------------------------------------------->
                    
                </div><!-- ENDE container -->
            </div><!-- ENDE navbar navbar-default navbar-fixed-top-->
        </div><!-- ENDE navbar-wrapper -->
                    
        <!----------------------------------------------------------------------------------->
                    
        <div class="container">
            <div class="wrapper">
                    
                <!----------------------------------------------------------------------------------->
                    
                <div class="ausgabe_Daten">
                    
                    <div class="row">
                            
                        <!----------------------------------------------------------------------------------->
                        <!-- LINKE SPALTE -->
                        <div class="col-sm-3 wowload fadeInLeft">
                            <div class="spacer">
                                <h2>Bisher erstellte Bewerungen</h2>
                                <!-- EINBINDEN PHP-Datei gibt Anzahl der Eintraege aus -->
                                <p><?php include 'includes/zaehle_eintraege.php'; ?> Bewertungen gesamt</p>
                            </div><!-- ENDE spacer -->
                        </div><!-- ENDE col-sm-3 wowload fadeInLeft -->
                        <!----------------------------------------------------------------------------------->
                        <!-- RECHTE SPALTE -->
                        <div class="col-sm-9 wowload fadeInRight">
                            <div class="spacer">  
                                <!-- EINBINDEN PHP-Datei mit Ausgabe der Daten -->
                                <?php include 'includes/daten_ausgabe.php'; ?>
                            </div><!-- ENDE spacer --> 
                        </div><!-- ENDE col-sm-9 wowload fadeInRight -->
                        <!----------------------------------------------------------------------------------->
                            
                    </div><!-- ENDE row -->
                    
                </div><!-- ENDE div class="ausgabe_Daten" -->
                    
                <!----------------------------------------------------------------------------------->
                    
                <!-- FOOTER -->
                <div class="footer text-center">
                    <span class="scroll">
                        <a href="#" title="Impressum">Impressum</a>
                            <span class="footer_trenner">|</span>
                        <a href="#" title="Kontakt">Kontakt</a>
                            <span class="footer_trenner">|</span>
                        <a href="#" title="logout">logout</a>
                    </span>
                </div><!-- ENDE FOOTER -->
                    
                <!----------------------------------------------------------------------------------->
                    
                <!-- ANGLE UP -->
                <a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>
                    
                <!----------------------------------------------------------------------------------->
                    
            </div><!-- ENDE wrapper -->
        </div><!-- ENDE container -->
            
        <!----------------------------------------------------------------------------------->

        <!-- IMPORTE -->
        <!-- jquery -->
        <script src="assets/bootstrap/js/jquery.js"></script>
        <!-- wow script -->
        <script src="assets/bootstrap/js/wow/wow.min.js"></script>
        <!-- boostrap -->
        <script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>
        <!-- jquery mobile -->
        <script src="assets/bootstrap/js/mobile/touchSwipe.min.js"></script>
        <!-- custom script -->
        <script src="assets/bootstrap/js/script.js"></script>
    
    
    </body>
</html>