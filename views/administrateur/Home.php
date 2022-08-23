<?php

namespace views\administrateur;
require_once('../core/autoloader.php');
use core\Page;

class Home extends Page {
    public function __construct(){
        $this->_html();
    }
    public function _html(){
        parent::_html();

    }
    public function _head(){
        parent::_head();
        ?>
<?php
    }
    public function _body(){
        parent::_body();
        ?>
    <h1>
        <?php echo $_SESSION['USER_NAME']; ?>
    </h1>
<?php
    }
    public function _foot(){
        parent::_foot();
        ?>
<?php
    }
}