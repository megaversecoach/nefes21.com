<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--Widget: Popular Posts-->
<div class="sidebar-widget widget-popular-posts">
    <div class="widget-head">
        <h4 class="title"><?php echo html_escape($widget->title); ?></h4>
    </div>
    <div class="widget-body">
        <ul class="nav nav-tabs">
            <li class="active"><a class="btn-nav-tab" data-toggle="tab" data-date-type="week" data-lang-id="<?php echo $this->selected_lang->id; ?>"><?php echo trans("this_week"); ?></a></li>
            <li><a class="btn-nav-tab" data-toggle="tab" data-date-type="month" data-lang-id="<?php echo $this->selected_lang->id; ?>"><?php echo trans("this_month"); ?></a></li>
            <li><a class="btn-nav-tab" data-toggle="tab" data-date-type="year" data-lang-id="<?php echo $this->selected_lang->id; ?>"><?php echo trans("this_year"); ?></a></li>
        </ul>
        <div class="tab-content">
            <div id="tab_popular_posts_response" class="tab-pane fade in active">
                <ul class="popular-posts">
                    <?php if (!empty($this->popular_posts_week)):
                        foreach ($this->popular_posts_week as $post): ?>
                            <li>
                                <?php $this->load->view("post/_post_item_small", ["post" => $post]); ?>
                            </li>
                        <?php endforeach;
                    endif; ?>
                </ul>
            </div>
            <div class="col-sm-12 col-xs-12 loader-popular-posts">
                <div class="row">
                    <div class="spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>