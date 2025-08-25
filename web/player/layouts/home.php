<!DOCTYPE html>
<html lang="en">
<head> 
<!-- Required meta tags -->
    <meta charset="utf-8">
    <title>404 Not Found | MXPlayer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?=PROOT?>/uploads/<?=$this->config['favicon']?>" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?=PROOT?>/uploads/<?=$this->config['favicon']?>" type="image/x-icon"/>
    <link href="<?=getLayoutsURI()?>/assets/css/notfound.css" rel="stylesheet"/>
</head>
<body>
    <main>
    <section class="vh-100 d-flex align-items-center justify-content-center">
    <div class="container">
    <div class="row">
    <div class="col-12 text-center d-flex align-items-center justify-content-center">
    <div>
    <img class="img-fluid w-75" src="../../layouts/assets/img/404.svg" alt="404 not found">
    <h1 class="mt-4 mb-4">Page Not <span class="fw-bolder text-info">Found</span></h1>
    <p class="h5 text-danger mb-4">Requested URL Not Allowed, By Our Server, Thanks</p>
    <div class="btn-group">
    <a href="<?=PROOT?>/dashboard" class="btn btn-outline-primary btn-sm">Back To Dashboard</a>
    <a href="<?=PROOT?>/login" class="btn btn-outline-success btn-sm">Back To Login</a>
    </div>
    </div>
        </div>
            </div>
                </div>
    </section>
    </main>
</body>
</html>
