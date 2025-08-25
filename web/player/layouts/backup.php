<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Movie_Backup</li>
    </ol>
</nav>
    <!-- Content here -->
    <div class="row">
    <div class="col">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Movie Backup</span></div>
    <div class="card-body">
    <?=$this->displayAlerts()?>
    <div class="row align-items-center">
    <div class="col-auto">
    <p> <b>Last Backup</b> : <br> <?=Helper::formatDT($this->config['last_backup'])?> </p>
    </div>
    <div class="col-auto ml-auto d-print-none">
        <!-- <span class="d-none d-sm-inline">
        <a href="#" class="btn btn-secondary">
        New view
        </a>
        </span> -->
    <a href="<?=PROOT?>/settings/backup?i=1" class="btn btn-primary ml-3 d-none d-sm-inline-block">Get Backup</a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>