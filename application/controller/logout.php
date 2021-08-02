<?php


class Logout extends Controller
{
    /**
     * PAGE: Login
     */
    public function index()
    {
        // load views
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





