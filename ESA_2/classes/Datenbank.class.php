<?php

    class Nutzerdatenbank {

        private $servername , $dbname , $username , $password, $connection;

        public function __construct($servername , $dbname , $username , $password)
        {
            $this->servername = $servername;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password;
        }

        private function oeffneVerbindung()
        {
            $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            // Pruefen ob erreichbar
            if ($this->connection->connect_error) die("Connection failed: " . $this->connection5->connect_error);
        }

        private function schliesseVerbindung()
        {
            $this->connection->close();
        }

        public function verbindenFuerLogIn()
        {
            $this->oeffneVerbindung();
            return $this->connection;
        }

        public function schliessenFuerLogIn()
        {
            $this->connection->close();;
        }


        public function datenZaehlen()
        {
            $this->oeffneVerbindung();
            $Abfrage = "SELECT * FROM bedemi_data";
            $hilf = $this->connection->query($Abfrage)->num_rows;
            $this->schliesseVerbindung();
            return $hilf;
        }

        public function eintragenDatensaetze($fehler, $verfasser_vorname , $verfasser_nachname , $email ,
                                             $vorname , $nachname , $job ,  $ort ,  $headline ,  $kommentar ,
                                             $bewertung ,  $image )
        {
            $this->oeffneVerbindung();

            if(isset($_POST['eintragen']) && (!$fehler)) {

                $Abfrage = "INSERT INTO bedemi_data
                            (verfasser_vorname, verfasser_nachname, email, vorname, nachname,
                            job, ort, headline, kommentar, bewertung, image)
                            VALUES
                            ('$verfasser_vorname', '$verfasser_nachname', '$email', '$vorname', '$nachname',
                            '$job', '$ort', '$headline', '$kommentar', '$bewertung', '$image')";

                if ($this->connection->query($Abfrage) === TRUE) {

                    return "<span id=\"erfolg\">Eintrag wurde erstellt.</span>".
                        "<a class=\"zu_den_Eintraegen\" href=\"bedemi_ausgabe.php\">Eintrag anschauen >>></a>";
                } else {
                    return "Fehler: " . $Abfrage . "<br>" . $this->connection->error;
                }
            }//Ende if Button gedrueckt

            $this->schliesseVerbindung();
        }

        public function ausgebenDatensaetze()
        {
            $this->oeffneVerbindung();
            $Abfrage = "SELECT * FROM bedemi_data ORDER BY id desc";
            $ergebnisAbfrage = $this->connection->query($Abfrage);

            function bildAusgaben($data){
                $hilf = "<img src=";
                $hilf1 = '"';
                $hilf2 = "height = '100px' >";
                $bild = $hilf . $hilf1 . $data . $hilf1 . $hilf2;
                return $bild;
            }

            //Datenausgabe
            while ($zeile = $ergebnisAbfrage->fetch_assoc()) {
                //Zeilen ausgeben

                echo
                    /* --------------- AUSGABE KOPF ---------------*/
                    "<div class=\"eintragsDatum\">
                            <label class=\"ausgabeDatum\">".$zeile["create"]."</label>".
                    "</div>".

                    /* --------------- AUSGABE INHALT ---------------*/
                    "<div class=\"eintrag_feld\">".

                    /*HEADLINE*/
                    "<div class=\"headline\">".
                    "<label class=\"ausgabe_headline\">".$zeile["headline"]."</label>".
                    "</div>"./*ENDE headline*/

                    "<div class=\"user_daten\">".
                    /*BILD*/
                    "<div>".
                    "<span class=\"bilder\">".bildAusgaben($zeile["image"])."</span>".
                    "</div>"./*ENDE bilder*/

                    "<div class=\"user_datenContainer\">".
                    /*VORNAME/NAME*/
                    "<div>".
                    "<label class=\"ausgabe\">Vorname:</label>".$zeile["vorname"].
                    "</div>".
                    "<div>".
                    "<label class=\"ausgabe\">Name:</label>".$zeile["nachname"].
                    "</div>".

                    /*JOB/ORT*/
                    "<div>".
                    "<label class=\"ausgabe\">Job:</label>".$zeile["job"].
                    "</div>".
                    "<div>".
                    "<label class=\"ausgabe\">Ort:</label>".$zeile["ort"].
                    "</div>".
                    "</div>"./*ENDE user_datenContainer*/

                    "</div>"./*ENDE user_daten*/

                    /*KOMMENTAR*/
                    "<div class=\"kommentar\">".
                    "<label class=\"ausgabe\">Kommentar:</label><br>".$zeile["kommentar"].
                    "</div>"./*ENDE kommentar*/

                    /*BEWERTUNG*/
                    "<div class=\"kommentar\">".
                    "<label class=\"ausgabe_user\">Bewertung:</label>"."<span class=\"sternchen\">".$zeile["bewertung"]."</span>".
                    "</div>"./*ENDE kommentar*/

                    "</div>"./*ENDE eintrag_feld*/


                    /* --------------- AUSGABE UNTEN ---------------*/
                    "<div class=\"verfasserEintrag\">".

                    /*VERFASSER ANGABEN*/
                    "<div>".
                    "<label class=\"ausgabe_user\">Beschwerde an:</label>".$zeile["verfasser_vorname"]." ".$zeile["verfasser_nachname"].
                    "</div>".
                    "<div>".
                    "<label class=\"ausgabe_user\"></label>".$zeile["email"].
                    "</div>".

                    "</div>";/*ENDE verfasserEintrag*/
            }

            $this->schliesseVerbindung();
        }

    }


