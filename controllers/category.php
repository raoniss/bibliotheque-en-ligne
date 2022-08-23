<?php
        require_once('../core/autoloader.php');

        use core\Uuid;
        use models\Category;
        use views\administrateur\Administrator;

        if(isset($_GET['list']) && $_SESSION['USER_SUPER']) print_r((new Category())->_get()) ;

        if(isset($_POST['insert']) && $_SESSION['USER_SUPER']){
            
            $insert = (new Category())->_insert([
                "uuid"=> (new Uuid())->_uuid(),
                "name" => htmlspecialchars($_POST['name']),
                "description" => htmlspecialchars($_POST['description']),
                "author"=> intval(htmlspecialchars($_POST['author']))
            ]);

            if($insert['status'] == !0) echo $insert['id']; //(new ViewsClient())->_home();
        }
       


        if(isset($_POST['update']) && $_SESSION['USER_SUPER']){
            
            $update = (new Category())->_update([
                "uuid"=> (new Uuid())->_uuid(),
                "name" => htmlspecialchars($_POST['name']),
                "description" => htmlspecialchars($_POST['description']),
                "author"=> intval(htmlspecialchars($_POST['author'])),
                "id"=>intval(htmlspecialchars($_POST['id']))
            ]);

            if($update['status'] == !0) ; //(new ViewsClient())->_home();
        }
        

        if(isset($_POST['delete']) && $_SESSION['USER_SUPER']){
            $delete = (new Category())->_delete([
                "id"=> intval(htmlspecialchars($_POST['id']))  
            ]);
            if($delete['status'] == !0) echo $delete['id']; //(new ViewsAdministrator())->_Category();
        }
        







?>