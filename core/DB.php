<?php

    /*
    * 
    * Auteur : ABOTCHI Kodjo Mawugno
    * 
    *Connexion a la base de données
    * date : 2022-08-15
    *
    */
    namespace core;

    require_once("../Env.php"); 
    
   use Env;
    class DB extends \PDO
    {
       
        public function __construct()
        {  
            $env = (new Env())->_db();
           
            $db_name =$env['db_name'];
            $db_user =  $env['db_user'];
            $db_password =  $env['db_password'];
            
           

            
            try{

                

                $pdo_options[\PDO::ATTR_ERRMODE] = \PDO::ERRMODE_EXCEPTION;

                parent::__construct("mysql:host=localhost;dbname=$db_name", $db_user , $db_password , $pdo_options );
                
                echo $db_name;
                
            }
            catch(\Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
        }

        public function _tableExist( String $_table ) {
            
            $req = $this->query("SHOW TABLES");
            $table = $req ->fetchAll(\PDO::FETCH_ASSOC);

            $find = !1;

            foreach($table as $key => $value){
            
                foreach($value as $key => $value){
                    
                    if($value == $_table){
                        $find = !0;
                    }
                                    
                }
            }
            
            if($find == !0){
                return !0;
            }
            else{
                return !1;
            }
            
        }

        public function _dataExist($_table, $_id){
            
            $id = $this -> _query($_table, "SELECT * FROM $_table WHERE id = $_id");
            if(count($id) != 0){
                return !0;
            }
            else{
                return !1;
            }
        }

        public function _query( String $_request, String $_fetch_option = \PDO::FETCH_ASSOC ){
                        
            $req = $this -> query($_request);
            $execute = $req -> fetchAll($_fetch_option);

            if($execute){
                return [
                    'status' => !0,
                    'data' => $execute
                ];
            }

            else{
                return [ 'status' => !1 ];
            }
        }

        public function _execute($_request, $_values ){

            $req = $this->prepare( $_request );
            $executed = $req->execute($_values);

            if($executed)
                
                return !0;

            else
                return !1;
            
        }

        
    }




?>