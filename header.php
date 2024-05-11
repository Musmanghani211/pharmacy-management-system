<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/company/fav-icon.png">

    <!-- choices css -->

    <!-- newherder2 -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="vendor/css/sb-admin-2.css" rel="stylesheet">
    <!-- newherder2 -->
    <link href="assets/css/preloader.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="assets/css/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/main.css" rel="stylesheet" type="text/css"/>
<link href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css" rel="stylesheet">
<link href="css/simple-datatables-style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/font-awesome-5-all.min.js" crossorigin="anonymous"></script>
        <link href="css/vanillaSelectBox.css" rel="stylesheet" />
        <script src="js/vanillaSelectBox.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Add this line in the <head> section of your HTML document -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    </head>

    
    <style>
        table th,
        table td {
            white-space: nowrap;
        }

        
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body>
<?php

require_once('class/db.php');
ob_start(); // Start output buffering
$object = new db();
?>
   
<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
             <span class="logo-sm">
             <img src="assets/company/black-logo.png"
                             alt="Logo" height="auto"/>
             </span>
                    <span class="logo-lg"> <img src="assets/company/black-logo.png"
                             alt="Logo" height="auto"/> <span class="logo-txt"></span> </span>
                </a>
                <a href="index.php" class="logo logo-light">
             <span class="logo-sm">
             <img src="assets/company/black-logo.png"
                             alt="Logo" height="auto"/>
             </span>
                    <span class="logo-lg"> <img src="assets/company/black-logo.png"
                             alt="Logo" height="auto"/> <span class="logo-txt"></span> </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>
         
        <h2>Dashboard</h2>

        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <a href="#"
                   class="btn header-item noti-icon position-relative d-flex justify-content-center align-items-center">
                    <i class=""></i>
                    
                </a>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/company/no-img.jpg" alt="Company Logo"/>
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"> 
                    <?php echo $object->Get_user_name(); ?>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <?php
                            if($object->is_master_user())
                            {
                            ?>
                    <a class="dropdown-item" href="setting.php"><i class="mdi mdi-gesture-double-tap font-size-16 align-middle me-1"></i>Setting</a>
                    <?php } ?>
                        <a class="dropdown-item" 
                              href="profile.php"> <i class="fas fa-user-circle fa-sm fa-fw mr-2 text-gray-400"></i>Profile </a>
                              <a class="dropdown-item" 
                              href="logout.php"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout </a>
                    <form id="logout-form" action="#" method="POST" class="d-none">
                        <input type="hidden" name="_token" value="akVfaDB7kbO8VUAKG9aqOI0WY5t4vckpr73A1pKV" autocomplete="off">                    </form>
                </div>
                
            </div>
        </div>
    </div>
</header>

    <!-- ========== Left Sidebar Start ========== -->
   
    <div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
           
            <!-- Left Menu Start -->
            <ul class="list-unstyled" id="side-menu">
                <li>
                <?php
                            if($object->is_master_user())
                            {
                            ?>
                    <a href="index.php" target="_self">
                        <i class="mdi mdi-desktop-mac-dashboard"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)" target="_self" class="has-arrow">
                        <i class="mdi mdi-face-profile"></i>
                        <span data-key="t-apps">Users List</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="user.php" target="_self">
                                <span>Users</span>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)" target="_self" class="has-arrow">
                        <i class="mdi mdi-bookmark"></i>
                        <span data-key="t-apps">Categories </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="category.php" target="_self">
                                <span>All Category</span>
                            </a>
                        </li>
                        
                        </ul>
                </li>

                <li>
                    <a href="javascript:void(0)" target="_self" class="has-arrow">
                        <i class="mdi mdi-map-marker"></i>
                        <span data-key="t-apps">Location details</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="location_rack.php" target="_self">
                                <span>Location Rack</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)" target="_self" class="has-arrow">
                        <i class="mdi mdi-medical-bag"></i>
                        <span data-key="t-pages">Medicine Company</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a target="_self" href="company.php">All Medicine Company</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" target="_self" class="has-arrow">
                        <i class="mdi mdi-truck-delivery"></i>
                        <span data-key="t-pages">Medicine Supplier</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                        <a target="_self" href="supplier.php">All Medicine Supplier</a>
                        </li>
                    </ul>
                </li>
               
                <li>
                    <a href="javascript:void(0)" target="_self" class="has-arrow">
                        <i class="mdi mdi-pill"></i>
                        <span data-key="t-pages">Medicine</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                        <a target="_self" href="medicine.php">All Medicine</a>
                        </li>

                    </ul>
                </li>
                 <?php
                            }
                            ?>
                <li>
                    <a href="javascript:void(0)" target="_self" class="has-arrow">
                        <i class="mdi mdi-cart"></i>
                        <span data-key="t-pages">Medicine Purchase</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a target="_self" href="medicine_purchase.php">View Medicine Purchase</a>
                        </li>
                    </ul>
                </li>

                
                <li>
                    <a href="javascript:void(0)" target="_self" class="has-arrow">
                        <i class="mdi mdi-receipt"></i>
                        <span data-key="t-pages">Order </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a target="_self" href="order.php">Order List</a>
                        </li>
                        
                    </ul>
                </li>
              

</ul>
<div class="sb-sidenav-footer">
    <hr class="text-white">
<span class="text-white" >
<div class="mdi mdi-account d-inline-block align-middle text-white"></div>
                       Logged in as:
                       
                        <?php echo $object->Get_user_name(); ?>
                     
                    </div>
                    </span>
                    
</div>
