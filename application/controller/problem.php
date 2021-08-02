<?php

class Problem extends Controller
{

    public function index()
    {
        // load views
        require APP . 'view/_templates/header.phtml';
        require APP . 'view/problem/index.phtml';
        require APP . 'view/_templates/footer.phtml';
    }
}
