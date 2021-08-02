<?php

class Dashboard extends Controller
{
    /**
     * PAGE: Dashboard
     */
    public function index()
    {   
        // Lire // Appel fonction
        $menus = $this->model->getAllMenus();
        $users = $this->model->getAllUsers();
        $newsletters = $this->model->getAllNewsletters();

        // Count /: Appel fonction
        $amount_of_menus = $this->model->getAmountOfMenus();
        $amount_of_cat_starters = $this->model->getAmountOfStarters();
        $amount_of_cat_mains = $this->model->getAmountOfMains();
        $amount_of_cat_desserts = $this->model->getAmountOfDesserts();

       // Chargement des views
        require APP . 'view/_templates/header_admin.phtml';
        require APP . 'view/dashboard/index.phtml';
/*        require APP . 'view/_templates/footer.phtml';
*/

    }


    /**
     * Ajouter un menu
     */
    public function addMenu()
    {
        
        // Si données POST alors nouvelle entrée
        if (isset($_POST["submit_add_menu"])) 
        {
            $this->model->addMenu($_POST["dish_name"], $_POST["dish_content"], $_POST["dish_price"],  $_POST["dish_option"],  $_POST["dish_img"],  $_POST["dish_category"], $_FILES["photo"]["tmp_name"]);
        }
        // Redirection
        header('location: ' . URL . 'dashboard');
    }



    /**
     * Supprimer/Rech. un menu par l'ID
     * @param int 
     */
    public function deleteMenu($menuId)
    {
        // Si id alors suppression
        if (isset($menuId)) 
        {
            // Suppression via la méthode dans le model
            $this->model->deleteMenu($menuId);
        }
        // redirection après exec.
        header('location: ' . URL . 'dashboard');
    }

    

     /**
    * Editer/Rech. un menu par l'ID
     * @param int 
     */
    public function editMenu($menuId)
    {
        // Si id alors édition
        if (isset($menuId)) 
        {
            // Edition via la méthode dans le model
            $menu = $this->model->getMenu($menuId);

            // Chargement des views
            require APP . 'view/_templates/header.phtml';
            require APP . 'view/dashboard/edit.phtml';
            require APP . 'view/_templates/footer.phtml';
        } else {
            // Redirection si id non trouvé
            header('location: ' . URL . 'dashboard');
        }
    }
    
    /**
     * Modifier/Rech. un menu par l'ID
     */
    public function updateMenu()
    {
            // si nouvelles données POST -> màj de l'entrée
            if (isset($_POST["submit_update_menu"]))
            {
            // Mise à jour via la méthode dans le model
            $this->model->updateMenu($_POST["dish_name"], $_POST["dish_content"], $_POST["dish_price"], $_POST["dish_option"],  $_POST["dish_img"], $_POST["id"], $_POST["dish_category"]);
            }

            // var_dump($_POST);
            // die;
            // Redirection après exec
            header('location: ' . URL . 'dashboard');
    }

    

    /**
     * AJAX-COMPTEUR: ajaxGetStats
     */
    public function ajaxGetStats()
    {
        $amount_of_menus = $this->model->getAmountOfMenus();

        echo $amount_of_menus;
    }


/***********************************************************************
 USERS
***********************************************************************/


    /**
     * Editer un utilisteur
     */
    public function editUser($userId)
    {
    // Si id alors édition
    if (isset($userId)) 
    {
        // Edition via la méthode dans le model
        $user = $this->model->getUser($userId);

        // Chargement des views
        require APP . 'view/_templates/header.phtml';
        require APP . 'view/dashboard/edit_user.phtml';
        require APP . 'view/_templates/footer.phtml';
    } else {
        // Redirection si id non trouvé
        header('location: ' . URL . 'dashboard');
    }
    }

    /**
     * Modifier un utilisteur
     */
    public function updateUser()
    {
        // si nouvelles données POST -> màj de l'entrée
        if (isset($_POST["submit_update_user"]))
        {
        // Mise à jour via la méthode dans le model
        $this->model->updateUser($_POST["username"], $_POST["usermail"], $_POST["password"], $_POST["id"]);
        }

        // var_dump($_POST);
        // die;
        // Redirection après exec
        header('location: ' . URL . 'dashboard');
    }


    /**
     * Supprimer un utilisteur
     */
    public function deleteUser($userId)
    {
        // Si id alors  
        if (isset($userId)) 
        {
            // Suppression via la méthode dans le model
            $this->model->deleteUser($userId);
        }
        // redirection après exec.
        header('location: ' . URL . 'dashboard');
    }


    

}
