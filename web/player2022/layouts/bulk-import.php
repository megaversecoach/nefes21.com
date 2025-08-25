<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Bulk_Import</li>
    </ol>
</nav>
<!-- Content here -->
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Bulk Import</span></div>
    <div class="card-body">
    <?=$this->displayAlerts()?>
    <form >
    <input type="text" id="server-id" class="form-control" name="id" hidden placeholder="">
    <div class="form-group mb-3">
    <textarea class="form-control" id="link-list"  placeholder="https://drive.google.com/file/d/xxxxxxxxxxxxxxxxxxxxxx/view" rows="8"></textarea>                       
    </div>
    <div class="form-footer text-right">
    <button type="reset" class="btn btn-info">Reset</button>
    <button type="button" class="btn btn-primary ml-2" id="import-link">Import</button>
    </div>
    </form>
     </div>
        </div>
    <div class="row df d-none ">
    <div class="col-md-9">
        <div class="card">
        <div class="card-body">
        <div class="text-left">
        <a href="javascript:void(0)" class="badge bg-info text-white" id="clear-logs">Clear Logs</a>                   
        </div>
        <ul id="mi-response" class="list-group-flush" style="list-style-type: decimal-leading-zero;">
        </li>
        </ul> 
        </div>
        </div>
        </div>
    <div class="col-md-3">
        <div class="card">
        <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"> <b>Total Links : <span class="float-right t-links">0</span></b> </li>
            <li class="list-group-item text-warning"> <b>Pending : <span class="float-right p-links">0</span> </b> </li>
            <li class="list-group-item text-success"> <b>Success : <span class="float-right s-links">0</span></b> </li>
            <li class="list-group-item text-danger"> <b>Failed : <span class="float-right f-links">0</span></b> </li>
        </ul>
    </div>
        </div>
            </div>
                </div>
