<?php
namespace models;
use core\DB;
require_once ('../core/DB.php');

class Category extends DB{

    public function __construct(){
        parent::__construct();
    }

    public function insert($_data){
        $insert = $this->_execute("INSERT INTO Categories(uuid, name, description, author) VALUES (:uuid, :name, :description, ) ");

    }
}