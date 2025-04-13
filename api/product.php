<?php
include "config.php";
include LIBRARIES . "class/class.PaginationsAjax.php";
$pagingAjax = new PaginationsAjax();
$pagingAjax->perpage = (!empty($_GET['perpage'])) ? htmlspecialchars($_GET['perpage']) : 1;
$eShow = htmlspecialchars($_GET['eShow']);
$idList = (!empty($_GET['idList'])) ? htmlspecialchars($_GET['idList']) : 0;
$idCat = (isset($_GET['idCat']) && $_GET['idCat'] > 0) ? htmlspecialchars($_GET['idCat']) : 0;
$p = (!empty($_GET['p'])) ? htmlspecialchars($_GET['p']) : 1;
$start = ($p - 1) * $pagingAjax->perpage;
$pageLink = "api/product.php?perpage=" . $pagingAjax->perpage;
$tempLink = "";
$where = "";
$params = array();

/* Math url */
if ($idList > 0) {
  $tempLink .= "&idList=" . $idList;
  $where .= " and id_list = ?";
  array_push($params, $idList);
}
if ($idCat > 0) {
  $tempLink .= "&idCat=" . $idCat;
  $where .= " and id_cat = ?";
  array_push($params, $idCat);
}
$tempLink .= "&p=";
$pageLink .= $tempLink;

/* Get data */
$sql = "select name$lang, slug$lang, id, id_brand, photo, regular_price, sale_price, discount, type from #_product where type='san-pham' $where and find_in_set('caocap',status) and find_in_set('hienthi',status) order by numb,id desc";
$sqlCache = $sql . " limit $start, $pagingAjax->perpage";
$items = $cache->get($sqlCache, $params, 'result', 7200);

/* Count all data */
$countItems = count($cache->get($sql, $params, 'result', 7200));

/* Get page result */
$pagingItems = $pagingAjax->getAllPageLinks($countItems, $pageLink, $eShow);
?>
<?php if ($countItems) { ?>
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
  <div class="pagination-ajax"><?= $pagingItems ?></div>
<?php } ?>