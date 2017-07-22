<?php

//Deutsche Zeitzone
date_default_timezone_set('Europe/Berlin');

//Variable $datum deklarieren
$datum = date( "d.F Y - H:i");

if(isset($_POST['eintragen']) && (!$fehler)) {
                    
                    /* -------------- CSV ----------------------*/
                    $eintragen_Daten=fopen("daten/bewertungen.csv","a");
                        if(!$eintragen_Daten)
                            {
                            echo "Datei konnte nicht zum Schreiben geöffnet werden.";
                            exit;
                        }

                    fputs($eintragen_Daten,$_POST["verfasser_vorname"].";".$_POST["verfasser_nachname"].";".$_POST["email"].";".$_POST["vorname"].";".$_POST["nachname"].";".$_POST["job"].";".$_POST["ort"].";"
                            .$_POST["headline"].";".$_POST["kommentar"].";".$_POST["bewertung"].";".$datum.";\n");

                    if($eintragen_Daten == true) {
                        echo 
                            "<div class=\"col-sm-11 wowload fadeInLeft\">".
                                "<div class=\"spacer\">".
                                    "<div class=\"wowload fadeInLeftBig\"> ".
                                        "<span id=\"erfolg\">Eintrag wurde erstellt.</span>".
                                        "<p>Du wirst sofort zu den Bewerungen weitergeleitet, sollte es nicht funktionieren,".
                                        "<a class=\" \"href=\"bedemi_ausgabe.php\"><br/><u>klicke einfach hier.</u></a></p>".
                            
                                        /*Weiterleitung*/
                                        "<meta http-equiv='refresh' content='6; url=bedemi_ausgabe.php'".
                                    "</div>".
                                "</div>".
                            "</div>";
                    }

    fclose($eintragen_Daten);
}
?>