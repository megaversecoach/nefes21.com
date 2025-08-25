<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=PROOT?>/settings/general">Settings</a></li>
    <li class="breadcrumb-item active">G-Drive_OAuth</li>
    </ol>
</nav>
<!-- Content here -->
    <div class="row">
    <div class="col">
    <div class="card">
    <div class="card-header mb-4" style="justify-content: space-between;">
    <span class="badge bg-primary p-2">G-Drive OAuth</span>
    <div class="">
    <a href="<?=PROOT?>/settings/gauth/new" class="btn btn-info"><i class="bi bi-plus-lg"></i> Add Account</a>
    </div>
    </div>
    <div class="card-body">
    <div id="alert-wrap"></div>
    <div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
        <th>Email</th>
        <th>Status</th>
        <th>Last Updated At</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($auths as $auth): ?>
        <tr>
        <td><?=$auth['email']?></td>
        <td>
        <?php if($auth['status'] == 0): ?>
        <span class="badge bg-green-lt sd-<?=$auth['id']?>">Active</span>
        <?php else: ?>
        <span class="badge bg-red-lt sd-<?=$auth['id']?>">Broken</span>
        <?php endif; ?>
        </td>
        <td><?=Helper::formatDT($auth['updated_at'],false)?></td>
        <td>
        <div class="btn-list flex-nowrap">
        <a href="<?=PROOT?>/settings/gauth/edit/<?=$auth['id']?>" class="text-info ml-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
        </a>
        <a href="javascript:void(0)" class="text-primary ml-2 refresh-gauth"  data-toggle="tooltip" data-placement="top" title="" data-id="<?=$auth['id']?>" data-original-title="Refresh">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
            </svg>
        </a>
        <a href="javascript:void(0)" class="text-danger del-gauth ml-2" data-url="<?=PROOT?>/settings/gauth/del/<?=$auth['id']?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
        </a>
        </div>
        </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>