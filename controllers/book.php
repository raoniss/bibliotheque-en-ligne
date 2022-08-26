<?php
session_start();
        require_once('../core/autoloader.php');

        use core\Uuid;
        use core\File;
        use models\Book;
        use models\File as ModelsFile;
        use views\administrateur\Administrator;

        if(isset($_POST['list'])  ) {

            if(isset($_GET['id'])) {

                if($_SESSION['USER_SUPER']) print_r((new Book())->_get_by_id(intval(htmlspecialchars($_GET['id'])))) ;  // vue d'un admin
                elseif($_SESSION['USER_READER']) print_r((new Book())->_get_by_id(intval(htmlspecialchars($_GET['id'])))) ;  // vue d'un lecteur
                else  echo "error";
            } 
            else{
                if($_SESSION['USER_SUPER']) print_r((new Book())->_get()) ; // vue d'un admin
                elseif($_SESSION['USER_READER']) print_r((new Book())->_get()) ;  // vue d'un lecteur
            }
            
        }
        else echo 'Access Error Please login';


        if(isset($_POST['insert']) && isset($_SESSION['USER_SUPER'])  ){
            $uuid = (new Uuid())->_uuid();

            $media = (new File())->_uploade($uuid, $_FILES['pdf'],'../disk/uploads/books/pdf/');

            if($media['status'] == !0){
                $file = (new ModelsFile)->_insert(
                    [
                        'uuid'=>$uuid,
                        'type' => $media['type'],
                        'extension' => $media['extension'],
                        'size' => $media['size'],
                        'name' => $uuid,
                        'author' => htmlspecialchars($_POST['author'])
                    ]
                );
                
                if($file['status'] == !0){
                    $uuid = (new Uuid())->_uuid();

                    $media = (new File())->_uploade($uuid, $_FILES['image'],'../disk/uploads/books/image/');

                    $insert = (new Book())->_insert([
                        "uuid"=>$uuid,
                        "name" => htmlspecialchars($_POST['name']),
                        "resume" => htmlspecialchars($_POST['resume']),
                        "file" => $file['id'],
                        "image" => $uuid.".".$media['extension'],
                        "writer"=> intval(htmlspecialchars($_POST['writer'])),
                        "category"=> intval(htmlspecialchars($_POST['category'])),
                        "author"=> intval(htmlspecialchars($_POST['author']))
                    ]);
        
                    if($insert['status'] == !0) echo $insert['id'] ; 
                    
                    
                }

                }
            
       
            
        }
        else echo 'Access Error Please login';

        


        if(isset($_POST['update']) && isset($_SESSION['USER_SUPER'])  ){
            
            $uuid = (new Uuid())->_uuid();

            $media = (new File())->_uploade($uuid, $_FILES['pdf'],'../disk/uploads/books/pdf/');

            if($media['status'] == !0){
                $file = (new ModelsFile)->_insert(
                    [
                        'uuid'=>$uuid,
                        'type' => $media['type'],
                        'extension' => $media['extension'],
                        'size' => $media['size'],
                        'name' => $uuid,
                        'author' => htmlspecialchars($_POST['_author'])
                    ]
                );
                
                if($file['status'] == !0){
                    $uuid = (new Uuid())->_uuid();

                    $media = (new File())->_uploade($uuid, $_FILES['image'],'../disk/uploads/books/image/');

                    $insert = (new Book())->_insert([
                        "uuid"=>$uuid,
                        "name" => htmlspecialchars($_POST['name']),
                        "resume" => htmlspecialchars($_POST['resume']),
                        "file" => $file['id'],
                        "image" => $uuid.".".$media['extension'],
                        "writer"=> intval(htmlspecialchars($_POST['writer'])),
                        "category"=> intval(htmlspecialchars($_POST['category'])),
                        "author"=> intval(htmlspecialchars($_POST['author'])),
                        "id" => intval(htmlspecialchars($_POST['id']))
                    ]);
        
                    if($insert['status'] == !0) echo $insert['id'] ; 
                    
                }

            if($insert['status'] == !0) ; //(new ViewsClient())->_home();
            }
        }
        else  echo "error";
        

        if(isset($_GET['delete']) && isset($_SESSION['USER_SUPER'])  ){
            $delete = (new Book())->_delete([
                "id"=> intval(htmlspecialchars($_POST['id']))  
            ]);
            if($delete['status'] == !0) echo $delete['id']; //(new ViewsAdministrator())->_Books();
        }
        else  echo "error";
        







?>