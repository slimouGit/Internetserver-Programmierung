<?php

$fehler = false;
$ranking = "*****";

            $verfasser_vornameErr = $verfasser_nachnameErr = $emailErr = $vornameErr = $nachnameErr = $jobErr = $ortErr = $headlineErr = $kommentarErr = $bewertungErr = "";
            $verfasser_vorname = $verfasser_nachname = $email = $vorname = $nachname = $job = $ort = $headline = $kommentar = $bewertung = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                if (empty($_POST["verfasser_vorname"])) {
                $verfasser_vornameErr = "Bitte gib Deinen Vornamen an.";
                $fehler = true;
                } else {
                $verfasser_vorname = test_input($_POST["verfasser_vorname"]);
                }
                
                if (empty($_POST["verfasser_nachname"])) {
                $verfasser_nachnameErr = "Bitte gib Deinen Nachnamen an.";
                $fehler = true;
                } else {
                $verfasser_nachname = test_input($_POST["verfasser_nachname"]);
                }
                
                if (empty($_POST["email"])) {
                $emailErr = "Bitte gib Deine E-Mail-Adresse an.";
                } elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Bitte gib eine korrekte E-Mail-Adresse ein.";
                $fehler = true;
                }else {
                $email = test_input($_POST["email"]);
                }
                
                if (empty($_POST["vorname"])) {
                $vornameErr = "Bitte den Vornamen angeben";
                $fehler = true;
                } else {
                $vorname = test_input($_POST["vorname"]);
                }
                
                if (empty($_POST["nachname"])) {
                $nachnameErr = "Bitte den Namen angeben";
                $fehler = true;
                } else {
                $nachname = test_input($_POST["nachname"]);
                }
                
                if (empty($_POST["job"])) {
                $jobErr = "Womit beschäftigt sie die Person?";
                $fehler = true;
                } else {
                $job = test_input($_POST["job"]);
                }
                
                if (empty($_POST["ort"])) {
                $ortErr = "Bitte einen Ort angeben";
                $fehler = true;
                } else {
                $ort = test_input($_POST["ort"]);
                }
                
                if (empty($_POST["headline"])) {
                $headlineErr = "Bitte eine Überschrift formulieren";
                $fehler = true;
                } else {
                $headline = test_input($_POST["headline"]);
                }
                
                if (empty($_POST["kommentar"])) {
                $kommentarErr = "Bitte ein Kommentar abgeben";
                $fehler = true;
                } else {
                $kommentar = test_input($_POST["kommentar"]);
                }
                
                if (empty($_POST["bewertung"])) {
                $bewertungErr = "Bitte eine Bewertung abgeben";
                $fehler = true;
                } else {
                $bewertung = test_input(substr($ranking, 0, ($_POST["bewertung"])));
                /*$bewertung = ($_POST["bewertung"]);*/
                }
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
?>