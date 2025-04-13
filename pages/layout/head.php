<base href="<?= $configBase ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= $seo->get('title') ?></title>
<meta name="keywords" content="<?= $seo->get('keywords') ?>" />
<meta name="description" content="<?= $seo->get('description') ?>" />
<meta name="robots" content="<?= (in_array($source, $config['website']['noseo'])) ? 'noindex,nofollow' : 'index,follow,noodp' ?>" />
<link href="<?= ASSET . UPLOAD_PHOTO_L . $favicon['photo'] ?>" rel="shortcut icon" type="image/x-icon" />
<?= $func->decodeHtmlChars($setting['mastertool']) ?>
<meta name="geo.region" content="VN" />
<meta name="geo.placename" content="Hồ Chí Minh" />
<meta name="geo.position" content="10.823099;106.629664" />
<meta name="ICBM" content="10.823099, 106.629664" />
<meta name='revisit-after' content='1 days' />
<meta name="author" content="<?= $setting['name' . $lang] ?>" />
<meta name="copyright" content="<?= $setting['name' . $lang] . " - [" . $optsetting['email'] . "]" ?>" />
<meta property="og:type" content="<?= $seo->get('type') ?>" />
<meta property="og:site_name" content="<?= $setting['name' . $lang] ?>" />
<meta property="og:title" content="<?= $seo->get('title') ?>" />
<meta property="og:description" content="<?= $seo->get('description') ?>" />
<meta property="og:url" content="<?= $seo->get('url') ?>" />
<meta property="og:image" content="<?= $seo->get('photo') ?>" />
<meta property="og:image:alt" content="<?= $seo->get('title') ?>" />
<meta property="og:image:type" content="<?= $seo->get('photo:type') ?>" />
<meta property="og:image:width" content="<?= $seo->get('photo:width') ?>" />
<meta property="og:image:height" content="<?= $seo->get('photo:height') ?>" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="<?= $optsetting['email'] ?>" />
<meta name="twitter:creator" content="<?= $setting['name' . $lang] ?>" />
<meta property="og:url" content="<?= $seo->get('url') ?>" />
<meta property="og:title" content="<?= $seo->get('title') ?>" />
<meta property="og:description" content="<?= $seo->get('description') ?>" />
<meta property="og:image" content="<?= $seo->get('photo') ?>" />
<link rel="canonical" href="<?= $func->getCurrentPageURL() ?>" />
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1">