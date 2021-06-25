<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- New styles are added -->
      <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.base.css">
      <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">


      <title><?= $title ?></title>
      <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
      <script src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
      <script src="<?= base_url() ?>assets/js/main.js"></script> -->
      <script src="<?= base_url() ?>assets/js/ckeditor.js"></script>


      
</head>

<body>
      <div class="container-fluid p-0 m-0" style="height: 100%;">
            <div class="wrapper d-flex align-items-stretch" style="height: auto;min-height:100%">
                  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                              <a class="navbar-brand brand-logo" href="<?= base_url()?>"><img src="<?= base_url() ?>assets/images/logo.png" alt="logo" /></a>
                              <a class="navbar-brand brand-logo-mini" href="<?= base_url()?>"><img src="<?= base_url() ?>assets/images/logo.png" alt="logo" /></a>
                        </div>
                        <div class="navbar-menu-wrapper d-flex align-items-stretch">
                              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                                    <span class="mdi mdi-menu"></span>
                              </button>
                              <div class="search-field d-none d-md-block">
                                    <form class="d-flex align-items-center h-100" action="#">
                                          <div class="input-group">
                                                <div class="input-group-prepend bg-transparent">
                                                      <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                                </div>
                                                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                                          </div>
                                    </form>
                              </div>
                              <ul class="navbar-nav navbar-nav-right">
                                    <li class="nav-item nav-profile dropdown">
                                          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                                <div class="nav-profile-img">
                                                      <img src="<?= base_url()?>assets/images/faces/face1.jpg" alt="image">
                                                      <span class="availability-status online"></span>
                                                </div>
                                                <div class="nav-profile-text">
                                                      <p class="mb-1 text-black"><?= $this->session->username?></p>
                                                </div>
                                          </a>
                                          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                                <a class="dropdown-item" href="#">
                                                      <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">
                                                      <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                                          </div>
                                    </li>
                                    <li class="nav-item d-none d-lg-block full-screen-link">
                                          <a class="nav-link">
                                                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                                          </a>
                                    </li>
                                    <li class="nav-item dropdown">
                                          <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-email-outline"></i>
                                                <span class="count-symbol bg-warning"></span>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                                                <h6 class="p-3 mb-0">Messages</h6>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item preview-item">
                                                      <div class="preview-thumbnail">
                                                            <img src="<?= base_url()?>assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                                                      </div>
                                                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                                                            <p class="text-gray mb-0"> 1 Minutes ago </p>
                                                      </div>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item preview-item">
                                                      <div class="preview-thumbnail">
                                                            <img src="<?= base_url()?>assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                                                      </div>
                                                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                                                            <p class="text-gray mb-0"> 15 Minutes ago </p>
                                                      </div>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item preview-item">
                                                      <div class="preview-thumbnail">
                                                            <img src="<?= base_url()?>assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                                                      </div>
                                                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                                                            <p class="text-gray mb-0"> 18 Minutes ago </p>
                                                      </div>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                                          </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                          <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                                <i class="mdi mdi-bell-outline"></i>
                                                <span class="count-symbol bg-danger"></span>
                                          </a>
                                          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                                <h6 class="p-3 mb-0">Notifications</h6>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item preview-item">
                                                      <div class="preview-thumbnail">
                                                            <div class="preview-icon bg-success">
                                                                  <i class="mdi mdi-calendar"></i>
                                                            </div>
                                                      </div>
                                                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                            <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                                                            <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                                                      </div>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item preview-item">
                                                      <div class="preview-thumbnail">
                                                            <div class="preview-icon bg-warning">
                                                                  <i class="mdi mdi-settings"></i>
                                                            </div>
                                                      </div>
                                                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                            <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                                                            <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                                                      </div>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item preview-item">
                                                      <div class="preview-thumbnail">
                                                            <div class="preview-icon bg-info">
                                                                  <i class="mdi mdi-link-variant"></i>
                                                            </div>
                                                      </div>
                                                      <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                                            <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                                                            <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                                                      </div>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
                                          </div>
                                    </li>
                                    <li class="nav-item nav-logout d-none d-lg-block">
                                          <a class="nav-link" href="<?= base_url()?>logout ">
                                                <i class="mdi mdi-power"></i>
                                          </a>
                                    </li>
                                    <li class="nav-item nav-settings d-none d-lg-block">
                                          <a class="nav-link" href="#">
                                                <i class="mdi mdi-format-line-spacing"></i>
                                          </a>
                                    </li>
                              </ul>
                              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                                    <span class="mdi mdi-menu"></span>
                              </button>
                        </div>
                  </nav>

                  <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="<?= base_url()?>assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?= $this->session->username?></span>
                  <span class="text-secondary text-small"></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>

            <?php if ($this->session->role == 1) : ?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#service" aria-expanded="false" aria-controls="service">
                <span class="menu-title">Services</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="service">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/create/services">Add Services</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/services">View Services</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/create/services/items">Add Services Item</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/create/products">Add Products</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/products">View Products</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/create/products/item">Add Products Item</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#terms" aria-expanded="false" aria-controls="terms">
                <span class="menu-title">Terms</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="terms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/create/terms">Add Terms</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/terms">View Terms</a></li>
                </ul>
              </div>
            </li>  

            <?php endif;?>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#leads" aria-expanded="false" aria-controls="leads">
                <span class="menu-title">Leads</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="leads">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/add/leads">Add Leads</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/leads"> View Leads </a></li>
                </ul>
              </div>
            </li>
            <?php if ($this->session->role == 1) : ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#leadsCustomer" aria-expanded="false" aria-controls="leadsCustomer">
                <span class="menu-title">Lead customer</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="leadsCustomer">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/create/leadcustomer">Add Lead Customer</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/leadcustomer"> View Lead Customer</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
                <span class="menu-title">User</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="user">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/add/user">Add User</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?= base_url() ?>dashboard/user"> View User</a></li>
                </ul>
              </div>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>logout">
                <span class="menu-title">Logout</span>
                <i class="mdi mdi-lock menu-icon"></i>
              </a>
            </li>
            
          </ul>
        </nav>