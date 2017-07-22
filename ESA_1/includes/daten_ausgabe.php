<?php

//date( "l, d of F Y "),  "! Time:  ", date( "H:i:s "),  "Uhr ";

$handle = fopen('daten/bewertungen.csv', 'r'); //Datei oeffnen
            while($data = fgetcsv($handle, 30000, ';')) //Jede Zeile durchgehen
                {
                //Zeilen ausgeben
                echo
                    /* --------------- AUSGABE KOPF ---------------*/
                    "<div class=\"eintragsDatum\">
                        <label class=\"ausgabeDatum\">$data[10]</label>".
                    "</div>".


                    /* --------------- AUSGABE INHALT ---------------*/
                    "<div class=\"eintrag_feld\">".

                        "<div class=\"headline\">".
                            "<label class=\"ausgabe_headline\">$data[7]</label>".
                        "</div>"./*ENDE headline*/

                        "<div>".
                            "<label class=\"ausgabe\">Vorname:</label>".$data[3].
                        "</div>".
                        "<div>".
                            "<label class=\"ausgabe\">Name:</label>".$data[4].
                        "</div>".
                        "<div>".
                            "<label class=\"ausgabe\">Job:</label>".$data[5].
                        "</div>".
                        "<div>".
                            "<label class=\"ausgabe\">Ort:</label>".$data[6].
                        "</div>".

                        "<div class=\"kommentar\">".
                            "<label class=\"ausgabe\">Kommentar:</label><br>".$data[8].
                        "</div>"./*ENDE kommentar*/

                        "<div class=\"kommentar\">".
                            "<label class=\"ausgabe\">Bewertung:</label>"."<span class=\"sternchen\">".$data[9]."</span>".
                        "</div>"./*ENDE kommentar*/

                    "</div>"./*ENDE eintrag_feld*/


                    /* --------------- AUSGABE UNTEN ---------------*/
                    "<div class=\"verfasserEintrag\">".
                        "<div>".
                            "<label class=\"ausgabe\">Beschwerde an:</label>".$data[0]." ".$data[1].
                        "</div>".
                        "<div>".
                            "<label class=\"ausgabe\"></label>".$data[2].
                        "</div>".
                    "</div>";/*ENDE verfasserEintrag*/

                            }

                            fclose($handle); // Dateizeiger schliessen
?>