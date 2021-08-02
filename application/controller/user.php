<?php

class User extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
       // Chargement des views
        require APP . 'view/_templates/footer.phtml';
    }


    public function addNewsletters()
    {
        // Si données POST alors nouvelle entrée
        if (isset($_POST["submit_add_newsletters"])) 
        {
            $this->model->addNewsletters($_POST["email"], $_POST["nom"]);
        }
        // Redirection
        header('location: ' . URL . 'home');
    }

}