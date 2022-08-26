<?php
session_start();
        require_once('../core/autoloader.php');

        use core\Uuid;
        use models\Reservation;

        if(isset($_GET['reservations'])){
            if(isset($_POST['id'])){
                print_r((new Reservation())->_get_by_id(intval(htmlspecialchars($_GET['id'])))) ;
            }
            else{
                print_r((new Reservation())->_get()) ;
            }
        } ;//(new ViewsReservation())->_list((new Reservation())->_get());

        if(isset($_POST['insert'])){
            
            $insert = (new Reservation())->_insert([
                "uuid"=> (new Uuid())->_uuid(),
                "reader" => intval(htmlspecialchars($_POST['reader'])),
                "books" => $books
            ]);

            if($insert['status'] == !0) ; //(new ViewsClient())->_home();
        }









?>