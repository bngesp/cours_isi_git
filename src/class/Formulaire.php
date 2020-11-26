<?php
class Formulaire{
    protected $method;
    protected $action;

    function __construct(string $method, string $action)
    {
        $this->method = $method;
        $this->action = $action;
    }

    public function headerForm(){
        return "<form action=\"$this->action\" method=\"$this->method\">";
    }

    public function footerForm(){
        return "</form>";
    }


    public function label(string $label_name){
        return "
            <label class=\"form-label\">$label_name</label>
        ";
    }

    public function input(string $name, string $type = 'text'){
        return "<input type=\"$type\" name=\"$name\" class=\"form-control\" >";
    }

    public function bouton(string $name, string $type = 'button', string $class_css) {
        return  "<button type=\"$type\" name=\"$name\" class=\"btn btn-$class_css\" >$name </button>";
    }
}