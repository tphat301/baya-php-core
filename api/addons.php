<?php
include "config.php";
$type = (!empty($_GET["type"])) ? htmlspecialchars($_GET["type"]) : '';
?>

<?php if ($type == 'messages-facebook') { ?>
  <a href="<?= $optsetting['fanpage'] ?>" target="_blank" class="js-facebook-messenger-box onApp rotate bottom-right cfm rubberBand animated" data-anim="rubberBand">
    <svg id="fb-msng-icon" data-name="messenger icon" xmlns="//www.w3.org/2000/svg" viewBox="0 0 30.47 30.66">
      <path d="M29.56,14.34c-8.41,0-15.23,6.35-15.23,14.19A13.83,13.83,0,0,0,20,39.59V45l5.19-2.86a16.27,16.27,0,0,0,4.37.59c8.41,0,15.23-6.35,15.23-14.19S38,14.34,29.56,14.34Zm1.51,19.11-3.88-4.16-7.57,4.16,8.33-8.89,4,4.16,7.48-4.16Z" transform="translate(-14.32 -14.34)" style="fill:#fff"></path>
    </svg>
  </a>
<?php } ?>

<?php if ($type == 'script-main') { ?>
  <div id="fb-root"></div>
  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.async = true;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
  <script src="https://sp.zalo.me/plugins/sdk.js"></script>
  <script async src="https://static.addtoany.com/menu/page.js"></script>
<?php } ?>