<div class="head">
  <div class="wrap-content">
    <a class="logo-head" href="" title="logo">
      <img onerror="this.src='<?= THUMBS ?>/99x70x1/assets/images/noimage.png';" src="<?= THUMBS ?>/99x70x1/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" alt="logo" title="logo" />
    </a>
    <div class="bx-search">
      <div class="search w-clear">
        <input type="text" id="keyword" name="keyword" placeholder="Tìm kiếm sản phẩm..." value="<?= (!empty($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" />
        <p class="search-ic"><i class="bi bi-search"></i></p>
      </div>
      <ul class="tags-search">
        <li>
          <i class="fa-solid fa-truck-fast"></i>
          <span>Giao hàng toàn quốc</span>
        </li>
        <li>
          <i class="fa-solid fa-shop"></i>
          <span>Hệ thống cửa hàng BAYA</span>
        </li>
        <li>
          <i class="fa-solid fa-headphones-simple"></i>
          <span>Hotline: 1900 63 64 76 (9-21h)</span>
        </li>
      </ul>
    </div>

    <?php if (array_key_exists($loginMember, $_SESSION) && $_SESSION[$loginMember]['active'] == true) { ?>
      <div class="head-user">
        <a href="account/thong-tin">
          <span>Hi, <?= $_SESSION[$loginMember]['username'] ?></span>
        </a>
        <a href="account/dang-xuat">
          <i class="fas fa-sign-out-alt"></i>
          <span><?= dangxuat ?></span>
        </a>
      </div>
    <?php } else { ?>
      <div class="head-user">
        <p class="head-user-icon mb-0"><i class="fa-solid fa-phone"></i></p>
        <div class="header-user-item">
          <a class="text-decoration-none" title="<?= dangnhap ?>">
            <span>Hotline: <?= $func->formatPhone($optsetting['hotline']) ?></span>
          </a>
        </div>
      </div>
    <?php } ?>
  </div>
</div>