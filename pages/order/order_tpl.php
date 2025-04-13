<form class="form-cart validation-cart" novalidate method="post" action="" enctype="multipart/form-data">
  <div class="wrap-cart animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
    <?= $flash->getMessages("frontend") ?>
    <div class="row">
      <?php if (!empty($_SESSION['cart'])) { ?>
        <div class="top-cart col-12 col-lg-7">
          <p class="title-cart"><?= giohangcuaban ?>:</p>
          <div class="list-procart">
            <div class="procart procart-label">
              <div class="row row-10">
                <div class="pic-procart col-3 col-md-2 mg-col-10"><?= hinhanh ?></div>
                <div class="info-procart col-6 col-md-5 mg-col-10"><?= tensanpham ?></div>
                <div class="quantity-procart col-3 col-md-2 mg-col-10">
                  <p><?= soluong ?></p>
                  <p><?= thanhtien ?></p>
                </div>
                <div class="price-procart col-3 col-md-3 mg-col-10"><?= thanhtien ?></div>
              </div>
            </div>
            <?php $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
              $pid = $_SESSION['cart'][$i]['productid'];
              $quantity = $_SESSION['cart'][$i]['qty'];
              $color = ($_SESSION['cart'][$i]['color']) ? $_SESSION['cart'][$i]['color'] : 0;
              $size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
              $code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
              $proinfo = $cart->getProductInfo($pid);
              $pro_price = $proinfo['regular_price'];
              $pro_price_new = $proinfo['sale_price'];
              $pro_price_qty = $pro_price * $quantity;
              $pro_price_new_qty = $pro_price_new * $quantity; ?>
              <div class="procart procart-<?= $code ?>">
                <div class="row row-10">
                  <div class="pic-procart col-3 col-md-2 mg-col-10">
                    <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['name' . $lang] ?>">
                      <?= $func->getImage(['sizes' => '85x85x2', 'upload' => UPLOAD_PRODUCT_L, 'image' => $proinfo['photo'], 'alt' => $proinfo['name' . $lang]]) ?>
                    </a>
                    <a class="del-procart text-decoration-none" data-code="<?= $code ?>">
                      <i class="fa fa-times-circle"></i>
                      <span><?= xoa ?></span>
                    </a>
                  </div>
                  <div class="info-procart col-6 col-md-5 mg-col-10">
                    <h3 class="name-procart"><a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['name' . $lang] ?>"><?= $proinfo['name' . $lang] ?></a></h3>
                    <div class="properties-procart">
                      <?php if ($color) {
                        $color_detail = $d->rawQueryOne("select name$lang from #_color where type = ? and id = ? limit 0,1", array($proinfo['type'], $color)); ?>
                        <p>Màu: <strong><?= $color_detail['name' . $lang] ?></strong></p>
                      <?php } ?>
                      <?php if ($size) {
                        $size_detail = $d->rawQueryOne("select name$lang from #_size where type = ? and id = ? limit 0,1", array($proinfo['type'], $size)); ?>
                        <p>Size: <strong><?= $size_detail['name' . $lang] ?></strong></p>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="quantity-procart col-3 col-md-2 mg-col-10">
                    <div class="price-procart price-procart-rp">
                      <?php if ($proinfo['sale_price']) { ?>
                        <p class="price-new-cart load-price-new-<?= $code ?>">
                          <?= $func->formatMoney($pro_price_new_qty) ?>
                        </p>
                        <p class="price-old-cart load-price-<?= $code ?>">
                          <?= $func->formatMoney($pro_price_qty) ?>
                        </p>
                      <?php } else { ?>
                        <p class="price-new-cart load-price-<?= $code ?>">
                          <?= $func->formatMoney($pro_price_qty) ?>
                        </p>
                      <?php } ?>
                    </div>
                    <div class="quantity-counter-procart quantity-counter-procart-<?= $code ?>">
                      <span class="counter-procart-minus counter-procart">-</span>
                      <input type="number" class="quantity-procart" min="1" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
                      <span class="counter-procart-plus counter-procart">+</span>
                    </div>
                  </div>
                  <div class="price-procart col-3 col-md-3 mg-col-10">
                    <?php if ($proinfo['sale_price']) { ?>
                      <p class="price-new-cart load-price-new-<?= $code ?>">
                        <?= $func->formatMoney($pro_price_new_qty) ?>
                      </p>
                      <p class="price-old-cart load-price-<?= $code ?>">
                        <?= $func->formatMoney($pro_price_qty) ?>
                      </p>
                    <?php } else { ?>
                      <p class="price-new-cart load-price-<?= $code ?>">
                        <?= $func->formatMoney($pro_price_qty) ?>
                      </p>
                    <?php } ?>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
          <div class="money-procart">
            <?php if ($config['order']['ship']) { ?>
              <div class="total-procart">
                <p><?= tamtinh ?>:</p>
                <p class="total-price load-price-temp"><?= $func->formatMoney($cart->getOrderTotal()) ?></p>
              </div>
            <?php } ?>
            <?php if ($config['order']['ship']) { ?>
              <div class="total-procart">
                <p><?= phivanchuyen ?>:</p>
                <p class="total-price load-price-ship">0đ</p>
              </div>
            <?php } ?>
            <div class="total-procart">
              <p><?= tongtien ?>:</p>
              <p class="total-price load-price-total"><?= $func->formatMoney($cart->getOrderTotal()) ?></p>
            </div>
          </div>
        </div>
        <div class="bottom-cart col-12 col-lg-5">
          <div class="section-cart">
            <p class="title-cart"><?= hinhthucthanhtoan ?>:</p>
            <div class="information-cart">
              <?php $flashPayment = $flash->get('payments'); ?>
              <?php foreach ($payments_info as $key => $value) { ?>
                <div class="payments-cart form-check">
                  <input type="radio" class="form-check-input" id="payments-<?= $value['id'] ?>" name="dataOrder[payments]" value="<?= $value['id'] ?>" <?= (!empty($flashPayment) && $flashPayment == $value['id']) ? 'checked' : '' ?> required>
                  <label class="payments-label form-check-label" for="payments-<?= $value['id'] ?>" data-payments="<?= $value['id'] ?>"><?= $value['name' . $lang] ?></label>
                  <div class="payments-info payments-info-<?= $value['id'] ?> transition"><?= str_replace("\n", "<br>", $value['desc' . $lang]) ?></div>
                </div>
              <?php } ?>
            </div>
            <p class="title-cart"><?= thongtingiaohang ?>:</p>
            <div class="information-cart">
              <div class="row row-10">
                <div class="input-cart col-md-6 mg-col-10">
                  <div class="form-floating form-floating-cus">
                    <input type="text" class="form-control text-sm" id="fullname" name="dataOrder[fullname]" placeholder="<?= hoten ?>" value="<?= (!empty($flash->has('fullname'))) ? $flash->get('fullname') : '' ?>" required />
                    <label for="fullname"><?= hoten ?></label>
                  </div>
                  <div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
                </div>
                <div class="input-cart col-md-6 mg-col-10">
                  <div class="form-floating form-floating-cus">
                    <input type="number" class="form-control text-sm" id="phone" name="dataOrder[phone]" placeholder="<?= dienthoai ?>" value="<?= (!empty($flash->has('phone'))) ? $flash->get('phone') : '' ?>" required />
                    <label for="phone"><?= dienthoai ?></label>
                  </div>
                  <div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
                </div>
              </div>
              <div class="input-cart">
                <div class="form-floating form-floating-cus">
                  <input type="email" class="form-control text-sm" id="email" name="dataOrder[email]" placeholder="Email" value="<?= (!empty($flash->has('email'))) ? $flash->get('email') : '' ?>" required />
                  <label for="email">Email</label>
                </div>
                <div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
              </div>
              <div class="row row-10">
                <div class="input-cart col-md-4 mg-col-10 form-floating-cus">
                  <select class="select-city-cart form-select form-control text-sm" required id="city" name="dataOrder[city]">
                    <option value=""><?= tinhthanh ?></option>
                    <?php foreach ($city as $k => $v) { ?>
                      <option value="<?= $v['id'] ?>"><?= $v['name'] ?></option>
                    <?php } ?>
                  </select>
                  <div class="invalid-feedback"><?= vuilongchontinhthanh ?></div>
                </div>
                <div class="input-cart col-md-4 mg-col-10 form-floating-cus">
                  <select class="select-district-cart select-district form-select form-control text-sm" required id="district" name="dataOrder[district]">
                    <option value=""><?= quanhuyen ?></option>
                  </select>
                  <div class="invalid-feedback"><?= vuilongchonquanhuyen ?></div>
                </div>
                <div class="input-cart col-md-4 mg-col-10 form-floating-cus">
                  <select class="select-ward-cart select-ward form-select form-control text-sm" required id="ward" name="dataOrder[ward]">
                    <option value=""><?= phuongxa ?></option>
                  </select>
                  <div class="invalid-feedback"><?= vuilongchonphuongxa ?></div>
                </div>
              </div>
              <div class="input-cart">
                <div class="form-floating form-floating-cus">
                  <input type="text" class="form-control text-sm" id="address" name="dataOrder[address]" placeholder="<?= diachi ?>" value="<?= (!empty($flash->has('address'))) ? $flash->get('address') : '' ?>" required />
                  <label for="address"><?= diachi ?></label>
                </div>
                <div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
              </div>
              <div class="input-cart">
                <div class="form-floating form-floating-cus">
                  <textarea class="form-control text-sm" id="requirements" name="dataOrder[requirements]" placeholder="<?= yeucaukhac ?>" /><?= (!empty($flash->has('requirements'))) ? $flash->get('requirements') : '' ?></textarea>
                  <label for="requirements"><?= yeucaukhac ?></label>
                </div>
              </div>
            </div>
            <input type="submit" class="btn btn-primary btn-cart w-100" name="thanhtoan" value="<?= thanhtoan ?>" disabled />
          </div>
        </div>
      <?php } else { ?>
        <a href="" class="empty-cart text-decoration-none d-block">
          <i class="fa-duotone fa-cart-xmark"></i>
          <p><?= khongtontaisanphamtronggiohang ?></p>
          <span class="btn btn-warning"><?= vetrangchu ?></span>
        </a>
      <?php } ?>
    </div>
  </div>
</form>