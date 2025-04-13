<div class="page-product">
  <div class="page-product-left animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
    <div class="page-product-left1">
      <p class="page-product-right-title">Danh mục sản phẩm:</p>
      <ul class="page-product-main">
        <?php foreach ($productListMenu as $v) { ?>
          <li>
            <a href="<?= $v['slug' . $lang] ?>" class="text-decoration-none" title="<?= $v['name' . $lang] ?>">
              <?= $v['name' . $lang] ?>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div class="page-product-left2">
      <p class="page-product-right-title">Nhà cung cấp:</p>
      <div class="filter-brands">
        <?php $brands_unique = $func->filterUniqueBrands($product, "san-pham", $lang);
        foreach ($brands_unique as $v) {
          list($id, $name) = explode('-', $v) ?>
          <div class="filter-brand-item">
            <input type="checkbox" name="filter-brand" class="filter-brand-check" data-title="<?= $name ?>" data-id="<?= $id ?>" id="filter-brand-<?= $id ?>">
            <label for="filter-brand-<?= $id ?>"><?= $name ?></label>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="page-product-left3">
      <p class="page-product-right-title">Mức giá:</p>
      <div class="filter-brands-price">
        <?php $prices = ['(sale_price < 1000000)' => 'Dưới 1.000.000₫', '((sale_price >= 1000000) and (sale_price <= 2000000))' => '1.000.000₫ - 2.000.000₫', '((sale_price >= 2000000) and (sale_price <= 3000000))' => '2.000.000₫ - 3.000.000₫', '((sale_price >= 3000000) and (sale_price <= 4000000))' => '3.000.000₫ - 4.000.000₫', '(sale_price > 4000000)' => 'Trên 4.000.000₫'];
        foreach ($prices as $key => $value) { ?>
          <div class="filter-brand-item-price">
            <input type="checkbox" name="filter-brand-price" class="filter-brand-check-price" data-title="<?= $value ?>" data-price="<?= $key ?>" id="filter-brand-price-<?= $key ?>">
            <label for="filter-brand-price-<?= $key ?>"><?= $value ?></label>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="page-product-right">
    <div class="title-main mb-0 animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s"><span><?= (!empty($titleCate)) ? $titleCate : @$titleMain ?></span></div>
    <div class="filter-layer-tags">
      <div class="filter-tags">
        Nhà cung cấp:
        <b class="filter-tags-detail"></b>
        <span class="filter-tags-remove">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 50 50" xml:space="preserve">
            <path fill="#333" d="M9.016 40.837a1.001 1.001 0 0 0 1.415-.001l14.292-14.309 14.292 14.309a1 1 0 1 0 1.416-1.413L26.153 25.129 40.43 10.836a1 1 0 1 0-1.415-1.413L24.722 23.732 10.43 9.423a1 1 0 1 0-1.415 1.413l14.276 14.293L9.015 39.423a1 1 0 0 0 .001 1.414z"></path>
          </svg>
        </span>
      </div>
      <div class="filter-tags-price">
        Giá:
        <b class="filter-tags-price-detail"></b>
        <span class="filter-tags-price-remove">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 50 50" xml:space="preserve">
            <path fill="#333" d="M9.016 40.837a1.001 1.001 0 0 0 1.415-.001l14.292-14.309 14.292 14.309a1 1 0 1 0 1.416-1.413L26.153 25.129 40.43 10.836a1 1 0 1 0-1.415-1.413L24.722 23.732 10.43 9.423a1 1 0 1 0-1.415 1.413l14.276 14.293L9.015 39.423a1 1 0 0 0 .001 1.414z"></path>
          </svg>
        </span>
      </div>
    </div>
    <?php if ($com == 'tim-kiem') { ?>
      <div class="div_kq_search mb-4 animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s"><?= $titleMain ?> (<?= $total ?>): <span>"<?php echo $tukhoa_show; ?>"</span></div>
    <?php } ?>
    <div class="load-data-product">
      <?php if (!empty($product)) { ?>
        <div class="flex-product">
          <?php foreach ($product as $k => $v) {
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
        <div class="alert alert-warning w-100 animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s" role="alert">
          <strong><?= khongtimthayketqua ?></strong>
        </div>
      <?php } ?>
      <div class="pagination-home w-100 animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s"><?= (!empty($paging)) ? $paging : '' ?></div>
    </div>
  </div>
</div>