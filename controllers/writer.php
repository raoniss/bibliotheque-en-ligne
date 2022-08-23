<?php
        require_once('../core/autoloader.php');

        use core\Uuid;
        use models\Writer;
        use views\administrateur\Administrator;

        if(isset($_POST['list']) && $_SESSION['USER_SUPER']) print_r((new Writer())->_get()) ;

        if(isset($_POST['insert']) && $_SESSION['USER_SUPER']){
            
            $insert = (new Writer())->_insert([
                "uuid"=> (new Uuid())->_uuid(),
                "name" => intval(htmlspecialchars($_POST['name'])),
                "description" => htmlspecialchars($_POST['description']),
                "author"=> intval(htmlspecialchars($_POST['author']))
            ]);

            if($insert['status'] == !0) echo ['id']; //(new ViewsClient())->_home();
        }
        else{
            (new Administrator())->_login();
        }


        if(isset($_POST['update']) && $_SESSION['USER_SUPER']){
            
            $insert = (new Writer())->_update([
                "uuid"=> (new Uuid())->_uuid(),
                "name" => intval(htmlspecialchars($_POST['name'])),
                "description" => htmlspecialchars($_POST['description']),
                "author"=> intval(htmlspecialchars($_POST['author'])),
                "id"=>intval(htmlspecialchars($_POST['id']))
            ]);

            if($insert['status'] == !0) ; //(new ViewsClient())->_home();
        }
        

        if(isset($_POST['delete']) && $_SESSION['USER_SUPER']){
            $delete = (new Writer())->_delete([
                "id"=> intval(htmlspecialchars($_POST['id']))  
            ]);
            if($delete['status'] == !0) echo $delete['id']; //(new ViewsAdministrator())->_Writer();
        }
       



?>