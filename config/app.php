<?php
if (!defined('CONFIG')) die("Error");
date_default_timezone_set('Asia/Ho_Chi_Minh');
define('CMS_CONTRACT', '');
define('CMS_AUTHOR', 'dolamthanhphat@gmail.com');
define('CMS_FINISH_TIME', 'dd/mm/yyyy');
// Phat123Aa@!
$config = [
  'database' => [
    'server-name' => $_SERVER["SERVER_NAME"],
    'url' => '/baya/',
    'type' => 'mysql',
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname' => 'baya',
    'port' => 3306,
    'prefix' => 'table_',
    'charset' => 'utf8mb4'
  ],
  'website' => [
    'error-reporting' => false,
    'secret' => '$bayaproject@',
    'salt' => '?$@$%?}i3&?@%&',
    'debug-developer' => false,
    'debug-css' => false,
    'debug-js' => false,
    'index' => false,
    'linkredirect' => false,
    'image' => [],
    'noseo' => ['user', 'order', 'search'],
    'video' => [
      'extension' => ['mp4', 'mkv'],
      'poster' => [
        'width' => 700,
        'height' => 610,
        'extension' => '.jpg|.png|.jpeg'
      ],
      'allow-size' => '100Mb',
      'max-size' => 100 * 1024 * 1024
    ],
    'upload' => [
      'max-width' => 3000,
      'max-height' => 1600
    ],
    'adminlang' => [
      'active' => false,
      'key' => ['vi'],
      'lang' => [
        'vi' => 'Tiếng Việt',
      ]
    ],
    'lang' => [
      'vi' => 'Tiếng Việt'
    ],
    'lang-doc' => 'vi',
    'slug' => [
      'vi' => 'Tiếng Việt',
    ],
    'seo' => [
      'vi' => 'Tiếng Việt'
    ],
    'comlang' => []
  ],
  'login' => [
    'admin' => 'LoginAdmin' . CMS_CONTRACT,
    'member' => 'LoginMember' . CMS_CONTRACT,
    'attempt' => 5,
    'delay' => 1
  ],
  'googleAPI' => [
    'recaptcha' => [
      'active' => false,
      'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
      'sitekey' => '6LezS5kUAAAAAF2A6ICaSvm7R5M-BUAcVOgJT_31',
      'secretkey' => '6LezS5kUAAAAAGCGtfV7C1DyiqlPFFuxvacuJfdq'
    ]
  ],
  'oneSignal' => [
    'active' => false,
    'id' => 'af12ae0e-cfb7-41d0-91d8-8997fca889f8',
    'restId' => 'MWFmZGVhMzYtY2U0Zi00MjA0LTg0ODEtZWFkZTZlNmM1MDg4'
  ],
  'order' => ['ship' => false]
];

error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);
if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $http = 'https://';
} else {
  $http = 'http://';
}
$configUrl = $config['database']['server-name'] . $config['database']['url'];
$configBase = $http . $configUrl;
define('TOKEN', md5(CMS_CONTRACT . $config['database']['url']));
define('ROOT', str_replace(basename(__DIR__), '', __DIR__));
define('ASSET', $http . $configUrl);
define('ADMIN', 'admin');
$loginAdmin = $config['login']['admin'];
$loginMember = $config['login']['member'];
require_once LIBRARIES . "constant.php";
