<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-<?=getLayoutsURI()?>/themes-assets-path="<?=getLayoutsURI()?>/themes-assets/"
  data-template="vertical-menu-template-free">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title><?=$this->getTitle()?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <meta name="msapplication-TileColor" content="#206bc4"/>
    <meta name="theme-color" content="#206bc4"/>
    <meta name="robots" content="noindex,nofollow,noarchive"/>
    <link rel="icon" href="<?=PROOT?>/uploads/<?=$this->config['favicon']?>" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?=PROOT?>/uploads/<?=$this->config['favicon']?>" type="image/x-icon"/>
    <!-- Libs CSS -->
    <link href="<?=getLayoutsURI()?>/assets/libs/selectize/assets/css/selectize.css" rel="stylesheet"/>
    <link href="<?=getLayoutsURI()?>/assets/libs/flatpickr/assets/flatpickr.min.css" rel="stylesheet"/>
    <link href="<?=getLayoutsURI()?>/assets/libs/nouislider/assetsribute/nouislider.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
    <!-- Tabler Core -->
    <link href="<?=getLayoutsURI()?>/assets/css/tabler.min.css" rel="stylesheet"/>
    <!-- Tabler Plugins -->
    <link href="<?=getLayoutsURI()?>/assets/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="<?=getLayoutsURI()?>/assets/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="<?=getLayoutsURI()?>/assets/css/tabler-buttons.min.css" rel="stylesheet"/>
    <link href="<?=getLayoutsURI()?>/assets/css/demo.min.css" rel="stylesheet"/>
    <link href="<?=getLayoutsURI()?>/assets/css/codeside-style.css" rel="stylesheet"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet"/>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/css/demo.css" />
    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="<?=getLayoutsURI()?>/themes-assets/vendor/js/helpers.js"></script>
    <script src="<?=getLayoutsURI()?>/themes-assets/js/config.js"></script>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
    <!-- Menu Sidebar -->
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
        <a href="<?=PROOT?>/dashboard" class="app-brand-link">
        <span class="app-brand-logo demo">
        <img src="<?=PROOT?>/uploads/<?=$this->config['logo']?>" height="40" alt="mxplayer" class="navbar-brand-image">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2 text-capitalize" style="color: #414EDB">MXPlayer</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
        </div>

        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
        <a href="<?=PROOT?>/dashboard" class="menu-link">
        <i class="menu-icon tf-icons bx bx-grid-alt"></i>
        <div data-i18n="Analytics">Dashboard</div>
        </a>
        </li>
        
        <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div data-i18n="Layouts">Settings</div>
        </a>

        <ul class="menu-sub">
        <li class="menu-item">
        <a href="<?=PROOT?>/settings/gauth" class="menu-link">
        <div data-i18n="Without navbar">G-Drive OAuth</div>
        </a>
        </li>
        
        
        
        <li class="menu-item">
        <a href="<?=PROOT?>/settings/backup" class="menu-link">
        <div data-i18n="Basic">Backup Movie</div>
        </a>
        </li>
        
        <li class="menu-item">
        <a href="<?=PROOT?>/settings/general" class="menu-link">
        <div data-i18n="Container">General</div>
        </a>
        </li>
        
        <li class="menu-item">
        <a href="<?=PROOT?>/settings/proxy" class="menu-link">
        <div data-i18n="Fluid">Proxy</div>
        </a>
        </li>
        </ul>
        </li>
        
        <!-- Framework -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Framework</span></li>
        <!-- Cards -->
        <li class="menu-item <?=$this->getAT('links')?>">
        <a href="<?=PROOT?>/links/all" class="menu-link">
        <i class="menu-icon tf-icons bx bx-movie-play"></i>
        <div data-i18n="Basic">Movie All</div>
        </a>
        </li>
        <li class="menu-item <?=$this->getAT('servers')?>">
        <a href="<?=PROOT?>/servers" class="menu-link">
        <i class="menu-icon tf-icons bx bx-server"></i>
        <div data-i18n="Basic">Servers List</div>
        </a>
        </li>
        
        <li class="menu-item <?=$this->getAT('bulk')?>">
        <a href="<?=PROOT?>/bulk" class="menu-link">
        <i class="menu-icon tf-icons bx bx-import"></i>
        <div data-i18n="Basic">Bulk Import</div>
        </a>
        </li>
        
        <li class="menu-item <?=$this->getAT('ads')?>">
        <a href="<?=PROOT?>/ads" class="menu-link">
        <i class="menu-icon tf-icons bx bx-dollar"></i>
        <div data-i18n="Basic">Ads Manager</div>
        </a>
        </li>
        </ul>
    </aside>
        <!-- End Menu Sidebar -->
        
        <!-- Top Menu -->
        <div class="layout-page">
        <nav
        class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
        </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="navbar-nav align-items-center">
        <div class="nav-item d-flex align-items-center">
        <a class="btn btn-info btn-sm" href="<?=PROOT?>/links/new" role="button"><i class="menu-icon tf-icons bx bx-plus-circle"></i> Create New</a>
        </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto">
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
        <img src="<?=PROOT?>/uploads/<?=$this->userImg?>" alt class="w-px-40 h-auto rounded-circle" />
        </div>
        </a>
        
        <ul class="dropdown-menu dropdown-menu-end">
        <li>
        <a class="dropdown-item" href="#">
        <div class="d-flex">
        <div class="flex-shrink-0 me-3">
        <div class="avatar avatar-online">
        <img src="<?=PROOT?>/uploads/<?=$this->userImg?>" alt class="w-px-40 h-auto rounded-circle" />
        </div>
        </div>
        <div class="flex-grow-1">
        <span class="fw-semibold d-block"><?=$this->getUsername();?></span>
        <small class="text-muted">Welcome Back</small>
        </div>
        </div>
        </a>
        </li>
        <li>
        <div class="dropdown-divider"></div>
        </li>
        <li>
        <a class="dropdown-item" href="<?=PROOT?>/profile">
        <i class="bx bx-user me-2"></i>
        <span class="align-middle">My Profile</span>
        </a>
        </li>
        <li>
        <div class="dropdown-divider"></div>
        </li>
        <li>
        <a class="dropdown-item" href="<?=PROOT?>/logout">
        <i class="bx bx-power-off me-2"></i>
        <span class="align-middle">Log Out</span>
        </a>
        </li>
        </ul>
        </li>
        </ul>
        </div>
        </nav>
        
    <!-- Content wrapper -->
    <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="content-backdrop fade"></div>
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Core JS -->
    <script src="<?=getLayoutsURI()?>/themes-assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?=getLayoutsURI()?>/themes-assets/vendor/libs/popper/popper.js"></script>
    <script src="<?=getLayoutsURI()?>/themes-assets/vendor/js/bootstrap.js"></script>
    <script src="<?=getLayoutsURI()?>/themes-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=getLayoutsURI()?>/themes-assets/vendor/js/menu.js"></script>
    <script src="<?=getLayoutsURI()?>/themes-assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="<?=getLayoutsURI()?>/themes-assets/js/main.js"></script>
    <script src="<?=getLayoutsURI()?>/themes-assets/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>