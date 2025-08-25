<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-white p-3 rounded-3">
    <li class="breadcrumb-item"><a href="<?=PROOT?>/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=PROOT?>/settings/general">Settings</a></li>
    <li class="breadcrumb-item active">General</li>
    </ol>
</nav>
<!-- Content here -->
    <?=$this->displayAlerts()?>
    <form action="<?=$_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data" >
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Logo</span></div>
    <div class="card-body text-center">
        <input type="file" class="form-control" name="logo" >
        <input type="text" name="logo" id="logoVal" value="<?=$this->config['logo']?>" hidden>
        <?php if(!empty($this->config['logo'])): ?>
        <br>  
        <img src="<?=PROOT?>/uploads/<?=$this->config['logo']?>" id="logoImg" height="70" alt="logo-img">
        <br>
        <a href="javascript:void(0)" class="badge bg-danger text-white mt-2" data-toggle="tooltip" data-placement="top" title="Remove Logo" id="removeLogo" >Remove</a>
        <?php endif; ?>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Favicon</span></div>
    <div class="card-body text-center">
        <input type="file" class="form-control" name="favicon" >
        <input type="text" name="favicon" id="favVal" value="<?=$this->config['favicon']?>" hidden>
        <?php if(!empty($this->config['favicon'])): ?>
        <br>  
        <img src="<?=PROOT?>/uploads/<?=$this->config['favicon']?>" id="favIco" height="40" alt="favicon-img">
        <br>
        <a href="javascript:void(0)" class="badge bg-danger text-white mt-2" data-toggle="tooltip" data-placement="top" title="Remove Favicon" id="removeFav" >Remove</a>
        <?php endif; ?>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Subtitle Languages</span></div>
    <div class="card-body">
        <?php
        $sublist ='';
        if (!empty(trim($this->config['sublist']))) {
        $sublist = implode(', ', json_decode($this->config['sublist'], true));
        }?>
    <textarea class="form-control" name="sublist" placeholder="English,Arabic,Turkey,South Korea,Brazil,Hindi, Indonesia,Japan,Myanmar,Bangladesh,Vietnam,Cambodia,Philippines,Thailand"  rows="5" ><?=$sublist?></textarea>  
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Jwplayer License/ Library</span></div>
    <div class="card-body">
    <input type="text" class="form-control" placeholder="https://content.jwplatform.com/libraries/Jq6HIbgz...."  name="jw_license" value="<?=$this->config['jw_license']?>" >
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Video Player</span></div>
    <div class="card-body">
    <select class="form-select" name="player">
        <option value="jw" <?php if($this->config['player'] == 'jw') echo 'selected="selected"'; ?> >JW Player</option>
        <option value="plyr" <?php if($this->config['player'] == 'plyr') echo 'selected="selected"'; ?> >Plyr.io</option>
    </select>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Video Page Slug</span></div>
    <div class="card-body">
    <input type="text" class="form-control" placeholder="video"  name="playerSlug" value="<?=$this->config['playerSlug']?>" >
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Show Servers List</span></div>
    <div class="card-body text-center">
    <label class="form-check form-switch">
    <input class="form-check-input" name="show_servers" type="checkbox" <?php if($this->config['showServers'] == 1) echo 'checked="checked"'; ?>>
    <span class="form-check-label">Enable/ Disable</span>
    </label>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Video Preloader</span></div>
    <div class="card-body text-center">
    <label class="form-check form-switch">
    <input class="form-check-input" name="v_preloader" type="checkbox" <?php if($this->config['v_preloader'] == 1) echo 'checked="checked"'; ?>>
    <span class="form-check-label">Enable/ Disable</span>
    </label>
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Adblock Detection</span></div>
    <div class="card-body text-center">
    <label class="form-check form-switch">
        <input class="form-check-input" name="isAdblocker" type="checkbox" <?php if($this->config['isAdblocker'] == 1) echo 'checked="checked"'; ?>>
        <span class="form-check-label">Enable/ Disable</span>
    </label> 
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Default Video</span></div>
    <div class="card-body">
    <input type="url" class="form-control" placeholder="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerFun.mp4"  name="default_video" value="<?=$this->config['default_video']?>" >
    </div>
    </div>
    </div>
    <div class="col">
    <div class="card h-100">
    <div class="card-header mb-4"><span class="badge bg-primary p-2">Timezone</span></div>
    <div class="card-body">
    <select class="form-select" name="timezone">
		<?php $tzlist = Helper::getTimeZoneList();
		foreach ($tzlist as $tz) {
		$selected = ($this->config['timezone'] == $tz ) ? 'selected' : '';
		echo "<option value='{$tz}' {$selected}>{$tz}</option>";
		}
		?>
    </select>
    </div>
    </div>
    </div></div>
    <div class="form-footer text-left">
    <button type="submit" class="btn btn-info">Save Settings</button>
    </form>