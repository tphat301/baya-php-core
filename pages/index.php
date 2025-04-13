<!DOCTYPE html>
<html lang="<?= $config['website']['lang-doc'] ?>">

<head>
  <?php include PAGES . LAYOUT . "head.php"; ?>
  <?php include PAGES . LAYOUT . "css.php"; ?>
</head>

<body>
  <?php
  include PAGES . LAYOUT . "seo.php";
  include PAGES . LAYOUT . "header.php";
  if ($deviceType !== 'mobile') {
    include PAGES . LAYOUT . "menu.php";
  }
  include PAGES . LAYOUT . "mmenu.php";
  if ($source != 'index') {
    include PAGES . LAYOUT . "breadcrumb.php";
  }

  ?>
  <div class="<?= ($source == 'index') ? 'wrap-home' : 'wrap-content padding-top-bottom' ?>">
    <?php include PAGES . $page . "_tpl.php"; ?>
  </div>
  <?php
  include PAGES . LAYOUT . "footer.php";
  include PAGES . LAYOUT . "modal.php";
  if ($deviceType == 'mobile') {
    include PAGES . LAYOUT . "phone.php";
  }
  include PAGES . LAYOUT . "js.php";
  ?>
</body>

</html>