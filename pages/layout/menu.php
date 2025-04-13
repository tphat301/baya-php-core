<div class="w-menu <?= $com == '' || $com == 'index' ? 'fx' : 'st' ?>">
  <div class="menu">
    <div class="wrap-content">
      <ul class="menu-main">
        <li>
          <a class="<?= $com == '' || $com == 'index' ? 'active' : '' ?> transition" href="" title="<?= trangchu ?>">
            <?= trangchu ?>
          </a>
        </li>
        <li class="menu-line"></li>
        <li>
          <a class="<?= $com == 'gioi-thieu' ? 'active' : '' ?> transition" href="gioi-thieu" title="<?= gioithieu ?>">
            <?= gioithieu ?>
          </a>
        </li>
        <li class="menu-line"></li>
        <li>
          <a class="<?= $com == 'san-pham' ? 'active' : '' ?> transition" href="san-pham" title="<?= sanpham ?>">
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
        <li class="menu-line"></li>
        <li>
          <a class="<?= $com == 'tin-tuc' ? 'active' : '' ?> transition" href="tin-tuc" title="<?= tintuc ?>">
            <?= tintuc ?>
          </a>
        </li>
        <li class="menu-line"></li>
        <li>
          <a class="<?= $com == 'lien-he' ? 'active' : '' ?> transition" href="lien-he" title="<?= lienhe ?>">
            <?= lienhe ?>
          </a>
        </li>

      </ul>
    </div>
  </div>
</div>