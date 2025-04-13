<?php
if (!defined('SOURCES')) die("Error");

/* QUERY */
$copyright = $d->rawQueryOne("select name$lang from #_static where type = ? and find_in_set('hienthi',status)", array('copyright'));
$favicon = $d->rawQueryOne("select photo from #_photo where type = ? and find_in_set('hienthi',status)", array('favicon'));
$logo = $d->rawQueryOne("select id, photo, options from #_photo where type = ? and find_in_set('hienthi',status)", array('logo'));
$footer = $d->rawQueryOne("select content$lang from #_static where type = ? and find_in_set('hienthi',status)", array('footer'));
$supports = $d->rawQuery("select name$lang, slugvi, slugen from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('ho-tro-khach-hang'));
$tags_search = $d->rawQuery("select name$lang, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc limit 0,3", array('tags-search'));
$news_hot = $d->rawQuery("select name$lang, slug$lang, desc$lang, date_created, photo from #_news where type = ? and find_in_set('moinhat',status) and find_in_set('hienthi',status) order by numb,id desc", array('tin-tuc'));
$social = $d->rawQuery("select name$lang, photo, link from #_photo where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('social'));
$productListMenu = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_list where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('san-pham'));
$policy = $d->rawQuery("select name$lang, slugvi, slugen, id, photo from #_news where type = ? and find_in_set('hienthi',status) order by numb,id desc", array('chinh-sach'));

/* Get statistic */
$counter = $statistic->getCounter();
$online = $statistic->getOnline();

/* Newsletter */
if (!empty($_POST['submit-newsletter'])) {
  $responseCaptcha = $_POST['recaptcha_response_newsletter'];
  $resultCaptcha = $func->checkRecaptcha($responseCaptcha);
  $scoreCaptcha = (!empty($resultCaptcha['score'])) ? $resultCaptcha['score'] : 0;
  $actionCaptcha = (!empty($resultCaptcha['action'])) ? $resultCaptcha['action'] : '';
  $testCaptcha = (!empty($resultCaptcha['test'])) ? $resultCaptcha['test'] : false;
  $dataNewsletter = (!empty($_POST['dataNewsletter'])) ? $_POST['dataNewsletter'] : null;

  /* Valid data */
  if (empty($dataNewsletter['email'])) {
    $flash->set('error', emailkhongduoctrong);
  }

  if (!empty($dataNewsletter['email']) && !$func->isEmail($dataNewsletter['email'])) {
    $flash->set('error', emailkhonghople);
  }

  $error = $flash->get('error');

  if (!empty($error)) {
    $func->transfer1($error, $configBase, false);
  }

  /* Save data */
  if (($scoreCaptcha >= 0.5 && $actionCaptcha == 'Newsletter') || $testCaptcha == true) {
    foreach ($dataNewsletter as $column => $value) {
      $dataNewsletter[$column] = htmlspecialchars($value);
    }

    if ($d->insert('newsletter', $dataNewsletter)) {
      $func->transfer1(dangkynhantinthanhcong, $configBase);
    } else {
      $func->transfer1(dangkynhantinthatbai, $configBase, false);
    }
  } else {
    $func->transfer1(dangkynhantinthatbai, $configBase, false);
  }
}
