<?php

/**
 * Klasse zum verwalten und ausfuehren des Datenbankzugriffs mit Singleton Pattern
 *
 * @author Manuel Bogus, chaostype@gmx.de
 * @author Salim Oussayfi, oussayfi@gmail.com
 *
 *
 * @version 1.00 01/2016
 *
 */

class Nutzerdatenbank {

    // Variablen fuer Datenbankdaten
    private $servername , $dbname , $username , $password, $connection;

    // Instanzvariable
    protected static $instance = null;

    /**
     * Methode verhindert das weitere erzeugen eines Objektes durch cloning
     *
     */

    protected function __clone()
    {
    }

    /**
     * Methode prueft ob es bereits ein Objekt dieser Art gibt und erstellt eines
     * wenn es nicht so ist
     *
     * @param   servername: URL bzw IP des DB Servers
     *          dbname: Name der Datenbak
     *          username: Benutzername des Datenbankusers
     *          password: Passwort des Datenbankusers
     *
     * @return Datenbankobjekt
     */

    public static function getInstance($servername , $dbname , $username , $password)
    {
        // Pruefung ob es bereits ein Objekt dieses Typs gibt
        if (!isset(self::$instance)) {
            // erstellen eines neuen Objektes
            self::$instance = new self($servername , $dbname , $username , $password);
        }
        // Rueckgabe von sich selbst
        return self::$instance;
    }

    /**
     * Konstruktor
     *
     * @param   servername: URL bzw IP des DB Servers
     *          dbname: Name der Datenbak
     *          username: Benutzername des Datenbankusers
     *          password: Passwort des Datenbankusers
     *
     */

