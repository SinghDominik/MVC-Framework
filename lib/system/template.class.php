<?php
    class template{
        private $page = null;
        private $vars = array();

        public function __construct($page, $vars, $db_object){
            $this->page = $page;
            $this->vars = $vars;
            $this->db_object = $db_object;
        }

        private function InterpreteTemplateLang($template){
            if(count($this->vars)){
                foreach ($this->vars as $key => $value){
                    if(gettype($value) != "array") $template = preg_replace("/\[@(.*)\]/", $value . "<br />", $template);
                }
            }else{
                $template = preg_replace("/\[@(.*)\]/", "", $template);
            }
            
            return $template;
        }

        public function render(){
            $tpl_file = PATH . "/templates/" . $this->page . ".tpl";
            $header =  PATH . "/templates/header.tpl";
            $footer =  PATH . "/templates/footer.tpl";
            $compiledFile = PATH . "/compiled/" . $this->page . ".php";
            
            file_put_contents($compiledFile, $this->InterpreteTemplateLang(file_get_contents($header) . file_get_contents($tpl_file) . file_get_contents($footer)));
            
            return true;
        }
    }