<?php
/* Giới thiệu */
$nametype = "gioi-thieu";
$config['static'][$nametype]['title_main'] = gioithieu;
$config['static'][$nametype]['check'] = ["hienthi" => hienthi];
$config['static'][$nametype]['images'] = true;
$config['static'][$nametype]['name'] = true;
$config['static'][$nametype]['content'] = true;
$config['static'][$nametype]['content_cke'] = true;
$config['static'][$nametype]['seo'] = true;
$config['static'][$nametype]['width'] = 480;
$config['static'][$nametype]['height'] = 480;
$config['static'][$nametype]['img_type'] = '.jpg|.gif|.png|.jpeg|.gif';

/* copyright */
$nametype = "copyright";
$config['static'][$nametype]['title_main'] = "Copyright";
$config['static'][$nametype]['check'] = ["hienthi" => hienthi];
$config['static'][$nametype]['name'] = true;

/* Liên hệ */
$nametype = "lienhe";
$config['static'][$nametype]['title_main'] = lienhe;
$config['static'][$nametype]['check'] = ["hienthi" => hienthi];
$config['static'][$nametype]['content'] = true;
$config['static'][$nametype]['content_cke'] = true;

/* Footer */
$nametype = "footer";
$config['static'][$nametype]['title_main'] = "Footer";
$config['static'][$nametype]['check'] = ["hienthi" => hienthi];
$config['static'][$nametype]['content'] = true;
$config['static'][$nametype]['content_cke'] = true;
