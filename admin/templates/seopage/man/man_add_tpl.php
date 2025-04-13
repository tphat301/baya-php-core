<?php
$linkSave = "index.php?com=seopage&act=save&type=" . $_GET['type'];
?>
<!-- Content Header -->
<section class="content-header text-sm">
  <div class="container-fluid">
    <div class="row">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="index.php" title="<?= dashboard ?>"><?= dashboard ?></a></li>
        <li class="breadcrumb-item active"><?= quanlyseopage ?></li>
      </ol>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <form method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
    <div class="card-footer text-sm sticky-top">
      <button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i><?= luu ?></button>
      <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i><?= lamlai ?></button>
    </div>
    <div class="row">
      <div class="col-xl-8">
        <div class="card card-primary card-outline text-sm">
          <div class="card-header">
            <h3 class="card-title"><?= thongtinseopage ?> - <?= $config['seopage']['page'][$_GET['type']] ?></h3>
          </div>
          <div class="card-body">
            <?php
            $seoDB = $item;
            include TEMPLATE . LAYOUT . "seo.php";
            ?>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card card-primary card-outline text-sm">
          <div class="card-header">
            <h3 class="card-title"><?= hinhanh ?> <span class="text-lowercase">SEO Page <?= $config['seopage']['page'][$_GET['type']] ?></span></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <?php
            /* Photo detail */
            $photoDetail = array();
            $photoDetail['upload'] = UPLOAD_SEOPAGE_L;
            $photoAction = 'photo';
            $photoDetail['table'] = 'seopage';
            $photoDetail['image'] = (!empty($item)) ? $item['photo'] : '';
            $photoDetail['dimension'] = "Width: " . $config['seopage']['width'] . " px - Height: " . $config['seopage']['height'] . " px (" . $config['seopage']['img_type'] . ")";

            /* Image */
            include TEMPLATE . LAYOUT . "image.php";
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer text-sm">
      <button type="submit" class="btn btn-sm bg-gradient-primary"><i class="far fa-save mr-2"></i><?= luu ?></button>
      <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i><?= lamlai ?></button>
    </div>
  </form>
</section>