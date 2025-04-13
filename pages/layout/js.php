<script type="text/javascript">
  var PHP_FRAMEWORK = PHP_FRAMEWORK || {};
  var CONFIG_BASE = '<?= $configBase ?>';
  var ASSET = '<?= ASSET ?>';
  var WEBSITE_NAME = '<?= (!empty($setting['name' . $lang])) ? addslashes($setting['name' . $lang]) : '' ?>';
  var TIMENOW = '<?= date("d/m/Y", time()) ?>';
  var SHIP_CART = <?= (!empty($config['order']['ship'])) ? 'true' : 'false' ?>;
  var RECAPTCHA_ACTIVE = <?= (!empty($config['googleAPI']['recaptcha']['active'])) ? 'true' : 'false' ?>;
  var RECAPTCHA_SITEKEY = '<?= $config['googleAPI']['recaptcha']['sitekey'] ?>';
  var GOTOP = ASSET + 'assets/images/top.png';
  var LANG = {
    'no_keywords': '<?= chuanhaptukhoatimkiem ?>',
    'delete_product_from_cart': '<?= banmuonxoasanphamnay ?>',
    'no_products_in_cart': '<?= khongtontaisanphamtronggiohang ?>',
    'ward': '<?= phuongxa ?>',
    'back_to_home': '<?= vetrangchu ?>',
    'thongbao': '<?= thongbao ?>',
    'dongy': '<?= dongy ?>',
    'dungluonghinhanhlon': '<?= dungluonghinhanhlon ?>',
    'dulieukhonghople': '<?= dulieukhonghople ?>',
    'banchiduocchon1hinhanhdeuplen': '<?= banchiduocchon1hinhanhdeuplen ?>',
    'dinhdanghinhanhkhonghople': '<?= dinhdanghinhanhkhonghople ?>',
    'huy': '<?= huy ?>',
  };
  var logo_img = '<?= $configBase ?><?= UPLOAD_PHOTO_L . $logo['photo'] ?>';
</script>
<?php
$js->set("js/jquery.min.js");
$js->set("js/lazyload.min.js");
if (!$func->isGoogleSpeed()) {
  $js->set("bootstrap/bootstrap.js");
  $js->set("owlcarousel2/owl.carousel.js");
  $js->set("holdon/HoldOn.js");
  $js->set("confirm/confirm.js");
  $js->set("fancybox5/fancybox.umd.js");
  $js->set("fotorama/fotorama.js");
  $js->set("photobox/photobox.js");
  $js->set("magiczoomplus/magiczoomplus.js");
  $js->set("toc/toc.js");
  $js->set("mmenu/mmenu.js");
  $js->set("js/wow.min.js");
  $js->set("slick/slick.js");
  $js->set("js/functions.js");
}
$js->set("js/apps.js");
echo $js->get();

?>
<script type="text/javascript">
  $(document).ready(function() {
    $('form input.fullname').change(function() {
      $.getScript('https://www.google.com/recaptcha/api.js?render=<?= $config['googleAPI']['recaptcha']['sitekey'] ?>', function() {
        grecaptcha.ready(function() {
          generateCaptcha('Newsletter', 'recaptchaResponseNewsletter');
          generateCaptcha('contact', 'recaptchaResponseContact');
        });
      });
    });
  });
</script>
<?php include PAGES . LAYOUT . "strucdata.php"; ?>
<?= $addons->set('script-main', 'script-main', 2); ?>
<?= $addons->get(); ?>
<?= $func->decodeHtmlChars($setting['bodyjs']) ?>