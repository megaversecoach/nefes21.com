<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
function readingTime($content = "", $readingSpeed = 2)
{
$fiftySeconds = 50; //Saniye bazında en yüksek değer - Max value per second
$oneMinute = 60; //Bir dakika 60 saniyiedir - One minute 60 seconds
$totalSecondsInOneHour = 3600; //1 saatteki toplam saniye - Total seconds in 1 hour
//Parametre olarak gelen içerikten html taglarını kaldırır.
//Ardından boşlukları baz alarak, içerikte kaç kelime olduğunu hesaplar.
//Removes html tags from content that comes as a parameter.
//It then calculates how many words are in the content, based on gaps.
$wordCount = round(count(explode(" ", strip_tags($content))));
//Kelime sayısını, parametre olarak gelen hız değerine (varsayılan olarak 2) bölerek okuma hızını hesaplar.
//Calculates the reading speed by dividing the word count by the incoming speed value (default is 2).
$readingTime = ceil($wordCount / $readingSpeed);
//Okuma süresi 1 dk'nın aşağısında ise çıktıyı saniye bazında verir.
//If the reading time is below 1 min, the output is given in seconds.
if ($readingTime < $fiftySeconds)
{
$second = intval($readingTime / 10);
$second++;
$second *= 5;
echo "$second saniye";
//echo "$second second";
}
//Okuma süresi 1 dk'nın üzerinde ise çıktıyı dakika bazında verir.
//If the reading time is above 1 min, output is given in minutes.
else if ($readingTime < $totalSecondsInOneHour)
{
$minute = ceil($readingTime / $oneMinute);
echo "$minute dakika";
//echo "$minute minute";
}
//Okuma süresi 1 saatin üzerinde ise çıktıyı saat bazında verir.
//If the reading time is over 1 hour, the output is given in hours.
else
{
$hour = floor($readingTime / $totalSecondsInOneHour);
echo "$hour saat";
//echo "$hour hour";
}
}
?>
<!-- Section: wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">
            <!-- breadcrumb -->
            <div class="col-sm-12 page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo lang_base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                    </li>
                    <?php $categories = get_parent_category_tree($post->category_id, $this->categories);
                    if (!empty($categories)):
                        foreach ($categories as $item):
                            if (!empty($item)):?>
                                <li class="breadcrumb-item active">
                                    <a href="<?php echo generate_category_url($item); ?>"><?php echo html_escape($item->name); ?></a>
                                </li>
                            <?php endif;
                        endforeach;
                    endif; ?>
                    <li class="breadcrumb-item active"> <?php echo html_escape(character_limiter($post->title, 160, '...')); ?></li>
                </ol>
            </div>

            <div id="content" class="<?php echo ($post->show_right_column == 1) ? 'col-sm-8' : 'col-sm-12'; ?> col-xs-12">
                <div class="post-content">
                    <p class="m-0">
                        <a href="<?php echo generate_category_url_by_id($post->category_id); ?>">
                            <label class="category-label" style="background-color: <?php echo html_escape($post->category_color); ?>">
                                <?php echo html_escape($post->category_name); ?>
                            </label>
                        </a>
                    </p>

                    <h1 class="title"><?php echo html_escape($post->title); ?></h1>
                    <?php if (!empty($post->summary)): ?>
                        <div class="post-summary">
                            <h2>
                                <?php echo $post->summary; ?>
                            </h2>
                        </div>
                    <?php endif; ?>
                    <div class="post-meta">
                        <?php if ($this->general_settings->show_post_author == 1): ?>
                            <span class="post-author-meta sp-left">
                                <a href="<?php echo generate_profile_url($post_user->slug); ?>" class="m-r-0">
                                    <img src="<?php echo get_user_avatar($post_user); ?>" alt="<?php echo html_escape($post_user->username); ?>">
                                    <?php echo html_escape($post_user->username); ?>
                                </a>
                            </span>
                        <?php endif; ?>

                        <div class="post-details-meta-date">
                            <?php if ($this->general_settings->show_post_date == 1): ?>
                                <span class="sp-left"><?php echo helper_date_format($post->created_at); ?>&nbsp;-&nbsp;<?php echo formatted_hour($post->created_at); ?></span>
                                <?php if (!empty($post->updated_at)): ?>
                                    <span class="sp-left sp-post-update-date"><?php echo trans("updated"); ?>:&nbsp;<?php echo helper_date_format($post->updated_at); ?>&nbsp;-&nbsp;<?php echo formatted_hour($post->updated_at); ?></span>
                                <?php endif; ?>
                            <?php endif; ?>
                     <span class="sp-left sp-post-update-date"><span><i class="icon-clock"></i>&nbsp;&nbsp;Bu yazıyı <?php
