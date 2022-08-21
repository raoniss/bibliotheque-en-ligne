<?php
   /*
    * Auteur : ABOTCHI Kodjo Mawugno
    * 
    * Fichier .
    * date : 2022-07-30
    *
    */

    class Env{

        protected $_db_name;
        protected $_db_user;
        protected $_db_password;


        public function __construct(
            
            // Le nom de la base de donnée
            $_db_name = "bib",

            // L'utilisateur de la base de donnée
            $_db_user = "root",
            
            // Le mot de passe de la base de donnée
            $_db_password =  ""
            
            
            ){

            $this->_db_name = $_db_name;
            $this->_db_user = $_db_user;
            $this->_db_password = $_db_password;
        }

        public function _db(){

            
            return [
                "db_name" => $this->_db_name,
                "db_user" => $this->_db_user,
                "db_password" => $this->_db_password
            ];


        }

       
    }

   


    

    
   
?>    
