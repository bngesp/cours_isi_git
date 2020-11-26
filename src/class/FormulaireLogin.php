<?php

class FormulaireLogin extends Formulaire
{
    function __construct(string $action, string $method)
    {
        parent::__construct($method, $action);
        
    }

    public function buildLoginForm(){
        $form = '';

        $form = $this->headerForm();
            $form.= '<div class="form-group">';
                $form.= $this->label("login");
                $form.= $this->input("login");
            $form.= '</div>';
            $form.= '<div class="form-group">';
                $form.= $this->label("password");
                $form.= $this->input("password", "password");
            $form.= '</div>';
            $form.= '<div class="form-group">';
                $form.= $this->bouton("Connexion", "submit", "primary");
                $form.= $this->bouton("Annuler", "reset", "danger");
            $form.= '</div>';
        $form.= $this->footerForm(); // $form = $form . $this->headerForm()

        return $form;
       
    }

}