<?php

namespace models;

use core\DB;
require_once('../core/DB.php');

class Book extends DB{
    public function __construct(){

        parent::__construct();
    }


    public function _insert($_data){
        $insert = $this->_execute("INSERT INTO Books(uuid, name, image, resume, writer, category, file, author) VALUES(:uuid,  :name, :image, :resume, :writer, :category, :file, :author)", [
            ":uuid"=> $_data['uuid'],
            ":name" => $_data['name'],
            ":image" => $_data['image'],
            ":resume" => $_data['resume'],
            ":writer" => $_data['writer'],
            ":category" => $_data['category'],
            ":file" => $_data['file'],
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
        $insert = $this->_execute("UPDATE Books SET uuid = :uuid, name= :name, image = :image, resume=:resume, writer=:writer, category= :categoriy, file=:file, update_at = :update_at, author = :author WHERE id= :id", [
            ":uuid"=> $_data['uuid'],
            ":name" => $_data['name'],
            ":image" => $_data['image'],
            ":update_at" => date("Y-m-d H:i-s"),
            ":resume" => $_data['resume'],
            ":writer" => $_data['writer'],
            ":category" => $_data['category'],
            ":file" => $_data['file'],
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
        $deleted = $this-> _execute("DELETE FROM Books WHERE id = :id", 
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
        $data = $this->_query("SELECT Books.*, concat(Files.uuid,'.' Files.extension) as files, Categories.name as categorie_name, Categories.id as categorie_id, Writers.id as writer_id, Writers.name as writer_name FROM Books INNER JOIN Files ON Books.file = Files.id INNER JOIN  Categories ON Books.category = Categories.id INNER JOIN  Writers ON Books.writer = Writers.id");

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
        $data = $this->_query("SELECT Books.*, concat(Files.uuid, Files.extension) as files, Categories.name as categorie_name, Categories.id as categorie_id, Writers.id as writer_id, Writers.name as writer_name FROM Books INNER JOIN Files ON Books.file = Files.id INNER JOIN  Categories ON Books.category = Categories.id INNER JOIN  Writers ON Books.writer = Writers.id WHERE id = $_id");

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
        
        $data = $this -> _query(" SELECT id FROM Books WHERE uuid = '$_uuid' ");

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
}