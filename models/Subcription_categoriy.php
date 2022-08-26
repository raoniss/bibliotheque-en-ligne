<?php

namespace models;

use core\DB;
require_once('../core/DB.php');

class Subscription_categorie extends DB{
    public function __construct(){

        parent::__construct();
    }


    public function _insert($_data){
        $insert = $this->_execute("INSERT INTO Subscription_categories(uuid, name, price, author, day_expire) VALUE(:uuid, :name, :price, :author, :day_expire)", [
            ":uuid"=> $_data['uuid'],
            ":name" => $_data['reader'],
            ":price" => $_data['price'],
            ":day_expire" => $_data['day_expire'],
            ":author" => $_data['author'],
        
        ]);

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
        $insert = $this->_execute("INSERT INTO Subscription_categories(uuid, reader, price)", [
            "name" => $_data['reader'],
            "price" => $_data['price'],
            "date_update" => date('Y-m-d H-i-s'),
            "day_expire" => $_data['day_expire'],
            "id" => $_data['id']
        ]);

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
        $deleted = $this-> _execute("DELETE FROM Subscription_categories WHERE id = :id", 
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
        $data = $this->_query("SELECT * FROM Subscription_categories");
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

    public function _get_id( $_uuid ){
        
        $data = $this -> _query(" SELECT id FROM Subscription_categories WHERE uuid = '$_uuid' ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data'][0]["id"]
            ];
        }else{
            return  [
                'status' => !1,
                
            ];
        }
    }


    public function _get_by_id( $_uuid ){
        
        $data = $this -> _query(" SELECT * FROM Subscription_categories WHERE id = '$_uuid' ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data']
            ];
        }else{
            return  [
                'status' => !1,
                
            ];
        }
    }



    public function _get_by_name( $_name ){
        
        $data = $this -> _query(" SELECT * FROM Subscription_categories WHERE name = '$_name' ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data']
            ];
        }else{
            return  [
                'status' => !1,
                
            ];
        }
    }
}