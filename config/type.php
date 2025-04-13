<?php
require_once 'type-product.php';
require_once 'type-newsletter.php';
require_once 'type-news.php';
require_once 'type-static.php';
require_once 'type-photo.php';

/* Seo page */
$config['seopage']['page'] = [
  "trang-chu" => trangchu,
  "san-pham" => sanpham,
  "tin-tuc" => tintuc,
  "lien-he" => lienhe
];
$config['seopage']['width'] = 200;
$config['seopage']['height'] = 200;
$config['seopage']['thumb'] = '200x200x1';
$config['seopage']['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.webp|.WEBP';

/* Setting */
$config['setting']['address'] = true;
$config['setting']['phone'] = true;
$config['setting']['hotline'] = true;
$config['setting']['zalo'] = true;
$config['setting']['oaidzalo'] = false;
$config['setting']['email'] = true;
$config['setting']['website'] = true;
$config['setting']['fanpage'] = true;
$config['setting']['fanpage_tiktok'] = false;
$config['setting']['coords'] = true;
$config['setting']['coords_iframe'] = true;
$config['setting']['link_googlemaps'] = true;

/* Contact manager */
$config['contact']['active'] = true;
$config['contact']['check'] = ["hienthi" => xacnhan];

/* Cart manager */
$config['order']['active'] = true;
$config['order']['thumb'] = '100x100x1';
