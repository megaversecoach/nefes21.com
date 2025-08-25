<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=PROOT?>/links/all">Links</a></li>
    <li class="breadcrumb-item active">Edit Links</li>
    </ol>
</nav>
<!-- Content here -->
    <form action="<?=$_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data" >
    <div class="row">
    <div class="col-md-8">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Edit Links</span></div>
    <div class="card-body">
    <?php $this->displayAlerts(); ?>
    <label for="basic-url" class="form-label">Video Title</label>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3"><i class="bi bi-collection-play"></i></span>
    <input type="text" class="form-control" name="title" value="<?=$link['title']?>"  placeholder="Enter file name">
    </div>
    
    <div class="form-group mb-3 ">
    <div>
    <label for="basic-url" class="form-label">Main Link*</label>
    <div class="input-group mb-3">
    <span class="input-group-text" data-toggle="tooltip" data-placement="top" title="<?=$link['type']?>" id="basic-addon3"><img src="<?=Helper::getIcon($link['type'])?>" height="15" alt=""></span>
    <input type="text" class="form-control" name="main_link" value="<?=$link['main_link']?>" placeholder="Enter your main link" required>
    </div>
    <span class="badge bg-small">Supported Sources: Google Drive, Google Photos, Direct Links Mp4</span>
    </div>
    </div>
               
    <label for="basic-url" class="form-label">Alternative Link/s</label>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon3"><i class="bi bi-link-45deg"></i></span>
    <input type="text" class="form-control" name="alt_link" value="<?=$link['alt_link']?>" placeholder="Enter your alternative link">
    </div>
    <span class="badge bg-small">Supported Sources: Google Drive, Google Photos, Direct Links Mp4</span>
               
    <div class="form-group mb-3 mt-4">
        <label class="form-label">Subtitles</label>
        <div class="" id="sub-list">
        <?php foreach($link['subtitles'] as $k => $sub): ?>
        <div class="row row-sm mb-2" id="<?=$k==0?'add-sub-dumy':''?>">
        <div class="col-auto">
        <select class="form-select" name="sub[<?=$k+1?>][label]" style="min-width: 175px;">
        <?php    
        $subLables = json_decode($this->config['sublist'], true);
        foreach($subLables as $sublbl):
        $selected = $sub['label'] == $sublbl ? 'selected' : '';
        ?>
        <option value="<?=$sublbl?>" <?=$selected?>><?=ucwords($sublbl)?></option>
        <?php endforeach; ?>
        </select>
        </div>
        <div class="col">
        <input type="file" name="sub[<?=$k+1?>][file]"  placeholder="Search for…">
        <input type="text" name="sub[<?=$k+1?>][file]" class="sub-file" hidden value="<?=$sub['file']?>">
        <input type="text" name="sub[<?=$k+1?>][is_remove]" class="is_remove_sub" hidden value="0">
        </div>
        <div class="col-auto align-self-center">
        <a href="javascript:void(0)" class="link-secondary add-sub" title="" data-toggle="tooltip" data-original-title="add new" style="vertical-align: middle;">
            <svg class="icon icon-md" width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H6a.5.5 0 010-1h3.5V6a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M9.5 10a.5.5 0 01.5-.5h4a.5.5 0 010 1h-3.5V14a.5.5 0 01-1 0v-4z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <?php if(!empty($sub['file'])): ?>
        <a href="<?=Helper::getSubD($sub['file'])?>"  class="link-secondary download" title="" data-toggle="tooltip" data-original-title="download" style="vertical-align: middle;    ">
            <svg class="icon" width="1em" height="1em" viewBox="0 0 20 20" style="font-size: 1.2rem;" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M6.646 11.646a.5.5 0 01.708 0L10 14.293l2.646-2.647a.5.5 0 01.708.708l-3 3a.5.5 0 01-.708 0l-3-3a.5.5 0 010-.708z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M10 4.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V5a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <a href="javascript:void(0)" class="link-danger remove-sub" title="" data-toggle="tooltip" data-original-title="remove">
            <svg class="icon " width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.5 7.5A.5.5 0 018 8v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V8z"></path>
            <path fill-rule="evenodd" d="M16.5 5a1 1 0 01-1 1H15v9a2 2 0 01-2 2H7a2 2 0 01-2-2V6h-.5a1 1 0 01-1-1V4a1 1 0 011-1H8a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM6.118 6L6 6.059V15a1 1 0 001 1h6a1 1 0 001-1V6.059L13.882 6H6.118zM4.5 5V4h11v1h-11z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <?php endif; ?>
        <?php if(empty($sub['file']) && $k ==0): ?>
        <a href="javascript:void(0)" class="link-secondary remove-sub d-none" title="" data-toggle="tooltip" data-original-title="remove">
            <svg class="icon " width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.5 7.5A.5.5 0 018 8v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V8a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V8z"></path>
            <path fill-rule="evenodd" d="M16.5 5a1 1 0 01-1 1H15v9a2 2 0 01-2 2H7a2 2 0 01-2-2V6h-.5a1 1 0 01-1-1V4a1 1 0 011-1H8a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM6.118 6L6 6.059V15a1 1 0 001 1h6a1 1 0 001-1V6.059L13.882 6H6.118zM4.5 5V4h11v1h-11z" clip-rule="evenodd"></path>
            </svg>
        </a>
        <?php endif; ?>
        <a href="javascript:void(0)" class="link-secondary ml-2 move" title="" data-toggle="tooltip" data-original-title="move">
            <svg class="icon icon-sm" width="1em" height="1em" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4 11.5a.5.5 0 01.5.5v3.5H8a.5.5 0 010 1H4a.5.5 0 01-.5-.5v-4a.5.5 0 01.5-.5z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M8.854 11.11a.5.5 0 010 .708l-4.5 4.5a.5.5 0 11-.708-.707l4.5-4.5a.5.5 0 01.708 0zm7.464-7.464a.5.5 0 010 .708l-4.5 4.5a.5.5 0 11-.707-.708l4.5-4.5a.5.5 0 01.707 0z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M11.5 4a.5.5 0 01.5-.5h4a.5.5 0 01.5.5v4a.5.5 0 01-1 0V4.5H12a.5.5 0 01-.5-.5zm4.5 7.5a.5.5 0 00-.5.5v3.5H12a.5.5 0 000 1h4a.5.5 0 00.5-.5v-4a.5.5 0 00-.5-.5z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M11.146 11.11a.5.5 0 000 .708l4.5 4.5a.5.5 0 00.708-.707l-4.5-4.5a.5.5 0 00-.708 0zM3.682 3.646a.5.5 0 000 .708l4.5 4.5a.5.5 0 10.707-.708l-4.5-4.5a.5.5 0 00-.707 0z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M8.5 4a.5.5 0 00-.5-.5H4a.5.5 0 00-.5.5v4a.5.5 0 001 0V4.5H8a.5.5 0 00.5-.5z" clip-rule="evenodd"></path>
            </svg>
        </a>
        </div>
        <?php if(!empty($sub['file'])): ?>
        <div class="col-12 sub-label">
        <span class="badge bg-blue-lt"><?=substr($sub['file'], 0, 100)?></span>
        </div>
        <?php endif; ?>
        </div>
        <?php endforeach; ?>
        </div>
        <span class="badge bg-small">Supported formats : .srt, .vtt, .dfxp, .ttml, .xml</span>
        </div>
        </div>
        </div>
        </div>
    <div class="col-md-4">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Thumbnail Preview</span></div>
    <div class="card-body">
    <div class="form-group mb-3 "><div>
    <input type="file" name="preview_image" >
    <?php if(!empty($link['preview_img'])): ?>
    <div class="preview-img-wrap mt-2">
    <input type="text" name="preview_image" value="<?=$link['preview_img']?>" hidden>
    <img src="<?=Helper::getBanner($link['preview_img'])?>" class="w-100" alt="preview_image">
    <a href="javascript:void(0)" class="text-danger remove-preview-img">remove</a>
    </div>
    <?php endif; ?>
    </div>
    </div>
    <div class="form-group mb-3 ">
    <label class="form-label">Custom slug</label>
    <div>
    <input type="text" class="form-control" name="slug" value="<?=$link['slug']?>" placeholder="Enter custom video slug" required>
    </div>
    </div>
    <div class="form-group mb-3 ">
    <label class="form-label">Link Status</label>
    <select class="form-select" name="status">
    <option value="active" <?=$link['status'] == 0 ? 'selected' : ''?> >Active</option>
    <option value="inactive" <?=$link['status'] == 1 ? 'selected' : ''?> >Draft</option>
    </select>
    </div>
    <div class="mb-3">
    <b>Created At</b> : <i><?=Helper::formatDT($link['created_at'],false)?></i>
    </br>
    <b>Last Updated At</b> : <i><?=Helper::formatDT($link['updated_at'],false)?></i>
    </div>
    <div class="form-footer">
    <button type="submit" class="btn btn-info">Save Link</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
    <div class="row">
    <div class="col">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Player Links</span></div>
    <div class="card-body">
    <div class="position-relative">
    <textarea class="form-control"  readonly id="plyrLink" rows='4'><?=Helper::getPlyrLink($this->config['playerSlug'], $link['slug'])?></textarea>
    <button type="button" class="btn btn-sm btn-success position-absolute" id="copyPlyrLink" style="bottom: 8px;right:8px;">copy</button>
    </div>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Embed Code</span></div>
    <div class="card-body">
    <div class="position-relative">
    <textarea class="form-control" id="embedCode" readonly rows='4'><?=Helper::getEmbedCode(Helper::getPlyrLink($this->config['playerSlug'], $link['slug']))?></textarea>
    <button type="button" class="btn btn-sm btn-success position-absolute" id="copyEmbedCode" style="bottom: 8px;right:8px;">copy</button>
    </div>
    </div>
    </div>
    </div>
    </div>