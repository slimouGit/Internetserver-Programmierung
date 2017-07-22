<?php

/**
 * Adapterklasse zur Ausgabe der erweiterten Mitarbeiterdaten der Webentwickler ohne Vererbung
 *
 * @author Manuel Bogus, chaostype@gmx.de
 * @author Salim Oussayfi, oussayfi@gmail.com
 *
 *
 * @version 1.00 01/2016
 *
 */

class Verantwortliche_ergaenzt

{

    private $DatenPerson,$email,$matrikelnummer;

    /**
     * Konstruktor
     *
     * @param   Daten_Person: originales Mitarbeiterobjekt
     *          matrikelnummer: Matrikelnummer des Mitarbeiters
     *          email: Email des Mitarbeiters
     *
     */

    public function __construct(Verantwortliche $DatenPerson,$matrikelnummer, $email)
    {
        $this->DatenPerson = $DatenPerson;
        $this->matrikelnummer = $matrikelnummer;
        $this->email = $email;
    }

    /**
     * Methode zur Ausgabe der Mitarbeiterdaten
     *
     *
     */

    public function ausgebenVerantwortliche()
    {

        // Ausgabe der Standarddaten
        $this->DatenPerson->ausgebenDaten();

        echo
            /* --------------- AUSGABE Kontakt ---------------*/
            "<div class=\"ausgabeKontakt\">".
            "<label class=\"kontakt\">Matrikel-Nr:</label>".$this->matrikelnummer.
            "</div>".
            "<div class=\"ausgabeKontakt\">".
            "<label class=\"kontakt\">E-Mail:</label>".$this->email.
            "</div>";
    }
}


