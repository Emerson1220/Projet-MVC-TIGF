<?php

class UserAdmin extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
       // Chargement des views
       require APP . 'view/_templates/header.phtml';
       require APP . 'view/dashboard/index.phtml';
  }


    public function addNewUser()
    {
        // Si données POST alors nouvelle entrée
        if (isset($_POST["submit_add_user"]))
        {
            $password = $_POST['password'] = password_hash($_POST['password'], PASSWORD_ARGON2I,['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 3]);
            $this->model->addNewUser($_POST["username"], $_POST["usermail"], $_POST["password"]);
        }
        // Redirection
        header('location: ' . URL . 'dashboard');
    }

}