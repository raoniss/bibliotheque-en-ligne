<?php
    require_once('../core/autoloader.php');
    
use core\Password;
use core\Uuid;
use models\Administrator;
use views\administrateur\Administrator as AdministrateurAdministrator;
use views\administrateur\Home;

    if(isset($_GET['list']) && $_SESSION['USER_SUPER'] == "true" ){
        

        if(isset($_GET['id']))  print_r((new Administrator())->_get_by_id(intval(htmlspecialchars($_GET['id']))));
        else print_r((new Administrator())->_get());
    }

    if(isset($_GET['login'])) (new AdministrateurAdministrator())->_login();



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
    else{
        (new AdministrateurAdministrator())->_login();
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
    else{
        (new AdministrateurAdministrator())->_login();
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

            echo $_SESSION['USER_NAME']. " ". $_SESSION['USER_EMAIL'];

           (new Home());
        }
        else{
            (new AdministrateurAdministrator())->_login("Vous n'avez pas de compte ou votre compte est invalide");

        };
    }

    if(isset($_POST['enable']) && $_SESSION['USER_SUPER'] == "true"){
        $enable = (new Administrator())->_enable_super([
            "uuid"=> htmlspecialchars($_POST['uuid'])
        ]);

        $message = ($enable['status'] == !0) ?  "super set" :"operation failed" ;

        echo $message;
    }
    else{
        (new AdministrateurAdministrator())->_login();
    }

    if(isset($_POST['disable']) && $_SESSION['USER_SUPER'] == "true"){
        $disable = (new Administrator())->_disable_super([
            "uuid"=> htmlspecialchars($_POST['uuid'])
        ]);

        //if($disable['status'] == !0) ;//(new ViewsAdministrator())->_list()
        $message = ($disable['status'] == !0) ?  "super set" :"operation failed" ;

        echo $message;
    }
    else{
        (new AdministrateurAdministrator())->_login();
    }

    if(isset($_POST['disconnexion'])) session_abort();