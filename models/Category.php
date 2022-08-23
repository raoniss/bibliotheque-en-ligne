<?php

namespace models;

use core\DB;
require_once('../core/DB.php');

class Category extends DB{
    public function __construct(){

        parent::__construct();
    }


    public function _insert($_data){
        $insert = $this->_execute("INSERT INTO Categories(uuid, name, description, author) VALUES(:uuid,  :name, :description, :author)", [
            ":uuid"=> $_data['uuid'],
            ":name" => $_data['name'],
            ":description" => $_data['description'],
            ":author" => $_data['author']
           
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
        $insert = $this->_execute("UPDATE Categories SET uuid = :uuid, name= :name, description = :description, update_at = :update_at, author = :author WHERE id= :id", [
            ":uuid"=> $_data['uuid'],
            ":name" => $_data['name'],
            ":update_at" => date("Y-m-d H:i-s"),
            ":description" => $_data['description'],
            ":id" => $_data['id'],
            ":author" => $_data['author']
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
        $deleted = $this-> _execute("DELETE FROM Categories WHERE id = :id", 
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
        $data = $this->_query("SELECT * FROM Categories");
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
        
        $data = $this -> _query(" SELECT id FROM Categories WHERE uuid = '$_uuid' ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data'][0]["id"]
            ];
        }
    }
}