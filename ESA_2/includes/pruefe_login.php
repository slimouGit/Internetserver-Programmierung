<?php

$fehler = false;

            $benutzernameErr = $passwortErr = "";
            $benutzername = $passwort = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                if (empty($_POST["benutzername"])) {
                $benutzernameErr = "Bitte gib Deinen Benutzernamen ein.";
                $fehler = true;
                } else {
                $benutzername = $_POST["benutzername"];
                }
                
                if (empty($_POST["passwort"])) {
                $passwortErr = "Bitte gib Dein Passwort ein.";
                $fehler = true;
                } else {
                $passwort = $_POST["passwort"];
                }
            }
?>