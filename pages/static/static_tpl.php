<div class="page-static">
  <div class="page-static-left">
    <?php if (!empty($static)) { ?>
      <div class="title-main animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s"><span><?= $static['name' . $lang] ?></span></div>
      <div class="content-main w-clear animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s"><?= $func->decodeHtmlChars($static['content' . $lang]) ?></div>
      <div class="share sh-custom animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
        <b><?= chiase ?>:</b>
        <div class="social-plugin justify-content-start w-clear">
          <?php
          $params = array();
          $params['oaid'] = $optsetting['oaidzalo'];
          echo $func->markdown('social/share', $params);
          ?>
        </div>
      </div>
    <?php } else { ?>
      <div class="alert alert-warning w-100 animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s" role="alert">
        <strong><?= dangcapnhatdulieu ?></strong>
      </div>
    <?php } ?>
  </div>
  <div class="page-static-right animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
    <p class="page-static-right-title">Các nội dung khác:</p>
    <ul class="page-static-policy">
      <?php foreach ($policy as $v) { ?>
        <li><a class="text-decoration-none text-split" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a></li>
      <?php } ?>
    </ul>
  </div>
</div>