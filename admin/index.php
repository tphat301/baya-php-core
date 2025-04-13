<?php
session_start();
define('CONFIG', '../config/');
define('VENDOR', '../vendor/');
define('LIBRARIES', '../libraries/');
define('SOURCES', './sources/');
define('TEMPLATE', './templates/');
define('LAYOUT', 'layout/');
define('THUMBS', 'thumbs');
define('JSONS', '../assets/jsons/');
define('WATERMARK', '../watermark');
require_once VENDOR . "autoload.php";
require_once CONFIG . "app.php";
require_once LIBRARIES . 'autoload.php';
new AutoLoad();
$d = new PDODb($config['database']);
$flash = new Flash();
$seo = new Seo($d);
$emailer = new Email($d);
$cache = new Cache($d);
$func = new Functions($d, $cache);
$langadmin = (!empty($_SESSION['langadmin']) && in_array($_SESSION['langadmin'], $config['website']['adminlang']['key'])) ? $_SESSION['langadmin'] : 'vi';
$_SESSION['langadmin'] = 'vi';
require_once LIBRARIES . "lang/admin/" . $langadmin . ".php";
require_once CONFIG . "type.php";
/* Lang Init */
// require_once LIBRARIES."lang/langinit.php";
$setting = $d->rawQueryOne("select * from #_setting limit 0,1");
$optsetting = (isset($setting['options']) && $setting['options'] != '') ? json_decode($setting['options'], true) : null;
require_once LIBRARIES . "requick.php";
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/images/favicon.png" rel="shortcut icon" type="image/x-icon" />
  <title>Administrator - <?= $setting['namevi'] ?></title>
  <?php include TEMPLATE . LAYOUT . "css.php"; ?>
</head>

<body class="sidebar-mini hold-transition text-sm">
  <?php if ($template == 'index' || $template == 'user/login')
    include TEMPLATE . LAYOUT . "loader.php"; ?>
  <?php if (isset($_SESSION[$loginAdmin]['active']) && ($_SESSION[$loginAdmin]['active'] == true)) { ?>
    <div class="wrapper">
      <?php
      include TEMPLATE . LAYOUT . "header.php";
      include TEMPLATE . LAYOUT . "menu.php";
      ?>
      <div class="content-wrapper">
        <?php if ($alertlogin) { ?>
          <section class="content">
            <div class="container-fluid">
              <div class="alert my-alert alert-warning alert-dismissible text-sm bg-gradient-warning mt-3 mb-0">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-exclamation-triangle"></i>
                <?= $alertlogin ?>
              </div>
            </div>
          </section>
        <?php } ?>
        <?php include TEMPLATE . $template . "_tpl.php"; ?>
      </div>
      <?php include TEMPLATE . LAYOUT . "footer.php"; ?>
    </div>
  <?php } else {
    include TEMPLATE . "user/login_tpl.php";
  } ?>
  <?php include TEMPLATE . LAYOUT . "js.php"; ?>
</body>

</html>