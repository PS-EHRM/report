<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Report Module
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="<?php echo base_url('assets/template/css/material-dashboard.css?v=2.1.2'); ?>" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url('assets/template/demo/demo.css'); ?>" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a href="<?php echo base_url('/'); ?>" class="simple-text logo-normal">
                    Report Module
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item <?php echo $menu =='employee-information' ? 'active' : ''; ?>  ">
                        <a class="nav-link" href="<?php echo base_url('employee-information'); ?>">
                            <p>Employee Information report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='pension-notification' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('pension-notification'); ?>">
                            <p>Pension Notification</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='employee-entitle' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('employee-entitle'); ?>">
                            <p>Employee Entitle report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='employee-gender' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('employee-gender'); ?>">
                            <p>Employee Gender report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='employee-branch' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('employee-branch'); ?>">
                            <p>Employee Branch report</p>
                        </a>
                    </li>                    
                    <li class="nav-item <?php echo $menu =='employee-age-summary' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('employee-age-summary'); ?>">
                            <p>Age wise summary Report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='employee-birthday' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('employee-birthday'); ?>">
                            <p>Birthday summary Report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='language-wise-summary' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('language-wise-summary'); ?>">
                            <p>Language wise Summary Report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='employee-confirmation' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('employee-confirmation'); ?>">
                            <p>Confirmation Report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='upcoming-confirmation' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('upcoming-confirmation'); ?>">
                            <p>Upcoming Confirmation</p>
                        </a>
                    </li>                    
                    <li class="nav-item <?php echo $menu =='increment-report' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('increment-report'); ?>">
                            <p>Increment Report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='leave-details' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('leave-details'); ?>">
                            <p>Leave Pending approval list Report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='employee-information-by-designation' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('employee-information-by-designation'); ?>">
                            <p>Employee detail report by Designation</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='employee-information-by-service' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('employee-information-by-service'); ?>">
                            <p>Employee detail report by Service</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='promoted-list' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('promoted-list'); ?>">
                            <p>Summary of promoted list Report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='class-wise-summary' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url('class-wise-summary'); ?>">
                            <p>Class wise summary Report</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo $menu =='employee-branch' ? 'active' : ''; ?>" style="display:none;">
                        <a class="nav-link" href="<?php echo base_url('employee-branch'); ?>">
                            <p>Service Extend Report</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">
                                    <i class="material-icons">dashboard</i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">