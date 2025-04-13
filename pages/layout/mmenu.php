<div class="menu-res">
  <div class="menu-bar-res d-flex align-items-center justify-content-between ">
    <a id="hamburger" href="#menu" title="Menu"><span></span></a>
    <a class="logo-res" href="" title="logo">
      <img onerror="this.src='<?= THUMBS ?>/99x50x2/assets/images/noimage.png';" src="<?= THUMBS ?>/99x50x2/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" alt="logo" title="logo" />
    </a>
    <div class="search-res">
      <p class="icon-search transition">
        <i class="fa-solid fa-magnifying-glass"></i>
      </p>
      <div class="search-grid w-clear">
        <input type="text" name="keyword-res" id="keyword-res" placeholder="<?= nhaptukhoatimkiem ?>" onkeypress="doEnter(event,'keyword-res');" value="<?= (!empty($_GET['keyword'])) ? $_GET['keyword'] : "" ?>" />
        <p onclick="onSearch('keyword-res');"><i class="bi bi-search"></i></p>
      </div>
    </div>
  </div>
  <nav id="menu">
    <ul>
      <li>
        <a class="transition" href="" title="<?= trangchu ?>">
          <?= trangchu ?>
        </a>
      </li>
      <li>
        <a class="transition" href="gioi-thieu" title="<?= gioithieu ?>">
          <?= gioithieu ?>
        </a>
      </li>
      <li>
        <a class="transition" href="san-pham" title="<?= sanpham ?>">
          <?= sanpham ?>
        </a>
        <?php if (!empty($productListMenu)) { ?>
          <ul>
            <?php foreach ($productListMenu as $klist => $vlist) {
              $productCatMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($vlist['id'])); ?>
              <li>
                <a class="transition" title="<?= $vlist['name' . $lang] ?>" href="<?= $vlist[$sluglang] ?>">
                  <?= $vlist['name' . $lang] ?>
                </a>
                <?php if (!empty($productCatMenu)) { ?>
                  <ul>
                    <?php foreach ($productCatMenu as $kcat => $vcat) {
                      $productItemMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_item where id_cat = ? and find_in_set('hienthi',status) order by numb,id desc", array($vcat['id'])); ?>
                      <li>
                        <a class="transition" title="<?= $vcat['name' . $lang] ?>" href="<?= $vcat[$sluglang] ?>">
                          <?= $vcat['name' . $lang] ?>
                        </a>
                        <?php if (!empty($productItemMenu)) { ?>
                          <ul>
                            <?php foreach ($productItemMenu as $kitem => $vitem) {
                              $productSubMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_sub where id_item = ? and find_in_set('hienthi',status) order by numb,id desc", array($vitem['id'])); ?>
                              <li>
                                <a class="transition" title="<?= $vitem['name' . $lang] ?>" href="<?= $vitem[$sluglang] ?>">
                                  <?= $vitem['name' . $lang] ?>
                                </a>
                                <?php if (!empty($productSubMenu)) { ?>
                                  <ul>
                                    <?php foreach ($productSubMenu as $ksub => $vsub) { ?>
                                      <li>
                                        <a class="transition" title="<?= $vsub['name' . $lang] ?>" href="<?= $vsub[$sluglang] ?>">
                                          <?= $vsub['name' . $lang] ?>
                                        </a>
                                      </li>
                                    <?php } ?>
                                  </ul>
                                <?php } ?>
                              </li>
                            <?php } ?>
                          </ul>
                        <?php } ?>
                      </li>
                    <?php } ?>
                  </ul>
                <?php } ?>
              </li>
            <?php } ?>
          </ul>
        <?php } ?>
      </li>
      <li>
        <a class="transition" href="tin-tuc" title="<?= tintuc ?>">
          <?= tintuc ?>
        </a>
      </li>
      <li>
        <a class="transition" href="lien-he" title="<?= lienhe ?>">
          <?= lienhe ?>
        </a>
      </li>
    </ul>
  </nav>
</div>