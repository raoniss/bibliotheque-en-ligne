<?php

namespace views\administrateur;

require_once('../core/autoloader.php');

use core\Page;

class Home extends Page
{
    private $data;
    public function __construct($data = [])
    {
        $this->data = $data;
        $this->_html();
    }
    public function _html()
    {
        parent::_html();
    }
    public function _head()
    {
        parent::_head();
?>
        
    <?php
    }
    public function _body()
    {
        parent::_body();
    ?>
        <div class="loader"></div>
        <div id="app">
            <div class="main-wrapper main-wrapper-1">
                <!-- nav -->
                <nav class="navbar navbar-expand-lg main-navbar">
                    <div class="form-inline me-auto">
                        <ul class="navbar-nav mr-3">
                            <li>
                                <a href="#" data-bs-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                                    <i data-feather="align-justify"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                    <i data-feather="maximize"></i>
                                </a>
                            </li>
                            <li>
                                <form class="form-inline me-auto">
                                    <div class="search-element d-flex">
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <ul class="navbar-nav navbar-right">

                        <li class="dropdown dropdown-list-toggle"><a href="#" data-bs-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i data-feather="bell"></i>
                                <span class="badge headerBadge2">
                                    3 </span> </a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                                <div class="dropdown-header">
                                    Notifications
                                    <div class="float-right">
                                        <a href="#">Mark All As Read</a>
                                    </div>
                                </div>
                                <div class="dropdown-list-content dropdown-list-icons">
                                    <a href="#" class="dropdown-item dropdown-item-unread"> <span class="dropdown-item-icon bg-primary text-white"> <i class="fas
												fa-code"></i>
                                        </span> <span class="dropdown-item-desc"> Template update is
                                            available now! <span class="time">2 Min
                                                Ago</span>
                                        </span>
                                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white">
                                            <i class="far
												fa-user"></i>
                                        </span> <span class="dropdown-item-desc"> <b>You</b> and <b>Dedik
                                                Sugiharto</b> are now friends <span class="time">10 Hours
                                                Ago</span>
                                        </span>
                                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-success text-white"> <i class="fas
												fa-check"></i>
                                        </span> <span class="dropdown-item-desc"> <b>Kusnaedi</b> has
                                            moved task <b>Fix bug header</b> to <b>Done</b> <span class="time">12
                                                Hours
                                                Ago</span>
                                        </span>
                                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-danger text-white"> <i class="fas fa-exclamation-triangle"></i>
                                        </span> <span class="dropdown-item-desc"> Low disk space. Let's
                                            clean it! <span class="time">17 Hours Ago</span>
                                        </span>
                                    </a> <a href="#" class="dropdown-item"> <span class="dropdown-item-icon bg-info text-white">
                                            <i class="fas
												fa-bell"></i>
                                        </span> <span class="dropdown-item-desc"> Welcome to Aegis
                                            template! <span class="time">Yesterday</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="dropdown-footer text-center">
                                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown"><a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                            <div class="dropdown-menu dropdown-menu-right pullDown">
                                <div class="dropdown-title">Hello Sarah Smith</div>
                                <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
                                </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                    Activities
                                </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- sidebar -->
                <div class="main-sidebar sidebar-style-2">
                    <aside id="sidebar-wrapper">
                        <div>
                            <h1><?php
                                //echo $_SESSION['USER_SUPER']; 
                                ?></h1>
                        </div>
                        <ul class="sidebar-menu">
                            <li class="menu-header">Gestion physique</li>
                            <li class="dropdown active">
                                <a href="#" class="nav-link has-dropdown"><i data-feather="monitor"></i><span>UTILISATEUR</span></a>
                                <ul class="dropdown-menu">
                                    <li class="active"><a class="nav-link" href="list">Administrateur</a></li>
                                    <li><a class="nav-link" href="lect.php">Lecteur</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i data-feather="briefcase"></i><span>OUVRAGE</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="cat.php">Categories</a></li>
                                    <li><a class="nav-link" href="livre.php">Livres</a></li>
                                    <li><a class="nav-link" href="livreN.php">Nouveautes</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i data-feather="command"></i><span>ABONNEMENT</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="abon.php">Abonnes</a></li>
                                    <li><a class="nav-link" href="catAbon.php">Categories</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i data-feather="mail"></i><span>EMPRUNT</span></a>
                                <ul class="dropdown-menu">
                                    <li><a class="nav-link" href="loans.php">Emprunts</a></li>
                                    <li><a class="nav-link" href="res.php">Reservations</a></li>
                                </ul>
                            </li>
                        </ul>
                    </aside>
                </div>
                <!-- Main Content -->
                <div class="main-content">
                    <section class="section">
                        <div class="section-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Liste des admins</h4>



                                            <div class="card-header-action">
                                                <form>
                                                    <div class="input-group">

                                                        <div class="card-body">
                                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".bd-ajout">Ajouter</button>
                                                        </div>

                                                        <input type="text" class="form-control" placeholder="Search">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>



                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="sortable-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">
                                                            </th>
                                                            <th>Nom</th>
                                                            <th>Prenom</th>
                                                            <th>Email</th>
                                                            <th>Debut</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($this->data as $key => $values) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="sort-handler text-center">
                                                                    </div>
                                                                </td>
                                                                <td><?php print_r($values["name"]) ?></td>
                                                                <td><?php print_r($values["first_name"]) ?></td>
                                                                <td><?php print_r($values["email"]) ?></td>
                                                                <td><?php print_r($values["created_at"]) ?></td>

                                                                <td>
                                                                    <a class="btn btn-action bg-purple mr-1" data-bs-toggle="tooltip" title="Edit" href="admins?list&id=<?php print_r($values["id"]); ?>">
                                                                        <i class="fas fa-pencil-alt"></i>
                                                                    </a>
                                                                    <a class="btn btn-danger btn-action" data-bs-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')" href="admins?delete&id=<?php print_r($values["id"]); ?>">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                    <!--modal de ma form-->
                    <div class="modal fade bd-ajout" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myLargeModalLabel">Ajout d'un administrateur</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="admins">
                                        <div>
                                            <h1><?php print_r($this->data[0]["name"]); // echo $_SESSION['USER_SUPER']; 
                                                ?></h1>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="frist_name">Nom</label>
                                                <input id="frist_name" type="text" class="form-control" name="name" autofocus>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="last_name">Prenom</label>
                                                <input id="last_name" type="text" class="form-control" name="first_name">
                                            </div>
                                            <div class="form-group col-6">
                                                <input id="last_name" type="hidden" class="form-control" name="user" value="<?php echo $_SESSION['USER_SUPER']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email">
                                            <div class="invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="password" class="d-block">Password</label>
                                                <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                                <div id="pwindicator" class="pwindicator">
                                                    <div class="bar"></div>
                                                    <div class="label"></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="password2" class="d-block">Password Confirmation</label>
                                                <input id="password2" type="password" class="form-control" name="password-confirm">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" name="insert">
                                                AJOUTER
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php
    }
    public function _foot()
    {
        parent::_foot();
    ?>

        <script src="public/bundles/cleave-js/dist/cleave.min.js"></script>
        <script src="public/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
        <script src="public/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
        <script src="public/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="public/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="public/js/page/forms-advanced-forms.js"></script>
        <script src="public/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
        <script src="public/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script src="public/bundles/select2/dist/js/select2.full.min.js"></script>
        <script src="public/bundles/jquery-selectric/jquery.selectric.min.js"></script>
        <script src="public/bundles/prism/prism.js"></script>

<?php
    }
}
