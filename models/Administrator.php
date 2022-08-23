<?php
    namespace models;
    require_once('../core/autoloader.php');
  
    use core\DB;
    use core\Password;
    
    class Administrator extends DB{
        public function __construct(){

            parent::__construct();
        }

        public function _insert($_data){
            $insert = $this->_execute("INSERT INTO Administrators(uuid, name, first_name, email, password) VALUES (:uuid, :name, :first_name, :email, :password)", 
            [
                ':uuid' => $_data['uuid'],
                ':name'=> $_data['name'], 
                ':first_name' => $_data['first_name'],
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



        public function _update($_data){

            $insert = $this->_execute(" UPDATE  Administrators SET uuid = :uuid, name= :name, first_name = :first_name, email = :email, password = :password, update_at = :update_at WHERE id= :id", 
            [
                ':uuid' => $_data['uuid'],
                ':name'=> $_data['name'], 
                ':first_name' => $_data[':first_name'],
                ':email' => $_data['email'],
                ':password' => $_data['password'],
                ":update_at" => date('Y-m-d H:i:s'),
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
            $deleted = $this-> _execute("DELETE FROM Administrators WHERE id = :id", 
            [
                ":id" => $_data['id'],
                
            ]);
            
            if($deleted){
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

        public function _get_by_id($_id){

            $data = $this->_query("SELECT * FROM Administrators WHERE id = $_id");

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

        public function _get_by_mail($_email){

            $data = $this->_query("SELECT * FROM Administrators WHERE email = '$_email'");

            return $data['data'];
        }
        
        public function _chek_email($_email){

            $data = $this -> _query(" SELECT id, password FROM Administrators WHERE email = '$_email' ");

            if($data['status'] == !0){

                return [
                    'status' => !0,
                    'id' => $data['data'][0]["id"],
                    'password' => $data['data'][0]["password"]
                ];
            }
            else{
                return !1;
            }

            
        }

        public function _get_pass_by_email($_email){
            $data = $this -> _query(" SELECT password FROM Administrators WHERE email = '$_email' ");

            if(count($data['data']) == 1){

                return [
                    'status' => !0,
                    'password' => $data['data'][0]["password"]
                ];
            }
            else{
                return ['status'=> !1];
            }
        }

        public function _connexion($_data){

            $hash =  $this ->_chek_email($_data['email']);

            if($hash['status'] == !0){

                if((new Password())->_verify($_data['password'], $hash['password'])) {

                    $data = $this->_get_by_mail($_data['email']);

                    return [
                        'status' => !0,
                        'user' => [
                            'uuid' => $data[0]['uuid'],
                            'name' => $data[0]['name'],
                            'first_name' => $data[0]['first_name'],
                            'email' => $data[0]['email'],
                            'super' => $data[0]['super'],
                            'id' => $data[0]['id'],
                        ]
                    ];
                }
                else return !1; 
            }
            else return !1; 
        }


        public function _get_id( $_uuid ){
        
            $data = $this -> _query(" SELECT id FROM Administrators WHERE uuid = '$_uuid' ");

            if($data['status'] == !0){
                return [
                    'status' => !0,
                    'id' => $data['data'][0]["id"]
                ];
            }
        }

        public function _enable_super( $_data ){
        
            $data = $this -> _execute("UPDATE  Administrators SET super = 'true' WHERE uuid = :uuid ", [
                ":uuid" => $_data['uuid'],
                
            ]);

            if($data['status'] == !0){
                return [
                    'status' => !0,
                    'id' =>  $this-> _get_id($_data['uuid'])['id']
                ];
            }
            else{
                return [
                    'status' => !1
                ];
            }
        }

        public function _disable_super( $_data ){
        
            $data = $this -> _execute("UPDATE  Administrators SET super = 'false' WHERE uuid = :uuid ", [
                ":uuid" => $_data['uuid'],
                
            ]);

            if($data['status'] == !0){
                return [
                    'status' => !0,
                    'id' => $this-> _get_id($_data['uuid'])['id']
                ];
            }
        }
    }