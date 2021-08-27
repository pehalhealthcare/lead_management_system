<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- New styles are added -->

      <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css">

      <title><?= $title ?></title>

      <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>


</head>
<?php $data = $this->common_model->viewwheredata(array("action_to" => $this->session->userID, "is_read" => 0), "mk_notifications"); ?>

<body class="light loaded sidebar-mini sidebar-top-offset">
      <div id="loader" class="loader">
            <div class="plane-container">
                  <div class="preloader-wrapper small active">
                        <div class="spinner-layer spinner-blue">
                              <div class="circle-clipper left">
                                    <div class="circle"></div>
                              </div>
                              <div class="gap-patch">
                                    <div class="circle"></div>
                              </div>
                              <div class="circle-clipper right">
                                    <div class="circle"></div>
                              </div>
                        </div>

                        <div class="spinner-layer spinner-red">
                              <div class="circle-clipper left">
                                    <div class="circle"></div>
                              </div>
                              <div class="gap-patch">
                                    <div class="circle"></div>
                              </div>
                              <div class="circle-clipper right">
                                    <div class="circle"></div>
                              </div>
                        </div>

                        <div class="spinner-layer spinner-yellow">
                              <div class="circle-clipper left">
                                    <div class="circle"></div>
                              </div>
                              <div class="gap-patch">
                                    <div class="circle"></div>
                              </div>
                              <div class="circle-clipper right">
                                    <div class="circle"></div>
                              </div>
                        </div>

                        <div class="spinner-layer spinner-green">
                              <div class="circle-clipper left">
                                    <div class="circle"></div>
                              </div>
                              <div class="gap-patch">
                                    <div class="circle"></div>
                              </div>
                              <div class="circle-clipper right">
                                    <div class="circle"></div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <div id="app">
            <script>
                  /*
                   *  Add sidebar classes (sidebar-mini sidebar-collapse sidebar-expanded-on-hover) in body tag
                   *  you can remove this script tag and add classes directly to body
                   *  this is only for demo
                   */
                  document.body.className += ' sidebar-expanded-on-hover' + ' sidebar-top-offset';
            </script>
            <aside class="main-sidebar fixed offcanvas b-r" data-toggle='offcanvas'>
                  <section class="sidebar">
                        <ul class="sidebar-menu mt-4">
                              <li class="treeview <?= ($this->uri->uri_string() == "dashboard") ? "active" : "" ?>">
                                    <a class="<?= ($this->uri->uri_string() == "dashboard") ? "active" : "" ?>" href="<?= base_url() ?>">
                                          <i class="icon icon-sailing-boat-water purple-text s-24"></i> <span>Dashboard</span></i>
                                    </a>

                              </li>



                              <?php if ($this->session->role == 1) : ?>

                                    <li class="treeview <?= ($this->uri->uri_string() == "dashboard/create/products" || $this->uri->uri_string() == "dashboard/products" || $this->uri->uri_string() == "dashboard/create/products/item") ? "active" : "" ?>"><a class="" href="#">
                                                <i class="icon icon icon-package blue-text s-24"></i>
                                                <span>Products</span>
                                                <i class=" icon-angle-left  pull-right"></i>
                                          </a>
                                          <ul class="treeview-menu">
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/products") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/products"><i class="icon icon-circle-o"></i>All Products</a>
                                                </li>
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/create/products") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/products"><i class="icon icon-add"></i>Add
                                                            New </a>
                                                </li>
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/create/products/item") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/products/item"><i class="icon icon-add"></i>Add
                                                            Item </a>
                                                </li>
                                          </ul>
                                    </li>


                                    <li class="treeview <?= ($this->uri->uri_string() == "dashboard/create/services" || $this->uri->uri_string() == "dashboard/services" || $this->uri->uri_string() == "dashboard/create/services/items") ? "active" : "" ?>"><a class="" href="#">
                                                <i class="icon icon icon-package pink-text s-24"></i>
                                                <span>Services</span>
                                                <i class=" icon-angle-left  pull-right"></i>
                                          </a>
                                          <ul class="treeview-menu">
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/services") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/services"><i class="icon icon-circle-o"></i>All Services</a>
                                                </li>
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/create/services") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/services"><i class="icon icon-add"></i>Add
                                                            New </a>
                                                </li>
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/create/services/items") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/services/items"><i class="icon icon-add"></i>Add
                                                            Item </a>
                                                </li>
                                          </ul>
                                    </li>

                                    <li class="treeview <?= ($this->uri->uri_string() == "dashboard/create/terms" || $this->uri->uri_string() == "dashboard/terms") ? "active" : "" ?>"><a class="" href="#">
                                                <i class="icon icon-documents3 text-blue s-24"></i>
                                                <span>Terms</span>
                                                <i class=" icon-angle-left  pull-right"></i>
                                          </a>
                                          <ul class="treeview-menu">
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/terms") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/terms"><i class="icon icon-circle-o"></i>All Terms</a>
                                                </li>
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/create/terms") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/terms"><i class="icon icon-add"></i>Add
                                                            New </a>
                                                </li>
                                          </ul>
                                    </li>

                              <?php endif; ?>

                              <li class="treeview <?= ($this->uri->uri_string() == "dashboard/add/leads" || $this->uri->uri_string() == "dashboard/leads") ? "active" : "" ?>"><a class="" href="#">
                                          <i class="icon icon-clipboard2 text-red s-24"></i>
                                          <span>Leads</span>
                                          <i class=" icon-angle-left  pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                          <li><a class="<?= ($this->uri->uri_string() == "dashboard/leads") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/leads"><i class="icon icon-circle-o"></i>All Leads</a>
                                          </li>
                                          <?php if ($this->session->category == "OA" || $this->session->category == "OTL" || $this->session->role == "1") : ?>
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/add/leads") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/add/leads"><i class="icon icon-add"></i>Add
                                                            New </a>
                                                </li>
                                          <?php endif; ?>
                                    </ul>
                              </li>

                              <?php if ($this->session->category == "OA" || $this->session->category == "OTL" || $this->session->role == "1") : ?>

                                    <li class="treeview <?= ($this->uri->uri_string() == "dashboard/operation/order") ? "active" : "" ?>"><a class="" href="#">
                                                <i class="icon icon-shopping-cart2 text-red s-24"></i>
                                                <span>Orders</span>
                                                <i class=" icon-angle-left  pull-right"></i>
                                          </a>
                                          <ul class="treeview-menu">
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/operation/order") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/operation/order"><i class="icon icon-circle-o"></i>All Orders</a>
                                                </li>
                                          </ul>
                                    </li>

                              <?php endif; ?>

                              <li class="treeview"><a href="#">
                                          <i class="icon icon-report text-red s-24"></i>
                                          <span>Reports</span>
                                          <span class="badge r-3 badge-primary pull-right"></span>
                                    </a>
                                    <ul class="treeview-menu">
                                          <li><a href="<?= base_url() ?>dashboard/report/leads"><i class="icon icon-clipboard2"></i>Lead Reports</a>
                                          </li>
                                          <li><a href="<?= base_url() ?>dashboard/report/product"><i class="icon icon-package"></i>Product Reports</a>
                                          </li>
                                          <li><a href="<?= base_url() ?>dashboard/report/service"><i class="icon icon-package"></i>Service Reports</a>
                                          </li>
                                          <li><a href="<?= base_url() ?>dashboard/report/quotation"><i class="icon icon-clipboard2"></i>Quotation Reports</a>
                                          </li>
                                    </ul>
                              </li>


                              <?php if ($this->session->role == 1) : ?>


                                    <li class="treeview  <?= ($this->uri->uri_string() == "dashboard/create/leadcustomer" || $this->uri->uri_string() == "dashboard/leadcustomer") ? "active" : "" ?>"><a class="" href="#"><i class="icon icon-account_box light-green-text s-24"></i>Lead Customer<i class=" icon-angle-left  pull-right"></i></a>
                                          <ul class="treeview-menu">
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/leadcustomer") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/leadcustomer"><i class="icon icon-circle-o"></i>All Customers</a>
                                                </li>
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/create/leadcustomer") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/create/leadcustomer"><i class="icon icon-add"></i>Add Customer</a>
                                                </li>
                                          </ul>
                                    </li>


                                    <li class="treeview <?= ($this->uri->uri_string() == "dashboard/add/user" || $this->uri->uri_string() == "dashboard/user") ? "active" : "" ?>"><a class="" href="#"><i class="icon icon-account_box light-green-text s-24"></i>Users<i class=" icon-angle-left  pull-right"></i></a>
                                          <ul class="treeview-menu">
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/user") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/user"><i class="icon icon-circle-o"></i>All Users</a>
                                                </li>
                                                <li><a class="<?= ($this->uri->uri_string() == "dashboard/add/user") ? "active" : "" ?>" href="<?= base_url() ?>dashboard/add/user"><i class="icon icon-add"></i>Add User</a>
                                                </li>
                                          </ul>
                                    </li>

                              <?php endif; ?>

                              <li class="treeview"><a href="<?= base_url() ?>logout"><i class="icon icon-lock-open light-green-red s-24"></i>Logout</a>
                              </li>

                        </ul>

                  </section>
            </aside>

            <div class="sticky">
                  <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white b-b">
                        <div class="relative">
                              <div class="d-flex">
                                    <div>
                                          <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                                                <i></i>
                                          </a>
                                    </div>
                                    <ul class="nav responsive-tab nav-material nav-material-white mt-1 ml-3" id="v-pills-tab">
                                          <li>
                                                <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3"><i class="icon icon-calendar"></i>
                                                      <span class="date"></span></a>
                                          </li>
                                    </ul>
                              </div>
                        </div>
                        <!--Top Menu Start -->
                        <div class="navbar-custom-menu d-flex align-items-center">
                              <ul class="nav navbar-nav">


                                    <!-- Notifications -->
                                    <li class="dropdown custom-dropdown notifications-menu">
                                          <a href="#" class="nav-link  b-r b-l pl-lg-3 pr-lg-3" data-toggle="dropdown" aria-expanded="false">
                                                <i class="icon-notifications "></i>
                                                <span class="badge badge-danger badge-mini rounded-circle"></span>
                                          </a>
                                          <ul class="dropdown-menu dropdown-menu-right">
                                                <li class="header">You have notifications</li>
                                                <li>
                                                      <!-- inner menu: contains the actual data -->
                                                      <ul class="menu notifications noti-count">
                                                            
                                                      </ul>
                                                </li>
                                                <li class="footer p-2 text-center"><a href="#">View all</a></li>
                                          </ul>
                                    </li>

                              </ul>
                              <!-- Button -->
                              <div>
                                    <a href="<?= base_url() ?>logout" class="btn btn-primary btn-sm ml-3 d-none d-sm-block">Log Out</a>
                              </div>
                        </div>

                  </div>
            </div>