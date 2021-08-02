<?php


class Contact extends Controller
{
    /**
     * PAGE: Contact
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.phtml';
        require APP . 'view/contact.phtml';
        require APP . 'view/_templates/footer.phtml';
    }
}