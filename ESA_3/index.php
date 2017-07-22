<?php
    //--------------------------------------------------------------------------------------------------------
    //session_start — Erzeugt eine neue Session oder setzt eine vorhandene fort
    session_start();
    //--------------------------------------------------------------------------------------------------------
    //Laden und ausfuehren der Datenbankklasse
    require "classes/Datenbank.class.php";

    //Einbinden und ausfuehren der pruefe_login.php zum pruefen der Eingaben im Login-Formular
    include 'includes/pruefe_login.php';
    //--------------------------------------------------------------------------------------------------------
    // Datenbankverbindung ueber Instanz im Singleton-Pattern ausfuehren
    //SERVER
    $datenbankVerbindung = Nutzerdatenbank::getInstance("slimou.de.mysql","slimou_de","slimou_de","26041980");
    //LOCAL
    //$datenbankVerbindung = Nutzerdatenbank::getInstance("localhost","bedemi","root","");
    
    //--------------------------------------------------------------------------------------------------------
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>BeDeMi</title>
        <meta name="author"           content="Manuel Bogus, Salim Oussayfi">
        <meta name="description"      content="ESA_3_ISP">
        
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
                            <li class="active"><a href="index.php" title="Startseite">Start</a></li>
                            <li ><a href="bedemi_ausgabe.php" title="Bewertungen">Bewertungen</a></li>
                            <li><a href="bedemi_eingabe.php" title="Neu">Neu</a></li>
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
                    
                <div class="banner">
                    <div class="overlay">

                        <div class="spacer">
                            <h1 class=" wowload fadeInLeft">Willkommen bei BeDeMi</h1>
                            <h5 class="  wowload fadeInRight">DAS!!! Portal, in dem Du mal ganz ungefragt Deine Meinung zu Deinen Mitmenschen äußern kannst.</h5>
                        </div><!-- ENDE spacer -->
                        
                    </div><!-- ENDE overlay -->
                </div><!-- ENDE BANNER -->
                    
                <!----------------------------------------------------------------------------------->
                    
                <div class="start">
                    
                    <div class="row">
                            
                        <!----------------------------------------------------------------------------------->
                        <!-- LINKE SPALTE -->
                        <div class="col-sm-7 wowload fadeInLeft">
                            <div class="spacer">
                                <h2>Bewerte Deine Mitmenschen.</h2>
                                <p>Unsere Philosophie lautet:<span class="philosophie">Bei uns sind Deine Daten nicht sicher!</span></p>
                                <p>Das &bdquo;Recht auf informationelle Selbstbestimmung&bdquo; wird hier grundsätzlich missachtet.</p>
                                <!-- EINBINDEN PHP-Datei gibt Anzahl der Eintraege aus -->
                                <a href="bedemi_ausgabe.php"><p><?php echo $datenbankVerbindung->datenZaehlen(); ?> Bewertungen gesamt</p></a>
                            </div><!-- ENDE spacer -->
                        </div><!-- ENDE col-sm-3 wowload fadeInLeft -->
                        <!----------------------------------------------------------------------------------->
                        <!-- RECHTE SPALTE -->
                        <div class="col-sm-5 wowload fadeInRight">
                            <div class="spacer">  
                                <form name="login" id="login_Formular" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" >
                                        
                                        <?php
                                        // EINBINDEN PHP-Klasse mit Formualr-Objekten 
                                        require_once "classes/FormularEingabe.class.php";
                                        
                                        // Objekt erzeugen
                                        $form = new FormularEingabe();
                                        $Userdaten = $UserDatensatz->getUserdaten();
                                        $UserdatenFehler = $UserDatensatz->getFehler();
                                        
                                        echo "<div class=\"auswahl_Angaben\">Login</div>";
                                        
                                            $form->form_Field("Benutzername", "benutzername", $Userdaten[0],$UserdatenFehler[0]);
                                            $form->form_Password("Passwort", "passwort", $Userdaten[1], $UserdatenFehler[1]);
                                        
                                        //-------------------------------------------------------------------------------------
                                        
                                            $form->sende_Button("submit", "login", "login");
                                            
                                        ?>
                    
  	                                    <!----------------------------------------------------------------------------------->
  	                                    
                                    </form><!-- ENDE form -->
                                    
                                    <?php $datenbankVerbindung->verarbeiteLogIn($fehlerLogIn,$Userdaten[0],$Userdaten[1]); ?>
                            </div><!-- ENDE spacer --> 
                        </div><!-- ENDE col-sm-9 wowload fadeInRight -->
                        <!----------------------------------------------------------------------------------->
                            
                    </div><!-- ENDE row -->
                    
                </div><!-- ENDE div class="ausgabe_Daten" -->
                    
                <!----------------------------------------------------------------------------------->
                    
                <!-- FOOTER -->
                <div class="footer text-center">
                    <span>
                        <a href="impressum.php" title="Impressum">Impressum</a>
                            <span class="footer_trenner">|</span>
                        <a href="#" title="Kontakt">Kontakt</a>
                            <span class="footer_trenner logout">|</span>
                        <a href="logout.php" class="logout" title="logout">logout</a>
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

<!----------------------------------------------------------------------------------->

<!-- Login-Formular ein-/ausblenden, abhaengig von Status der Session -->
<?php 
    if(isset($_SESSION["benutzername"])) {
?>
    <script>
        //alert("eingeloggt");
        document.getElementById("login_Formular").style.visibility = "hidden";
    </script>
<?php
    } else {
?>
        <script>
            //alert("nicht eingeloggt");
            document.getElementById("login_Formular").style.visibility = "visible";
            alert("Benutzername: admin, Passwort: password");
        </script>
<?php
    }
?>