<div class="page-static">
  <div class="page-static-left">
    <div class="title-main mb-0 animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s"><span><?= (!empty($titleCate)) ? $titleCate : @$titleMain ?></span></div>
    <div class="page-news">
      <?php if (isset($news) && count($news) > 0) { ?>
        <?php foreach ($news as $k => $v) { ?>
          <div class="page-news-item animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
            <a class="pic-news scale-img text-decoration-none" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
              <img class="lazy w-100" onerror="this.src='<?= THUMBS ?>/488x488x1/assets/images/noimage.png';" data-src="<?= THUMBS ?>/488x488x1/<?= UPLOAD_NEWS_L . $v['photo'] ?>" alt="<?= $v['name' . $lang] ?>" title="<?= $v['name' . $lang] ?>" />
            </a>
            <div class="info-news">
              <h3>
                <a class="name-news text-decoration-none text-split" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a>
              </h3>
              <p class="desc-news text-split mb-0"><?= $v['desc' . $lang] ?></p>
            </div>
          </div>
        <?php } ?>
      <?php } else { ?>
        <div class="col-12">
          <div class="alert alert-warning w-100 animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s" role="alert">
            <strong><?= khongtimthayketqua ?></strong>
          </div>
        </div>
      <?php } ?>
      <div class="col-12 animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
        <div class="pagination-home w-100"><?= (!empty($paging)) ? $paging : '' ?></div>
      </div>
    </div>
  </div>
  <div class="page-static-right animate__zoomIn wow" data-wow-iteration="1" data-wow-duration="0.8s">
    <p class="page-static-right-title">Bài viết mới nhất:</p>
    <ul class="page-static-policy">
      <?php foreach ($news_hot as $v) { ?>
        <li><a class="text-decoration-none text-split" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>"><?= $v['name' . $lang] ?></a></li>
      <?php } ?>
    </ul>
  </div>
</div>