<!DOCTYPE html>

<html

    lang="en"

    class="light-style customizer-hide"

    dir="ltr"

    data-theme="theme-default"

    data-assets-path="<?=getLayoutsURI()?>/themes-assets/"

    data-template="vertical-menu-template-free">

<head>

    <meta charset="utf-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>

    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <title>Nefes21 Player| Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <meta name="msapplication-TileColor" content="#206bc4"/>

    <meta name="theme-color" content="#206bc4"/>

    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>

    <meta name="apple-mobile-web-app-capable" content="yes"/>

    <meta name="mobile-web-app-capable" content="yes"/>

    <meta name="HandheldFriendly" content="True"/>

    <meta name="MobileOptimized" content="320"/>

    <meta name="robots" content="noindex,nofollow,noarchive"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Favicon -->

    <link rel="icon" href="<?=PROOT?>/uploads/<?=$this->config['favicon']?>" type="image/x-icon"/>

    <link rel="shortcut icon" href="<?=PROOT?>/uploads/<?=$this->config['favicon']?>" type="image/x-icon"/>

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet"/>

    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/vendor/css/core.css" class="template-customizer-core-css" />

    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/css/demo.css" />

    <link href="<?=getLayoutsURI()?>/assets/css/custom.css?v=2.2" rel="stylesheet"/>

    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/vendor/fonts/boxicons.css" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?=getLayoutsURI()?>/themes-assets/vendor/css/pages/page-auth.css" />

    <script src="<?=getLayoutsURI()?>/themes-assets/vendor/js/helpers.js"></script>

    <script src="<?=getLayoutsURI()?>/themes-assets/js/config.js"></script>

</head>

<body>

    <div class="container-xxl">

    <div class="authentication-wrapper authentication-basic container-p-y">

    <div class="authentication-inner">

    <div class="card">

    <div class="card-body">

    <?php $this->displayAlerts(); ?> 

    <div class="app-brand justify-content-center">

    <a href="<?=PROOT?>" class="app-brand-link gap-2">

    <span class="app-brand-logo demo">

    <img src="<?=PROOT?>/uploads/<?=$this->config['logo']?>" height="40" alt="gdplyr" class="navbar-brand-image">                  

    </span>

    <span class="app-brand-text demo fw-bolder text-capitalize " style="color: #414EDB">Nefes21 Player</span>

    </a>

    </div>

    <h4 class="mb-2 text-center mb-4">Welcome To Nefes21 Player</h4>



    <form class="card-md" action="<?=$_SERVER['REQUEST_URI']?>" method="post">

    <label for="basic-url" class="form-label">Username</label>

    <div class="input-group mb-3">

    <span class="input-group-text" id="basic-addon3"><i class="bi bi-person"></i></span>

    <input type="text" class="form-control" name="username" placeholder="Enter username" autocomplete="off" required>

    </div>

                  

    <label for="basic-url" class="form-label">Password</label>

    <div class="input-group mb-3">

    <span class="input-group-text" id="basic-addon3"><i class="bi bi-shield-lock"></i></span>

    <input type="password" class="form-control" name="password"  placeholder="Enter password" required>

    <span class="input-group-text">

    <a href="#" class="link-secondary" title="Show password" data-toggle="tooltip">

        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">

        <path stroke="none" d="M0 0h24v24H0z"/>

        <circle cx="12" cy="12" r="2" />

        <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />

        <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />

        </svg>

    </a>

    </span>

    </div>

    <div class="mb-3">

    <div class="form-check">

    <input class="form-check-input" type="checkbox" id="remember-me" />

    <label class="form-check-label" for="remember-me"> Remember Me </label>

    </div>

    </div>

    <div class="form-footer">

    <button type="submit" class="btn btn-info">Sign In</button>

    </div>

    </div>

    </form>

    <div class="card-footer text-center p-2">

    &#169; <?php echo date("Y"); ?> 



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