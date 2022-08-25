<?php

namespace views\administrateur;
require_once('../core/autoloader.php');
use core\Page;

class Administrator_modif extends Page {
    private $data;
    public function __construct($data = []){
        $this->data = $data;
        $this->_html();
    }
    public function _login(){
        $this->_html();
    }
    public function _html(){
        parent::_html();

    }
    public function _head(){
        parent::_head();
        ?>
<title>Aegis - Admin Dashboard Template</title>
<?php
    }
    public function _body(){
        parent::_body();
        ?>
<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div
                    class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>modifier les information de l'utilisateur
                                <?php print_r( $this->data[0]["name"]) ;// echo $_SESSION['USER_SUPER']; ?></h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="admins">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="frist_name">Nom</label>
                                        <input id="frist_name" type="text" class="form-control" name="name"
                                            value="<?php print_r( $this->data[0]["name"]) ; ?>" autofocus>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="last_name">Prenom</label>
                                        <input id="last_name" type="text" class="form-control" name="first_name"
                                            value="<?php print_r( $this->data[0]["first_name"]) ; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="custom-switch mt-2">
                                        <input type="checkbox" name="user"
                                            class="custom-switch-input" value="true">
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Activer Super-administrateur</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="<?php print_r( $this->data[0]["email"]) ; ?>">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Nouveau Password</label>
                                        <input id="password" type="password" class="form-control pwstrength"
                                            data-indicator="pwindicator" name="password">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password2" class="d-block">Nouveau Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control"
                                            name="password-confirm">
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php print_r( $this->data[0]["id"]) ; ?>">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="update">
                                        MODIFIER
                                    </button>
                                    <a  class="btn btn-danger btn-lg btn-block"
                                        href="admins?home">
                                        ANNULER
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
    }
    public function _foot(){
        parent::_foot();
        ?>
<?php
    }
}