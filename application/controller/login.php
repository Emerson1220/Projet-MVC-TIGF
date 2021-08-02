<?php


class Login extends Controller
{
    /**
     * PAGE: Login
     */
    public function index()
    {
        // load views
        require APP . 'view/login.phtml';
    }

    public function __construct()
    {
        parent::__construct();
        // lecture de la session
        session_start();

        // Si click sur bouton déconnexion -> fonction
        if (isset($_GET["submit_logout"])) {
            $this->logout();
        }
        // Si clmick sur bouton connexion -> fonction
        elseif (isset($_POST["submit_login"])) {
            $this->getLogin();
        }
    }



    public function getLogin()
    {
        // Vérifie si les données du formulaire sont définies
        if(!isset($_POST['username'])
        ||!isset($_POST['password'])
        ||empty($_POST['username'])
        ||empty($_POST['password']))

        {
            // var_dump($_POST);
            // die;

            // Si le formulaire n'est pas correctement rempli, redirigez vers le formulaire de connexion avec une erreur
            // header('location: ' . URL . 'loginError');
            echo ('Formulaire non rempli');
        }
        else 
        {
            // Obtenir des informations de la BDD
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user= $this->model->getLogin($username,$password );
            // var_dump($user);
            // die;

            // Si le pseudo n'existe pas
            if($user == false)
  
            {
                // Rediriger vers le formulaire de connexion avec une erreur
                // header('location: ' . URL . 'loginError');
                echo ('Pseudo inexistant');
            }
            // si le pseudo existe
            else
            {

                /*****************  WARNING  *****************/
                // Si le mot de passe est vérifié
                // var_dump(password_verify($password,$user['password']));
                // die;


                if(password_verify($password,$user['password']))
                {

                    // Définition de la session
                    header('location: ' . URL . 'dashboard');
                }
                /***************** END WARNING  *****************/
                
                // Si le mot de passe ne correspond pas
                else
                {
                    // Rediriger vers le formulaire de connexion avec une erreur
                    // header('location: ' . URL . 'loginError');
                    echo ('Mot de pass incorrect');
                }
    
            }
        }
    }

    
    public function logout()
    {
        // Supprimer les informations sur les sessions.
        session_destroy();  
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        header("location:home");  
    }
}





