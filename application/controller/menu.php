<?php


class Menu extends Controller
{
    /**
     * PAGE: Home
     */
    public function index()
    {
        // Getting All par catégorie
        $categoryStarters = $this->model->getAllCategoryStarters();
        $categorieMains = $this->model->getAllCategoryMains();
        $categoryDesserts = $this->model->getAllCategoryDesserts();

        

        // load views
        require APP . 'view/_templates/header.phtml';
        require APP . 'view/menu.phtml';
        require APP . 'view/_templates/footer.phtml';
    }

}