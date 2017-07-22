<?php

/**
 * Klasse zum bereitstellen der Eingabeformulare
 *
 * @author Manuel Bogus, chaostype@gmx.de
 * @author Salim Oussayfi, oussayfi@gmail.com
 *
 *
 * @version 1.00 01/2016
 *
 */

class FormularEingabe {

    /**
     * Methode zum erstellen eines Eingabefeldes
     *
     * @param   text: Text fuer Platzhalter
     *          name: Name des Eingabefeldes
     *          value: Eingabetext des Feldes
     *          error: Fehlertext
     *
     */

    public function form_Field($text, $name, $value, $error)
    {
        echo
            "<div class=\"form-group\">".
            "<input type=\"text\" placeholder=\"$text\" name=\"$name\"  value=\"$value\" class=\"form-control\" />".
            "<div class=\"error\">".$error."</div>".
            "</div>";
    }

    /**
     * Methode zum erstellen eines Eingabefeldes fuer das Passwort
     *
     * @param   text: Text fuer Platzhalter
     *          name: Name des Eingabefeldes
     *          value: Eingabetext des Feldes
     *          error: Fehlertext
     *
     */

    public function form_Password($text, $name, $value, $error)
    {
        echo
            "<div class=\"form-group \">".
            "<input type=\"password\" placeholder=\"$text\" name=\"$name\"  value=\"$value\" class=\"form-control\" />".
            "<div class=\"error\">".$error."</div>".
            "</div>";
    }

    /**
     * Methode zum erstellen eines Eingabefeldes fuer eine Bilddatei
     *
     * @param   text: Text fuer Platzhalter
     *          name: Name des Eingabefeldes
     *          value: Eingabetext des Feldes
     *          error: Fehlertext
     *
     */

    public function form_Image($text, $name, $value, $error)
    {
        echo
            "<div class=\"form-group image_upload btn-file\">".
            "<input type=\"file\" placeholder=\"$text\" name=\"$name\"  value=\"$value\" class=\"form-control\" />".
            "<div class=\"error\">".$error."</div>".
            "</div>";
    }

    /**
     * Methode zum erstellen eines Eingabefeldes
     *
     * @param   text: Text fuer Platzhalter
     *          name: Name des Eingabefeldes
     *          value: Eingabetext des Feldes
     *          error: Fehlertext
     *
     */

    public function form_Textfield($text, $name, $value, $error)
    {
        echo
            "<div class=\"form-group\">".
            "<textarea rows=\"5\" placeholder=\"$text\" name=\"$name\" class=\"form-control\" />".$value."</textarea>".
            "<div class=\"error\">".$error."</div>".
            "</div>";
    }
    /**
     * Methode zum erstellen eines Radiobuttons
     *
     * @param   name: Name des Radiobutton
     *          value: Bezeichnung des Radiobutton
     *          error: Eingabetext des Feldes
     *          checked: gibt an ob Radiobutton aktiv
     *
     */

    public function radio_Button($name, $value, $error, $checked)
    {
        echo
            '<label>'.
            '<input name="'. $name .'" value="'. $value .'" type="radio" '.$checked.' > ' . " " . $value .
            '<span class="error">'.$error.'</span>'.
            '</label>';
    }

    /**
     * Methode zum erstellen eines Button
     *
     * @param   type: Art des Button
     *          name: Name des Button
     *          value: Text des Button
     *
     */

    public function sende_Button($typ, $name, $value)
    {
        echo
            "<div class=\"button_Formular\">".
            " <input type=\"$typ\" class=\"btn btn-danger\" name=\"$name\" value=\"$value\" />".
            "</div>";
    }

}

