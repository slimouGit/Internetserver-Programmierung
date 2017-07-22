<!-- EINBINDEN PHP-Datei ueberprueft Benutzereingabe -->
<?php include 'includes/pruefe_Eingabe.php'; ?>
            
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
                            <li ><a href="bedemi_ausgabe.php" title="Bewertungen">Bewertungen</a></li>
                            <li class="active"><a href="bedemi_eingabe.php" title="Neu">Neu</a></li>
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
                    
                <div class="verarbeite_Daten">
                    
                    <div class="row">
                            
                        <!----------------------------------------------------------------------------------->
                        <!-- LINKE SPALTE -->
                        <div class="col-sm-3 wowload fadeInLeft">
                            <div class="spacer">
                            </div><!-- ENDE spacer -->
                        </div><!-- ENDE col-sm-3 wowload fadeInLeft -->
                        <!----------------------------------------------------------------------------------->
                        <!-- RECHTE SPALTE -->
                        <div class="col-sm-9 wowload fadeInRight">
                            <div class="spacer">
                                <!-- EINBINDEN PHP-Datei speichert Daten in CSV --> 
                                <?php include 'includes/verarbeite_Eingabe.php'; ?>
                            </div><!-- ENDE spacer --> 
                        </div><!-- ENDE col-sm-9 wowload fadeInRight -->
                        <!----------------------------------------------------------------------------------->
                            
                    </div><!-- ENDE row -->
                    
                </div><!-- ENDE div class="ausgabe_Daten" -->
                
                    
                <!----------------------------------------------------------------------------------->
                    
                <div class="einfuegen_Daten">
                    
                    <div class="row">
                            
                        <!----------------------------------------------------------------------------------->
                        <!-- LINKE SPALTE -->
                        <div class="col-sm-4 wowload fadeInLeft">
                            <div class="spacer">
                                <h2>Sprich Dich aus.</h2>
                                <p>Alle Angaben sind verpflichtent.</p>
                            </div><!-- ENDE spacer -->
                        </div><!-- ENDE col-sm-4 wowload fadeInLeft -->
                        <!----------------------------------------------------------------------------------->
                        <!-- RECHTE SPALTE -->
                        <div class="col-sm-8 wowload fadeInRight">
                            <div class="spacer">  
                            
                                <!-- EINGABE-FORMULAR-->
                                <div class="wowload fadeInRightBig">  
                                    
                                    <form name="kontakt" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" >
                                        
                                        <?php
                                        // EINBINDEN PHP-Klasse mit Formualr-Objekten 
                                        require_once "classes/FormularEingabe.class.php";
                                        
                                        // Objekt erzeugen
                                        $form = new FormularEingabe();
                                        
                                        echo "<div class=\"auswahl_Angaben\">Angaben zu Dir</div>";
                                        
                                        
                                            $form->form_Field("Dein Vorname", "verfasser_vorname", "$verfasser_vorname","$verfasser_vornameErr");
                                            $form->form_Field("Dein Nachname", "verfasser_nachname", "$verfasser_nachname", "$verfasser_nachnameErr");
                                            $form->form_Field("Deine E-Mail", "email", "$email", "$emailErr");
                                        
                                        // -------------------------------------------------------------------------------------
                                        
                                        echo "<div class=\"auswahl_Angaben\">Angaben zu der Person, die Du bewerten möchtest</div>";
                                        
                                            $form->form_Field("Vorname", "vorname", "$vorname","$vornameErr");
                                            $form->form_Field("Nachname", "nachname", "$nachname", "$nachnameErr");
                                            $form->form_Field("Beruf (Erwerbs-Status)", "job", "$job", "$jobErr");
                                            $form->form_Field("Ort", "ort", "$ort","$ortErr");
                                            $form->form_Field("beschreibe die Person in einem Wort", "headline", "$headline", "$headlineErr");
                                        
                                        // -------------------------------------------------------------------------------------
                                        
                                            $form->form_Textfield("Kommentar", "kommentar", "$kommentar", "$kommentarErr");
                                        
                                        // -------------------------------------------------------------------------------------
                                        
                                        echo "<p class=\"ranking\">Wie bewertest Du diese Person (1: schlecht - 5: gut)</p>";
                                        
                                            $form->radio_Button("bewertung", "1", "$bewertungErr");
                                            $form->radio_Button("bewertung", "2", "$bewertungErr");
                                            $form->radio_Button("bewertung", "3", "$bewertungErr");
                                            $form->radio_Button("bewertung", "4", "$bewertungErr");
                                            $form->radio_Button("bewertung", "5", "$bewertungErr");
                                        
                                        //-------------------------------------------------------------------------------------
                                        
                                            $form->sende_Button("submit", "eintragen", "eintragen");
                                        ?>
                    
  	                                    <!----------------------------------------------------------------------------------->
  	                                    
                                    </form><!-- ENDE form -->
                                
                                </div><!-- ENDE wowload fadeInRightBig -->

                            </div><!-- ENDE spacer --> 
                        </div><!-- ENDE col-sm-8 wowload fadeInRight -->
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