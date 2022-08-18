<?php
require_once('../core/autoloader.php');

use models\Ouvrage;

if(isset($_GET['list'])) print_r((new Ouvrage())->_get() );



?>