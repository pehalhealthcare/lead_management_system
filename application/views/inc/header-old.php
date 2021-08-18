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

      <!-- <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script> -->

      <script src="<?= base_url() ?>assets/js/ckeditor.js"></script>


</head>
<?php $data = $this->common_model->viewwheredata(array("action_to" => $this->session->userID, "is_read" => 0), "mk_notifications"); ?>

<body>
      <div class="container-fluid p-0 m-0" style="height: 100%;">
            <div class="wrapper d-flex align-items-stretch" style="height: auto;min-height:100%">
                  <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                              <a class="navbar-brand brand-logo" href="<?= base_url() ?>dashboard"><img src="<?= base_url() ?>assets/images/logo.png" alt="logo" /></a>
                              <a class="navbar-brand brand-logo-mini" href="<?= base_url() ?>dashboard"><img src="<?= base_url() ?>assets/images/logo.png" alt="logo" /></a>
                        </div>
                        <div class="navbar-menu-wrapper d-flex align-items-stretch">
                              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                                    <span class="mdi mdi-menu"></span>
                              </button>
                              <!-- <div class="search-field d-none d-md-block">
                                    <form class="d-flex align-items-center h-100" action="#">
                                          <div class="input-group">
                                                <div class="input-group-prepend bg-transparent">
                                                      <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                                </div>
                                                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                                          </div>
                                    </form>
                              </div> -->
                              <ul class="navbar-nav navbar-nav-right">
                                    <li class="nav-item nav-profile dropdown">
                                          <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                                <!-- <div class="nav-profile-img">
                                                      <img src="<?= base_url() ?>assets/images/faces/face1.jpg" alt="image">
                                                      <span class="availability-status online"></span>
                                                </div> -->
                                                <div class="nav-profile-text">
                                                      <p class="mb-1 text-black text-capitalize"><?= $this->session->name ?></p>
                                                </div>
                                          </a>
                                          <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                                                <a class="dropdown-item" href="#">
                                                      <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?= base_url() ?>logout">
                                                      <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                                          </div>
                                    </li>
                                    <li class="nav-item d-none d-lg-block full-screen-link">
                                          <a class="nav-link">
                                                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                                          </a>
                                    </li>
                                    <li class="nav-item d-none d-lg-block">
                                          <a class="nav-link date"></a>
                                    </li>

                                    <?php if ($data) : ?>
                                          <li class="nav-item dropdown">
                                                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                                                      <i class="mdi mdi-bell-outline"></i>
                                                      <span class="count-symbol bg-danger"></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                                      <h6 class="p-3 mb-0">Notifications</h6>
                                                      <div class="dropdown-divider"></div>
                                                      <a class="dropdown-item preview-item">
                                                            <div class="preview-item-content d-flex flex-column justify-content-center noti-count notifications">

                                                            </div>
                                                      </a>

                                                </div>
                                          </li>
                                    <?php else : ?>
                                          <li class="nav-item dropdown">
                                                <a class="nav-link count-indicator dropdown-toggle" title="No notifications" id="notificationDropdown" href="#" data-toggle="dropdown">
                                                      <i class="mdi mdi-bell-outline"></i>
                                                </a>
                                                
                                          </li>
                                    <?php endif; ?>

                                    <li class="nav-item nav-logout d-none d-lg-block">
                                          <a class="nav-link" href="<?= base_url() ?>logout ">
                                                <i class="mdi mdi-power"></i>
                                          </a>
                                    </li>
                                    <!-- <li class="nav-item nav-settings d-none d-lg-block">
                                          <a class="nav-link" href="#">
                                                <i class="mdi mdi-format-line-spacing"></i>
                                          </a>
                                    </li> -->
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
                                                <img src="<?= base_url() ?>assets/images/faces/face1.jpg" alt="profile">
                                                <span class="login-status online"></span>
                                                <!--change to offline or busy as needed-->
                                          </div>
                                          <div class="nav-profile-text d-flex flex-column">
                                                <span class="font-weight-bold mb-2"><?= $this->session->username ?></span>
                                                <span class="text-secondary text-small"></span>
                                          </div>
                                          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                                    </a>
                              </li>
                              <li class="nav-item <?= ($this->uri->uri_string() == "dashboard") ? "active" : "" ?>">
                                    <a class="nav-link <?= ($this->uri->uri_string() == "dashboard") ? "active" : "" ?>" href="<?= base_url() ?>dashboard">
                                          <span class="menu-title">Dashboard</span>
                                          <i class="mdi mdi-home menu-icon"></i>
                                    </a>
                              </li>

                              <?php if ($this->session->role == 1) : ?>

                                    <li class="nav-item <?= ($this->uri->uri_string() == "dashboard/create/services" || $this->uri->uri_string() == "dashboard/services" || $this->uri->uri_string() == "dashboard/create/services/items") ? "active" : "" ?>">
                                          <a class="nav-link" data-toggle="collapse" href="#service" aria-expanded="false" aria-controls="service">
                                                <span class="menu-title">Services</span>
                                                <i class="menu-arrow"></i>
                                                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                                          </a>
                                          <div class="collapse <?= ($this->uri->uri_string() == "dashboard/create/services" || $this->uri->uri_string() == "dashboard/services" || $this->uri->uri_string() == "dashboard/create/services/items") ? "show" : "" ?>" id="service">
                                                <ul class="nav flex-column sub-menu">
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/create/services") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/services">Add Services</a></li>
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/services") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/services">View Services</a></li>
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/create/services/items") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/services/items">Add Services Item</a></li>
                                                </ul>
                                          </div>
                                    </li>

                                    <li class="nav-item <?= ($this->uri->uri_string() == "dashboard/create/products" || $this->uri->uri_string() == "dashboard/products" || $this->uri->uri_string() == "dashboard/create/products/item") ? "active" : "" ?>">
                                          <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
                                                <span class="menu-title">Products</span>
                                                <i class="menu-arrow"></i>
                                                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                                          </a>
                                          <div class="collapse <?= ($this->uri->uri_string() == "dashboard/create/products" || $this->uri->uri_string() == "dashboard/products" || $this->uri->uri_string() == "dashboard/create/products/item") ? "show" : "" ?>" id="products">
                                                <ul class="nav flex-column sub-menu">
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/create/products") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/products">Add Products</a></li>
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/products") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/products">View Products</a></li>
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/create/products/item") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/products/item">Add Products Item</a></li>
                                                </ul>
                                          </div>
                                    </li>

                                    <li class="nav-item <?= ($this->uri->uri_string() == "dashboard/create/terms" || $this->uri->uri_string() == "dashboard/terms") ? "active" : "" ?>">
                                          <a class="nav-link" data-toggle="collapse" href="#terms" aria-expanded="false" aria-controls="terms">
                                                <span class="menu-title">Terms</span>
                                                <i class="menu-arrow"></i>
                                                <i class="mdi mdi-medical-bag menu-icon"></i>
                                          </a>
                                          <div class="collapse <?= ($this->uri->uri_string() == "dashboard/create/terms" || $this->uri->uri_string() == "dashboard/terms") ? "show" : "" ?>" id="terms">
                                                <ul class="nav flex-column sub-menu">
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/create/terms") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/terms">Add Terms</a></li>
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/terms") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/terms">View Terms</a></li>
                                                </ul>
                                          </div>
                                    </li>

                              <?php endif; ?>
                              <?php if ($this->session->category == "BA" || $this->session->category == "BTL" || $this->session->role == 1) : ?>
                                    <li class="nav-item <?= ($this->uri->uri_string() == "dashboard/add/leads" || $this->uri->uri_string() == "dashboard/leads") ? "active" : "" ?>">
                                          <a class="nav-link" data-toggle="collapse" href="#leads" aria-expanded="false" aria-controls="leads">
                                                <span class="menu-title">Leads</span>
                                                <i class="menu-arrow"></i>
                                                <i class="mdi mdi-medical-bag menu-icon"></i>
                                          </a>
                                          <div class="collapse <?= ($this->uri->uri_string() == "dashboard/add/leads" || $this->uri->uri_string() == "dashboard/leads") ? "show" : "" ?>" id="leads">
                                                <ul class="nav flex-column sub-menu">
                                                      <?php if ($this->session->category == "BTL" || $this->session->role == 1) : ?>
                                                            <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/add/leads") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/add/leads">Add Leads</a></li>
                                                      <?php endif; ?>
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/leads") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/leads"> View Leads </a></li>
                                                </ul>
                                          </div>
                                    </li>
                              <?php endif; ?>
                              <?php if ($this->session->category == "OA" || $this->session->category == "OTL" || $this->session->role == 1) : ?>
                                    <li class="nav-item <?= ($this->uri->uri_string() == "dashboard/operation/order") ? "active" : "" ?>">
                                          <a class="nav-link" data-toggle="collapse" href="#orders" aria-expanded="false" aria-controls="orders">
                                                <span class="menu-title">Orders</span>
                                                <i class="menu-arrow"></i>
                                                <i class="mdi mdi-medical-bag menu-icon"></i>
                                          </a>
                                          <div class="collapse <?= ($this->uri->uri_string() == "dashboard/operation/order") ? "show" : "" ?>" id="orders">
                                                <ul class="nav flex-column sub-menu">
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/operation/order") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/operation/order">View Orders</a></li>
                                                </ul>
                                          </div>
                                    </li>
                              <?php endif; ?>
                              <!--  -->

                              <li class="nav-item <?= ($this->uri->uri_string() == "dashboard/customize_report" || $this->uri->uri_string() == "dashboard/customize_report_fields" || $this->uri->uri_string() == "dashboard/report/leads" || $this->uri->uri_string() == "dashboard/report/quotation" || $this->uri->uri_string() == "dashboard/report/product" || $this->uri->uri_string() == "dashboard/report/service") ? "active" : "" ?>">
                                    <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports">
                                          <span class="menu-title">Reports</span>
                                          <i class="menu-arrow"></i>
                                          <i class="mdi mdi-medical-bag menu-icon"></i>
                                    </a>
                                    <div class="collapse <?= ($this->uri->uri_string() == "dashboard/customize_report" || $this->uri->uri_string() == "dashboard/customize_report_fields" || $this->uri->uri_string() == "dashboard/report/leads" || $this->uri->uri_string() == "dashboard/report/quotation" || $this->uri->uri_string() == "dashboard/report/product" || $this->uri->uri_string() == "dashboard/report/service") ? "show" : "" ?>" id="reports">
                                          <ul class="nav flex-column sub-menu">

                                                <!-- <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/customize_report") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/customize_report">Customize Report</a></li>

                                                <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/customize_report_fields") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/customize_report_fields"> Customize Report Fields </a></li> -->

                                                <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/report/leads") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/report/leads"> Leads Report </a></li>

                                                <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/report/product") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/report/product"> Product Report </a></li>

                                                <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/report/service") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/report/service"> Service Report </a></li>

                                                <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/report/quotation") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/report/quotation"> Quotation Report </a></li>
                                          </ul>
                                    </div>
                              </li>



                              <?php if ($this->session->role == 1) : ?>

                                    <li class="nav-item <?= ($this->uri->uri_string() == "dashboard/create/leadcustomer" || $this->uri->uri_string() == "dashboard/leadcustomer") ? "active" : "" ?>">
                                          <a class="nav-link" data-toggle="collapse" href="#leadsCustomer" aria-expanded="false" aria-controls="leadsCustomer">
                                                <span class="menu-title">Lead customer</span>
                                                <i class="menu-arrow"></i>
                                                <i class="mdi mdi-medical-bag menu-icon"></i>
                                          </a>
                                          <div class="collapse <?= ($this->uri->uri_string() == "dashboard/create/leadcustomer" || $this->uri->uri_string() == "dashboard/leadcustomer") ? "show" : "" ?>" id="leadsCustomer">
                                                <ul class="nav flex-column sub-menu">
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/create/leadcustomer") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/leadcustomer">Add Lead Customer</a></li>
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/leadcustomer") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/leadcustomer"> View Lead Customer</a></li>
                                                </ul>
                                          </div>
                                    </li>

                                    <li class="nav-item <?= ($this->uri->uri_string() == "dashboard/add/user" || $this->uri->uri_string() == "dashboard/user") ? "active" : "" ?>">
                                          <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
                                                <span class="menu-title">User</span>
                                                <i class="menu-arrow"></i>
                                                <i class="mdi mdi-medical-bag menu-icon"></i>
                                          </a>
                                          <div class="collapse <?= ($this->uri->uri_string() == "dashboard/add/user" || $this->uri->uri_string() == "dashboard/user") ? "show" : "" ?>" id="user">
                                                <ul class="nav flex-column sub-menu">
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/add/user") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/add/user">Add User</a></li>
                                                      <li class="nav-item"> <a class="nav-link <?= ($this->uri->uri_string() == "dashboard/user") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/user"> View User</a></li>
                                                </ul>
                                          </div>
                                    </li>
                              <?php endif; ?>
                              <li class="nav-item <?= ($this->uri->uri_string() == "logout") ? "active" : "" ?>">
                                    <a class="nav-link" href="<?= base_url() ?>logout">
                                          <span class="menu-title">Logout</span>
                                          <i class="mdi mdi-lock menu-icon"></i>
                                    </a>
                              </li>

                        </ul>
                  </nav>