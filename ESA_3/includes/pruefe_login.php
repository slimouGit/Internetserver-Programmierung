<?php

            require "classes/Userdaten.class.php";
            $UserDatensatz = new User();
            $fehlerLogIn = false;


            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if($UserDatensatz->pruefeLogIn("benutzername", 0) == 10) $fehlerLogIn = true;
                if($UserDatensatz->pruefeLogIn("passwort", 1) == 10) $fehlerLogIn = true;

            }
?>