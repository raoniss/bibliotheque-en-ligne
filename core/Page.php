<?php
namespace core;
class Page {
    public function _body(){
    }
    public function _head(){
        ?>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>BIBALL</title>
    <!-- General CSS Files -->
    <?php
    ?>
<?php
}
public function _foot(){
       
}
public function _html(){
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head?>
    <?php
    $this->_head();
    ?>
    </head>
    <body>
    <?php
    $this->_body();
    $this->_foot();
    ?>
    </body>
    </html>
    <?php
   
}
}