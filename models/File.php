<?php
    /*
    *
    * Auteur : ABOTCHI Kodjo Mawugno
    *
    * Fichier 
    * date : 2022-07-30
    *
    */
    namespace models;
    
    require_once("../core/DB.php");
    use \core\DB;

    class File extends DB{
        public function __construct(){

            parent::__construct();
            
        }

        public function _insert($_data)
        {
            
            
            $insert = $this ->_execute(
                "INSERT INTO Files(uuid, type, extension, size, name, author ) VALUES (:uuid, :type, :extension, :size, :name, :author)",
                [
                    ':uuid' => $_data['uuid'], 
                    ':type' => $_data['type'], 
                    ':extension' => $_data['extension'], 
                    ':size' => $_data['size'],
                    ':name' => $_data['name'], 
                    ':author' => $_data['author']
                ]
            );

            if($insert){
                return [
                    'status' => !0,
                    'id' => $this-> _get_id($_data['uuid'])['id']
                ];
            }
            else{
                return [
                    'status' => !1,                  
                ];
            }
        
            

        
        }
            
        public function _get()
        {
            $req = $this->_query( " SELECT * FROM files");
            

            if($req)
            {
                $response = ['status' => !0,
                            'files' => $req['data']
                ];   
            }
            else{
                $response = ['status' => !1 ];
                    
            }

            return $response;
        }

        public function _delete($_id)
        {
            $req = $this->_execute("DELETE FROM  Files WHERE id = :id", [':id ' => $_id]);
        

            if($req)
            {
                return  !0 ;
            }
            else{
                return ;        
            }

        
        }

       /* public function _update($_data){

            $id_table = $_data['id_table'];

            $req = $this->_execute("UPDATE Files SET  name =:name , type = :type , extension = :extension, $id_table = :id_table, updated = :updated  WHERE id = :id ",
            [
                ":name" => $_data['name'],
                ":type" => $_data['type'],
                ":extension" => $_data['extension'],
                ":id_table" => $_data['id_value'],
                ":updated" => date('Y-m-d H:i:s'),
                ":id" => $_data['id']
            ]
            
            );
            

            if($req)
            {
                return !0; 
                
            }
            else{
                return !1;
                    
            }

        }*/

        public function _get_id( $_uuid ){
        
            $data = $this -> _query(" SELECT id FROM Files WHERE uuid = '$_uuid' ");
    
            if($data['status'] == !0){
                return [
                    'status' => !0,
                    'id' => $data['data'][0]["id"]
                ];
            }
        }

        public function _get_by_id($_id){

            $data = $this -> _query(" SELECT CONCAT(name, '.', extension) AS image FROM files WHERE _id = $_id ");

            return $data['data'][0]['_image'];
        }
    }