<div class="grid-pro-detail d-flex flex-wrap justify-content-between align-items-start">
  <div class="left-pro-detail animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
    <div class="left-pro-detail-child">
      <a id="Zoom-1" class="MagicZoom" data-options="zoomMode: off; hint: off; rightClick: true; selectorTrigger: hover; expandCaption: false; history: false;" href="<?= ASSET . WATERMARK ?>/product/480x480x1/<?= UPLOAD_PRODUCT_L . $rowDetail['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">
        <img class="w-100" onerror="this.src='<?= THUMBS ?>/480x480x1/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/480x480x1/<?= UPLOAD_PRODUCT_L . $rowDetail['photo'] ?>" alt="<?= $rowDetail['name' . $lang] ?>" title="<?= $rowDetail['name' . $lang] ?>" />
      </a>
      <?php if (!empty($rowDetailPhoto)) { ?>
        <div class="slick-gallery-product">
          <?php foreach ($rowDetailPhoto as $v) { ?>
            <div>
              <a class="thumb-pro-detail" data-zoom-id="Zoom-1" href="<?= ASSET . WATERMARK ?>/product/480x480x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" title="<?= $rowDetail['name' . $lang] ?>">
                <img class="w-100" onerror="this.src='<?= THUMBS ?>/480x480x1/assets/images/noimage.png';" src="<?= WATERMARK ?>/product/480x480x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $rowDetail['name' . $lang] ?>" title="<?= $rowDetail['name' . $lang] ?>" />
              </a>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
    <div class="social-plugin social-plugin-pro-detail w-clear">
      <span class="social-name">Chia sẻ: </span>
      <?php
      $params = array();
      $params['oaid'] = $optsetting['oaidzalo'];
      echo $func->markdown('social/share', $params);
      ?>
    </div>
  </div>

  <div class="right-pro-detail animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
    <div class="right-pro-detail-top">
      <div class="title-pro-detail mb-2"><?= $rowDetail['name' . $lang] ?></div>
      <div class="product-dt-view">
        <span>Lượt xem:</span>
        <strong><?= $rowDetail['view'] ?></strong>
      </div>
      <div class="product-dt-sub-heading">
        <span class="product-dt-code">Mã sản phẩm: <strong><?= $rowDetail['code'] ?></strong></span>
        <span class="product-dt-line"></span>
        <span class="product-dt-availability">Tình trạng: <strong><?= $rowDetail['availability'] ?></strong></span>
        <span class="product-dt-line"></span>
        <a class="product-dt-brand text-decoration-none" href="<?= $productBrand[$sluglang] ?>" title="<?= $productBrand['name' . $lang] ?>">Thương hiệu: <strong><?= $productBrand['name' . $lang] ?></strong></a>
        <span></span>
      </div>
      <div class="product-dt-price">
        <strong class="product-dt-price-title">Giá:</strong>
        <span class="product-dt-new-price">
          <?= $func->formatMoney($rowDetail['sale_price']) ?>
        </span>
        <span class="product-dt-old-price"><?= $func->formatMoney($rowDetail['regular_price']) ?></span>
        <span class="product-dt-price-per"><?= '-' . $rowDetail['discount'] . '%' ?></span>
      </div>
      <?php if ($rowDetail['sale_price']) { ?>
        <div class="product-dt-qty d-flex flex-wrap align-items-center">
          <label class="attr-label-pro-detail d-block mr-2 mb-0"><strong><?= soluong ?>:</strong></label>
          <div class="attr-content-pro-detail d-flex flex-wrap align-items-center justify-content-between">
            <div class="quantity-pro-detail">
              <span class="quantity-minus-pro-detail">-</span>
              <input type="number" class="qty-pro" min="1" value="1" readonly />
              <span class="quantity-plus-pro-detail">+</span>
            </div>
          </div>
        </div>
        <div class="cart-pro-detail d-flex flex-wrap align-items-center justify-content-between">
          <a class="transition addnow addcart text-decoration-none d-flex align-items-center justify-content-center" data-id="<?= $rowDetail['id'] ?>" data-action="addnow"><i class="bi bi-cart2"></i><span><?= themvaogiohang ?></span></a>
          <a class="transition buynow addcart text-decoration-none d-flex align-items-center justify-content-center" data-id="<?= $rowDetail['id'] ?>" data-action="buynow"><i class="bi bi-cart2"></i><span><?= muangay ?></span></a>
        </div>
      <?php } ?>
      <?php if (!empty($criterias)) { ?>
        <div class="product-dt-criteria">
          <?php foreach ($criterias as $v) { ?>
            <div class="product-dt-criteria-item">
              <picture class="product-dt-criteria-pic">
                <img class="lazy" onerror="this.src='<?= THUMBS ?>/30x30x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/30x30x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
              </picture>
              <span class="product-dt-criteria-name text-split">
                <?= $v['name' . $lang] ?>
              </span>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
    <div class="right-pro-detail-bottom">
      <div class="product-dt-nav">
        <span>Mô tả sản phẩm</span>
      </div>
      <div class="product-dt-desc">
        <?php if (!empty($rowDetail['desc' . $lang])) { ?>
          <?= (!empty($rowDetail['desc' . $lang])) ? htmlspecialchars_decode($rowDetail['desc' . $lang]) : '' ?>
        <?php } else { ?>
          <div class="alert mb-0 alert-warning w-100 animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s" role="alert">
            <strong>Chưa có mô tả cho sản phẩm này</strong>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php if (empty($quickview)) { ?>
  <div class="prod-relate">
    <div class="title-main-custom animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
      <span>
        Xem thêm sản phẩm cùng loại
      </span>
    </div>
    <?php if (!empty($product)) { ?>
      <div class="owl-page prod-relate-owl owl-carousel owl-theme" data-items="screen:0|items:1|margin:10,screen:425|items:2|margin:10,screen:575|items:2|margin:10,screen:767|items:3|margin:10,screen:991|items:4|margin:20,screen:1199|items:5|margin:20" data-rewind="1" data-autoplay="0" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500">
        <?php foreach ($product as $v) {
          $brand = $d->rawQueryOne("select name$lang, slug$lang from #_product_brand where id = ? and type = ? and find_in_set('hienthi',status)", array($v['id_brand'], 'san-pham')); ?>
          <div class="prod-discount-item animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
            <a class="text-decoration-none prod-discount-thumbnail scale-img" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
              <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/480x480x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/480x480x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
            </a>
            <div class="prod-discount-info">
              <a href="<?= $brand['slug' . $lang] ?>" class="prod-discount-brand" title="<?= $brand['name' . $lang] ?>"><?= $brand['name' . $lang] ?></a>
              <h3>
                <a class="text-decoration-none text-split prod-discount-name" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                  <?= $v['name' . $lang] ?>
                </a>
              </h3>
              <p class="prod-discount-price">
                <?php if ($v['discount']) { ?>
                  <span class="prod-discount-price-new">
                    <?= $func->formatMoney($v['sale_price']) ?>
                  </span>
                  <span class="prod-discount-price-old">
                    <?= $func->formatMoney($v['regular_price']) ?>
                  </span>
                  <span class="prod-discount-price-per">
                    <?= '-' . $v['discount'] . '%' ?>
                  </span>
                <?php } else { ?>
                  <span class="prod-discount-price-new">
                    <?= $func->formatMoney($v['sale_price']) ?>
                  </span>
                <?php } ?>
              </p>
              <?php if ($v['sale_price']) { ?>
                <div class="prod-discount-cart addcart" data-id="<?= $v['id'] ?>" data-action="addnow">
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
  </div>
<?php } ?>

<?php if (empty($quickview)) { ?>
  <div class="prod-relate">
    <?php if (!empty($_SESSION['pro_seen'])) { ?>
      <div class="title-main-custom"><span>Sản phẩm đã xem</span></div>
      <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:1|margin:10,screen:425|items:2|margin:10,screen:575|items:2|margin:10,screen:767|items:3|margin:10,screen:991|items:4|margin:20,screen:1199|items:5|margin:20" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500" data-dots="0" data-nav="0" data-navcontainer="">
        <?php foreach ($_SESSION['pro_seen'] as $k => $v) {
          $detailProduct = $func->getInfoDetail("type, id, id_brand, name$lang, slug$lang, code, photo, options, discount, sale_price, regular_price", 'product', $v);
          $brand = $d->rawQueryOne("select name$lang, slug$lang from #_product_brand where id = ? and type = ? and find_in_set('hienthi',status)", array($detailProduct['id_brand'], 'san-pham'));
        ?>
          <div class="prod-discount-item animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
            <a class="text-decoration-none prod-discount-thumbnail scale-img" href="<?= $detailProduct[$sluglang] ?>" title="<?= $detailProduct['name' . $lang] ?>">
              <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/480x480x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/480x480x1/<?= UPLOAD_PRODUCT_L . $detailProduct['photo'] ?>" alt="<?= $detailProduct['name' . $lang] ?>" title="<?= $detailProduct['name' . $lang] ?>" />
            </a>
            <div class="prod-discount-info">
              <a href="<?= $brand['slug' . $lang] ?>" class="prod-discount-brand" title="<?= $brand['name' . $lang] ?>"><?= $brand['name' . $lang] ?></a>
              <h3>
                <a class="text-decoration-none text-split prod-discount-name" href="<?= $detailProduct[$sluglang] ?>" title="<?= $detailProduct['name' . $lang] ?>">
                  <?= $detailProduct['name' . $lang] ?>
                </a>
              </h3>
              <p class="prod-discount-price">
                <?php if ($detailProduct['discount']) { ?>
                  <span class="prod-discount-price-new">
                    <?= $func->formatMoney($detailProduct['sale_price']) ?>
                  </span>
                  <span class="prod-discount-price-old">
                    <?= $func->formatMoney($detailProduct['regular_price']) ?>
                  </span>
                  <span class="prod-discount-price-per">
                    <?= '-' . $detailProduct['discount'] . '%' ?>
                  </span>
                <?php } else { ?>
                  <span class="prod-discount-price-new">
                    <?= $func->formatMoney($detailProduct['sale_price']) ?>
                  </span>
                <?php } ?>
              </p>
              <?php if ($detailProduct['sale_price']) { ?>
                <div class="prod-discount-cart addcart" data-id="<?= $detailProduct['id'] ?>" data-action="addnow">
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
  </div>
<?php } ?>