<?php

/**
 * Klasse zur Ausgabe der Mitarbeiter der Webentwickler
 *
 * @author Manuel Bogus, chaostype@gmx.de
 * @author Salim Oussayfi, oussayfi@gmail.com
 *
 *
 * @version 1.00 01/2016
 *
 */

class Verantwortliche {

    private $bild;
    private $vorname;
    private $nachname;
    private $position;

    /**
     * Konstruktor
     *
     * @param   bild: Pfad zum Bild des Mitarbeiters
     *          vorname: Vorname des Mitarbeiters
     *          nachname: Nachname des Mitarbeiters
     *          position: Stelle des Mitarbeiters
     *
     */

    public function __construct($bild, $vorname, $nachname, $position)
    {
        $this->bild = $bild;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->position = $position;
    }

    /**
     * Methode zur Ausgabe der Mitarbeiterdaten
     *
     *
     */

    public function ausgebenDaten()
    {
        echo
            /* --------------- AUSGABE Bild ---------------*/
            "<div class=\"ausgabeBild\">"."<img src=". $this->bild.">"."</div>".

            /* --------------- AUSGABE Name ---------------*/
            "<div class=\"ausgabeName\">".$this->vorname." ".$this->nachname."</div>".

            /* --------------- AUSGABE Position ---------------*/
            "<div class=\"ausgabePosition\">".$this->position."</div>";
    }
}

