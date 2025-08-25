<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Edit_Profile</li>
    </ol>
</nav>
    <!-- Content here -->
    <div class="row">
    <div class="col-8">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Edit Profile</span></div>
    <div class="card-body">
    <?=$this->displayAlerts()?>
    <form action="<?=$_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data" >
    <input type="text" id="server-id" class="form-control" name="id" hidden placeholder="">
    <div class="form-group mb-3">
    <label class="form-label">Username</label>
    <input type="text"  class="form-control"  name="username" value="<?=$user['username']?>" placeholder="Enter username">
    </div>
    <div class="form-group mb-3">
    <label class="form-label">New password</label>
    <input type="password"  class="form-control" name="password" placeholder="Enter new password">
    </div>
    <div class="form-group mb-3">
    <label class="form-label">Confirm password</label>
    <input type="password"  class="form-control" name="confirm_passsword" placeholder="Confirm new password">
    </div>
    <div class="form-group mb-3">
    <label class="form-label">Upload Picture</label>
    <input type="file"  class="form-control" name="image">
    <input type="text" name="image" value="<?=$user['img']?>" hidden >
    <?php if(!empty($user['img'])): ?>
    </div>
    <div class="form-footer">
    <div class="row">
    <div class="col">
    <button type="submit" class="btn btn-primary">Save Profile</button>
    </div>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    <div class="col-4">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-primary p-2 title-c">Profile Picture</span></div>
    <div class="card-body text-center">
    <img src="<?=PROOT?>/uploads/<?=$user['img']?>" height="100" alt="profile-image">
    <?php endif; ?>    
    </div>
    <div class="card-footer text-center p-2">
    &#169; 2021-<?php echo date("Y"); ?> <a href="https://codeside.biz.id" target="_blank">Codeside ID</a></div>
    </div>