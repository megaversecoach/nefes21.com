<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Overview</li>
    </ol>
</nav>
<!-- Content here -->
<div class=" row row-deck row-cards mt-4">
   <div class="col-sm-6 col-lg-3">
      <div class="card">
         <div class="card-body py-4 px-2 text-center">
            <div class="h1 m-0">
            <span class="count"><?=$data['totalLinks']?></span>   
            </div>
            <div class="text-muted ">Total Links
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-6 col-lg-3">
      <div class="card">
         <div class="card-body py-4 px-2 text-center">
            <div class="h1 m-0">
            <span class="count"><?=$data['totalViews']?></span>     
            </div>
            <div class="text-muted ">Total Views
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-6 col-lg-3">
      <div class="card">
         <div class="card-body py-4 px-2 text-center">
            <div class="h1 m-0">
            <span class="count"><?=$data['totalServers']?></span>    
            </div>
            <div class="text-muted ">Total Servers
            </div>
         </div>
      </div>
   </div>
   <div class="col-sm-6 col-lg-3">
      <div class="card">
         <div class="card-body py-4 px-2 text-center">
            <div class="h1 m-0 text-danger">
            <span class="count"><?=$data['rft']['broken']?></span>    
            </div>
            <div class="text-muted ">Broken Links
            </div>
         </div>
      </div>
   </div>
</div>


