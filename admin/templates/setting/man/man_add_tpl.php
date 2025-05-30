<?php
$linkSave = "index.php?com=setting&act=save";
$options = (isset($item['options']) && $item['options'] != '') ? json_decode($item['options'], true) : null;
?>
<!-- Content Header -->
<section class="content-header text-sm">
  <div class="container-fluid">
    <div class="row">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="index.php" title="<?= dashboard ?>"><?= dashboard ?></a></li>
        <li class="breadcrumb-item active"><?= thongtincongty ?></li>
      </ol>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <form class="validation-form" novalidate method="post" action="<?= $linkSave ?>" enctype="multipart/form-data">
    <div class="card-footer text-sm sticky-top">
      <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i><?= luu ?></button>
      <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i><?= lamlai ?></button>
    </div>

    <?= $flash->getMessages('admin') ?>

    <?php if (isset($config['website']['debug-developer']) && $config['website']['debug-developer'] == true) { ?>
      <?php
      /*
        <div class="card card-primary card-outline text-sm">
        <div class="card-header">
          <h3 class="card-title">Database</h3>
        </div>
        <div class="card-body">
          <div class="form-group">
            <button type="button" class="btn btn-database bg-gradient-warning" data-action="ANALYZE"><i class="fas fa-database mr-2"></i>Analyze</button>
            <button type="button" class="btn btn-database bg-gradient-success" data-action="OPTIMIZE"><i class="fas fa-magic mr-2"></i>Optimize</button>
            <button type="button" class="btn btn-database bg-gradient-info" data-action="CHECK"><i class="fas fa-tasks mr-2"></i>Check</button>
            <button type="button" class="btn btn-database bg-gradient-primary" data-action="REPAIR"><i class="fas fa-tools mr-2"></i>Repair</button>
          </div>
          <div class="form-group result-database row"></div>
        </div>
      </div>
        */
      ?>
      <div class="card card-primary card-outline text-sm">
        <div class="card-header">
          <h3 class="card-title"><?= cauhinh ?> mailer</h3>
        </div>
        <div class="card-body">
          <div class="form-group">
            <div class="custom-control custom-radio d-inline-block mr-3 text-md">
              <input class="custom-control-input mailertype" type="radio" id="mailertype-host" name="data[options][mailertype]" <?= ($options['mailertype'] == 1 || $options['mailertype'] == 0) ? "checked" : "" ?> value="1">
              <label for="mailertype-host" class="custom-control-label font-weight-normal">Host email</label>
            </div>
            <div class="custom-control custom-radio d-inline-block mr-3 text-md">
              <input class="custom-control-input mailertype" type="radio" id="mailertype-gmail" name="data[options][mailertype]" <?= ($options['mailertype'] == 2) ? "checked" : "" ?> value="2">
              <label for="mailertype-gmail" class="custom-control-label font-weight-normal">Gmail email</label>
            </div>
          </div>
          <div class="host-email <?= ($options['mailertype'] == 1 || $options['mailertype'] == 0) ? 'd-block' : 'd-none' ?>">
            <div class="row">
              <div class="form-group col-md-4 col-sm-6">
                <label for="ip_host">Host:</label>
                <input type="text" class="form-control text-sm" name="data[options][ip_host]" id="ip_host" placeholder="Host" value="<?= $options['ip_host'] ?>">
              </div>
              <div class="form-group col-md-4 col-sm-6">
                <label for="port_host">Port:</label>
                <input type="text" class="form-control text-sm" name="data[options][port_host]" id="port_host" placeholder="Port" value="<?= $options['port_host'] ?>">
              </div>
              <div class="form-group col-md-4 col-sm-6">
                <label for="secure_host">Secure:</label>
                <select class="custom-select text-sm" name="data[options][secure_host]" id="secure_host">
                  <option <?= ($options['secure_host'] == 'tls') ? 'selected' : '' ?> value="tls">TLS</option>
                  <option <?= ($options['secure_host'] == 'ssl') ? 'selected' : '' ?> value="ssl">SSL</option>
                </select>
              </div>
              <div class="form-group col-md-4 col-sm-6">
                <label for="email_host">Email host:</label>
                <input type="text" class="form-control text-sm" name="data[options][email_host]" id="email_host" placeholder="Email host" value="<?= $options['email_host'] ?>">
              </div>
              <div class="form-group col-md-4 col-sm-6">
                <label for="password_host">Password host:</label>
                <input type="text" class="form-control text-sm" name="data[options][password_host]" id="password_host" placeholder="Password host" value="<?= $options['password_host'] ?>">
              </div>
            </div>
          </div>
          <div class="gmail-email <?= ($options['mailertype'] == 2) ? 'd-block' : 'd-none' ?>">
            <div class="row">
              <div class="form-group col-md-4 col-sm-6">
                <label for="host_gmail">Host:</label>
                <input type="text" class="form-control text-sm" name="data[options][host_gmail]" id="host_gmail" placeholder="Host" value="<?= $options['host_gmail'] ?>">
              </div>
              <div class="form-group col-md-4 col-sm-6">
                <label for="port_gmail">Port:</label>
                <input type="text" class="form-control text-sm" name="data[options][port_gmail]" id="port_gmail" placeholder="Port" value="<?= $options['port_gmail'] ?>">
              </div>
              <div class="form-group col-md-4 col-sm-6">
                <label for="secure_gmail">Secure:</label>
                <select class="custom-select text-sm" name="data[options][secure_gmail]" id="secure_gmail">
                  <option <?= ($options['secure_gmail'] == 'tls') ? 'selected' : '' ?> value="tls">TLS</option>
                  <option <?= ($options['secure_gmail'] == 'ssl') ? 'selected' : '' ?> value="ssl">SSL</option>
                </select>
              </div>
              <div class="form-group col-md-4 col-sm-6">
                <label for="email_gmail">Email:</label>
                <input type="text" class="form-control text-sm" name="data[options][email_gmail]" id="email_gmail" placeholder="Email" value="<?= $options['email_gmail'] ?>">
              </div>
              <div class="form-group col-md-4 col-sm-6">
                <label for="password_gmail">Password:</label>
                <input type="text" class="form-control text-sm" name="data[options][password_gmail]" id="password_gmail" placeholder="Password" value="<?= $options['password_gmail'] ?>">
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="card card-primary card-outline text-sm">
      <div class="card-header">
        <h3 class="card-title"><?= thongtinchung ?></h3>
      </div>
      <div class="card-body">
        <?php if (count($config['website']['lang']) > 1) { ?>
          <div class="form-group">
            <label><?= ngonngumacdinh ?>:</label>
            <div class="form-group">
              <?php foreach ($config['website']['lang'] as $k => $v) { ?>
                <div class="custom-control custom-radio d-inline-block mr-3 text-md">
                  <input class="custom-control-input" type="radio" id="lang_default-<?= $k ?>" name="data[options][lang_default]" <?= ($k == 'vi' ? "checked" : ($k == $options['lang_default'])) ? "checked" : "" ?> value="<?= $k ?>">
                  <label for="lang_default-<?= $k ?>" class="custom-control-label font-weight-normal"><?= $v ?></label>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
        <div class="row">
          <?php if (isset($config['setting']['email']) && $config['setting']['email'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="email">Email:</label>
              <input type="email" class="form-control text-sm" name="data[options][email]" id="email" placeholder="Email" value="<?= (!empty($flash->has('email'))) ? $flash->get('email') : @$options['email'] ?>" required>
            </div>
          <?php } ?>
          <?php if (isset($config['setting']['hotline']) && $config['setting']['hotline'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="hotline">Hotline:</label>
              <input type="text" class="form-control text-sm" name="data[options][hotline]" id="hotline" placeholder="Hotline" value="<?= (!empty($flash->has('hotline'))) ? $flash->get('hotline') : @$options['hotline'] ?>" required>
            </div>
          <?php } ?>
          <?php if (isset($config['setting']['phone']) && $config['setting']['phone'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="phone"><?= dienthoai ?>:</label>
              <input type="text" class="form-control text-sm" name="data[options][phone]" id="phone" placeholder="<?= dienthoai ?>" value="<?= (!empty($flash->has('phone'))) ? $flash->get('phone') : @$options['phone'] ?>" required>
            </div>
          <?php } ?>
          <?php if (isset($config['setting']['zalo']) && $config['setting']['zalo'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="zalo">Zalo:</label>
              <input type="text" class="form-control text-sm" name="data[options][zalo]" id="zalo" placeholder="Zalo" value="<?= (!empty($flash->has('zalo'))) ? $flash->get('zalo') : @$options['zalo'] ?>">
            </div>
          <?php } ?>
          <?php if (isset($config['setting']['oaidzalo']) && $config['setting']['oaidzalo'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="oaidzalo">OAID Zalo:</label>
              <input type="text" class="form-control text-sm" name="data[options][oaidzalo]" id="oaidzalo" placeholder="OAID Zalo" value="<?= (!empty($flash->has('oaidzalo'))) ? $flash->get('oaidzalo') : @$options['oaidzalo'] ?>">
            </div>
          <?php } ?>
          <?php if (isset($config['setting']['website']) && $config['setting']['website'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="website">Website:</label>
              <input type="text" class="form-control text-sm" name="data[options][website]" id="website" placeholder="Website" value="<?= (!empty($flash->has('website'))) ? $flash->get('website') : @$options['website'] ?>" required>
            </div>
          <?php } ?>
          <?php if (isset($config['setting']['fanpage']) && $config['setting']['fanpage'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="fanpage">Fanpage:</label>
              <input type="text" class="form-control text-sm" name="data[options][fanpage]" id="fanpage" placeholder="Fanpage" value="<?= (!empty($flash->has('fanpage'))) ? $flash->get('fanpage') : @$options['fanpage'] ?>">
            </div>
          <?php } ?>
          <?php if (isset($config['setting']['fanpage_tiktok']) && $config['setting']['fanpage_tiktok'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="fanpage_tiktok">Tiktok Fanpage:</label>
              <input type="text" class="form-control text-sm" name="data[options][fanpage_tiktok]" id="fanpage_tiktok" placeholder="Tiktok Fanpage" value="<?= (!empty($flash->has('fanpage_tiktok'))) ? $flash->get('fanpage_tiktok') : @$options['fanpage_tiktok'] ?>">
            </div>
          <?php } ?>
          <?php if (isset($config['setting']['coords']) && $config['setting']['coords'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="coords"><?= toadogooglemap ?>:</label>
              <input type="text" class="form-control text-sm" name="data[options][coords]" id="coords" placeholder="<?= toadogooglemap ?>" value="<?= (!empty($flash->has('coords'))) ? $flash->get('coords') : @$options['coords'] ?>">
            </div>
          <?php } ?>
          <?php if (isset($config['setting']['link_googlemaps']) && $config['setting']['link_googlemaps'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="link_googlemaps">Link google maps:</label>
              <input type="text" class="form-control text-sm" name="data[options][link_googlemaps]" id="link_googlemaps" placeholder="link google maps" value="<?= (!empty($flash->has('link_googlemaps'))) ? $flash->get('link_googlemaps') : @$options['link_googlemaps'] ?>">
            </div>
          <?php } ?>
          <?php if (isset($config['setting']['worktime']) && $config['setting']['worktime'] == true) { ?>
            <div class="form-group col-md-4 col-sm-6">
              <label for="worktime"><?= giolamviec ?>:</label>
              <input type="text" class="form-control text-sm" name="data[options][worktime]" id="worktime" placeholder="<?= giolamviec ?>" value="<?= (!empty($flash->has('worktime'))) ? $flash->get('worktime') : @$options['worktime'] ?>">
            </div>
          <?php } ?>
        </div>
        <?php if (isset($config['setting']['coords_iframe']) && $config['setting']['coords_iframe'] == true) { ?>
          <div class="form-group">
            <label for="coords_iframe">
              <span><?= toadogooglemapiframe ?>:</span>
              <a class="text-sm font-weight-normal ml-1" href="https://www.google.com/maps" target="_blank" title="<?= laymanhunggooglemap ?>">(<?= laymanhung ?>)</a>
            </label>
            <textarea class="form-control text-sm" name="data[options][coords_iframe]" id="coords_iframe" rows="5" placeholder="<?= toadogooglemapiframe ?>"><?= $func->decodeHtmlChars($flash->get('coords_iframe')) ?: $func->decodeHtmlChars(@$options['coords_iframe']) ?></textarea>
          </div>
        <?php } ?>
        <div class="form-group">
          <label for="analytics">Google analytics:</label>
          <textarea class="form-control text-sm" name="data[analytics]" id="analytics" rows="5" placeholder="Google analytics"><?= $func->decodeHtmlChars($flash->get('analytics')) ?: $func->decodeHtmlChars(@$item['analytics']) ?></textarea>
        </div>
        <div class="form-group">
          <label for="mastertool">Google Webmaster Tool:</label>
          <textarea class="form-control text-sm" name="data[mastertool]" id="mastertool" rows="5" placeholder="Google Webmaster Tool"><?= $func->decodeHtmlChars($flash->get('mastertool')) ?: $func->decodeHtmlChars(@$item['mastertool']) ?></textarea>
        </div>
        <div class="form-group">
          <label for="headjs">Head JS:</label>
          <textarea class="form-control text-sm" name="data[headjs]" id="headjs" rows="5" placeholder="Head JS"><?= $func->decodeHtmlChars($flash->get('headjs')) ?: $func->decodeHtmlChars(@$item['headjs']) ?></textarea>
        </div>
        <div class="form-group">
          <label for="bodyjs">Body JS:</label>
          <textarea class="form-control text-sm" name="data[bodyjs]" id="bodyjs" rows="5" placeholder="Body JS"><?= $func->decodeHtmlChars($flash->get('bodyjs')) ?: $func->decodeHtmlChars(@$item['bodyjs']) ?></textarea>
        </div>
        <div class="card card-primary card-outline card-outline-tabs">
          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
              <?php foreach ($config['website']['lang'] as $k => $v) { ?>
                <li class="nav-item">
                  <a class="nav-link <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang" data-toggle="pill" href="#tabs-lang-<?= $k ?>" role="tab" aria-controls="tabs-lang-<?= $k ?>" aria-selected="true"><?= $v ?></a>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="card-body card-article">
            <div class="tab-content" id="custom-tabs-three-tabContent-lang">
              <?php foreach ($config['website']['lang'] as $k => $v) { ?>
                <div class="tab-pane fade show <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang-<?= $k ?>" role="tabpanel" aria-labelledby="tabs-lang">
                  <div class="form-group">
                    <label for="name<?= $k ?>"><?= tieude ?> (<?= $k ?>):</label>
                    <input type="text" class="form-control for-seo text-sm" name="data[name<?= $k ?>]" id="name<?= $k ?>" placeholder="<?= tieude ?> (<?= $k ?>)" value="<?= (!empty($flash->has('name' . $k))) ? $flash->get('name' . $k) : @$item['name' . $k] ?>" required>
                  </div>
                  <div class="form-group">
                    <label for="adress<?= $k ?>"><?= diachi ?> (<?= $k ?>):</label>
                    <input type="text" class="form-control text-sm" name="data[address<?= $k ?>]" id="address<?= $k ?>" placeholder="<?= diachi ?> (<?= $k ?>)" value="<?= (!empty($flash->has('address' . $k))) ? $flash->get('address' . $k) : @$item['address' . $k] ?>">
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card-footer text-sm">
      <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i><?= luu ?></button>
      <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i><?= lamlai ?></button>
      <input type="hidden" name="id" value="<?= (isset($item['id']) && $item['id'] > 0) ? $item['id'] : '' ?>">
    </div>
  </form>
</section>