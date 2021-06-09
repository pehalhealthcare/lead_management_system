<!DOCTYPE html>
<html lang="en" >
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap-datepicker.min.css">
     <title><?= $title?></title>
     <script src="<?= base_url() ?>assets/js/jquery.min.js" ></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
     <script src="<?= base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
     <script src="<?= base_url() ?>assets/js/main.js"></script>
     <script src="<?= base_url() ?>assets/js/ckeditor.js"></script>
</head>
<body>



<div class="container-fluid p-0 m-0" style="height: 100%;">

<div class="wrapper d-flex align-items-stretch" style="height: auto;min-height:100%" >

<nav id="sidebar">
<div class="custom-menu" >
<button type="button" id="sidebarCollapse" class="btn btn-primary">
<i class="fa fa-bars"></i>
<span class="sr-only">Toggle Menu</span>
</button>
</div>
<div class="p-4">

<h1><a href="<?= base_url();?>" class="logo"><img src="<?= base_url();?>assets/images/logo.jpeg" style="width:100%" /></a></h1>
<ul class="list-unstyled components mb-5">
<li class="active">
<a href="<?= base_url()?>dashboard/"><span class="fa fa-home mr-3"></span> Home</a>
</li>

<?php if($this->session->role==1):?>
<li>
<a data-toggle="collapse" href="#collapseOne"><span class="fa fa-user mr-3"></span> Categories</a>
</li>
<li>
<div id="collapseOne" class="collapse <?= ($this->uri->uri_string()=="dashboard/category") ? "show" : "" ?>" data-parent="#accordion">
<ul class="list-unstyled components pl-3">
      <li><a href="<?=base_url()?>dashboard/category"><span class="fa fa-plus mr-3"> View Category</span></a></li>
</ul>
</div>
</li>
<li>
<a data-toggle="collapse" href="#collapsetwo"><span class="fa fa-briefcase mr-3"></span> Services</a>
</li>
<li>
<div id="collapsetwo" class="collapse <?= ($this->uri->uri_string()=="dashboard/services/add" || $this->uri->uri_string()=="dashboard/services" || $this->uri->uri_string()=="dashboard/services/item/add") ? "show" : "" ?>" data-parent="#accordion">
<ul class="list-unstyled components pl-3">
      <li><a href="<?=base_url()?>dashboard/services/add"><span class="fa fa-plus mr-3"> Add Services</span></a></li>
      <li><a href="<?=base_url()?>dashboard/services"><span class="fa fa-eye mr-3"> View Services</span></a></li>
      <li><a href="<?=base_url()?>dashboard/services/item/add"><span class="fa fa-plus mr-3"> Add Service Item</span></a></li>
</ul>
</div>
</li>
<li>
<a data-toggle="collapse" href="#collapseEight"><span class="fa fa-briefcase mr-3"></span>Products</a>
</li>
<li>
<div id="collapseEight" class="collapse <?= ($this->uri->uri_string()=="dashboard/products/add" || $this->uri->uri_string()=="dashboard/products" ||  $this->uri->uri_string()=="dashboard/products/item/add" ) ? "show" : ""  ?>" data-parent="#accordion">
<ul class="list-unstyled components pl-3">
      <li><a href="<?=base_url()?>dashboard/products/add"><span class="fa fa-plus mr-3"> Add Products</span></a></li>
      <li><a href="<?=base_url()?>dashboard/products"><span class="fa fa-eye mr-3"> View Products</span></a></li>
      <li><a href="<?=base_url()?>dashboard/products/item/add"><span class="fa fa-plus mr-3"> Add Products Item</span></a></li>
</ul>
</div>
</li>
<li>
<a data-toggle="collapse" href="#collapseNine"><span class="fa fa-briefcase mr-3"></span>Products Terms</a>
</li>
<li>
<div id="collapseNine" class="collapse <?= ($this->uri->uri_string()=="dashboard/products/terms/add" || $this->uri->uri_string()=="dashboard/products/terms") ? "show" : ""  ?>" data-parent="#accordion">
<ul class="list-unstyled components pl-3">
      <li><a href="<?=base_url()?>dashboard/products/terms/add"><span class="fa fa-plus mr-3"> Add Terms</span></a></li>
      <li><a href="<?=base_url()?>dashboard/products/terms"><span class="fa fa-eye mr-3"> View Terms</span></a></li>
</ul>
</div>
</li>

<?php endif;?>



<li>
<a data-toggle="collapse" href="#collapsefour"><span class="fa fa-briefcase mr-3"></span> Lead</a>
</li>
<li>
<div id="collapsefour" class="collapse <?= ($this->uri->uri_string()=="dashboard/add/leads" || $this->uri->uri_string()=="dashboard/leads") ? "show" : ""  ?>" data-parent="#accordion">
<ul class="list-unstyled components pl-3">
      <li><a href="<?=base_url()?>dashboard/add/leads"><span class="fa fa-plus mr-3"> Add Lead</span></a></li>
      <li><a href="<?=base_url()?>dashboard/leads"><span class="fa fa-eye mr-3"> View Leads</span></a></li>
      <!-- <li><a href="<?=base_url()?>dashboard/assign/leads"><span class="fa fa-eye mr-3"> Assign Leads</span></a></li> -->
</ul>
</div>
</li>


<?php if($this->session->role==1):?>
<li>
<a data-toggle="collapse" href="#collapsefive"><span class="fa fa-briefcase mr-3"></span> Lead Customer</a>
</li>
<li>
<div id="collapsefive" class="collapse <?= ($this->uri->uri_string()=="dashboard/leadcustomer/add" || $this->uri->uri_string()=="dashboard/leadcustomer") ? "show" : ""  ?>" data-parent="#accordion">
<ul class="list-unstyled components pl-3">
      <li><a href="<?=base_url()?>dashboard/leadcustomer/add"><span class="fa fa-plus mr-3"> Add Customer</span></a></li>
      <li><a href="<?=base_url()?>dashboard/leadcustomer"><span class="fa fa-eye mr-3"> View Customer</span></a></li>
      <!-- <li><a href="<?=base_url()?>dashboard/assign/leads"><span class="fa fa-eye mr-3"> Assign Leads</span></a></li> -->
</ul>
</div>
</li>
<li>
<a data-toggle="collapse" href="#collapsethree"><span class="fa fa-sticky-note mr-3"></span> User Manage</a>
</li>
<li>
<div id="collapsethree" class="collapse <?= ($this->uri->uri_string()=="dashboard/add/user" || $this->uri->uri_string()=="dashboard/user") ? "show" : ""  ?>" data-parent="#accordion">
<ul class="list-unstyled components pl-3">
      <li><a href="<?=base_url()?>dashboard/add/user"><span class="fa fa-plus mr-3"> Add User</span></a></li>
      <li><a href="<?=base_url()?>dashboard/user"><span class="fa fa-eye mr-3"> View Users</span></a></li>
</ul>
</div>
</li>
<?php endif;?>
<li>
<a href="<?=base_url()?>logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
</li>
</ul>


</div>
</nav>




