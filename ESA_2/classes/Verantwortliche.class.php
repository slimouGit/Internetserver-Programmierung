<?php

class Verantwortliche {
    
    private $bild;
    private $vorname;
    private $nachname;
    private $position;
    private $matrikelnummer;
    private $email;
    
    
    public function __construct($bild, $vorname, $nachname, $position, $matrikelnummer, $email) {
        $this->bild = $bild;
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->position = $position;
        $this->matrikelnummer = $matrikelnummer;
        $this->email = $email;
    }
    
  
    public function impressum_Person()
        {
        echo 
            /* --------------- AUSGABE Bild ---------------*/
            "<div class=\"ausgabeBild\">"."<img src=". $this->bild.">"."</div>".
            
            /* --------------- AUSGABE Name ---------------*/
            "<div class=\"ausgabeName\">".$this->vorname." ".$this->nachname."</div>".
            
            /* --------------- AUSGABE Position ---------------*/                
            "<div class=\"ausgabePosition\">".$this->position."</div>".
            
            /* --------------- AUSGABE Kontakt ---------------*/
            "<div class=\"ausgabeKontakt\">".
                "<label class=\"kontakt\">Matrikel-Nr:</label>".$this->matrikelnummer.
            "</div>".
            "<div class=\"ausgabeKontakt\">".
                "<label class=\"kontakt\">E-Mail:</label>".$this->email.
            "</div>";
        }
        
    //--------------------------------------------------------------------------------------
        
}//ENDE Klasse

?>