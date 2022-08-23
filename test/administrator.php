<?php 
require_once "../core/autoloader.php";
use views\Administrator ;

(new Administrator())->_login();
echo $_SESSION['USER_EMAIL'];