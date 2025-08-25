<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=PROOT?>/settings/general">Settings</a></li>
    <li class="breadcrumb-item active">New_G-Drive_OAuth</li>
    </ol>
</nav>
    <!-- Content here -->
    <div class="row">
    <div class="col">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Add/Edit G-Drive OAuth</span></div>
    <div class="card-body">
    <?=$this->displayAlerts()?>
    <form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
    <input type="text" id="server-id" class="form-control" name="id" hidden placeholder="">
    <label for="basic-url" class="form-label">Email Address</label>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3"><i class="bi bi-envelope"></i></span>
    <input type="text"  class="form-control"  name="email" value="<?=$auth['email']?>" placeholder="name@gmail.com" required>
    </div>
    <label for="basic-url" class="form-label">Client ID</label>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3"><i class="bi bi-shield-lock"></i></span>
    <input type="text"  class="form-control" name="client_id" value="<?=$auth['client_id']?>" placeholder="1078811469304-7t0qobs4o5n93vfq9eod7r74l2sn2f3h.apps.googleusercontent.com" required>
    </div>
    <label for="basic-url" class="form-label">Client Secret</label>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3"><i class="bi bi-shield-lock"></i></span>
    <input type="text"  class="form-control" name="client_secret" value="<?=$auth['client_secret']?>" placeholder="1078811469304-7t0qobs4o5n93vfq9eod7r74l2sn2f3h.apps.googleusercontent.com" required>
    </div>
    <label for="basic-url" class="form-label">Refresh Token</label>
    <div class="input-group">
    <span class="input-group-text" id="basic-addon3"><i class="bi bi-arrow-repeat"></i></span>
    <input type="text"  class="form-control" name="refresh_token" value="<?=$auth['refresh_token']?>" placeholder="1078811469304-7t0qobs4o5n93vfq9eod7r74l2sn2f3h.apps.googleusercontent.com" required>
    </div>
    <div class="form-footer text-right">
    <button type="submit" class="btn btn-primary">Save OAuth</button>
    </div>
    </form>
    </div>
    </div>
    </div>