    protected function __construct($servername , $dbname , $username , $password)
    {
        // zuweisen der Objektattribute
        $this->servername = $servername;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Methode zum etablieren der Datenbankverbindung
     *
     */

    private function oeffneVerbindung()
    {
        // erstellen des Datenbankobjektes
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Pruefen ob Datenbank erreichbar
        if ($this->connection->connect_error) die("Connection failed: " . $this->connection5->connect_error);
    }

    /**
     * Methode zum schliessen der Datenbankverbindung
     *
     */

    private function schliesseVerbindung()
    {
        // schliessen der DB Verbindung
        $this->connection->close();
    }


    /**
     * Methode zum Zaehlen der eingetragenen Kundendatensaetze
     *
     * @return Anzahl der Datensaetze
     */

    public function datenZaehlen()
    {
        // oeffnen der Datenbankverbindung
        $this->oeffneVerbindung();
        // erstellen der DB Abfrage
        $Abfrage = "SELECT * FROM bedemi_data";
        // zwischenspeichern der Tupelanzahl
        $hilf = $this->connection->query($Abfrage)->num_rows;
        // schliessen der Datenbankverbindung
        $this->schliesseVerbindung();
        // Rueckgabe der Tupelanzahl
        return $hilf;
    }

    /**
     * Methode zum einfuegen neuer Kundedatensaetze in die Datenbank
     *
     * @param   fehler: boolean fuer Fehleingabe
     *          verfasser_vorname: Vorname des Verfassers
     *          verfasser_nachname: Nachname des Verfassers
     *          email: EMail des Verfassers
     *          vorname: Vorname des Kunden
     *          nachname: Nachname des Kunden
     *          job: Beruf des Kunden
     *          ort: Wohnort des Kunden
     *          headline: Beschreibendes Wort
     *          kommentar: Kommentar zu dem Kunden
     *          bewertung: Bewertung des Kunden
     *          image: Bild des Kunden
     *
     * @return HTML String
     */

    public function eintragenDatensaetze($fehler, $verfasser_vorname , $verfasser_nachname , $email ,
                                         $vorname , $nachname , $job ,  $ort ,  $headline , $kommentar ,
                                         $bewertung, $image)
    {
        // oeffnen der Datenbankverbindung
        $this->oeffneVerbindung();
        // pruefe ob es einen Post gibt und ob eine Fehleingabe vorliegt
        if(isset($_POST['eintragen']) && (!$fehler)) {
            // erstellen der DB Abfrage
            $Abfrage = "INSERT INTO bedemi_data
                            (verfasser_vorname, verfasser_nachname, email, vorname, nachname,
                            job, ort, headline, kommentar, bewertung, image)
                            VALUES
                            ('$verfasser_vorname', '$verfasser_nachname', '$email', '$vorname', '$nachname',
                            '$job', '$ort', '$headline', '$kommentar', '$bewertung', '$image')";
            // pruefen ob der Eintrag erfolgreich war
            if ($this->connection->query($Abfrage) === TRUE) {
                // Rueckgabe der Erfolgsmeldung
                return "<span id=\"erfolg\">Eintrag wurde erstellt.</span>".
                "<a class=\"zu_den_Eintraegen\" href=\"bedemi_ausgabe.php\">Eintrag anschauen >>></a>";
            } else {
                // Rueckgabe einer Fehlermeldung
                return "Fehler: " . $Abfrage . "<br>" . $this->connection->error;
            }
        }
        // schliessen der Datenbankverbindung
        $this->schliesseVerbindung();
    }

    /**
     * Methode zum ausgeben der Kundedatensaetze aus der Datenbank
     *
     */

    public function ausgebenDatensaetze()
    {
        // oeffnen der Datenbankverbindung
        $this->oeffneVerbindung();
        // erstellen der DB Abfrage
        $Abfrage = "SELECT * FROM bedemi_data ORDER BY id desc";
        // ausfuehren der DB Abfrage
        $ergebnisAbfrage = $this->connection->query($Abfrage);

        /**
         * Hilsmethode zum erstellen eines IMG HTML Strings
         *
         * @param   data: Bildpfad
         *
         * @return HTML String
         */

        function bildAusgaben($data)
        {
            $hilf = "<img src=";
            $hilf1 = '"';
            $hilf2 = "height = '100px' >";
            // Stringkombination erstellen
            $bild = $hilf . $hilf1 . $data . $hilf1 . $hilf2;
            // Stringrueckgabe
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
        // schliessen der Datenbankverbindung
        $this->schliesseVerbindung();
    }

    /**
     * Methode zum einfuegen neuer Kundedatensaetze in die Datenbank
     *
     * @param   fehler: boolean fuer Fehleingabe
     *          benutzername: Benutzername des Users
     *          passwort: Passwort des Users
     *
     */

    public function verarbeiteLogIn($fehler,$benutzername,$passwort)
    {
        // oeffnen der Datenbankverbindung
        $this->oeffneVerbindung();
        // pruefe ob es einen Post gibt und ob eine Fehleingabe vorliegt
        if (isset($_POST['login']) && (!$fehler)) {
            // erstellen der DB Abfrage
            $abfrage = "SELECT benutzername, passwort FROM bedemi_user WHERE benutzername LIKE '$benutzername' LIMIT 1";
            // ausfuehren der DB Abfrage
            $ergebnis = $this->connection->query($abfrage);
            // schliessen der Datenbankverbindung
            $this->schliesseVerbindung();
            // erstellen eines Array aus den Abfragetupeln
            $zeile = $ergebnis->fetch_assoc();
            // pruefen ob das Passwort korrekt
            if ($zeile["passwort"] == $passwort) {
                // Session wird initialisiert
                $_SESSION["benutzername"] = $benutzername;
                // ausgeben der Erfolgsmeldung und Weiterleitung
                echo "<span class=\"error\">Login erfolgreich, Du wirst sofort weitergeleitet.</span>" .
                    "<meta http-equiv='refresh' content='3; url=bedemi_ausgabe.php'";
            } else {
                // Fehlerausgabe
                echo "<span class=\"error\">Benutzername und/oder Passwort waren falsch.</span>";
            }

        }
    }
}

?>

