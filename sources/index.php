<?php
if (!defined('SOURCES')) die("Error");
/* QUERY */
$slider = $d->rawQuery("select name$lang, desc$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('slide'));
$avatar_accessory = $d->rawQueryOne("select photo from #_photo where type = ? and find_in_set('hienthi',status)", array('avatar-phukien'));
$avatar_product = $d->rawQueryOne("select photo from #_photo where type = ? and find_in_set('hienthi',status)", array('avatar-sanpham'));
$news = $d->rawQuery("select name$lang, slug$lang, desc$lang, date_created, photo from #_news where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc", array('tin-tuc'));
$accessory_products = $d->rawQuery("select id, name$lang, slug$lang, photo, regular_price, sale_price, discount from #_product where type = ? and find_in_set('phukiennoibat',status) and find_in_set('hienthi',status) order by numb,id desc limit 0,9", array('san-pham'));
$slider_banners = $d->rawQuery("select name$lang, desc$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('slide-banner'));
$products = $d->rawQuery("select id, id_brand, name$lang, slug$lang, photo, regular_price, sale_price, discount from #_product where type = ? and find_in_set('noibat',status) and find_in_set('hienthi',status) order by numb,id desc limit 0,10", array('san-pham'));
$discount_products = $d->rawQuery("select id, id_brand, name$lang, slug$lang, photo, regular_price, sale_price, discount from #_product where type = ? and find_in_set('giamgia',status) and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'));
$expensive_category_products = $d->rawQuery("select name$lang, slug$lang, id from #_product_list where type = ? and find_in_set('caocap',status) and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'));

/* SEO */
$seopage = $d->rawQueryOne("select * from #_seopage where type = ? limit 0,1", array('trang-chu'));
$seo->set('h1', $seopage['title' . $seolang]);
if (!empty($seopage['title' . $seolang])) $seo->set('title', $seopage['title' . $seolang]);
else $seo->set('title', $titleMain);
if (!empty($seopage['keywords' . $seolang])) $seo->set('keywords', $seopage['keywords' . $seolang]);
if (!empty($seopage['description' . $seolang])) $seo->set('description', $seopage['description' . $seolang]);
$seo->set('url', $func->getPageURL());
$imgJson = (!empty($seopage['options'])) ? json_decode($seopage['options'], true) : null;
if (!empty($seopage['photo'])) {
  if (empty($imgJson) || ($imgJson['p'] != $seopage['photo'])) {
    $imgJson = $func->getImgSize($seopage['photo'], UPLOAD_SEOPAGE_L . $seopage['photo']);
    $seo->updateSeoDB(json_encode($imgJson), 'seopage', $seopage['id']);
  }
  if (!empty($imgJson)) {
    $seo->set('photo', $configBase . THUMBS . '/' . $imgJson['w'] . 'x' . $imgJson['h'] . 'x2/' . UPLOAD_SEOPAGE_L . $seopage['photo']);
    $seo->set('photo:width', $imgJson['w']);
    $seo->set('photo:height', $imgJson['h']);
    $seo->set('photo:type', $imgJson['m']);
  }
}
