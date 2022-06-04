<?php
    class core{
        private $page = null;
        
        private $vars = array();

        private $db_object = null;
        private $error_handler_object = null;

        public function __construct(){
            require_once "./settings.inc.php";
            require_once PATH . "/lib/system/db.class.php";
            require_once PATH . "/lib/system/template.class.php";

            if(isset($_GET["page"]) && $_GET["page"] != ""){
                $this->page = $_GET["page"];
            }else{
                $this->page = "index";
            }

            $this->db_object = new db();

            return true;
        }

        public function process(){
            //--------------------------------------
            //Init User Class / Processing of Page
            //--------------------------------------

            $controller_path = PATH . "/controller/" . $this->page . "_controller.class.php";
            if(!file_exists($controller_path)){
                $this->page = "error404";
                $this->process();
                return false;
            }
            require_once $controller_path;
            
            $page_class_name = $this->page . "_controller";
            $page_class = new $page_class_name($this->db_object);
            
            if($page_class->IsLoginNeeded() && !isset($_SESSION["user_id"])){
                $this->page = "login";
                $this->process();
                
                return false;
            }
            
            $this->vars = $page_class->process();
            
            //--------------------------------------
            //Init Template Engine
            //--------------------------------------
            $template_engine = new template($this->page, $this->vars, $this->db_object);
            $template_engine->render();
            
            return true;
        }

        public function show(){
            require_once(PATH . "/compiled/" . $this->page . ".php");
        }
    }