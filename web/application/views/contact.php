<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<div id="wrapper">
    <div class="container m-b-30">
        <div class="row">

            <!--Check breadcrumb active-->
            <?php if ($page->breadcrumb_active == 1): ?>
                <div class="col-sm-12 page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo lang_base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                        </li>

                        <li class="breadcrumb-item active"><?php echo html_escape($page->title); ?></li>
                    </ol>
                </div>
            <?php else: ?>
                <div class="col-sm-12 page-breadcrumb"></div>
            <?php endif; ?>

            <div id="content" class="col-sm-12 m-b-30">

                <div class="row">
                    <!--Check page title active-->
                    <?php if ($page->title_active == 1): ?>
                        <div class="col-sm-12">
                            <h1 class="page-title"><?php echo html_escape($page->title); ?></h1>
                        </div>
                    <?php endif; ?>

                    <div class="col-sm-12">
                        <div class="page-contact">

                            <div class="row row-contact-text">
                                <div class="col-sm-12 font-text">
                                    <?php echo $this->settings->contact_text; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 font-text">
                                    <h2 class="contact-leave-message"><?php echo trans("leave_message"); ?></h2>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <!-- include message block -->
                                    <?php $this->load->view('partials/_messages'); ?>

<!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area section_padding_100 clearfix" id="contact">
        <div class="container">
            <div class="row">
               
                </div>
				
                <div class="col-md-6">
                    <!-- Form Start-->
					
                    <div class="contact_from">
                        <form id="contact_form" method="POST" action="https://nefes21.com/email/mail.php" method="post">
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area">
                                <div class="row">
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <select class="form-control" name="subject" id="subject" placeholder="Konu Seçiniz">
                                                    <option value="default" selected disabled hidden>Lütfen Konu Seçiniz</option>
                                                    <option value="bireysel_danismanlik">Bireysel Seans</option>
                                                    <option value="nefes_koclugu">Nefes Koçu Olmak İstiyorum</option>
                                                    <option value="yasam_koclugu">Yaşam Koçu Olmak İstiyorum</option>
                                                    <option value="urunler_etkinlikler">Ürünler ve Etkinlikler</option>
                                                    <option value="teknik_destek">Teknik Destek</option>
                                                    <option value="diger">Diğer</option>
                                                </select>
                                            </div>
                                        </div>

                                    <!-- Single Input Area Start -->   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="İsminiz *" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="E-Posta Adresiniz *" required>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Telefon Numaranız *" required>
                                            </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Mesajınız *" required></textarea>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <button type="submit" class="btn submit-btn">Gönder</button>
                                    </div>
                                    <p class="recaptcha_google">Sitemizde Google reCAPTCHA güvenlik kontrolü bulunmakatadır. <br>
                                        <a href="https://policies.google.com/privacy">Gizlilik Politikası</a> ve
                                        <a href="https://policies.google.com/terms">Kullanım Koşulları</a>na ilgili linklerden ulaşabilirsiniz.
                                    </p>
                                </div>
                            </div>
                            <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                            <!-- Message Input Area End -->
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area End ***** -->

                                </div>

                                <div class="col-sm-6 col-xs-12 contact-right">

                                    <?php if ($this->settings->contact_phone): ?>
                                        <div class="contact-item">
                                            <div class="col-sm-2 col-xs-2 contact-icon">
                                                <i class="icon-phone" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-sm-10 col-xs-10 contact-info">
                                                <?php echo html_escape($this->settings->contact_phone); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($this->settings->contact_email): ?>
                                        <div class="contact-item">
                                            <div class="col-sm-2 col-xs-2 contact-icon">
                                                <i class="icon-envelope" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-sm-10 col-xs-10 contact-info">
                                                <?php echo html_escape($this->settings->contact_email); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($this->settings->contact_address): ?>
                                        <div class="contact-item">
                                            <div class="col-sm-2 col-xs-2 contact-icon">
                                                <i class="icon-map-marker" aria-hidden="true"></i>
                                            </div>
                                            <div class="col-sm-10 col-xs-10 contact-info">
                                                <?php echo html_escape($this->settings->contact_address); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>


<!-- #######  YAY, I AM THE SOURCE EDITOR! #########-->
<div class="section-heading">
<h2>Bize Ulasin!</h2>
<div class="line-shape">B&uuml;lent Gardiyanoglu kitaplari, mobil uygulamalari, web hizmetleri, dijital kanallar, sosyal medya, bireysel danismanlik ve t&uuml;m soru &amp; &ouml;nerileriniz i&ccedil;in bize yazabilirsiniz.</div>
</div>
<div class="address-text">
<p>T&uuml;rkiye: +90 548 872 0090</p>
</div>
<br>
<br>
<br>
                                    <div class="col-sm-12 contact-social">
                                        <ul>
                                            <!--Include social media links-->
                                            <?php $this->load->view('partials/_social_media_links', ['rss_hide' => true]); ?>
                                        </ul>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php if (!empty($this->settings->contact_address)): ?>
        <div class="container-fluid">
            <div class="row">
                <div class="contact-map-container">
                    <iframe id="contact_iframe" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=<?php echo $this->settings->contact_address; ?>&ie=UTF8&t=&z=8&iwloc=B&output=embed&disableDefaultUI=true" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<!-- /.Section: wrapper -->
<style>
    #footer {
        margin-top: 0;
    }
</style>
<script>
    var iframe = document.getElementById("contact_iframe");
    if (iframe) {
        iframe.src = iframe.src;
        iframe.src = iframe.src;
    }
</script>