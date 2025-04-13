<!-- Js Config -->
<script type="text/javascript">
  var PHP_VERSION = <?= PHP_VERSION_ID ?>;
  var CONFIG_BASE = '<?= $configBase ?>';
  var TOKEN = '<?= TOKEN ?>';
  var ADMIN = '<?= ADMIN ?>';
  var ASSET = '<?= ASSET ?>';
  var LINK_FILTER = '<?= (!empty($linkFilter)) ? $linkFilter : '' ?>';
  var ID = <?= (!empty($id)) ? $id : 0 ?>;
  var COM = '<?= (!empty($com)) ? $com : '' ?>';
  var ACT = '<?= (!empty($act)) ? $act : '' ?>';
  var TYPE = '<?= (!empty($type)) ? $type : '' ?>';
  var HASH = '<?= $func->generateHash() ?>';
  var ACTIVE_GALLERY = <?= (!empty($flagGallery) && !empty($gallery)) ? 'true' : 'false' ?>;
  var BASE64_QUERY_STRING = '<?= base64_encode($_SERVER['QUERY_STRING']) ?>';
  var LOGIN_PAGE = <?= (empty($_SESSION[$loginAdmin]['active'])) ? 'true' : 'false' ?>;
  var MAX_DATE = '<?= date("Y/m/d", time()) ?>';
  var CHARTS = <?= (!empty($charts)) ? json_encode($charts) : '{}' ?>;
  var ADD_OR_EDIT_PERMISSIONS = <?= (!empty($com) && $com == 'user' && !empty($act) && in_array($act, array('add_permission_group', 'edit_permission_group'))) ? 'true' : 'false' ?>;
  var IMPORT_IMAGE_EXCELL = <?= (!empty($com) && $com == 'import' && !empty($config['import']['images'])) ? 'true' : 'false' ?>;
  var ORDER_ADVANCED_SEARCH = <?= (!empty($com) && $com == 'order' && !empty($config['order']['search'])) ? 'true' : 'false' ?>;
  var ORDER_MIN_TOTAL = <?= (!empty($minTotal)) ? $minTotal : 1 ?>;
  var ORDER_MAX_TOTAL = <?= (!empty($maxTotal)) ? $maxTotal : 1 ?>;
  var ORDER_PRICE_FROM = <?= (!empty($price_from)) ? $price_from : 1 ?>;
  var ORDER_PRICE_TO = <?= (!empty($price_to)) ? $price_to : ((!empty($maxTotal)) ? $maxTotal : 1) ?>;
  var LANG = {
    'taithembinhluan': '<?= taithembinhluan ?>',
    'xemthembinhluan': '<?= xemthembinhluan ?>',
    'traloi': '<?= traloi ?>',
    'dangtai': '<?= dangtai ?>',
    'huybo': '<?= huybo ?>',
    'duyet': '<?= duyet ?>',
    'boduyet': '<?= boduyet ?>',
    'timkiem': '<?= timkiem ?>',
    'thongbao': '<?= thongbao ?>',
    'chondanhmuc': '<?= chondanhmuc ?>',
    'dulieukhonghople': '<?= dulieukhonghople ?>',
    'dinhdanghinhanhkhonghople': '<?= dinhdanghinhanhkhonghople ?>',
    'dungluonghinhanhlondungluongchopheplt4mb4096kb': '<?= dungluonghinhanhlondungluongchopheplt4mb4096kb ?>',
    'xoabinhluanthanhcong': '<?= xoabinhluanthanhcong ?>',
    'banmuonxoabinhluannay': '<?= banmuonxoabinhluannay ?>',
    'capnhattrangthaithanhcong': '<?= capnhattrangthaithanhcong ?>',
    'phanhoithanhcong': '<?= phanhoithanhcong ?>',
    'hethongbiloivuilongthulaisau': '<?= hethongbiloivuilongthulaisau ?>',
    'duongdankhonghople': '<?= duongdankhonghople ?>',
    'banhaychonitnhat1mucdegui': '<?= banhaychonitnhat1mucdegui ?>',
    'albumhientai': '<?= albumhientai ?>',
    'chontatca': '<?= chontatca ?>',
    'sapxep': '<?= sapxep ?>',
    'dongy': '<?= dongy ?>',
    'xoatatca': '<?= xoatatca ?>',
    'cothechonnhieuhinhdedichuyen': '<?= cothechonnhieuhinhdedichuyen ?>',
    'xulythatbaivuilongthulaisau': '<?= xulythatbaivuilongthulaisau ?>',
    'banmuondaytinnay': '<?= banmuondaytinnay ?>',
    'banmuonguithongtinchocacmucdachon': '<?= banmuonguithongtinchocacmucdachon ?>',
    'bancochacmuonxoamucnay': '<?= bancochacmuonxoamucnay ?>',
    'bancochacmuonxoanhungmucnay': '<?= bancochacmuonxoanhungmucnay ?>',
    'dulieuhinhanhkhonghople': '<?= dulieuhinhanhkhonghople ?>',
    'noidungseodaduocthietlapbanmuontaolainoidungseo': '<?= noidungseodaduocthietlapbanmuontaolainoidungseo ?>',
    'bancochacmuonxoahinhanhnay': '<?= bancochacmuonxoahinhanhnay ?>',
    'bancochacmuonxoacachinhanhdachon': '<?= bancochacmuonxoacachinhanhdachon ?>',
    'keovathahinhvaoday': '<?= keovathahinhvaoday ?>',
    'hoac': '<?= hoac ?>',
    'hinhanh': '<?= hinhanh ?>',
    'chonhinh': '<?= chonhinh ?>',
    'chiduocuploadmoilan': '<?= chiduocuploadmoilan ?>',
    'themhinh': '<?= themhinh ?>',
    'vuilongchonhinhanh': '<?= vuilongchonhinhanh ?>',
    'nhunghinhdaduocchon': '<?= nhunghinhdaduocchon ?>',
    'keohinhvaodaydeupload': '<?= keohinhvaodaydeupload ?>',
    'banmuonloaibohinhanhnay': '<?= banmuonloaibohinhanhnay ?>',
    'uploadhinhanh': '<?= uploadhinhanh ?>',
    'sothutu': '<?= sothutu ?>',
    'chihotrotaptinlahinhanhcodinhdang': '<?= chihotrotaptinlahinhanhcodinhdang ?>',
    'cokichthuocqualonvuilonguploadhinhanhcokichthuoctoida': '<?= cokichthuocqualonvuilonguploadhinhanhcokichthuoctoida ?>',
    'nhunghinhanhbanchoncokichthuocqualonvuilongchonnhunghinhanhcokichthuoctoida': '<?= nhunghinhanhbanchoncokichthuocqualonvuilongchonnhunghinhanhcokichthuoctoida ?>',
  };
</script>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/confirm/confirm.js"></script>
<script src="assets/select2/select2.full.js"></script>
<script src="assets/sumoselect/jquery.sumoselect.js"></script>
<script src="assets/datetimepicker/php-date-formatter.min.js"></script>
<script src="assets/datetimepicker/jquery.mousewheel.js"></script>
<script src="assets/datetimepicker/jquery.datetimepicker.js"></script>
<script src="assets/daterangepicker/daterangepicker.js"></script>
<script src="assets/rangeSlider/ion.rangeSlider.js"></script>
<script src="assets/js/priceFormat.js"></script>
<script src="assets/jscolor/jscolor.js"></script>
<script src="assets/filer/jquery.filer.js"></script>
<script src="assets/holdon/HoldOn.js"></script>
<script src="assets/sortable/Sortable.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/adminlte.js"></script>
<script src="ckeditor/ckeditor.js"></script>
<script src="assets/apexcharts/apexcharts.min.js"></script>
<script src="assets/simplenotify/simple-notify.js"></script>
<script src="assets/comment/comment.js"></script>
<script src="assets/fancybox5/fancybox.umd.js"></script>
<script src="assets/js/apps.js"></script>