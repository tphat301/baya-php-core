<?php if (!empty($slider)) { ?>
  <div class="slideshow">
    <div class="wrap-content position-relative">
      <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:1" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000" data-dots="0" data-nav="1" data-navtext="<svg xmlns='https://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-left' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='5' y1='12' x2='9' y2='16' /><line x1='5' y1='12' x2='9' y2='8' /></svg>|<svg xmlns='https://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-arrow-narrow-right' width='50' height='37' viewBox='0 0 24 24' stroke-width='1' stroke='#ffffff' fill='none' stroke-linecap='round' stroke-linejoin='round'><path stroke='none' d='M0 0h24v24H0z' fill='none'/><line x1='5' y1='12' x2='19' y2='12' /><line x1='15' y1='16' x2='19' y2='12' /><line x1='15' y1='8' x2='19' y2='12' /></svg>" data-navcontainer=".control-slideshow">
        <?php foreach ($slider as $v) { ?>
          <div class="slideshow-item">
            <a class="slideshow-image" href="<?= $v['link'] ?>" target="_blank" title="<?= $v['name' . $lang] ?>">
              <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/1920x750x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/1920x750x1/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
            </a>
          </div>
        <?php } ?>
      </div>
      <div class="control-slideshow control-owl transition"></div>
    </div>
  </div>
<?php } ?>

<?php if (!empty($expensive_category_products)) { ?>
  <?php foreach ($expensive_category_products as $vlist) { ?>
    <section class="expensive-category">
      <div class="wrap-content">
        <div class="title-main mb-0">
          <span>
            <?= $vlist['name' . $lang] ?>
          </span>
        </div>
        <div class="paging-product-category paging-product-category-<?= $vlist['id'] ?>" data-list="<?= $vlist['id'] ?>">
        </div>
      </div>
    </section>
  <?php } ?>
<?php } ?>


