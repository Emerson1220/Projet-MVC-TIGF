<?php

        // Debug instruction
        // var_dump($this->db->errorInfo());
        // die;


class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('La connexion à la base de données n a pas pu être établie.');
        }

        
    }
    

/***********************************************************************
COMPTEUR
***********************************************************************/ 

    /**
     * Comptage des menus BDD
     */
    public function getAmountOfMenus(): int
    {
        $sql = 
        "SELECT COUNT(id) 
        AS amount_of_menus 
        FROM recette";

        $query = $this->db->prepare($sql);
        $query->execute();

    return $query->fetch()->amount_of_menus;
    }

    /**
     * Comptage des Starters BDD
     */
    public function getAmountOfStarters(): int
    {
        $sql = 
        "SELECT COUNT(id) 
        AS amount_of_cat_starters 
        FROM recette
        WHERE `dish_category` = '1'
        ";

        $query = $this->db->prepare($sql);
        $query->execute();

    return $query->fetch()->amount_of_cat_starters;
    }

    /**
     * Comptage des Mains BDD
     */
    public function getAmountOfMains(): int
    {
        $sql = 
        "SELECT COUNT(id) 
        AS amount_of_cat_mains 
        FROM recette
        WHERE `dish_category` = '2'
        ";

        $query = $this->db->prepare($sql);
        $query->execute();

    return $query->fetch()->amount_of_cat_mains;
    }

    /**
     * Comptage des Starters BDD
     */
    public function getAmountOfDesserts(): int
    {
        $sql = 
        "SELECT COUNT(id) 
        AS amount_of_cat_desserts 
        FROM recette
        WHERE `dish_category` = '3'
        ";

        $query = $this->db->prepare($sql);
        $query->execute();

    return $query->fetch()->amount_of_cat_desserts;
    }


/***********************************************************************
MENUS
***********************************************************************/ 
    /**
     * Lecture de tous les Menus BDD
     */
    public function getAllMenus()
    {
        $sql = 
        "SELECT recette.id, dish_name, dish_price, dish_content, dish_option, dish_img, category_name, dish_category
        FROM recette
        LEFT JOIN category
        ON recette.dish_category = category.id_recette";

        $query = $this->db->prepare($sql);
        $query->execute();

    return $query->fetchAll();
    }

    /**
     * Ajout Menu BDD
     */
    public function addMenu (string $name, string $content, float $price, string $option, string $image, int $category) 
    {
        $sql = 
        "INSERT INTO recette (dish_name, dish_price, dish_content, dish_option, dish_img, dish_category) 
        VALUES (:dish_name, :dish_price, :dish_content, :dish_option, :dish_img, :dish_category)";

        $query = $this->db->prepare($sql);
        $parameters = array(':dish_name' => $name, ':dish_price' => (float) $price, ':dish_content' => $content, ':dish_option' => $option, ':dish_img' => $image, ':dish_category' => $category);

        $query->execute($parameters);
    }


    /**
     * Suppression Menu BDD
     */
    public function deleteMenu(int $menuId)
    {
        $sql = 
        "DELETE FROM recette 
        WHERE id = :id";

        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $menuId);

        $query->execute($parameters);
    }


    /**
     * Lecture Menu par l'id BDD
     */
    public function getMenu(int $menuId)
    {
        $sql = 
        "SELECT id, dish_name, dish_price, dish_content, dish_option, dish_img, dish_category
        FROM recette 
        WHERE id = :menuId 
        LIMIT 1";

        $query = $this->db->prepare($sql);
        $parameters = array(':menuId' => $menuId);

        $query->execute($parameters);

    return $query->fetch();
    }


    /**
     * Modifier un Menu
     */
    public function updateMenu(string $name, string $content, float $price, string $option, string $image, int $menuId, int $category)
    {
        $sql = "UPDATE recette
        SET 
        dish_name = :dish_name, 
        dish_content = :dish_content, 
        dish_price = :dish_price, 
        dish_option = :dish_option, 
        dish_img = :dish_img,
        dish_category = :dish_category
        WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':dish_name' => $name, ':dish_content' => $content, ':dish_price' => $price, ':dish_option' => $option, ':dish_img' => $image, ':id' => $menuId, ':dish_category' => $category);

        $query->execute($parameters);
    }


