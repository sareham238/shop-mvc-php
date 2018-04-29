<?php

class Bootstrap {

    private $_url = null;
    private $_controller = null;
    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';
    public $error;

    /**
     * Start the Bootstrap
     *
     * @return boolean
     */
    public function init() {

        //Set the protected $_url
        $this->_geturl();

        //Load the default controller if no URL is set
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return FALSE;
        }

        $this->_loadExistingController();
        $this->ControllerMethod();
    }

    /**
     * (Optional) Set a custom path controller
     *
     * @param string $path
     */
    public function setControllerPath($path) {
        $this->_controllerPath = trim($path, '/') . '/';
    }

    /**
     * (Optional) Set a custom path model
     *
     * @param string $path
     */
    public function setModelPath($path) {
        $this->_modelPath = trim($path, '/') . '/';
    }

    /**
     * (Optional) Set a custom path defaultFile
     *
     * @param string $path
     */
    public function setDefaultFile($path) {
        $this->_defaultFile = trim($path) . '.php';
    }

    /**
     * (Optional) Set a custom path errorFile
     *
     * @param string $path
     */
    public function setErrorFile($path) {
        $this->_errorFile = trim($path) . '.php';
    }

    /**
     * If a method is passed in the GET url parameter
     *
     * http://localhost/controller/method/param/param/param
     * url[0] = Controller
     * url[1] = Method
     * url[2] = Param
     * url[3] = Param
     * url[4] = Param
     *
     */
    private function ControllerMethod() {
        $length = count($this->_url);
        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->error->Not_Exist_Function();
                return FALSE;
            }
        }
        switch ($length) {
            case 5:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            case 4:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            case 3:
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            case 2:
                $this->_controller->{$this->_url[1]}();
                break;
            default :
                $this->_controller->Index();
                break;
        }
    }

    /**
     * Fetch The $_GET from 'url
     */
    private function _geturl() {

        $url = isset($_GET['url']) ? $_GET['url'] : NULL;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    /**
     * This loads if there is no GET parameter passed
     */
    private function _loadDefaultController() {
        require $this->_controllerPath . $this->_defaultFile;
        $this->_controller = new index();
        $this->_controller->Index();
    }

    /**
     * Load an existing controller if there is a GET parameter passed
     *
     * @return boolean | srting
     */
    private function _loadExistingController() {

        $path = $this->_controllerPath . $this->_url[0] . '.php';
        if (file_exists($path)) {
            require $path;
            $this->_controller = new $this->_url[0]();
            $this->_controller->loadModel($this->_url[0], $this->_modelPath);
        } else {

            $this->error->Not_Exist_Controller();
            return FALSE;
        }
    }

    public function error() {
        require $this->_controllerPath . $this->_errorFile;
        $this->error = new error();
        return FALSE;
    }

}
