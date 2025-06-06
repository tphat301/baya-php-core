<!-- SEO -->
<?php
$slugurlArray = '';
$seo_create = '';
if (($com == "static" || $com == "seopage") && isset($config['website']['comlang'])) {
  foreach ($config['website']['comlang'] as $k => $v) {
    if ($type == $k) {
      $slugurlArray = $v;
      break;
    }
  }
}
?>
<div class="card-seo">
  <div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
      <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
        <?php foreach ($config['website']['seo'] as $k => $v) {
          $seo_create .= $k . ","; ?>
          <li class="nav-item">
            <a class="nav-link <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-lang" data-toggle="pill" href="#tabs-seolang-<?= $k ?>" role="tab" aria-controls="tabs-seolang-<?= $k ?>" aria-selected="true">SEO (<?= $v ?>)</a>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-three-tabContent-lang">
        <?php foreach ($config['website']['seo'] as $k => $v) { ?>
          <div class="tab-pane fade show <?= ($k == 'vi') ? 'active' : '' ?>" id="tabs-seolang-<?= $k ?>" role="tabpanel" aria-labelledby="tabs-lang">
            <div class="form-group">
              <div class="label-seo">
                <label for="title<?= $k ?>">SEO Title (<?= $k ?>):</label>
                <strong class="count-seo"><span><?= strlen(htmlspecialchars(@$seoDB['title' . $k] ?: '')) ?></span>/70 <?= kytu ?></strong>
              </div>
              <input type="text" class="form-control check-seo title-seo text-sm" name="dataSeo[title<?= $k ?>]" id="title<?= $k ?>" placeholder="SEO Title (<?= $k ?>)" value="<?= (!empty($flash->has('title' . $k))) ? $flash->get('title' . $k) : @$seoDB['title' . $k] ?>">
            </div>
            <div class="form-group">
              <div class="label-seo">
                <label for="keywords<?= $k ?>">SEO Keywords (<?= $k ?>):</label>
                <strong class="count-seo"><span><?= strlen(htmlspecialchars(@$seoDB['keywords' . $k] ?: '')) ?></span>/70 <?= kytu ?></strong>
              </div>
              <input type="text" class="form-control check-seo keywords-seo text-sm" name="dataSeo[keywords<?= $k ?>]" id="keywords<?= $k ?>" placeholder="SEO Keywords (<?= $k ?>)" value="<?= (!empty($flash->has('keywords' . $k))) ? $flash->get('keywords' . $k) : @$seoDB['keywords' . $k] ?>">
            </div>
            <div class="form-group">
              <div class="label-seo">
                <label for="description<?= $k ?>">SEO Description (<?= $k ?>):</label>
                <strong class="count-seo"><span><?= strlen(htmlspecialchars(@$seoDB['description' . $k] ?: '')) ?></span>/160 <?= kytu ?></strong>
              </div>
              <textarea class="form-control check-seo description-seo text-sm" name="dataSeo[description<?= $k ?>]" id="description<?= $k ?>" rows="5" placeholder="SEO Description (<?= $k ?>)"><?= $func->decodeHtmlChars($flash->get('description' . $k)) ?: $func->decodeHtmlChars(@$seoDB['description' . $k]) ?></textarea>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <input type="hidden" id="seo-create" value="<?= (isset($seo_create)) ? rtrim($seo_create, ",") : '' ?>">
  </div>
</div>