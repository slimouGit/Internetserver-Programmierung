<?php
    if(isset($_POST['login']) && (!$fehler)) {

        $conn = $datenbankVerbindung->verbindenFuerLogIn();
                    
        /* -------------- DATENBANK ----------------------*/

        $abfrage = "SELECT benutzername, passwort FROM bedemi_user WHERE benutzername LIKE '$benutzername' LIMIT 1";
        $ergebnis = $conn->query($abfrage);
        $row = $ergebnis->fetch_assoc();
        $datenbankVerbindung->schliessenFuerLogIn();
        if($row["passwort"] == $passwort)
            {
                            
            //Session wird initialisiert
            $_SESSION["benutzername"] = $benutzername;
                        
            echo "<span class=\"error\">Login erfolgreich, Du wirst sofort weitergeleitet.</span>".
                 "<meta http-equiv='refresh' content='3; url=bedemi_ausgabe.php'";
            }
                else
                    {
                    echo "<span class=\"error\">Benutzername und/oder Passwort waren falsch.</span>";
                    }

            }


?>