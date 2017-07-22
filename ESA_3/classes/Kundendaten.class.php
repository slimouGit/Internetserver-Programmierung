<?php

/**
 * Klasse fuer den Kundendatensatz
 *
 * @author Manuel Bogus, chaostype@gmx.de
 * @author Salim Oussayfi, oussayfi@gmail.com
 *
 *
 * @version 1.00 01/2016
 *
 */

class Kundendatensatz {

    // Array zum speichern des Radiobuttuonstatus
    private $checkedRadio = array("","","","","");
    // Variable zur Speicherung der Bewertung
    private $ranking = "*****";
    // Array zum Speichern des Kundendatensatzes [verfasser_vorname, verfasser_nachname, email, vorname, nachname, job, ort, headline, image, kommentar, bewertung]
    private $Daten = array("","","","","","","","","","","");
    // Array zum Speichern der Fehlermeldungen [verlasser_vornameErr, verfasser_nachnameErr, emailErr, vornameErr, nachnameErr, jobErr, ortErr, headlineErr, imageErr, kommentarErr, bewertungErr]
    private $Fehler = array("","","","","","","","","","","");
    // Array der vordefinierten Fehlermeldungen
    private $Fehlertexte = array("Bitte gib Deinen Vornamen an.", "Bitte gib Deinen Nachnamen an.", "Bitte gib eine korrekte E-Mail-Adresse ein." ,
        "Bitte den Vornamen angeben", "Bitte den Namen angeben", "Womit beschäftigt sie die Person?",
        "Bitte einen Ort angeben", "Bitte eine Überschrift formulieren","Bitte gib Deine E-Mail-Adresse an.","Bitte ein Kommentar abgeben",
        "Bitte eine Bewertung abgeben");


    /**
     * Hilsmethode zur Ueberpruefung der eingegebenen Daten
     *
     * @param   data: Eingabedaten
     *
     * @return Eingabedaten
     */

    private function test_input($data)
    {
        // entfernt Leerzeichen am Anfang und am Ende des String
        $data = trim($data);
        // Entfernt Maskierungszeichen aus einem String
        $data = stripslashes($data);
        // Wandelt Sonderzeichen in HTML-Codes um
        $data = htmlspecialchars($data);
        // Rueckgabe des Strings
        return $data;
    }

    /**
     * Methode liefert Datensatzarray
     *
     * @return Kundendatensatzarray
     */

    public function getDaten()
    {
        return $this->Daten;
    }

    /**
     * Methode liefert Fehlerarray
     *
     * @return Fehlerarray
     */

    public function getFehler()
    {
        return $this->Fehler;
    }

    /**
     * Methode liefert Radiobuttonarray
     *
     * @return Radiobuttonarray
     */

    public function getCheckedRadio()
    {
        return $this->checkedRadio;
    }

    /**
     * Methode zur Ueberpruefung des Eingabestrings im Textfeld
     *
     * @param   Pruefvariable: gibt an welche Variable in dem Poststring geprueft werden soll
     *          Feldindex: gibt an welches Feld in dem Arrays zu belegen ist
     *
     * @return Pruefwert
     */

    public function pruefeText($Pruefvariable, $Feldindex){
        // prueft ob etwas im Feld eingegeben wurde
        if (empty($_POST[$Pruefvariable])) {
            // wenn keine Eingabe erfolgte wird der Entsprechende Fehler im Array hinterlegt und der Fehler zurueckgemeldet
            $this->Fehler[$Feldindex] = $this->Fehlertexte[$Feldindex];
            return 10;
        } else {
            // speichert die bereinigte Eingabe im Array an entsprechender Stelle
            $this->Daten[$Feldindex] = $this->test_input($_POST[$Pruefvariable]);
        }
    }

    /**
     * Methode zur Ueberpruefung des Eingabestrings im EMailfeld
     *
     * @param   Pruefvariable: gibt an welche Variable in dem Poststring geprueft werden soll
     *          Feldindex: gibt an welches Feld in dem Arrays zu belegen ist
     *
     * @return Pruefwert
     */

    public function pruefeMail($Pruefvariable, $Feldindex)
    {
        // prueft ob etwas im Feld eingegeben wurde
        if (empty($_POST[$Pruefvariable])) {
            // wenn keine Eingabe erfolgte wird der Entsprechende Fehler im Array hinterlegt und der Fehler zurueckgemeldet
            $this->Fehler[$Feldindex] = $this->Fehlertexte[$Feldindex+6];
            return 10;
        }
        // prueft ob die EMail das richtige Format hat
        elseif(!filter_var($_POST[$Pruefvariable], FILTER_VALIDATE_EMAIL)) {
            // wenn die Mail das falsche Format hat wird der Entsprechende Fehler im Array hinterlegt und der Fehler zurueckgemeldet
            $this->Fehler[$Feldindex] = $this->Fehlertexte[$Feldindex];
            $this->Daten[$Feldindex] = $_POST[$Pruefvariable];
            return 10;
        }else {
            // speichert die bereinigte Eingabe im Array an entsprechender Stelle
            $this->Daten[$Feldindex] = $this->test_input($_POST[$Pruefvariable]);
        }
    }

    /**
     * Methode zur Ueberpruefung des Eingabestrings im Bewertungsfeld
     *
     * @param   Pruefvariable: gibt an welche Variable in dem Poststring geprueft werden soll
     *          Feldindex: gibt an welches Feld in dem Arrays zu belegen ist
     *
     * @return Pruefwert
     */

    public function pruefeBewertung($Pruefvariable, $Feldindex)
    {
        // prueft ob etwas im Feld eingegeben wurde
        if (empty($_POST[$Pruefvariable])) {
            // wenn keine Eingabe erfolgte wird der Entsprechende Fehler im Array hinterlegt und der Fehler zurueckgemeldet
            $this->Fehler[$Feldindex] = $this->Fehlertexte[$Feldindex];
            return 10;
        } else {
            // speichert den entsprechenden SubString im Array an entsprechender Stelle
            $this->Daten[$Feldindex] = substr($this->ranking, 0, ($_POST[$Pruefvariable]));
            // versieht den ausgewaehlten Radiobutton mit dem checked Attribut
            $this->checkedRadio[($_POST[$Pruefvariable])-1] = "checked";
        }
    }

    /**
     * Methode zum einlesen des Bildes und speichern des Bildpfades im Array
     *
     * @param   Pruefvariable: gibt an welche Variable in dem Poststring geprueft werden soll
     *          Feldindex: gibt an welches Feld in dem Arrays zu belegen ist
     *
     * @return Pruefwert
     */
    public function ladeBild($Feldindex)
    {
        // legt das Uploadverzeichnis fuer die Bilder fest
        $uploaddir = 'images/';
        // setzt den kompletten Speciherpfad des Bildes zusammen
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        // kopiert das Bild an die entsprechende Stelle
        move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
        // schreibt den Pfad in das Array an die entsprechende Stelle
        $this->Daten[$Feldindex] = $uploadfile;
    }
}

