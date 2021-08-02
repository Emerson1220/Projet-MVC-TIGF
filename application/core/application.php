<?php

class Application
{
    /** @var null Le controller */
    private $url_controller = null;

    /** @var null Méthode du controleur */
    private $url_action = null;

    /** @var array URL params */
    private $url_params = array();

    /*** Start apps ***/
    public function __construct()
    {
        // Création Tableau avec des parties de l'URL
        $this->splitUrl();

        // Vérifier le contrôleur puis charge la page de démarrage
        if (!$this->url_controller) {

            require APP . 'controller/home.php';
            $page = new Home();
            $page->index();

        } elseif (file_exists(APP . 'controller/' . $this->url_controller . '.php')) {
            // Vérif. du controller

            // si ok, chargez ce fichier et créez ce contrôleur
            require APP . 'controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();

            // Vérifie si la méthode existe dans le contrôleur ?
            if (method_exists($this->url_controller, $this->url_action)) {

                if (!empty($this->url_params)) {
                    // -> Passe les arguments
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    // Si aucun paramètre n'est donné, appel de la méthode
                    $this->url_controller->{$this->url_action}();
                }

            } else {
                if (strlen($this->url_action) == 0) {
                    //  Si aucune action -> appeler la méthode par défaut index() d'un contrôleur sélectionné
                    $this->url_controller->index();
                }
                else {
                    header('location: ' . URL . 'problem');
                }
            }
        } else {
            header('location: ' . URL . 'problem');
        }
    }

    /**
     * Gestion des URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // Diviser URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            // Supprime le contrôleur et l'action de l'URL divisée
            unset($url[0], $url[1]);

            // Stockage des params de l'URL
            $this->url_params = array_values($url);

        }
    }
}
