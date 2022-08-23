<?php

namespace models;

use core\DB;
require_once('../core/DB.php');

class Writer extends DB{
    public function __construct(){

        parent::__construct();
    }


    public function _insert($_data){
        $insert = $this->_execute("INSERT INTO Writers(uuid, name, story, author) VALUES(:uuid,  :name, :story, :author)", [
            ":uuid"=> $_data['uuid'],
            ":name" => $_data['name'],
            ":story" => $_data['story'],
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
        $insert = $this->_execute("INSERT INTO Writers SET uuid = :uuid, name= :name, story = :story, update_at = :update_at, author = :author WHERE id= :id", [
            ":uuid"=> $_data['uuid'],
            ":name" => $_data['name'],
            ":update_at" => date("Y-m-d H:i-s"),
            ":story" => $_data['story'],
            ":id" => $_data['id']
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
        $deleted = $this-> _execute("DELETE FROM Writers WHERE id = :id", 
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
        $data = $this->_query("SELECT * FROM Writers");
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
        
        $data = $this -> _query(" SELECT id FROM Writers WHERE uuid = '$_uuid' ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data'][0]["id"]
            ];
        }
    }
}