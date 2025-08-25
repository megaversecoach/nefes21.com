<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active">Ads_Manager</li>
    </ol>
</nav>
    <!-- Content here -->
    <div class="row">
    <div class="col-md-7">
    <div class="card">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Vast Ad Tags</span></div>
    <div class="card-body">
    <div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
            <th>Title</th>
            <th>Type</th>
            <th>Offset</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($ads['vast'] as $ad):
        $ac = json_decode($ad['code'], true);
        $offset = $ac['offset'];
        $skipOffSet = isset($ac['skipoffset']) ? $ac['skipoffset'] : '';
        $type = isset($ac['type']) ? $ac['type'] : 'video';
        ?>
        <tr>
        <td><?=$ad['title']?></td>
        <td>
        <?php if($type != 'video'): ?>
        <span class="badge bg-cyan-lt">Banner</span>
        <?php else: ?>
        <span class="badge bg-blue-lt">Video</span>
        <?php endif; ?>
        </td>
        <td><?=$offset?></td>
        <td>
        <div class="btn-list flex-nowrap">
        <a href="#" class="text-info edit-vast mr-3" 
            data-id="<?=$ad['id']?>"  
            data-title="<?=$ad['title']?>"
            data-offset="<?=$offset?>" 
            data-skipoffset="<?=$skipOffSet?>"
            data-type="<?=$type?>"
            data-file="<?=$ac['tag']?>">Edit</a>
        <a href="<?=PROOT?>/ads/del/<?=$ad['id']?>" class="text-danger">Delete</a>
        </td>
        </div>
        </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        </div>
        </div>
        </div>

        <div class="card">
        <div class="card-header mb-4"><span class="badge bg-primary p-2">Popup Ads</span></div>            
        <div class="card-body">
        
        <form action="<?=PROOT.'/ads/save-popad'?>" method="post" id="">
        <div class="form-group">
        <textarea class="form-control" name="popads"  placeholder="input popup ads code" rows="5" ><?=base64_decode($ads['popad'])?></textarea>
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-info">Save Popup Ads</button>
        </div>
        </form>
        </div>
            </div>
                </div>

        <div class="col-md-5">
        <div class="card">
        <div class="card-header mb-4"><span class="badge bg-primary p-2">Add/Edit Vast Ads</span></div>
        <div class="card-body">
        <?=$this->displayAlerts()?>
        <form action="<?=PROOT.'/ads/save-vast'?>" method="post" id="form-ads">
        <input type="text"  class="form-control" name="id" id="vast-id" hidden placeholder="">
        <div class="form-group mb-3">
        <label class="form-label">Title Ads</label>
        <input type="text"  class="form-control" id="vast-title"  name="title" placeholder="title ads">
        </div>
        <div class="mb-3">
        <div class="form-label">Ad Type</div>
        <select name="type" class="form-select" id="vast-type">
        <option value="nonlinear">Banner</option>
        <option value="video">Video</option>
        </select>
        </div>
        <div class="form-group mb-3">
        <label class="form-label">XML File/ Url</label>
        <input type="url" id="vast-file" class="form-control" name="xml" placeholder="https://server-ads.com/server-ads-data/vast.xml" required>
        </div>
        <div class="form-group row showcase_row_area">
        <div class="col-md-6">
        <label for="form-label">Start Offset</label>
        <input type="text" name="offset" class="form-control" id="vast-offset" placeholder="15" required="">
        </div>
        <div class="col-md-6 skipoff-input d-none ">
        <label for="form-label">Skip Offset</label>
        <input type="text" name="skip-offset" class="form-control" value="10" id="vast-skipoffset" placeholder="">
        </div>
        </div>
        <div class="form-footer">
        <button type="reset" class="btn btn-info mr-2">Reset Ads</button>
        <button type="submit" class="btn btn-primary">Save Ads</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
