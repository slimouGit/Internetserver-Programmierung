<?php

class FormularEingabe {
    
    private $text;
    private $name;
    private $value;
    private $error;
    private $typ;
  
    public function form_Field($text, $name, $value, $error)
        {
        echo 
        "<div class=\"form-group\">".
            "<input type=\"text\" placeholder=\"$text\" name=\"$name\"  value=\"$value\" class=\"form-control\" />".
            "<div class=\"error\">".$error."</div>".
        "</div>";
        }
    
    //--------------------------------------------------------------------------------------
    
    public function form_Password($text, $name, $value, $error)
        {
        echo 
        "<div class=\"form-group \">".
            "<input type=\"password\" placeholder=\"$text\" name=\"$name\"  value=\"$value\" class=\"form-control\" />".
            "<div class=\"error\">".$error."</div>".
        "</div>";
        }
        
    //--------------------------------------------------------------------------------------
    
    public function form_Image($text, $name, $value, $error)
        {
        echo 
        "<div class=\"form-group image_upload btn-file\">".
            "<input type=\"file\" placeholder=\"$text\" name=\"$name\"  value=\"$value\" class=\"form-control\" />".
            "<div class=\"error\">".$error."</div>".
        "</div>";
        }
    
    //--------------------------------------------------------------------------------------
    
    public function form_Textfield($text, $name, $value, $error)
        {
        echo 
        "<div class=\"form-group\">".
            "<textarea rows=\"5\" placeholder=\"$text\" name=\"$name\" class=\"form-control\" />".$value."</textarea>".
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