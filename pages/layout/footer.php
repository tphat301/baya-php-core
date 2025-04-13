<div class="footer">
  <div class="footer-article">
    <div class="wrap-content padding-top-bottom d-flex flex-wrap justify-content-between">
      <div class="footer-news">
        <p class="footer-title">Thông tin liên hệ</p>
        <div class="footer-info"><?= $func->decodeHtmlChars($footer['content' . $lang]) ?></div>
      </div>
      <div class="footer-news">
        <p class="footer-title">Về baya</p>
        <ul class="footer-ul">
          <li><a class="text-decoration-none" href="gioi-thieu" title="Giới thiệu">Giới thiệu</a></li>
          <li><a class="text-decoration-none" href="lien-he" title="Liên hệ">Liên hệ</a></li>
          <li><a class="text-decoration-none" href="tin-tuc" title="Tin tức">Tin tức</a></li>
        </ul>
      </div>
      <div class="footer-news">
        <p class="footer-title">Hỗ trợ khách hàng</p>
        <ul class="footer-ul">
          <?php foreach ($supports as $v) { ?>
            <li><a class="text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <div class="footer-news">
        <p class="footer-title">
          Chính sách
        </p>
        <ul class="footer-ul">
          <?php foreach ($policy as $v) { ?>
            <li><a class=" text-decoration-none " href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a></li>
          <?php } ?>
        </ul>
      </div>

    </div>
  </div>
  <div class="footer-powered">
    <div class="wrap-content">
      <div class="footer-copyright"><?= $copyright['name' . $lang] ?></div>
    </div>
  </div>
  <?php if (!$func->isGoogleSpeed()) { ?>
    <?= $addons->set('messages-facebook', 'messages-facebook', 2); ?>
  <?php } ?>
</div>

<?php if (!$func->isGoogleSpeed()) { ?>
  <?php if ($com != 'gio-hang') { ?>
    <div>
      <a class="cart-fixed text-decoration-none" href="gio-hang" title="Giỏ hàng">
        <i class="bi bi-bag-dash-fill"></i>
        <span class="count-cart"><?= (!empty($_SESSION['cart'])) ? count($_SESSION['cart']) : 0 ?></span>
      </a>
    </div>
  <?php } ?>
  <a class="btn-zalo btn-frame text-decoration-none" target="_blank" href="https://zalo.me/<?= preg_replace('/[^0-9]/', '', $optsetting['zalo']); ?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><?= $func->getImage(['size-error' => '35x35x2', 'upload' => 'assets/images/', 'image' => 'zl.png', 'alt' => 'Zalo']) ?></i>
  </a>
  <a class="btn-phone btn-frame text-decoration-none" href="tel:<?= preg_replace('/[^0-9]/', '', $optsetting['hotline']); ?>">
    <div class="animated infinite zoomIn kenit-alo-circle"></div>
    <div class="animated infinite pulse kenit-alo-circle-fill"></div>
    <i><?= $func->getImage(['size-error' => '35x35x2', 'upload' => 'assets/images/', 'image' => 'hl.png', 'alt' => 'Hotline']) ?></i>
  </a>
  <div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 190.25;"></path>
    </svg>
  </div>
<?php } ?>