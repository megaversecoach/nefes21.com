<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=PROOT?>/links/all">Movie_Links</a></li>
    <li class="breadcrumb-item active">Movie_All</li>
    </ol>
</nav>
<!-- Content here -->
    <div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="card-header mb-4" style=" justify-content: space-between;">
    <span class="badge bg-primary p-2">Movie All</span>
    <div class="">
    <a href="#" class="btn btn-danger mr-2 delete-selecetd-items d-none">Delete Links &nbsp;(<b>0</b>) </a>
    <a href="<?=PROOT?>/links/new" class="btn btn-info"><i class="bi bi-plus-lg"></i> Add Link</a>
    </div>
    </div>
    <div class="table-responsive">
    <table class="table datatable">
        <thead>
        <tr>
        <th class="w-1 no-sort"><input class="form-check-input m-0 align-middle " id="select_all" type="checkbox"></th>
        <th class="w-1">#id</th>
        <th>Title</th>
        <th>Source</th>
        <th>Quality</th>
        <th>Views</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($links as $link):
            $isDrive = $link['type'] == 'GDrive' ? true : false;
            $id= $link['id'];  ?>
        <tr id="link-<?=$id?>" data-id="<?=$id?>">
        <td class="no-sort "><input class="form-check-input m-0 align-middle delete-item" type="checkbox" aria-label="Select invoice"></td>
        <td><?=$link['id']?></td>
        <td > <a href="<?=Helper::getPlyrLink($this->config['playerSlug'], $link['slug'])?>" target="_blank" class="text-reset"><?=$link['title']?></a> </td>
        <td> <img src="<?=Helper::getIcon($link['type'])?>" height="20" alt="source-icon"> </td>
        <td>
            <?php 
            $qualities = '• • •';
            if($isDrive && !empty($link['data'])){
            $qt = Helper::getQulities($link['data']);
            $qualities = implode(', ', $qt);
            }
            ?>
        <span class="badge bg-info"><?=$qualities?></span>
        </td>
        <td><?=number_format($link['views'])?></td>
        <td> <?=Helper::getStatus($link['status'])?></td>
        <td>
        <div class="btn-list flex-nowrap">
        <a href="javascript:void(0)" class="badge bg-info text-white copy-plyr-link" data-url="<?=Helper::getPlyrLink($this->config['playerSlug'], $link['slug'])?>" data-toggle="tooltip" data-placement="top" title="Copy Player Link">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-collection-play-fill" viewBox="0 0 16 16">
            <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm6.258-6.437a.5.5 0 0 1 .507.013l4 2.5a.5.5 0 0 1 0 .848l-4 2.5A.5.5 0 0 1 6 12V7a.5.5 0 0 1 .258-.437z"/>
            </svg>
        </a>
        <a href="javascript:void(0)" class="badge bg-primary text-white ml-2 copy-embed-code" data-url="<?=Helper::getPlyrLink($this->config['playerSlug'], $link['slug'])?>" data-toggle="tooltip" data-placement="top" title="Copy Embed Movie">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
            <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
            </svg>
        </a>
        <a href="<?=PROOT?>/links/edit/<?=$link['id']?>" class="badge bg-warning text-white ml-2" data-toggle="tooltip" data-placement="top" title="edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
        </a>
        <a href="javascript:void(0)" class="badge bg-danger text-white ml-2 del-link" data-toggle="tooltip" data-id="<?=$id?>" data-placement="top" title="Links Delete">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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