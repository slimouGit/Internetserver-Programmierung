<?php

/**
 * Klasse fuer den Userdatensatz
 *
 * @author Manuel Bogus, chaostype@gmx.de
 * @author Salim Oussayfi, oussayfi@gmail.com
 *
 *
 * @version 1.00 01/2016
 *
 */

class User {

    // Array zum Speichern des Kundendatensatzes (Benutzername / Passwort)
    private $Userdaten = array("","");
    // Array zum Speichern der Fehlermeldungen (BenutzernameErr / PasswortErr)
    private $Fehler = array("","");
    // Array der vordefinierten Fehlermeldungen
    private $Fehlertexte = array("Bitte gib Deinen Benutzernamen ein.","Bitte gib Dein Passwort ein.");

    /**
     * Methode zur ?berpr?fung des Benutzername und Passwort im Textfeld
     *
     * @param   Pruefvariable: gibt an welche Variable in dem Poststring gepr?ft werden soll
     *          Feldindex: gibt an welches Feld in dem Arrays zu belegen ist
     *
     * @return Pruefwert
     */

    public function pruefeLogIn($Pruefvariable, $Feldindex)
    {
        // prueft ob etwas im Feld eingegeben wurde
        if (empty($_POST[$Pruefvariable])) {
            // wenn keine Eingabe erfolgte wird der Entsprechende Fehler im Array hinterlegt und der Fehler zurueckgemeldet
            $this->Fehler[$Feldindex] = $this->Fehlertexte[$Feldindex];
            return 10;
        } else {
            // speichert die bereinigte Eingabe im Array an entsprechender Stelle
            $this->Userdaten[$Feldindex] = $_POST[$Pruefvariable];
        }
    }

    /**
     * Methode liefert Datensatzarray
     *
     * @return UserDatensatzArray
     */

    public function getUserdaten()
    {
        return $this->Userdaten;
    }

    /**
     * Methode liefert Fehlerarray
     *
     * @return FehlerdatensatzArray
     */

    public function getFehler()
    {
        return $this->Fehler;
    }
}