<?php if (!empty($discount_products)) { ?>
  <section class="prod-discount">
    <div class="wrap-content">
      <h2 class="title-main">
        <span>
          Back To School - Up To 60%
        </span>
      </h2>
      <div class="owl-page prod-discount-owl owl-carousel owl-theme" data-items="screen:0|items:1|margin:10,screen:425|items:2|margin:10,screen:575|items:2|margin:10,screen:767|items:3|margin:10,screen:991|items:4|margin:20,screen:1199|items:5|margin:20" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500">
        <?php foreach ($discount_products as $v) {
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
    </div>
  </section>
<?php } ?>

<?php if (!empty($products)) { ?>
  <section class="prod-outstanding">
    <div class="wrap-content">
      <h2 class="title-main">
        <span>
          Sản phẩm nổi bật
        </span>
      </h2>
      <div class="prod-outstanding-row">
        <picture class="prod-outstanding-pic banner-hover-effect">
          <img onerror="this.src='<?= THUMBS ?>/274x688x1/assets/images/noimage.png';" src="<?= THUMBS ?>/274x688x1/<?= UPLOAD_PHOTO_L . $avatar_product['photo'] ?>" class="w-100" alt="banner product" title="banner product" />
        </picture>
        <div class="prod-outstanding-box">
          <div class="prod-outstanding-list">
            <?php foreach ($products as $v) {
              $brand = $d->rawQueryOne("select name$lang, slug$lang from #_product_brand where id = ? and type = ? and find_in_set('hienthi',status)", array($v['id_brand'], 'san-pham')); ?>
              <div class="prod-outstanding-item animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
                <a class="text-decoration-none prod-outstanding-thumbnail scale-img" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                  <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/480x480x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/480x480x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
                </a>
                <div class="prod-outstanding-info">
                  <a href="<?= $brand['slug' . $lang] ?>" class="prod-outstanding-brand" title="<?= $brand['name' . $lang] ?>"><?= $brand['name' . $lang] ?></a>
                  <h3>
                    <a class="text-decoration-none text-split prod-outstanding-name" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                      <?= $v['name' . $lang] ?>
                    </a>
                  </h3>
                  <p class="prod-outstanding-price">
                    <?php if ($v['discount']) { ?>
                      <span class="prod-outstanding-price-new">
                        <?= $func->formatMoney($v['sale_price']) ?>
                      </span>
                      <span class="prod-outstanding-price-old">
                        <?= $func->formatMoney($v['regular_price']) ?>
                      </span>
                      <span class="prod-outstanding-price-per">
                        <?= '-' . $v['discount'] . '%' ?>
                      </span>
                    <?php } else { ?>
                      <span class="prod-outstanding-price-new">
                        <?= $func->formatMoney($v['sale_price']) ?>
                      </span>
                    <?php } ?>
                  </p>
                  <?php if ($v['sale_price']) { ?>
                    <div class="prod-outstanding-cart addcart" data-id="<?= $v['id'] ?>" data-action="addnow">
                      <span>THÊM VÀO GIỎ</span>
                      <i class="bi bi-basket3"></i>
                    </div>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
        <a href="san-pham" class="btn-loadmore">Xem tất cả sản phẩm</a>
      </div>
    </div>
  </section>
<?php } ?>

<?php if (!empty($slider_banners)) { ?>
  <section class="slide-banner">
    <div class="wrap-content">
      <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:1|margin:10,screen:425|items:1|margin:10,screen:575|items:2|margin:10,screen:767|items:2|margin:10,screen:991|items:2|margin:10,screen:1199|items:2|margin:20" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000">
        <?php foreach ($slider_banners as $v) { ?>
          <div class="slide-banner-item animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
            <a class="slide-banner-image banner-hover-effect" href="<?= $v['link'] ?>" target="_blank" title="<?= $v['name' . $lang] ?>">
              <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/670x350x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/670x350x1/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>

<section class="prod-collection">
  <div class="wrap-content">
    <div class="prod-collection-list">
      <h2 class="prod-collection-title">Chút xinh xắn cho nhà tắm</h2>
      <?php if (!empty($accessory_products)) { ?>
        <div class="prod-collection-flex">
          <?php foreach ($accessory_products as $v) { ?>
            <div class="prod-collection-item animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
              <a class="text-decoration-none prod-collection-thumbnail scale-img" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/100x100x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/100x100x1/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
              </a>
              <div class="prod-collection-article">
                <h3>
                  <a class="text-decoration-none text-split prod-collection-name" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                    <?= $v['name' . $lang] ?>
                  </a>
                </h3>
                <p class="prod-collection-price">
                  <?php if ($v['discount']) { ?>
                    <span class="prod-collection-price-new">
                      <?= $func->formatMoney($v['sale_price']) ?>
                    </span>
                    <span class="prod-collection-price-old">
                      <?= $func->formatMoney($v['regular_price']) ?>
                    </span>
                    <span class="prod-collection-price-per">
                      <?= '-' . $v['discount'] . '%' ?>
                    </span>
                  <?php } else { ?>
                    <span class="prod-collection-price-new">
                      <?= $func->formatMoney($v['sale_price']) ?>
                    </span>
                  <?php } ?>
                </p>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
    <picture class="prod-collection-pic scale-img">
      <img onerror="this.src='<?= THUMBS ?>/410x420x1/assets/images/noimage.png';" src="<?= THUMBS ?>/410x420x1/<?= UPLOAD_PHOTO_L . $avatar_accessory['photo'] ?>" class="w-100" alt="banner product" title="banner product" />
    </picture>
  </div>
</section>

<?php if (!empty($news)) { ?>
  <section class="wrap-newsnb">
    <div class="wrap-content">
      <p class="title-main">
        <span>
          Bài viết mới nhất
        </span>
      </p>
      <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:1|margin:10,screen:425|items:2|margin:10,screen:575|items:2|margin:10,screen:767|items:3|margin:10,screen:991|items:4|margin:20,screen:1199|items:4|margin:20" data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1" data-smartspeed="300" data-autoplayspeed="500" data-autoplaytimeout="3500" data-dots="0" data-nav="0" data-navcontainer=".control-news">
        <?php foreach ($news as $k => $v) { ?>
          <div class="item-newsnb animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
            <p class="pic-newsnb">
              <a class="scale-img" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/600x600x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/600x600x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
              </a>
            </p>
            <div class="box-info-newsnb">
              <div class="info-newsnb">
                <h3 class="mb-0">
                  <a class="name-newsnb text-split text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                    <?= $v['name' . $lang] ?>
                  </a>
                </h3>
                <p class="desc-newsnb text-split">
                  <?= $v['desc' . $lang] ?>
                </p>
              </div>
              <div class="box-time-newshome">
                <div class="time-newshome">
                  <span><i class="fa-solid fa-calendar-days"></i></span>
                  <p><?= date("d", $v['date_created']) ?> Tháng <?= date("m", $v['date_created']) ?>, <?= date("Y", $v['date_created']) ?></p>
                </div>
                <a href="<?= $v[$sluglang] ?>" class="btn-news-more text-decoration-none" title="Xem thêm">Xem thêm <i class="fa-solid fa-angles-right"></i></a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="control-news control-owl transition"></div>
    </div>
  </section>
<?php } ?>

<section class="newsletter_index animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
  <div class="wrap-content">
    <h2>Đăng ký nhận tin</h2>
    <form class="validation-newsletter form-newsletter" novalidate method="post" action="">
      <div class="newsletter-input">
        <input type="email" class="form-control text-sm fullname" id="email-newsletter" name="dataNewsletter[email]" placeholder="Nhập email của bạn" required />
      </div>
      <div class="newsletter-button">
        <input type="hidden" class="" name="dataNewsletter[type]" value="dangkynhantin">
        <input type="hidden" class="" name="dataNewsletter[date_created]" value="<?= time() ?>">
        <input type="submit" class="btn btn-sm btn-danger w-100" name="submit-newsletter" value="ĐĂNG KÝ" disabled>
        <input type="hidden" class="btn btn-sm btn-danger w-100" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
      </div>
    </form>
  </div>
</section>