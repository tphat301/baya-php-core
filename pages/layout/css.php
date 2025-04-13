<?php if (!$func->isGoogleSpeed()) { ?>
  <link rel="stylesheet" href="assets/fontawesome640/all.css">
  <link rel="stylesheet" href="assets/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
<?php } ?>
<?php
if (!$func->isGoogleSpeed()) {
  $css->set("css/animate.min.css");
  $css->set("bootstrap/bootstrap.css");
  $css->set("holdon/HoldOn.css");
  $css->set("holdon/HoldOn-style.css");
  $css->set("confirm/confirm.css");
  $css->set("fancybox5/fancybox.css");
  $css->set("photobox/photobox.css");
  $css->set("fotorama/fotorama.css");
  $css->set("fotorama/fotorama-style.css");
  $css->set("magiczoomplus/magiczoomplus.css");
  $css->set("mmenu/mmenu.css");
  $css->set("slick/slick.css");
  $css->set("slick/slick-theme.css");
  $css->set("slick/slick-style.css");
  $css->set("owlcarousel2/owl.carousel.css");
  $css->set("owlcarousel2/owl.theme.default.css");
  $css->set("css/app.css");
}
$css->set("css/media.css");
echo $css->get();
?>
<?= $func->decodeHtmlChars($setting['analytics']) ?>
<?= $func->decodeHtmlChars($setting['headjs']) ?>