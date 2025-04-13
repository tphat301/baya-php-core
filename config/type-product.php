<?php
/* Sản phẩm */
$nametype = "san-pham";
$config['product'][$nametype]['title_main'] = sanpham;
$config['product'][$nametype]['dropdown'] = true;
$config['product'][$nametype]['list'] = true;
$config['product'][$nametype]['cat'] = true;
$config['product'][$nametype]['brand'] = true;
$config['product'][$nametype]['view'] = true;
$config['product'][$nametype]['copy'] = true;
$config['product'][$nametype]['copy_image'] = true;
$config['product'][$nametype]['slug'] = true;
$config['product'][$nametype]['check'] = [
  "giamgia" => "Giảm giá",
  "phukiennoibat" => "Phụ kiện nổi bật",
  "caocap" => "Cao cấp",
  "noibat" => noibat,
  "hienthi" => hienthi
];
$config['product'][$nametype]['images'] = true;
$config['product'][$nametype]['show_images'] = true;
$config['product'][$nametype]['gallery'] = [
  $nametype => [
    "title_main_photo" => hinhanhsanpham,
    "title_sub_photo" => hinhanh,
    "check_photo" => ["hienthi" => hienthi],
    "number_photo" => 3,
    "images_photo" => true,
    "avatar_photo" => true,
    "name_photo" => true,
    "width_photo" => 480,
    "height_photo" => 480,
    "thumb_photo" => '160x160x1',
    "cart_photo" => true,
    "img_type_photo" => '.jpg|.gif|.png|.jpeg|.gif|.webp|.WEBP'
  ]
];
$config['product'][$nametype]['code'] = true;
$config['product'][$nametype]['availability'] = true;
$config['product'][$nametype]['regular_price'] = true;
$config['product'][$nametype]['sale_price'] = true;
$config['product'][$nametype]['discount'] = true;
$config['product'][$nametype]['desc'] = true;
$config['product'][$nametype]['desc_cke'] = true;
$config['product'][$nametype]['content'] = false;
$config['product'][$nametype]['content_cke'] = false;
$config['product'][$nametype]['schema'] = false;
$config['product'][$nametype]['seo'] = true;
$config['product'][$nametype]['width'] = 480;
$config['product'][$nametype]['height'] = 480;
$config['product'][$nametype]['thumb'] = '480x480x1';
$config['product'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.webp|.WEBP';

/* Sản phẩm cấp 1 */
$config['product'][$nametype]['title_main_list'] = danhmuccap1;
$config['product'][$nametype]['images_list'] = true;
$config['product'][$nametype]['show_images_list'] = true;
$config['product'][$nametype]['slug_list'] = true;
$config['product'][$nametype]['check_list'] = [
  "caocap" => "Cao cấp",
  "noibat" => noibat,
  "hienthi" => hienthi
];
$config['product'][$nametype]['desc_list'] = false;
$config['product'][$nametype]['seo_list'] = true;
$config['product'][$nametype]['width_list'] = 480;
$config['product'][$nametype]['height_list'] = 480;
$config['product'][$nametype]['thumb_list'] = '480x480x1';
$config['product'][$nametype]['img_type_list'] = '.jpg|.gif|.png|.jpeg|.gif|.webp|.WEBP';

/* Sản phẩm cấp 2 */
$config['product'][$nametype]['title_main_cat'] = danhmuccap2;
$config['product'][$nametype]['images_cat'] = true;
$config['product'][$nametype]['show_images_cat'] = true;
$config['product'][$nametype]['slug_cat'] = true;
$config['product'][$nametype]['check_cat'] = ["noibat" => noibat, "hienthi" => hienthi];
$config['product'][$nametype]['desc_cat'] = false;
$config['product'][$nametype]['seo_cat'] = true;
$config['product'][$nametype]['width_cat'] = 480;
$config['product'][$nametype]['height_cat'] = 480;
$config['product'][$nametype]['thumb_cat'] = '480x480x1';
$config['product'][$nametype]['img_type_cat'] = '.jpg|.gif|.png|.jpeg|.gif|.webp|.WEBP';

/* Sản phẩm (Hãng) */
$config['product'][$nametype]['title_main_brand'] = danhmuchang;
$config['product'][$nametype]['images_brand'] = true;
$config['product'][$nametype]['show_images_brand'] = true;
$config['product'][$nametype]['slug_brand'] = true;
$config['product'][$nametype]['check_brand'] = ["hienthi" => hienthi];
$config['product'][$nametype]['seo_brand'] = true;
$config['product'][$nametype]['width_brand'] = 480;
$config['product'][$nametype]['height_brand'] = 480;
$config['product'][$nametype]['thumb_brand'] = '480x480x1';
$config['product'][$nametype]['img_type_brand'] = '.jpg|.gif|.png|.jpeg|.gif|.webp|.WEBP';
