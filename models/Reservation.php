<?php

namespace models;

use core\DB;
require_once('../core/DB.php');

class Reservation extends DB{
    public function __construct(){

        parent::__construct();
    }


    public function _insert($_data){
        $insert = $this->_execute("INSERT INTO Reservations(uuid, reader, books)", [
            "uuid"=> $_data['uuid'],
            "reader" => $_data['reader'],
            "books" => $_data['books']
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

    /*La methode suivantre ne sera pas utilisée

    public function _update($_data){
        $insert = $this->_execute("INSERT INTO Reservations(uuid, reader, books)", [
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
        $deleted = $this-> _execute("DELETE FROM Reservations WHERE id = :id", 
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
    }*/

    public function _get(){
        $data = $this->_query("SELECT * FROM Reservations");
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
        
        $data = $this -> _query(" SELECT id FROM Reservations WHERE uuid = '$_uuid' ");

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

    public function _get_by_id( $_id ){
        
        $data = $this -> _query(" SELECT * FROM Reservations WHERE id = '$_id' ");

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

    public function _get_by_date( $_date ){
        
        $data = $this -> _query(" SELECT * FROM Reservations WHERE created_at = '$_date' ");

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