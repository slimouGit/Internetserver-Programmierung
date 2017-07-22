<?php
    //--------------------------------------------------------------------------------------------------------
    //session_start - Erzeugt eine neue Session oder setzt eine vorhandene fort
    session_start();
    
    //--------------------------------------------------------------------------------------------------------
    //Laden und ausfuehren der Datenbankklasse
    require "classes/Datenbank.class.php";

    //Einbinden und ausfuehren der pruefe_eingabe.php zum pruefen der Eingaben im Formular
    include 'includes/pruefe_eingabe.php';
    //--------------------------------------------------------------------------------------------------------
    // Datenbankverbindung ueber Instanz im Singleton-Pattern ausfuehren
    //SERVER
    $datenbankVerbindung = Nutzerdatenbank::getInstance("slimou.de.mysql","slimou_de","slimou_de","26041980");
    //LOCAL
    //$datenbankVerbindung = Nutzerdatenbank::getInstance("localhost","bedemi","root","");
    //--------------------------------------------------------------------------------------------------------
    
    //es wird geprueft, ob eine Session vorhanden ist
    if(isset($_SESSION["benutzername"])) {
        //falls die Session lauft, wird das folgende Skript ausgefuehrt und die Seite im Browser dargestellt
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
                    <div class="col-sm-4 wowload fadeInLeft">
                        <div class="spacer">
                        </div><!-- ENDE spacer -->
                    </div><!-- ENDE col-sm-3 wowload fadeInLeft -->
                    <!----------------------------------------------------------------------------------->
                    <!-- RECHTE SPALTE -->
                    <div class="col-sm-8 wowload fadeInRight">
                        <div class="spacer">
                            <div class="eintrag_erfolgreich">
                                <!-- EINBINDEN PHP-Datei speichert Daten in MySQL-Datenbank -->
                                <?php
                                $Daten = $Datensatz->getDaten();
                                echo $datenbankVerbindung->eintragenDatensaetze($fehler, $Daten[0] , $Daten[1] ,
                                    $Daten[2] , $Daten[3] , $Daten[4] , $Daten[5] ,  $Daten[6] ,  $Daten[7] ,  $Daten[9] ,
                                    $Daten[10] ,  $Daten[8] );
                                ?>
                            </div>
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

                                <form name="kontakt" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form" enctype="multipart/form-data">

                                    <?php
                                    // EINBINDEN PHP-Klasse mit Formualr-Objekten
                                    require_once "classes/FormularEingabe.class.php";

                                    // Objekt erzeugen
                                    $form = new FormularEingabe();
                                    $checked = $Datensatz->getCheckedRadio();
                                    $DatenFehler = $Datensatz->getFehler();
                                    echo "<div class=\"auswahl_Angaben\">Angaben zu Dir</div>";


                                    $form->form_Field("Dein Vorname", "verfasser_vorname", "$Daten[0]","$DatenFehler[0]");
                                    $form->form_Field("Dein Nachname", "verfasser_nachname", "$Daten[1]","$DatenFehler[1]");
                                    $form->form_Field("Deine E-Mail", "email", "$Daten[2]","$DatenFehler[2]");

                                    // -------------------------------------------------------------------------------------

                                    echo "<div class=\"auswahl_Angaben\">Angaben zu der Person, die Du bewerten möchtest</div>";

                                    $form->form_Field("Vorname", "vorname", "$Daten[3]","$DatenFehler[3]");
                                    $form->form_Field("Nachname", "nachname", "$Daten[4]","$DatenFehler[4]");
                                    $form->form_Field("Beruf (Erwerbs-Status)", "job", "$Daten[5]","$DatenFehler[5]");
                                    $form->form_Field("Ort", "ort", "$Daten[6]","$DatenFehler[6]");
                                    $form->form_Field("beschreibe die Person in einem Wort", "headline", "$Daten[7]","$DatenFehler[7]");
                                    $form->form_Image("füge ein Bild hinzu", "userfile", "$Daten[8]","$DatenFehler[8]");

                                    // -------------------------------------------------------------------------------------

                                    $form->form_Textfield("Kommentar", "kommentar", "$Daten[9]","$DatenFehler[9]");

                                    // -------------------------------------------------------------------------------------

                                    echo "<p class=\"ranking\">Wie bewertest Du diese Person (1: schlecht - 5: gut)</p>";

                                    $form->radio_Button("bewertung", "1", "$DatenFehler[10]", $checked[0]);
                                    $form->radio_Button("bewertung", "2", "$DatenFehler[10]", $checked[1]);
                                    $form->radio_Button("bewertung", "3", "$DatenFehler[10]", $checked[2]);
                                    $form->radio_Button("bewertung", "4", "$DatenFehler[10]", $checked[3]);
                                    $form->radio_Button("bewertung", "5", "$DatenFehler[10]", $checked[4]);

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
                    <span>
                        <a href="impressum.php" title="Impressum">Impressum</a>
                            <span class="footer_trenner">|</span>
                        <a href="#" title="Kontakt">Kontakt</a>
                            <span class="footer_trenner">|</span>
                        <a href="logout.php" title="logout">logout</a>
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

<?php
    //falls nicht eingeloggt, wird auf Fehlerseite weitergeleitet
    } else
    {
        header("Location: error.html");
    }
?>