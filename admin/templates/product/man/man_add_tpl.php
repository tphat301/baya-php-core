<?php
if ($act == "add") $labelAct = "Thêm mới";
else if ($act == "edit") $labelAct = chinhsua;
else if ($act == "copy")  $labelAct = "Sao chép";

$linkMan = "index.php?com=product&act=man&type=" . $type;
if ($act == 'add') $linkFilter = "index.php?com=product&act=add&type=" . $type;
else if ($act == 'edit') $linkFilter = "index.php?com=product&act=edit&type=" . $type . "&id=" . $id;
if ($act == "copy") $linkSave = "index.php?com=product&act=save_copy&type=" . $type;
else $linkSave = "index.php?com=product&act=save&type=" . $type;

/* Check cols */
if (isset($config['product'][$type]['gallery']) && count($config['product'][$type]['gallery']) > 0) {
  foreach ($config['product'][$type]['gallery'] as $key => $value) {
    if ($key == $type) {
      $keyGallery = $key;
      $flagGallery = true;
      break;
    }
  }
}

if (
  (isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) ||
  (isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) ||
  (isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true) ||
  (isset($config['product'][$type]['color']) && $config['product'][$type]['color'] == true) ||
  (isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true) ||
  (isset($config['product'][$type]['images']) && $config['product'][$type]['images'] == true)
) {
  $colLeft = "col-xl-8";
  $colRight = "col-xl-4";
} else {
  $colLeft = "col-12";
  $colRight = "d-none";
}
?>
<!-- Content Header -->
<section class="content-header text-sm">
  <div class="container-fluid">
    <div class="row">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="index.php" title="<?= dashboard ?>"><?= dashboard ?></a></li>
        <li class="breadcrumb-item active"><?= $labelAct ?> <?= $config['product'][$type]['title_main'] ?></li>
      </ol>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <form class="validation-form" novalidate method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
    <div class="card-footer text-sm sticky-top">
      <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i><?= luu ?></button>
      <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here" disabled><i class="far fa-save mr-2"></i><?= luutaitrang ?></button>
      <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i><?= lamlai ?></button>
      <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="<?= thoat ?>"><i class="fas fa-sign-out-alt mr-2"></i><?= thoat ?></a>
    </div>

    <?= $flash->getMessages('admin') ?>

    <div class="row">
      <div class="<?= $colLeft ?>">
        <?php
        if (isset($config['product'][$type]['slug']) && $config['product'][$type]['slug'] == true) {
          $slugchange = ($act == 'edit') ? 1 : 0;
          $copy = ($act != 'copy') ? 0 : 1;
          include TEMPLATE . LAYOUT . "slug.php";
        }
        ?>
        <div class="card card-primary card-outline text-sm">
          <div class="card-header">
            <h3 class="card-title"><?= noidung ?> <span class="text-lowercase"><?= $config['product'][$type]['title_main'] ?></span></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                  <?php foreach ($config['website']['lang'] as $k => $v) { ?>
                    <li class="nav-item">
                      <a class="nav-link <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?= $k ?>" role="tab" aria-controls="tabs-lang-<?= $k ?>" aria-selected="true"><?= $v ?></a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
              <div class="card-body card-article">
                <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                  <?php foreach ($config['website']['lang'] as $k => $v) { ?>
                    <div class="tab-pane fade show <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang-<?= $k ?>" role="tabpanel" aria-labelledby="tabs-lang">
                      <div class="form-group">
                        <label for="name<?= $k ?>"><?= tieude ?> (<?= $k ?>):</label>
                        <input type="text" class="form-control for-seo text-sm" name="data[name<?= $k ?>]" id="name<?= $k ?>" placeholder="<?= tieude ?> (<?= $k ?>)" value="<?= (!empty($flash->has('name' . $k))) ? $flash->get('name' . $k) : @$item['name' . $k] ?>" required>
                      </div>
                      <?php if (isset($config['product'][$type]['desc']) && $config['product'][$type]['desc'] == true) { ?>
                        <div class="form-group">
                          <label for="desc<?= $k ?>"><?= mota ?> (<?= $k ?>):</label>
                          <textarea class="form-control for-seo text-sm <?= (isset($config['product'][$type]['desc_cke']) && $config['product'][$type]['desc_cke'] == true) ? 'form-control-ckeditor' : '' ?>" name="data[desc<?= $k ?>]" id="desc<?= $k ?>" rows="5" placeholder="<?= mota ?> (<?= $k ?>)"><?= $func->decodeHtmlChars($flash->get('desc' . $k)) ?: $func->decodeHtmlChars(@$item['desc' . $k]) ?></textarea>
                        </div>
                      <?php } ?>
                      <?php if (isset($config['product'][$type]['content']) && $config['product'][$type]['content'] == true) { ?>
                        <div class="form-group">
                          <label for="content<?= $k ?>"><?= noidung ?> (<?= $k ?>):</label>
                          <textarea class="form-control for-seo text-sm <?= (isset($config['product'][$type]['content_cke']) && $config['product'][$type]['content_cke'] == true) ? 'form-control-ckeditor' : '' ?>" name="data[content<?= $k ?>]" id="content<?= $k ?>" rows="5" placeholder="<?= noidung ?> (<?= $k ?>)"><?= $func->decodeHtmlChars($flash->get('content' . $k)) ?: $func->decodeHtmlChars(@$item['content' . $k]) ?></textarea>
                        </div>
                      <?php } ?>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="<?= $colRight ?>">
        <?php if (
          (isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) ||
          (isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) ||
          (isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true) ||
          (isset($config['product'][$type]['color']) && $config['product'][$type]['color'] == true) ||
          (isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true)
        ) { ?>
          <div class="card card-primary card-outline text-sm">
            <div class="card-header">
              <h3 class="card-title">Danh mục <span class="text-lowercase"><?= $config['product'][$type]['title_main'] ?></span></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group-category row">
                <?php if (isset($config['product'][$type]['dropdown']) && $config['product'][$type]['dropdown'] == true) { ?>
                  <?php if (isset($config['product'][$type]['list']) && $config['product'][$type]['list'] == true) { ?>
                    <div class="form-group col-xl-6 col-sm-4">
                      <label class="d-block" for="id_list"><?= danhmuccap1 ?>:</label>
                      <?= $func->getAjaxCategory('product', 'list', $type) ?>
                    </div>
                  <?php } ?>
                  <?php if (isset($config['product'][$type]['cat']) && $config['product'][$type]['cat'] == true) { ?>
                    <div class="form-group col-xl-6 col-sm-4">
                      <label class="d-block" for="id_cat"><?= danhmuccap2 ?>:</label>
                      <?= $func->getAjaxCategory('product', 'cat', $type) ?>
                    </div>
                  <?php } ?>
                  <?php if (isset($config['product'][$type]['item']) && $config['product'][$type]['item'] == true) { ?>
                    <div class="form-group col-xl-6 col-sm-4">
                      <label class="d-block" for="id_item"><?= danhmuccap3 ?>:</label>
                      <?= $func->getAjaxCategory('product', 'item', $type) ?>
                    </div>
                  <?php } ?>
                  <?php if (isset($config['product'][$type]['sub']) && $config['product'][$type]['sub'] == true) { ?>
                    <div class="form-group col-xl-6 col-sm-4">
                      <label class="d-block" for="id_sub"><?= danhmuccap4 ?>:</label>
                      <?= $func->getAjaxCategory('product', 'sub', $type) ?>
                    </div>
                  <?php } ?>
                <?php } ?>
                <?php if (isset($config['product'][$type]['brand']) && $config['product'][$type]['brand'] == true) { ?>
                  <div class="form-group col-xl-6 col-sm-4">
                    <label class="d-block" for="id_brand"><?= danhmuchang ?>:</label>
                    <?= $func->getAjaxCategory('product', 'brand', $type, 'Chọn hãng') ?>
                  </div>
                <?php } ?>
                <?php if (isset($config['product'][$type]['tags']) && $config['product'][$type]['tags'] == true) { ?>
                  <div class="form-group col-xl-6 col-sm-4">
                    <label class="d-block" for="id_tags"><?= danhmuctags ?>:</label>
                    <?= $func->getTags(@$item['id'], 'dataTags', 'product_tags', $type) ?>
                  </div>
                <?php } ?>
                <?php if (isset($config['product'][$type]['color']) && $config['product'][$type]['color'] == true) { ?>
                  <div class="form-group col-xl-6 col-sm-4">
                    <label class="d-block" for="id_color"><?= danhmucmausac ?>:</label>
                    <?= $func->getColor(@$item['id']) ?>
                  </div>
                <?php } ?>
                <?php if (isset($config['product'][$type]['size']) && $config['product'][$type]['size'] == true) { ?>
                  <div class="form-group col-xl-6 col-sm-4">
                    <label class="d-block" for="id_size"><?= danhmuckichthuoc ?>:</label>
                    <?= $func->getSize(@$item['id']) ?>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        <?php } ?>
        <div class="card card-primary card-outline text-sm">
          <div class="card-header">
            <h3 class="card-title">Thông tin <?= $config['product'][$type]['title_main'] ?></h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">

            <div class="row">
              <?php if (isset($config['product'][$type]['code']) && $config['product'][$type]['code'] == true) { ?>
                <div class="form-group col-md-12">
                  <label class="d-block" for="code"><?= masp ?>:</label>
                  <input type="text" class="form-control text-sm" name="data[code]" id="code" placeholder="<?= masp ?>" value="<?= (!empty($flash->has('code'))) ? $flash->get('code') : @$item['code'] ?>">
                </div>
              <?php } ?>
              <?php if (isset($config['product'][$type]['availability']) && $config['product'][$type]['availability'] == true) { ?>
                <div class="form-group col-md-12">
                  <label class="d-block" for="availability">Tình trạng:</label>
                  <input type="text" class="form-control text-sm" name="data[availability]" id="availability" placeholder="Tình trạng" value="<?= (!empty($flash->has('availability'))) ? $flash->get('availability') : @$item['availability'] ?>">
                </div>
              <?php } ?>
              <?php if (isset($config['product'][$type]['regular_price']) && $config['product'][$type]['regular_price'] == true) { ?>
                <div class="form-group col-md-6">
                  <label class="d-block" for="regular_price"><?= gia ?>:</label>
                  <div class="input-group">
                    <input type="text" class="form-control format-price regular_price text-sm" name="data[regular_price]" id="regular_price" placeholder="<?= gia ?>" value="<?= (!empty($flash->has('regular_price'))) ? $flash->get('regular_price') : @$item['regular_price'] ?>">
                    <div class="input-group-append">
                      <div class="input-group-text"><strong>VNĐ</strong></div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <?php if (isset($config['product'][$type]['sale_price']) && $config['product'][$type]['sale_price'] == true) { ?>
                <div class="form-group col-md-6">
                  <label class="d-block" for="sale_price"><?= giamoi ?>:</label>
                  <div class="input-group">
                    <input type="text" class="form-control format-price sale_price text-sm" name="data[sale_price]" id="sale_price" placeholder="<?= giamoi ?>" value="<?= (!empty($flash->has('sale_price'))) ? $flash->get('sale_price') : @$item['sale_price'] ?>">
                    <div class="input-group-append">
                      <div class="input-group-text"><strong>VNĐ</strong></div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <?php if (isset($config['product'][$type]['discount']) && $config['product'][$type]['discount'] == true) { ?>
                <div class="form-group col-md-4">
                  <label class="d-block" for="discount"><?= chieckhau ?>:</label>
                  <div class="input-group">
                    <input type="text" class="form-control discount text-sm" name="data[discount]" id="discount" placeholder="<?= chieckhau ?>" value="<?= (!empty($flash->has('discount'))) ? $flash->get('discount') : @$item['discount'] ?>" maxlength="3" readonly>
                    <div class="input-group-append">
                      <div class="input-group-text"><strong>%</strong></div>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
            <div class="form-group">
              <?php $status_array = (!empty($item['status'])) ? explode(',', $item['status']) : array(); ?>
              <?php if (isset($config['product'][$type]['check'])) {
                foreach ($config['product'][$type]['check'] as $key => $value) { ?>
                  <div class="form-group d-block mb-2 mr-2">
                    <label for="<?= $key ?>-checkbox" class="d-inline-block align-middle mb-0 mr-2"><?= $value ?>:</label>
                    <div class="custom-control custom-switch pl-0 d-inline-block align-middle">
                      <input type="checkbox" class="custom-control-input <?= $key ?>-checkbox" name="status[<?= $key ?>]" id="<?= $key ?>-checkbox" <?= (empty($status_array) && empty($item['id']) ? 'checked' : in_array($key, $status_array)) ? 'checked' : '' ?> value="<?= $key ?>">
                      <label for="<?= $key ?>-checkbox" class="custom-control-label"></label>
                    </div>
                  </div>
              <?php }
              } ?>
            </div>
            <div class="form-group">
              <label for="numb" class="d-inline-block align-middle mb-0 mr-2"><?= sothutu ?>:</label>
              <input type="number" class="form-control form-control-mini w-25 text-left d-inline-block align-middle text-sm" min="0" name="data[numb]" id="numb" placeholder="<?= sothutu ?>" value="<?= isset($item['numb']) ? $item['numb'] : 1 ?>">
            </div>
          </div>
        </div>

        <?php if (isset($config['product'][$type]['images']) && $config['product'][$type]['images'] == true) { ?>
          <div class="card card-primary card-outline text-sm">
            <div class="card-header">
              <h3 class="card-title"><?= hinhanh ?> <?= $config['product'][$type]['title_main'] ?></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <?php
              /* Photo detail */
              $photoDetail = array();
              $photoDetail['upload'] = UPLOAD_PRODUCT_L;
              $photoAction = 'photo';
              $photoDetail['table'] = 'product';
              $photoDetail['image'] = (!empty($item) && $act != 'copy') ? $item['photo'] : '';
              $photoDetail['dimension'] = "Width: " . $config['product'][$type]['width'] . " px - Height: " . $config['product'][$type]['height'] . " px (" . $config['product'][$type]['img_type'] . ")";

              /* Image */
              include TEMPLATE . LAYOUT . "image.php";
              ?>
            </div>
          </div>
        <?php } ?>

        <?php if (isset($config['product'][$type]['icon']) && $config['product'][$type]['icon'] == true) { ?>
          <div class="card card-primary card-outline text-sm">
            <div class="card-header">
              <h3 class="card-title"><?= hinhanh ?> 2 <?= $config['product'][$type]['title_main'] ?></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <?php
              /* Photo detail */
              $photoDetail1 = array();
              $photoDetail1['upload'] = UPLOAD_PRODUCT_L;
              $photoAction = 'icon';
              $photoDetail['table'] = 'product';
              $photoDetail1['image'] = (!empty($item) && $act != 'copy') ? $item['icon'] : '';
              $photoDetail1['dimension'] = "Width: " . $config['product'][$type]['width_icon'] . " px - Height: " . $config['product'][$type]['height_icon'] . " px (" . $config['product'][$type]['img_type'] . ")";
              /* Image */
              include TEMPLATE . LAYOUT . "image1.php";
              ?>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <?php if (isset($flagGallery) && $flagGallery == true) { ?>
      <div class="card card-primary card-outline text-sm">
        <div class="card-header">
          <h3 class="card-title"><?= bosuutap ?> <?= $config['product'][$type]['title_main'] ?></h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="filer-gallery" class="label-filer-gallery mb-3">Album: (<?= $config['product'][$type]['gallery'][$keyGallery]['img_type_photo'] ?>)</label>
            <input type="file" name="files[]" id="filer-gallery" multiple="multiple">
            <input type="hidden" class="col-filer" value="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6">
            <input type="hidden" class="act-filer" value="man">
            <input type="hidden" class="folder-filer" value="product">
          </div>
          <?php if (isset($gallery) && count($gallery) > 0) { ?>
            <div class="form-group form-group-gallery">
              <label class="label-filer"><?= albumhientai ?>:</label>
              <div class="action-filer mb-3">
                <a class="btn btn-sm bg-gradient-primary text-white check-all-filer mr-1"><i class="far fa-square mr-2"></i><?= chontatca ?></a>
                <button type="button" class="btn btn-sm bg-gradient-success text-white sort-filer mr-1"><i class="fas fa-random mr-2"></i><?= sapxep ?></button>
                <a class="btn btn-sm bg-gradient-danger text-white delete-all-filer"><i class="far fa-trash-alt mr-2"></i><?= xoatatca ?></a>
              </div>
              <div class="alert my-alert alert-sort-filer alert-info text-sm text-white bg-gradient-info"><i class="fas fa-info-circle mr-2"></i><?= cothechonnhieuhinhdedichuyen ?></div>
              <div class="jFiler-items my-jFiler-items jFiler-row">
                <ul class="jFiler-items-list jFiler-items-grid row scroll-bar" id="jFilerSortable">
                  <?php foreach ($gallery as $v) echo $func->galleryFiler($v['numb'], $v['id'], $v['photo'], $v['namevi'], 'product', 'col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6'); ?>
                </ul>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
    <?php if (isset($config['product'][$type]['seo']) && $config['product'][$type]['seo'] == true) { ?>
      <div class="card card-primary card-outline text-sm">
        <div class="card-header">
          <h3 class="card-title"><?= noidungseo ?></h3>
          <a class="btn btn-sm bg-gradient-success d-inline-block text-white float-right create-seo" title="<?= taoseo ?>"><?= taoseo ?></a>
        </div>
        <div class="card-body">
          <?php
          $seoDB = $seo->getOnDB($id, $com, 'man', $type);
          include TEMPLATE . LAYOUT . "seo.php";
          ?>
        </div>
      </div>
    <?php } ?>
    <?php if (isset($config['product'][$type]['schema']) && $config['product'][$type]['schema'] == true) { ?>
      <div class="card card-primary card-outline text-sm">
        <div class="card-header">
          <h3 class="card-title">Schema JSON <a href="https://developers.google.com/search/docs/advanced/structured-data/search-gallery" target="_blank">(<?= tailieuthamkhao ?>)</a></h3>
          <button type="submit" class="btn btn-sm bg-gradient-success float-right submit-check" name="build-schema"><i class="far fa-save mr-2"></i><?= luuvataotudongschema ?></button>
        </div>
        <div class="card-body">
          <?php
          $seoDB = $seo->getOnDB($id, $com, 'man', $type);
          include TEMPLATE . LAYOUT . "schema.php";
          ?>
          <input type="hidden" id="schema-type" value="product">
        </div>
      </div>
    <?php } ?>
    <div class="card-footer text-sm">
      <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i><?= luu ?></button>
      <button type="submit" class="btn btn-sm bg-gradient-success submit-check" name="save-here" disabled><i class="far fa-save mr-2"></i><?= luutaitrang ?></button>
      <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i><?= lamlai ?></button>
      <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="<?= thoat ?>"><i class="fas fa-sign-out-alt mr-2"></i><?= thoat ?></a>
      <input type="hidden" name="id" value="<?= (isset($item['id']) && $item['id'] > 0) ? $item['id'] : '' ?>">
    </div>
  </form>
</section>