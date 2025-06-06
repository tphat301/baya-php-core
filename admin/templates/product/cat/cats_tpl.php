<?php
$linkMan = $linkFilter = "index.php?com=product&act=man_cat&type=" . $type;
$linkAdd = "index.php?com=product&act=add_cat&type=" . $type;
$linkEdit = "index.php?com=product&act=edit_cat&type=" . $type;
$linkDelete = "index.php?com=product&act=delete_cat&type=" . $type;
?>
<!-- Content Header -->
<section class="content-header text-sm">
  <div class="container-fluid">
    <div class="row">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="index.php" title="<?= dashboard ?>"><?= dashboard ?></a></li>
        <li class="breadcrumb-item active"><?= $config['product'][$type]['title_main_cat'] ?></li>
      </ol>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="card-footer text-sm sticky-top">
    <a class="btn btn-sm bg-gradient-primary text-white" href="<?= $linkAdd ?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i><?= themmoi ?></a>
    <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="<?= $linkDelete ?><?= $strUrl ?>" title="<?= xoatatca ?>"><i class="far fa-trash-alt mr-2"></i><?= xoatatca ?></a>
    <div class="form-inline form-search d-inline-block align-middle ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar text-sm" type="search" id="keyword" placeholder="<?= timkiem ?>" aria-label="<?= timkiem ?>" value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" onkeypress="doEnter(event,'keyword','<?= $linkMan ?>')">
        <div class="input-group-append bg-primary rounded-right">
          <button class="btn btn-navbar text-white" type="button" onclick="onSearch('keyword','<?= $linkMan ?>')">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer form-group-category text-sm bg-light row">
    <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2"><?= $func->getLinkCategory('product', 'list', $type) ?></div>
  </div>
  <div class="card card-primary card-outline text-sm mb-0">
    <div class="card-header">
      <h3 class="card-title"><?= danhsach ?> <span class="text-lowercase"><?= $config['product'][$type]['title_main_cat'] ?></span></h3>
    </div>
    <div class="card-body table-responsive p-0">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="align-middle" width="5%">
              <div class="custom-control custom-checkbox my-checkbox">
                <input type="checkbox" class="custom-control-input" id="selectall-checkbox">
                <label for="selectall-checkbox" class="custom-control-label"></label>
              </div>
            </th>
            <th class="align-middle text-center" width="10%">STT</th>
            <?php if (isset($config['product'][$type]['show_images_cat']) && $config['product'][$type]['show_images_cat'] == true) { ?>
              <th class="align-middle"><?= hinh ?></th>
            <?php } ?>
            <th class="align-middle" style="width:30%"><?= tieude ?></th>
            <?php if (isset($config['product'][$type]['check_cat'])) {
              foreach ($config['product'][$type]['check_cat'] as $key => $value) { ?>
                <th class="align-middle text-center"><?= $value ?></th>
            <?php }
            } ?>
            <th class="align-middle text-center"><?= thaotac ?></th>
          </tr>
        </thead>
        <?php if (empty($items)) { ?>
          <tbody>
            <tr>
              <td colspan="100" class="text-center"><?= khongcodulieu ?></td>
            </tr>
          </tbody>
        <?php } else { ?>
          <tbody>
            <?php for ($i = 0; $i < count($items); $i++) {
              $linkID = "";
              if ($items[$i]['id_list']) $linkID .= "&id_list=" . $items[$i]['id_list']; ?>
              <tr>
                <td class="align-middle">
                  <div class="custom-control custom-checkbox my-checkbox">
                    <input type="checkbox" class="custom-control-input select-checkbox" id="select-checkbox-<?= $items[$i]['id'] ?>" value="<?= $items[$i]['id'] ?>">
                    <label for="select-checkbox-<?= $items[$i]['id'] ?>" class="custom-control-label"></label>
                  </div>
                </td>
                <td class="align-middle">
                  <input type="number" class="form-control form-control-mini m-auto update-numb" min="0" value="<?= $items[$i]['numb'] ?>" data-id="<?= $items[$i]['id'] ?>" data-table="product_cat">
                </td>
                <?php if (isset($config['product'][$type]['show_images_cat']) && $config['product'][$type]['show_images_cat'] == true) { ?>
                  <td class="align-middle">
                    <a href="<?= $linkEdit ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="<?= $items[$i]['namevi'] ?>">
                      <?= $func->getImage(['class' => 'rounded img-preview', 'sizes' => $config['product'][$type]['thumb_cat'], 'upload' => UPLOAD_PRODUCT_L, 'image' => $items[$i]['photo'], 'alt' => $items[$i]['namevi']]) ?>
                    </a>
                  </td>
                <?php } ?>
                <td class="align-middle">
                  <a class="text-dark text-break" href="<?= $linkEdit ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="<?= $items[$i]['namevi'] ?>"><?= $items[$i]['namevi'] ?></a>
                </td>
                <?php $status_array = (!empty($items[$i]['status'])) ? explode(',', $items[$i]['status']) : array(); ?>
                <?php if (isset($config['product'][$type]['check_cat'])) {
                  foreach ($config['product'][$type]['check_cat'] as $key => $value) { ?>
                    <td class="align-middle text-center">
                      <div class="custom-control custom-switch my-checkbox">
                        <input type="checkbox" class="custom-control-input show-checkbox" id="show-checkbox-<?= $key ?>-<?= $items[$i]['id'] ?>" data-table="product_cat" data-id="<?= $items[$i]['id'] ?>" data-attr="<?= $key ?>" <?= (in_array($key, $status_array)) ? 'checked' : '' ?>>
                        <label for="show-checkbox-<?= $key ?>-<?= $items[$i]['id'] ?>" class="custom-control-label"></label>
                      </div>
                    </td>
                <?php }
                } ?>
                <td class="align-middle text-center text-md text-nowrap">
                  <a class="text-primary mr-2" href="<?= $linkEdit ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="<?= chinhsua ?>"><i class="fas fa-edit"></i></a>
                  <a class="text-danger" id="delete-item" data-url="<?= $linkDelete ?><?= $linkID ?>&id=<?= $items[$i]['id'] ?>" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        <?php } ?>
      </table>
    </div>
  </div>
  <?php if ($paging) { ?>
    <div class="card-footer text-sm pb-0">
      <?= $paging ?>
    </div>
  <?php } ?>
  <div class="card-footer text-sm">
    <a class="btn btn-sm bg-gradient-primary text-white" href="<?= $linkAdd ?>" title="Thêm mới"><i class="fas fa-plus mr-2"></i><?= themmoi ?></a>
    <a class="btn btn-sm bg-gradient-danger text-white" id="delete-all" data-url="<?= $linkDelete ?><?= $strUrl ?>" title="<?= xoatatca ?>"><i class="far fa-trash-alt mr-2"></i><?= xoatatca ?></a>
  </div>
</section>