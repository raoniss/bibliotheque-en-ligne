<?php
session_start();
        require_once('../core/autoloader.php');

        use core\Uuid;
        use models\Subscription;

        if(isset($_GET['souscription']) && $_SESSION['USER_SUPER'] == true ){
        

            if(isset($_GET['id']))  print_r((new Subscription())->_get_by_id(intval(htmlspecialchars($_GET['id']))));
            elseif(isset($_GET['date']))  print_r((new Subscription())->_get_by_reader(htmlspecialchars($_GET['date'])));
            elseif(isset($_GET['lecteur']))  print_r((new Subscription())->_get_by_reader(htmlspecialchars($_GET['reader'])));
            else print_r((new Subscription())->_get());
        }
    
        if(isset($_POST['insert']) && $_SESSION['USER_SUPER'] == true){
            
            $insert = (new Subscription())->_insert([
                "uuid"=> (new Uuid())->_uuid(),
                "reader" => intval(htmlspecialchars($_POST['reader'])),
                "books" => $books
            ]);

            if($insert['status'] == !0) ; //(new ViewsClient())->_home();
        }









?>