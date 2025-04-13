<div class="row">
  <div class="<?= count($news) > 0 ? 'col-lg-9' : 'col-lg-12' ?> mb-3">
    <div class="title-detail-main animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s"><?= $rowDetail['name' . $lang] ?></div>
    <?php if (!empty($rowDetail['content' . $lang])) { ?>
      <div class="meta-toc">
        <a class="mucluc-dropdown-list_button"></a>
        <div class="box-readmore">
          <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
        </div>
      </div>
      <div class="content-main content-text w-clear content-text animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s" id="toc-content"><?= htmlspecialchars_decode($rowDetail['content' . $lang]) ?></div>
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
      <div class="alert alert-warning w-100" role="alert">
        <strong><?= noidungdangcapnhat ?></strong>
      </div>
    <?php } ?>
  </div>
  <?php if (!empty($news)) { ?>
    <div class="col-lg-3">
      <div class="share othernews mb-3">
        <b><?= baivietkhac ?>:</b>
        <div class="form-row scrll2 sticky-orther-news">
          <?php foreach ($news as $k => $v) { ?>
            <div class="news-other d-flex flex-wrap col-12 col-lg-12 col-md-6 animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
              <a class="scale-img text-decoration-none pic-news-other" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/120x120x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/120x120x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
              </a>
              <div class="info-news-other">
                <h3>
                  <a class="name-news-other text-decoration-none text-split" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a>
                </h3>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php } ?>
</div>