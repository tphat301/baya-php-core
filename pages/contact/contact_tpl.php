<div class="title-main animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s"><span>
    <?= $titleMain ?>
  </span></div>

<?= $flash->getMessages("frontend") ?>

<div class="content-main">
  <div class="contact-article">
    <div class="contact-text animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
      <?= htmlspecialchars_decode($lienhe['content' . $lang]) ?>
    </div>
    <form class="contact-form validation-contact animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s" novalidate method="post" action="" enctype="multipart/form-data">
      <div class="row-20 row">
        <div class="contact-input col-sm-6 col-20">
          <div class="form-floating form-floating-cus">
            <input type="text" name="dataContact[fullname]" class="form-control fullname text-sm" id="fullname-contact" placeholder="<?= hoten ?>" value="<?= $flash->get('fullname') ?>" required>
            <label for="fullname-contact">
              <?= hoten ?>
            </label>
          </div>
          <div class="invalid-feedback">
            <?= vuilongnhaphoten ?>
          </div>
        </div>
        <div class="contact-input col-sm-6 col-20">
          <div class="form-floating form-floating-cus">
            <input type="number" name="dataContact[phone]" class="form-control fullname text-sm" id="phone-contact" placeholder="<?= dienthoai ?>" value="<?= $flash->get('phone') ?>" required>
            <label for="phone-contact">
              <?= dienthoai ?>
            </label>
          </div>
          <div class="invalid-feedback">
            <?= vuilongnhapsodienthoai ?>
          </div>
        </div>
        <div class="contact-input col-sm-6 col-20">
          <div class="form-floating form-floating-cus">
            <input type="text" class="form-control fullname text-sm" id="address-contact" name="dataContact[address]" placeholder="<?= diachi ?>" value="<?= $flash->get('address') ?>" required />
            <label for="address-contact">
              <?= diachi ?>
            </label>
          </div>
          <div class="invalid-feedback">
            <?= vuilongnhapdiachi ?>
          </div>
        </div>
        <div class="contact-input col-sm-6 col-20">
          <div class="form-floating form-floating-cus">
            <input type="email" class="form-control fullname text-sm" id="email-contact" name="dataContact[email]" placeholder="Email" value="<?= $flash->get('email') ?>" required />
            <label for="email-contact">Email</label>
          </div>
          <div class="invalid-feedback">
            <?= vuilongnhapdiachiemail ?>
          </div>
        </div>
      </div>
      <div class="contact-input">
        <div class="form-floating form-floating-cus">
          <input type="text" class="form-control fullname text-sm" id="subject-contact" name="dataContact[subject]" placeholder="<?= chude ?>" value="<?= $flash->get('subject') ?>" required />
          <label for="subject-contact">
            <?= chude ?>
          </label>
        </div>
        <div class="invalid-feedback">
          <?= vuilongnhapchude ?>
        </div>
      </div>
      <div class="contact-input">
        <div class="form-floating form-floating-cus">
          <textarea class="form-control fullname text-sm" id="content-contact" name="dataContact[content]" placeholder="<?= noidung ?>" required><?= $flash->get('content') ?></textarea>
          <label for="content-contact">
            <?= noidung ?>
          </label>
        </div>

        <div class="invalid-feedback">
          <?= vuilongnhapnoidung ?>
        </div>
      </div>
      <input type="submit" class="btn btn-primary mr-2" name="submit-contact" value="<?= gui ?>" disabled />
      <input type="reset" class="btn btn-secondary" value="<?= nhaplai ?>" />
      <input type="hidden" name="recaptcha_response_contact" id="recaptchaResponseContact">
    </form>
  </div>
  <div class="contact-map animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
    <?= $func->decodeHtmlChars($optsetting['coords_iframe']) ?>
  </div>
</div>