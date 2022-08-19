<?php

namespace models;

use core\DB;
require_once('../core/DB.php');

class Administrator extends DB{
    public function __construct(){

        parent::__construct();
    }

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
}