<div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
    <div class="col">
    <div class="card text-center">
    <div class="card-header"><span class="badge bg-primary p-2 title-c">Google Drive</span></div>
    <div class="card-body text-center mt-4">
    <span class="stamp">
    <img src="<?=Helper::getIcon('GDrive')?>" height="25" alt="gdrive-icon">
    </span>
    <div class="row justify-content-center mt-4">
    <div class="col">
    <span class="badge bg-info">Links Active</span>
    </br>
    <span class="badge bg-success mt-2"><?=$data['dft']['GDrive']?></span>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card text-center">
    <div class="card-header"><span class="badge bg-primary p-2 title-c">Google Photos</span></div>
    <div class="card-body text-center mt-4">
    <span class="stamp">
    <img src="<?=Helper::getIcon('GPhoto')?>" height="28" alt="gphoto-icon">
    </span>
    <div class="row justify-content-center mt-4">
    <div class="col">
    <span class="badge bg-info">Links Active</span>
    </br>
    <span class="badge bg-success mt-2"><?=$data['dft']['GPhoto']?></span>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card text-center">
    <div class="card-header"><span class="badge bg-primary p-2 title-c">Yandex Disk</span></div>
    <div class="card-body text-center mt-4">
    <span class="stamp">
    <img src="<?=Helper::getIcon('Yandex')?>" height="25" alt="yandex-icon">
    </span>
    <div class="row justify-content-center mt-4">
    <div class="col">
    <span class="badge bg-info">Links Active</span>
    </br>
    <span class="badge bg-success mt-2"><?=$data['dft']['Yandex']?></span>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card text-center">
    <div class="card-header"><span class="badge bg-primary p-2 title-c">Direct Links MP4</span></div>
    <div class="card-body text-center mt-4">
    <span class="stamp">
    <img src="<?=Helper::getIcon('Direct')?>" height="30" alt="direct-icon">
    </span>
    <div class="row justify-content-center mt-4">
    <div class="col">
    <span class="badge bg-info">Links Active</span>
    </br>
    <span class="badge bg-success mt-2"><?=$data['dft']['Direct']?></span>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
    <div class="card-header"><span class="badge bg-primary p-2 title-c">Links Status</span></div>
    <div class="card-body mt-4">
    <div id="links-status" >
    </div>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header"><span class="badge bg-primary p-2 title-c">Servers Usage</span></div>
    <div class="card-body mt-4">
    <div id="servers-usage" >
    </div>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header"><span class="badge bg-primary p-2 title-c">Clear Cache</span></div>
    <div class="card-body">
    <div class="text-center">
    <div class="h1 text-info mt-5" id="cache-size">
        <?=Helper::formatSize($data['drSize'])?>
        </div>
        <div class="text-muted mb-2">Total Cache Size
        </div>
        <button type="button" class="btn btn-info btn-sm mt-2 mb-3" id="clear-cache" 
        <?=$data['drSize']==0?'disabled':''?> ><i class="bi bi-trash"></i> Clear Cache
        </button>
        </div>
    </div>
    </div>
    </div>
    </div>
    
    
    <div class="row row-cols-1 row-cols-md-4 g-4 mt-2">
    <div class="col">
    <div class="card h-100">
    <div class="card-header"><span class="badge bg-primary p-2 title-c">Proxy</span></div>
    <div class="card-body text-center mt-5">
    <div class="h1 m-0 text-success">
    <?=$data['proxy'][0]?>
    </div>
    </div>
    <div class="card-footer text-center p-2">Active Proxies</div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header"><a class="badge bg-info text-white p-2" href="<?=PROOT?>/settings/proxy" data-toggle="tooltip" data-placement="top" title="Settings Proxy" role="button">Proxy Settings</a></div>
    <div class="card-body mt-5">
    <div class="text-center">    
    <div class="h2 m-0 text-danger" >
    <?=$data['proxy'][1]?>
    </div>
    </div>
    </div>
    <div class="card-footer text-center p-2">Broken Proxies</div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header"><span class="badge bg-primary p-2 title-c">G-Drive OAuth</span></div>
    <div class="card-body mt-5">
    <div class="text-center">
    <div class="h2 m-0 text-success" >
    <?=$data['gauths']['active']?>
    </div>
    </div>
    </div>
    <div class="card-footer text-center p-2">Active G-Drive OAuth</div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header"><a class="badge bg-info text-white p-2" href="<?=PROOT?>/settings/gauth" data-toggle="tooltip" data-placement="top" title="G-Drive OAuth Settings" role="button">G-Drive OAuth Settings</a></div>
    <div class="card-body mt-5">
    <div class="text-center">
    <div class="h2 m-0 text-danger" >
    <?=$data['gauths']['broken']?>
    </div>
    </div>
    </div>
    <div class="card-footer text-center p-2">Broken G-Drive OAuth</div>
    </div>
    </div>
    </div>

    <div class="row mt-4">
    <div class="col">
    <div class="card">
    <div class="card-header"><span class="badge bg-primary p-2">Active Movie</span></div>
    <div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
        <th>Title</th>
        <th>Source</th>
        <th>Views</th>
        <th>Created At</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['maLinks'] as $link): ?>
        <tr>
        <td>
        <a href="<?=Helper::getPlyrLink($this->config['playerSlug'], $link['slug'])?>" target="_blank" class="badge badge-links text-capitalize">
        <?=$link['title']?>
        </a>
        </td>
        <td> 
        <img src="<?=Helper::getIcon($link['type'])?>" height="20" alt="source-icon"> 
        </td>
        <td>
        <?=number_format($link['views'])?>
        </td>
        <td class="text-muted">
        <?=Helper::formatDT($link['created_at'],false)?>
        </td>
        <td>
        <div class="btn-list flex-nowrap">
        <a href="javascript:void(0)" class="badge bg-info text-white copy-plyr-link" data-url="<?=Helper::getPlyrLink($this->config['playerSlug'], $link['slug'])?>" data-toggle="tooltip" data-placement="top" title="Copy Player Links">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection-play-fill" viewBox="0 0 16 16">
            <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm6.258-6.437a.5.5 0 0 1 .507.013l4 2.5a.5.5 0 0 1 0 .848l-4 2.5A.5.5 0 0 1 6 12V7a.5.5 0 0 1 .258-.437z"/>
            </svg>
        </a>
        <a href="javascript:void(0)" class="badge bg-primary text-white ml-2 copy-embed-code" data-url="<?=Helper::getPlyrLink($this->config['playerSlug'], $link['slug'])?>" data-toggle="tooltip" data-placement="top" title="Copy Embed Code">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
            <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
            </svg>
        </a>
        <a href="<?=PROOT?>/links/edit/<?=$link['id']?>" class="badge bg-warning text-white ml-2" data-toggle="tooltip" data-placement="top" title="Edit Movie Links">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
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
    
    <div class="card">
        <div class="card-header"><span class="badge bg-info p-2">Recently Movie</span></div>
        <div class="table-responsive">
        <table class="table">
        <thead>
        <tr>
        <th>Title</th>
        <th>Source</th>
        <th>Views</th>
        <th>Created At</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data['raLinks'] as $link): ?>
        <tr>
        <td>
        <a href="<?=Helper::getPlyrLink($this->config['playerSlug'], $link['slug'])?>" target="_blank" class="badge badge-links2 text-capitalize">
        <?=$link['title']?>
        </a>
        </td>
        <td> 
        <img src="<?=Helper::getIcon($link['type'])?>" height="20" alt="source-icon"> 
        </td>
        <td>
        <?=number_format($link['views'])?>
        </td>
        <td class="text-muted">
        <?=Helper::formatDT($link['created_at'],false)?>
        </td>
        <td>
        <div class="btn-list flex-nowrap">
        <a href="javascript:void(0)" class="badge bg-info text-white copy-plyr-link" data-url="<?=Helper::getPlyrLink($this->config['playerSlug'], $link['slug'])?>" data-toggle="tooltip" data-placement="top" title="Copy Player Links">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection-play-fill" viewBox="0 0 16 16">
            <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm6.258-6.437a.5.5 0 0 1 .507.013l4 2.5a.5.5 0 0 1 0 .848l-4 2.5A.5.5 0 0 1 6 12V7a.5.5 0 0 1 .258-.437z"/>
            </svg>
        </a>
        <a href="javascript:void(0)" class="badge bg-primary text-white ml-2 copy-embed-code" data-url="<?=Helper::getPlyrLink($this->config['playerSlug'], $link['slug'])?>" data-toggle="tooltip" data-placement="top" title="copy embed code">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-code-slash" viewBox="0 0 16 16">
            <path d="M10.478 1.647a.5.5 0 1 0-.956-.294l-4 13a.5.5 0 0 0 .956.294l4-13zM4.854 4.146a.5.5 0 0 1 0 .708L1.707 8l3.147 3.146a.5.5 0 0 1-.708.708l-3.5-3.5a.5.5 0 0 1 0-.708l3.5-3.5a.5.5 0 0 1 .708 0zm6.292 0a.5.5 0 0 0 0 .708L14.293 8l-3.147 3.146a.5.5 0 0 0 .708.708l3.5-3.5a.5.5 0 0 0 0-.708l-3.5-3.5a.5.5 0 0 0-.708 0z"/>
            </svg>
        </a>
        <a href="<?=PROOT?>/links/edit/<?=$link['id']?>" class="badge bg-warning text-white ml-2" data-toggle="tooltip" data-placement="top" title="Edit Movie Links">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
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