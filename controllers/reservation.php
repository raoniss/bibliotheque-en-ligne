<?php
        require_once('../core/autoloader.php');

        use core\Uuid;
        use models\Reservation;

        if(isset($_POST['list'])) ;//(new ViewsReservation())->_list((new Reservation())->_get());

        if(isset($_POST['insert'])){
            
            $insert = (new Reservation())->_insert([
                "uuid"=> (new Uuid())->_uuid(),
                "reader" => intval(htmlspecialchars($_POST['reader'])),
                "books" => $books
            ]);

            if($insert['status'] == !0) ; //(new ViewsClient())->_home();
        }

        if(isset($_POST['delete']) && $_SESSION['USER_SUPER']){
            $delete = (new Reservation())->_delete([
                "id"=> intval(htmlspecialchars($_POST['id']))  
            ]);
            if($delete['status'] == !0) echo $delete['id']; //(new ViewsAdministrator())->_reservation();
        }







?>