$cumle = $post->content;
readingTime($cumle);  // "20 saniye" çıktısını verir.
?> okuyabilirsiniz.</span></span>

                        </div>
						
						

                        <?php if ($this->general_settings->show_hits): ?>
                            <span class="sp-right"><i class="icon-eye"></i><?php echo $post->pageviews; ?></span>
                        <?php endif; ?>

                        <?php if ($this->general_settings->comment_system == 1): ?>
                            <span class="sp-right"><i class="icon-comment"></i><?php echo $post->comment_count; ?></span>
                        <?php endif; ?>
                    </div>
					
					

                    <div class="post-share">
                        <!--include Social Share -->

                        <?php $this->load->view('post/_post_share_box'); ?>
                    </div>
					

                    <?php if ($post->post_type == "video"):
                        $this->load->view('post/details/_video', ['post' => $post]);
                    elseif ($post->post_type == "audio"):
                        $this->load->view('post/details/_audio', ['post' => $post]);
                    elseif ($post->post_type == "gallery"):
                        $this->load->view('post/details/_gallery', ['post' => $post]);
                    elseif ($post->post_type == "sorted_list"):
                        $this->load->view('post/details/_sorted_list', ['post' => $post]);
                    elseif ($post->post_type == "trivia_quiz" || $post->post_type == "personality_quiz"):
                        $this->load->view('post/details/_quiz', ['post' => $post]);
                    else:
                        $this->load->view('post/details/_article', ['post' => $post]);
                    endif; ?>
                    <?php $this->load->view("partials/_ad_spaces", ["ad_space" => "post_top", "class" => "bn-p-t-20"]); ?>
                    <div class="post-text">
                        <?php echo $post->content; ?>
                    </div>

                    <!--Optional Url Button -->
                    <?php if (!empty($post->optional_url)) : ?>
                        <div class="optional-url-cnt">
                            <a href="<?php echo html_escape($post->optional_url); ?>" class="btn btn-md btn-custom" target="_blank">
                                <?php echo html_escape($this->settings->optional_url_button_name); ?>&nbsp;&nbsp;&nbsp;<i class="icon-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    <?php endif; ?>

                    <!--Optional Url Button -->
                    <?php if (!empty($feed) && !empty($post->show_post_url)) : ?>
                        <div class="optional-url-cnt">
                            <a href="<?php echo $post->post_url; ?>" class="btn btn-md btn-custom" target="_blank">
                                <?php echo htmlspecialchars($feed->read_more_button_text); ?>&nbsp;&nbsp;&nbsp;<i class="icon-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php $files = get_post_files($post->id);
                    if (!empty($files)):?>
                        <div class="post-files">
                            <h2 class="title"><?php echo trans("files"); ?></h2>
                            <?php echo form_open('download-file'); ?>
                            <?php foreach ($files as $file): ?>
                                <div class="file">
                                    <button type="submit" name="file_id" value="<?php echo $file->id; ?>"><i class="icon-file"></i><?php echo html_escape($file->file_name); ?></button>
                                </div>
                            <?php endforeach; ?>
                            <?php echo form_close(); ?>
                        </div>
                    <?php endif; ?>
					
					<p style="padding: 10px; border: 2px solid #1d2129;">