/***********************************************************************
CATEGORIES
***********************************************************************/
    /**
     * Lecture des Menus par catégorie Starters BDD
     */
    public function getAllCategoryStarters()
{
    $sql = "SELECT dish_name, dish_price, dish_content, dish_option, dish_img

    FROM `recette`

    WHERE `dish_category` = '1'";

    $query = $this->db->prepare($sql);
    $query->execute();

return $query->fetchAll();
}


    /**
     * Lecture des Menus par catégorie Mains BDD
     */
    public function getAllCategoryMains()
{
    $sql = "SELECT dish_name, dish_price, dish_content, dish_option, dish_img

    FROM `recette`

    WHERE `dish_category` = '2'";

    $query = $this->db->prepare($sql);
    $query->execute();

return $query->fetchAll();
}


    /**
     * Lecture des Menus par catégorie Desserts BDD
     */
public function getAllCategoryDesserts()
{
    $sql = "SELECT dish_name, dish_price, dish_content, dish_option, dish_img

    FROM `recette`

    WHERE `dish_category` = '3'";



    $query = $this->db->prepare($sql);
    $query->execute();

return $query->fetchAll();
}



/***********************************************************************
 NEWSLETTERS
***********************************************************************/
 
    /**
     * Ajout un abonné BDD
     */
    public function addNewsletters (string $email = '', string $nom) 
    {
        $sql = 
        "INSERT INTO newsletters (email, nom) 
        VALUES (:email, :nom)";

        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email, ':nom' => $nom);

        $query->execute($parameters);
    }

    /**
     * Lecture des abonnés BDD
     */
    public function getAllNewsletters()
{
    $sql = 
    "SELECT *
    FROM newsletters";

    $query = $this->db->prepare($sql);
    $query->execute();

return $query->fetchAll();
}


/***********************************************************************
LOGIN ADMIN
***********************************************************************/
    
    /**
     * Connection admin (Login)
     */
        public function getLogin(string $username)
    {
        $sql = 
        "SELECT *
        FROM users
        WHERE 
        username = :username";

        $query = $this->db->prepare($sql);

        $parameters = array(':username' => $username);
        $query->execute($parameters);


    return $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Ajouter un profil adminitrateur à la BDD
     */
    public function addNewUser (string $username, string $usermail, string $password) 
    {
        $sql = 
        "INSERT INTO users (username, usermail, password) 
        VALUES (:username, :usermail, :password)";

        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':usermail' => $usermail, ':password' => $password);

        $query->execute($parameters);
    }

/***********************************************************************
 USERS
***********************************************************************/
    /**
     * Lecture de tous les utilisateurs
     */
    public function getAllUsers()
    {
        $sql = 
        "SELECT *
        FROM `users`";


        $query = $this->db->prepare($sql);
        $query->execute();

    return $query->fetchAll();
    }

    /**
     * Lecture un utili
     */
    public function getUser(int $userId)
    {
        $sql = 
        "SELECT id, username, usermail, password
        FROM users 
        WHERE id = :id 
        LIMIT 1";

        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $userId);

        $query->execute($parameters);

    return $query->fetch();
    }

    /**
     * Effacer un utilisateur
     */
    public function deleteUser(int $userId)
    {
        $sql = 
        "DELETE FROM users
        WHERE id = :id";

        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $userId);

        $query->execute($parameters);
    }

    /**
     * Editer un utilisateur
     */
    public function updateUser(string $username, string $usermail, string $password, int $userId)
    {
        $sql = "UPDATE users
        SET 
        username = :username, 
        usermail = :usermail, 
        password = :password
        WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':usermail' => $usermail, ':password' => $password, ':id' => $userId);

        $query->execute($parameters);
    }

}
