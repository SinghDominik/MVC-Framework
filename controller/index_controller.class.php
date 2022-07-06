<?php
    class index_controller{
        private $vars = array();

        private $db_object = null;
    
        //--------
        //Settings
        //-------
        private $need_loggedin = false;
        private $needed_rank = 0;
        //-------

        public function __construct($db_object){
            $this->db_object = $db_object;
        }

        public function IsLoginNeeded(){
            return $this->need_loggedin;
        }

        public function IsRankNeeded(){
            return $this->needed_rank;
        }

        public function process(){
            //PAGE CODE HERE
            
            return $this->vars;
        }
    }