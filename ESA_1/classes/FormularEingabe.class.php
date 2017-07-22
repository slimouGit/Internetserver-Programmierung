<?php

class FormularEingabe {
  
     public function form_Field($text, $name, $value, $error)
        {
        echo 
        "<div class=\"form-group\">".
            "<input type=\"text\" placeholder=\"$text\" name=\"$name\"  value=\"$value\" class=\"form-control\" />".
            "<div class=\"error\">".$error."</div>".
        "</div>";
        }
    
    //--------------------------------------------------------------------------------------
    
    public function form_Textfield($text, $name, $value, $error)
        {
        echo 
        "<div class=\"form-group\">".
            "<textarea rows=\"5\" placeholder=\"$text\" name=\"$name\"  value=\"$value\" class=\"form-control\" /></textarea>".
            "<div class=\"error\">".$error."</div>".
        "</div>";
        }
    //--------------------------------------------------------------------------------------
    
    public function radio_Button($name, $value, $error)
        {
        echo 
        "<label>".
            "<input name=\"$name\" value=\"$value\" type=\"radio\">"." "."$value".
            "<span class=\"error\">".$error."</span>".
        "</label>";
        }
    //--------------------------------------------------------------------------------------    
    
    public function sende_Button($typ, $name, $value)
        {
        echo  
        "<div class=\"button_Formular\">".
            " <input type=\"$typ\" class=\"btn btn-danger\" name=\"$name\" value=\"$value\" />".
        "</div>";
        }
        
}//ENDE Klasse

?>