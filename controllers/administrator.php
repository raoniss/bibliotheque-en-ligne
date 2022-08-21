<?php
    require_once('../core/autoloader.php');
    
use core\Password;
use core\Uuid;
use models\Administrator;
use views\Administrator as ViewsAdministrator;
echo "admins";


    if(isset($_GET['list'])) //( new ViewsAdministrator())->_list((new Administrator())->_get());

    if(isset($_POST['insert']) && $_SESSION['USER_SUPER'] == "true"){
        $insert = ((new Administrator())->_insert([
            "uuid" => (new Uuid())->_uuid(),
            "name" => htmlspecialchars($_POST['name']),
            "first_name" =>htmlspecialchars($_POST['first_name']) ,
            "email" => htmlspecialchars($_POST['email']),
            "password" => (new Password())->_hash(htmlspecialchars($_POST['password']))

        ]));

        if($insert['status'] == !0) echo $insert['id'] ; ////(new ViewsAdministrator())->_insert();
    }

    if(isset($_POST['update']) && $_SESSION['USER_SUPER'] == "true"){
        $insert = ((new Administrator())->_update([
            "uuid" => (new Uuid())->_uuid(),
            "name" => htmlspecialchars($_POST['name']),
            "first_name" =>htmlspecialchars($_POST['first_name']) ,
            "email" => htmlspecialchars($_POST['email']),
            "password" => (new Password())->_hash(htmlspecialchars($_POST['password'])),
            "id" => intval(htmlspecialchars($_POST['id']))


        ]));

        if($insert['status'] == !0) echo $insert['id'] ; ////(new ViewsAdministrator())->_list();
    }


    if(isset($_POST['delete']) && $_SESSION['USER_SUPER'] == "true"){
        $delete = (new Administrator())->_delete([
            "id"=> intval(htmlspecialchars($_POST['id']))  
        ]);
        if($delete['status'] == !0) echo $delete['id']; //(new ViewsAdministrator())->_list();
    }


    if(isset($_POST['connect'])){
        $connected = (new Administrator())->_connexion([

            "email" => htmlspecialchars($_POST['email']),
            "password" => htmlspecialchars($_POST['password'])
        ]);

        if($connected['status'] == !0){
            session_start();
            $_SESSION['USER_UUID'] = $connected['user']['uuid'];
            $_SESSION['USER_NAME'] = $connected['user']['name'];
            $_SESSION['USER_FIRST_NAME'] = $connected['user']['first_name'];
            $_SESSION['USER_EMAIL'] = $connected['user']['email'];
            $_SESSION['USER_ID'] = $connected['user']['id'];
            $_SESSION['USER_SUPER'] = $connected['user']['super'];


            //(new ViewsAdministrator())->_home();
        };
    }

    if(isset($_POST['enable']) && $_SESSION['USER_SUPER'] == "true"){
        $enable = (new Administrator())->_enable_super([
            "uuid"=> htmlspecialchars($_POST['uuid'])
        ]);
    }

    if(isset($_POST['disable']) && $_SESSION['USER_SUPER'] == "true"){
        $disable = (new Administrator())->_disable_super([
            "uuid"=> htmlspecialchars($_POST['uuid'])
        ]);

        if($disable['status'] == !0) ;//(new ViewsAdministrator())->_list()
    }

    if(isset($_POST['disconnexion'])) session_abort();