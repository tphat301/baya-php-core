<?php
include "config.php";
$idStr = (isset($_POST['id']) && !empty($_POST['id'])) ? $_POST['id'] : "";
$priceStr = (isset($_POST['price']) && !empty($_POST['price'])) ? $_POST['price'] : "";
$where = "";
if (!empty($idStr)) {
  $where .= "and id_brand in ($idStr)";
}
if (!empty($priceStr)) {
  $priceStr = str_replace(',', ' or', $priceStr);
  $where .= "and $priceStr";
}
$sql = "select name$lang, slug$lang, id, id_brand, photo, regular_price, sale_price, discount, type from #_product where type='san-pham' $where and find_in_set('hienthi',status) order by numb,id desc";
$items = $d->rawQuery($sql);
?>
<?php if (!empty($items)) { ?>
  <div class="flex-product">
    <?php foreach ($items as $k => $v) {
      $brand = $d->rawQueryOne("select name$lang, slug$lang from #_product_brand where id = ? and type = ? and find_in_set('hienthi',status)", array($v['id_brand'], 'san-pham')); ?>
      <div class="box-product animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
        <a class="text-decoration-none product-thumbnail scale-img" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
          <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/480x480x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/480x480x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
        </a>
        <div class="product-info">
          <a href="<?= $brand['slug' . $lang] ?>" class="product-brand" title="<?= $brand['name' . $lang] ?>"><?= $brand['name' . $lang] ?></a>
          <h3>
            <a class="text-decoration-none text-split product-name" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
              <?= $v['name' . $lang] ?>
            </a>
          </h3>
          <p class="product-price">
            <?php if ($v['discount']) { ?>
              <span class="product-price-new">
                <?= $func->formatMoney($v['sale_price']) ?>
              </span>
              <span class="product-price-old">
                <?= $func->formatMoney($v['regular_price']) ?>
              </span>
              <span class="product-price-per">
                <?= '-' . $v['discount'] . '%' ?>
              </span>
            <?php } else { ?>
              <span class="product-price-new">
                <?= $func->formatMoney($v['sale_price']) ?>
              </span>
            <?php } ?>
          </p>
          <?php if ($v['sale_price']) { ?>
            <div class="product-cart addcart" data-id="<?= $v['id'] ?>" data-action="addnow">
              <span>THÊM VÀO GIỎ</span>
              <i class="bi bi-basket3"></i>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>
<?php } else { ?>
  <p class="mb-0">Không tìm thấy kết quả. Vui lòng thử lại!</p>
<?php } ?>