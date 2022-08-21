<?php

namespace models;

use core\DB;
require_once('../core/DB.php');

class Subscription extends DB{
    public function __construct(){

        parent::__construct();
    }


    public function _insert($_data){
        $insert = $this->_execute("INSERT INTO Subscriptions(uuid, reader, subscription, author, expire_at) VALUES(:uuid, :reader, :subscription, :author, :expire_at)", [
            ":uuid"=> $_data['uuid'],
            ":reader" => $_data['reader'],
            ":subscription" => $_data['subscription'],
            ":author" => $_data['author'],
            ":expire_at" => $_data['expire_at']
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

    /*
    //La methode suivante ne sera pas utilisée

    public function _update($_data){
        $insert = $this->_execute("INSERT INTO Subscriptions(uuid, reader, books)", [
            "uuid"=> $_data['uuid'],
            "reader" => $_data['reader'],
            "books" => $_data['books'],
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
        $deleted = $this-> _execute("DELETE FROM Subscriptions WHERE id = :id", 
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

*/
    public function _get(){
        $data = $this->_query("SELECT * FROM Subscriptions");
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
        
        $data = $this -> _query(" SELECT id FROM Subscriptions WHERE uuid = '$_uuid' ");

        if($data['status'] == !0){
            return [
                'status' => !0,
                'id' => $data['data'][0]["id"]
            ];
        }
    }
}