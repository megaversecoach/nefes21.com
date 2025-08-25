<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=PROOT?>/settings/general">Settings</a></li>
    <li class="breadcrumb-item active">Proxy</li>
    </ol>
</nav>
<!-- Content here -->
    <form action="<?=$_SERVER['REQUEST_URI']?>" method="post" id="">
    <div class="row">
    <div class="col-md-4">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-success p-2 mr-2">Active Proxy </span> <span class="badge bg-success p-2">(<?=$nap?>)</span></div>
    <div class="card-body">
    <div class="form-group mb-3">
    <textarea class="form-control" name="activeProxy" id="proxy-list"  placeholder="list active proxy" rows="10" ><?=$activeProxy?></textarea>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-danger p-2 mr-2">Broken Proxy</span> <span class="badge bg-danger p-2">(<?=$nap?>)</span></div>
    <div class="card-body">
    <div class="form-group mb-3">
    <textarea class="form-control" name="brokenProxy"   placeholder="broken proxy list" rows="10" ><?=$brokenProxy?></textarea>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-info p-2">Proxy Authentication</span></div>
    <div class="card-body">
    <div class="form-group text-right">
    <button type="button" class="btn btn-primary btn-sm" id="check-proxy">Verification</button>
    </div>
    <div class="proxy-progress d-none my-3">
    <div class="text-muted" style="    display: flex;
    justify-content: space-between;">
    <div>
    <span class="p-proxy">0</span>/<span  class="t-proxy">0</span>
    </div>
    <div> <span class="p-valume"></span> </div>
    </div>
    <div class="progress progress-sm ">
    <div class="progress-bar" style="width: 0%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
    </div>
    </div>
    </div>
    <div class="mb-3">
    <label class="form-label">Proxy username : </label>
    <input type="text" class="form-control" name="proxyUser" value="<?=$this->config['proxyUser']?>" placeholder="proxy-user">
    </div>
    <div class="mb-3">
    <label class="form-label">Proxy password : </label>
    <input type="text" class="form-control" name="proxyPass" value="<?=$this->config['proxyPass']?>"  placeholder="**********">
    </div>
    <div class="form-footer">
    <button type="submit" class="btn btn-primary btn-block">Save</button>
    </div>
    </div>
    </div>
    </div>
    </form>