<span style="color:#9c9c9c;">
<em>
En güncel gelişmelerden hemen haberdar olmak için <a href="https://t.me/s/nefes21" target="_blank" rel="noopener noreferrer"><strong>Telegram kanalımıza</strong></a> katılın!
</em>
</span>
</p>
					
					                    <div class="post-share">
                        <!--include Social Share -->
                        <?php $this->load->view('post/_post_share_box'); ?>
                    </div>



                    <div class="post-tags">
                        <?php if (!empty($post_tags)): ?>
                            <h2 class="tags-title"><?php echo trans("post_tags"); ?></h2>
                            <ul class="tag-list">
                                <?php foreach ($post_tags as $tag) : ?>
                                    <li>
                                        <a href="<?php echo generate_tag_url($tag->tag_slug); ?>">
                                            <?php echo html_escape($tag->tag); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                </div>

                <!--include next previous post -->
                <?php $this->load->view('post/_post_next_prev', ['previous_post' => $previous_post, 'next_post' => $next_post]); ?>

                <?php if ($this->general_settings->emoji_reactions == 1): ?>
                    <div class="col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="reactions noselect">
                                <h4 class="title-reactions"><?php echo trans("whats_your_reaction"); ?></h4>
                                <div id="reactions_result">
                                    <?php $this->load->view('partials/_emoji_reactions'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!--Include banner-->
                <?php $this->load->view("partials/_ad_spaces", ["ad_space" => "post_bottom", "class" => "bn-p-b"]); ?>

                <!--include about author -->
                <?php
                if ($this->general_settings->show_post_author == 1): ?>
                    <?php $this->load->view('post/_post_about_author', ['post_user' => $post_user]); ?>
                <?php endif; ?>

                <section class="section section-related-posts">
                    <div class="section-head">
                        <h4 class="title"><?php echo trans("related_posts"); ?></h4>
                    </div>

                    <div class="section-content">
                        <div class="row">
                            <?php $i = 0; ?>
                            <?php foreach ($related_posts as $item): ?>

                                <?php if ($i > 0 && $i % 3 == 0): ?>
                                    <div class="col-sm-12"></div>
                                <?php endif; ?>

                                <!--include post item-->
                                <div class="col-sm-4 col-xs-12">
                                    <?php $this->load->view("post/_post_item_mid", ["post" => $item]); ?>
                                </div>

                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>

                <?php if ($this->general_settings->comment_system == 1 || $this->general_settings->facebook_comment_active == 1): ?>
                    <section id="comments" class="section">
                        <div class="col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="comment-section">
                                    <?php if ($this->general_settings->comment_system == 1 || $this->general_settings->facebook_comment_active == 1): ?>
                                        <ul class="nav nav-tabs">
                                            <?php if ($this->general_settings->comment_system == 1): ?>
                                                <li class="active"><a data-toggle="tab" href="#site_comments"><?php echo trans("comments"); ?></a></li>
                                            <?php endif; ?>
                                            <?php if ($this->general_settings->facebook_comment_active == 1): ?>
                                                <li class="<?php echo ($this->general_settings->comment_system != 1) ? 'active' : ''; ?>"><a data-toggle="tab" href="#facebook_comments"><?php echo trans("facebook_comments"); ?></a></li>
                                            <?php endif; ?>
                                        </ul>

                                        <div class="tab-content">
                                            <?php if ($this->general_settings->comment_system == 1): ?>
                                                <div id="site_comments" class="tab-pane fade in active">
                                                    <!-- include comments -->
                                                    <?php $this->load->view('post/_make_comment', ['post' => $post, 'comment_count' => $post->comment_count]); ?>
                                                    <div id="comment-result">
                                                        <?php $this->load->view('post/_comments', ['post' => $post, 'comment_count' => $post->comment_count]); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($this->general_settings->facebook_comment_active == 1): ?>
                                                <div id="facebook_comments" class="tab-pane fade <?php echo ($this->general_settings->comment_system != 1) ? 'in active' : ''; ?>">
                                                    <div class="fb-comments" data-href="<?php echo current_url(); ?>" data-width="100%" data-numposts="5"
                                                         data-colorscheme="light"></div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>

            </div>

            <?php if ($post->show_right_column == 1): ?>
                <div id="sidebar" class="col-sm-4 col-xs-12">
                    <!--include sidebar -->
                    <?php $this->load->view('partials/_sidebar'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>


</div>
<!-- /.Section: wrapper -->

<?php if ($this->general_settings->facebook_comment_active) {
    echo $this->general_settings->facebook_comment;
} ?>
<script>
    $(function () {
        $('.post-text iframe').wrap('<div class="embed-responsive embed-responsive-16by9"></div>');
        $('.post-text iframe').addClass('embed-responsive-item');
    });
    $(".fb-comments").attr("data-href", window.location.href);
</script>

<?php if (!empty($post->feed_id)): ?>
    <style>
        .post-text img {
            display: none;
        }

        .post-content .post-summary {
            display: none;
        }
    </style>
<?php endif; ?>

