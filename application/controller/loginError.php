<?php


class LoginError extends Controller
{
    /**
     * PAGE: Home
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.phtml';
        require APP . 'view/problem/loginError.phtml';
        require APP . 'view/_templates/footer.phtml';
    }

}