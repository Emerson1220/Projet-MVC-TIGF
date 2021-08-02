<?php


class Home extends Controller
{
    /**
     * PAGE: Home
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.phtml';
        require APP . 'view/home.phtml';
        require APP . 'view/_templates/footer.phtml';
    }

}