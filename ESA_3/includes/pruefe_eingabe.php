<?php


require "classes/Kundendaten.class.php";
$Datensatz = new Kundendatensatz();
$fehler = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if($Datensatz->pruefeText("verfasser_vorname", 0) == 10) $fehler = true;
    if($Datensatz->pruefeText("verfasser_nachname", 1) == 10) $fehler = true;
    if($Datensatz->pruefeMail("email", 2) == 10) $fehler = true;
    if($Datensatz->pruefeText("vorname", 3) == 10) $fehler = true;
    if($Datensatz->pruefeText("nachname", 4) == 10) $fehler = true;
    if($Datensatz->pruefeText("job", 5) == 10) $fehler = true;
    if($Datensatz->pruefeText("ort", 6) == 10) $fehler = true;
    if($Datensatz->pruefeText("headline", 7) == 10) $fehler = true;
    if($Datensatz->pruefeText("kommentar", 9) == 10) $fehler = true;
    if($Datensatz->pruefeBewertung("bewertung",10) == 10) $fehler = true;
    $Datensatz->ladeBild(8);
}
?>