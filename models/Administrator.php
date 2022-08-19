<?php
    namespace models;
    require_once('../core/autoloader.php');
    use core\DB;
   

    class Administrator extends DB{
        public function __construct(){

            parent::__construct();
        }

        public function _insert($_data){
            $insert = $this->_execute("INSERT INTO Administrators(uuid, name, first_name, email, password) VALUES (:uuid, :name, :first_name, :email, :password)", 
            [
                ':uuid' => $_data['uuid'],
                ':name'=> $_data['name'], 
                ':first_name' => $_data[':first_name'],
                ':email' => $_data['email'],
                ':password' => $_data['password']
                
            ] );
            
            if($insert == !0){
                return [
                    'status' => !0,
                    'id' =>  $this-> _get_id($_data['uuid'])['id']
                ];    
                
            }
            else{
                return [
                    'status' => !1,
                ]; 
            }

        }


        public function _get(){
            $data = $this->_query("SELECT * FROM Administrators");
            if($data['status'] == !0){

                return [
                    'status' => !0,
                    'data' => $data['data']
                ];
            }
            else{
                return [
                    'status' => !1
                ];
            }
        }

        public function _update($_data){

            $insert = $this->_execute(" UPDATE  Administrators SET uuid = :uuid, name= :name, first_name = :first_name, email = :email, password = :password WHERE id= :id", 
            [
                ':uuid' => $_data['uuid'],
                ':name'=> $_data['name'], 
                ':first_name' => $_data[':first_name'],
                ':email' => $_data['email'],
                ':password' => $_data['password'],
                ':id'=> $_data['id']
                
            ] );
            
            if($insert == !0){
                return [
                    'status' => !0,
                    'id' =>  $this-> _get_id($_data['uuid'])['id']
                ];    
                
            }
            else{
                return [
                    'status' => !1,
                ]; 
            }

        }

        public function _delete(array $_data){
            $updated = $this-> _execute("DELETE FROM Administrators WHERE id = :id", 
            [
                ":id" => $_data['id'],
                
            ]);
            
            if($updated){
                return [
                    'status' => !0,
                    'id' => $_data['id']
                ];
            }
            else{
                return [
                    'status' => !1,                  
                ];
            }
        }
        
        public function _chek_email($_email){

            $data = $this -> _query(" SELECT id FROM Administrators WHERE email = '$_email' ");

            if(count($data['data']) == 1){

                return [
                    'status' => !0,
                    'id' => $data['data'][0]["id"]
                ];
            }
            else{
                return !1;
            }

            
        }

        public function _get_pass_by_email(){
            $data = $this -> _query(" SELECT password FROM Administrators WHERE email = '$_email' ");

            if(count($data['data']) == 1){

                return [
                    'status' => !0,
                    'id' => $data['data'][0]["password"]
                ];
            }
            else{
                return !1;
            }
        }

        public function _connexion($_data){
            if( $this ->_chek_email($_data['email']) == !0){
                if(())
            }
        }

        public function _get_id( $_uuid ){
        
            $data = $this -> _query(" SELECT _id FROM Administrators WHERE uuid = '$_uuid' ");

            if($data['status'] == !0){
                return [
                    'status' => !0,
                    'id' => $data['data'][0]["id"]
                ];
            }
        }
    }