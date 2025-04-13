<?php
/* Tin tức */
$nametype = "tin-tuc";
$config['news'][$nametype]['title_main'] = tintuc;
$config['news'][$nametype]['view'] = true;
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['slug'] = true;
$config['news'][$nametype]['check'] = ["noibat" => noibat, "moinhat" => "Mới nhất", "hienthi" => hienthi];
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['desc'] = true;
$config['news'][$nametype]['content'] = true;
$config['news'][$nametype]['content_cke'] = true;
$config['news'][$nametype]['seo'] = true;
$config['news'][$nametype]['width'] = 600;
$config['news'][$nametype]['height'] = 600;
$config['news'][$nametype]['thumb'] = '100x100x1';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.webp|.WEBP';

/* Chính sách */
$nametype = "chinh-sach";
$config['news'][$nametype]['title_main'] = chinhsach;
$config['news'][$nametype]['check'] = ["hienthi" => hienthi];
$config['news'][$nametype]['view'] = true;
$config['news'][$nametype]['slug'] = true;
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['content'] = true;
$config['news'][$nametype]['content_cke'] = true;
$config['news'][$nametype]['seo'] = true;
$config['news'][$nametype]['width'] = 330;
$config['news'][$nametype]['height'] = 330;
$config['news'][$nametype]['thumb'] = '100x100x1';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.webp|.WEBP';

/* Hỗ trợ khách hàng */
$nametype = "ho-tro-khach-hang";
$config['news'][$nametype]['title_main'] = "Hỗ trợ khách hàng";
$config['news'][$nametype]['check'] = ["hienthi" => hienthi];
$config['news'][$nametype]['view'] = true;
$config['news'][$nametype]['slug'] = true;
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['copy_image'] = true;
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['content'] = true;
$config['news'][$nametype]['content_cke'] = true;
$config['news'][$nametype]['seo'] = true;
$config['news'][$nametype]['width'] = 330;
$config['news'][$nametype]['height'] = 330;
$config['news'][$nametype]['thumb'] = '100x100x1';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.webp|.WEBP';

/* Tiêu chí */
$nametype = "tieuchi";
$config['news'][$nametype]['title_main'] = "Tiêu chí";
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['check'] = ["hienthi" => hienthi];
$config['news'][$nametype]['images'] = true;
$config['news'][$nametype]['show_images'] = true;
$config['news'][$nametype]['width'] = 30;
$config['news'][$nametype]['height'] = 30;
$config['news'][$nametype]['thumb'] = '30x30x1';
$config['news'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif|.webp|.WEBP';

/* Hình thức thanh toán */
$nametype = "hinh-thuc-thanh-toan";
$config['news'][$nametype]['title_main'] = hinhthucthanhtoan;
$config['news'][$nametype]['check'] = ["hienthi" => hienthi];
$config['news'][$nametype]['copy'] = true;
$config['news'][$nametype]['desc'] = true;

/* Quản lý mục (Không cấp) */
if (isset($config['news'])) {
  foreach ($config['news'] as $key => $value) {
    if (!isset($value['dropdown']) || (isset($value['dropdown']) && $value['dropdown'] == false)) {
      $config['shownews'] = 1;
      break;
    }
  }
}
