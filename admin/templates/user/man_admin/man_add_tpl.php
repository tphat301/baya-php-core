<?php
$linkMan = "index.php?com=user&act=man_admin";
$linkSave = "index.php?com=user&act=save_admin";
?>
<!-- Content Header -->
<section class="content-header text-sm">
  <div class="container-fluid">
    <div class="row">
      <ol class="breadcrumb float-sm-left">
        <li class="breadcrumb-item"><a href="index.php" title="<?= dashboard ?>"><?= dashboard ?></a></li>
        <li class="breadcrumb-item active"><?= chitiettaikhoanadmin ?></li>
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
      <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="<?= thoat ?>"><i class="fas fa-sign-out-alt mr-2"></i><?= thoat ?></a>
    </div>

    <?= $flash->getMessages('admin') ?>

    <div class="card card-primary card-outline text-sm">
      <div class="card-header">
        <h3 class="card-title"><?= ($act == "edit_admin") ? capnhat : themmoi; ?> <?= taikhoan ?></h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group col-md-4">
            <?php if (isset($config['permission']['active']) && $config['permission']['active'] == true) { ?>
              <label for="permission">Danh sách nhóm quyền:</label>
              <?= $func->getPermission((!empty($flash->has('id_permission'))) ? $flash->get('id_permission') : @$item['id_permission']) ?>
            <?php } ?>
          </div>
          <div class="form-group col-md-4">
            <label for="username"><?= taikhoan ?>: <span class="text-danger">*</span></label>
            <input type="text" class="form-control text-sm" name="data[username]" id="username" placeholder="<?= taikhoan ?>" value="<?= (!empty($flash->has('username'))) ? $flash->get('username') : @$item['username'] ?>" required>
          </div>
          <div class="form-group col-md-4">
            <label for="fullname"><?= hoten ?>: <span class="text-danger">*</span></label>
            <input type="text" class="form-control text-sm" name="data[fullname]" id="fullname" placeholder="<?= hoten ?>" value="<?= (!empty($flash->has('fullname'))) ? $flash->get('fullname') : @$item['fullname'] ?>" required>
          </div>
          <div class="form-group col-md-4">
            <label for="password"><?= matkhau ?>:</label>
            <input type="password" class="form-control text-sm" name="data[password]" id="password" placeholder="<?= matkhau ?>" <?= ($act == "add_admin") ? 'required' : ''; ?>>
          </div>
          <div class="form-group col-md-4">
            <label for="confirm_password"><?= nhaplaimatkhau ?>:</label>
            <input type="password" class="form-control text-sm" name="confirm_password" id="confirm_password" placeholder="<?= nhaplaimatkhau ?>" <?= ($act == "add_admin") ? 'required' : ''; ?>>
          </div>
          <div class="form-group col-md-4">
            <label for="email">Email:</label>
            <input type="email" class="form-control text-sm" name="data[email]" id="email" placeholder="Email" value="<?= (!empty($flash->has('email'))) ? $flash->get('email') : @$item['email'] ?>" required>
          </div>
          <div class="form-group col-md-4">
            <label for="phone"><?= dienthoai ?>:</label>
            <input type="text" class="form-control text-sm" name="data[phone]" id="phone" placeholder="<?= dienthoai ?>" value="<?= (!empty($flash->has('phone'))) ? $flash->get('phone') : @$item['phone'] ?>" required>
          </div>
          <div class="form-group col-md-4">
            <label for="gender"><?= gioitinh ?>:</label>
            <?php $flashGender = $flash->get('gender'); ?>
            <select class="custom-select text-sm" name="data[gender]" id="gender" required>
              <option value=""><?= chongioitinh ?></option>
              <option <?= (!empty($flashGender) && $flashGender == 1) ? 'selected' : ((@$item['gender'] == 1) ? 'selected' : '') ?> value="1"><?= nam ?></option>
              <option <?= (!empty($flashGender) && $flashGender == 2) ? 'selected' : ((@$item['gender'] == 2) ? 'selected' : '') ?> value="2"><?= nu ?></option>
            </select>
          </div>
          <div class="form-group col-md-4">
            <label for="birthday"><?= ngaysinh ?>:</label>
            <input type="text" class="form-control text-sm max-date" name="data[birthday]" id="birthday" placeholder="<?= ngaysinh ?>" value="<?= (!empty($flash->has('birthday'))) ? date("d/m/Y", $flash->get('birthday')) : ((!empty($item['birthday'])) ? date("d/m/Y", $item['birthday']) : '') ?>" required autocomplete="off">
          </div>
          <div class="form-group col-md-4">
            <label for="address"><?= diachi ?>:</label>
            <input type="text" class="form-control text-sm" name="data[address]" id="address" placeholder="<?= diachi ?>" value="<?= (!empty($flash->has('address'))) ? $flash->get('address') : @$item['address'] ?>" required>
          </div>
        </div>
        <div class="form-group">
          <?php $status_array = (!empty($item['status'])) ? explode(',', $item['status']) : array(); ?>
          <?php if (isset($config['user']['check_admin'])) {
            foreach ($config['user']['check_admin'] as $key => $value) { ?>
              <div class="form-group d-inline-block mb-2 mr-2">
                <label for="<?= $key ?>-checkbox" class="d-inline-block align-middle mb-0 mr-2"><?= $value ?>:</label>
                <div class="custom-control custom-checkbox d-inline-block align-middle">
                  <input type="checkbox" class="custom-control-input <?= $key ?>-checkbox" name="status[<?= $key ?>]" id="<?= $key ?>-checkbox" <?= (empty($status_array) && empty($item['id']) ? 'checked' : in_array($key, $status_array)) ? 'checked' : '' ?> value="<?= $key ?>">
                  <label for="<?= $key ?>-checkbox" class="custom-control-label"></label>
                </div>
              </div>
          <?php }
          } ?>
        </div>
        <div class="form-group">
          <label for="numb" class="d-inline-block align-middle mb-0 mr-2"><?= sothutu ?>:</label>
          <input type="number" class="form-control form-control-mini d-inline-block align-middle text-sm" min="0" name="data[numb]" id="numb" placeholder="<?= sothutu ?>" value="<?= isset($item['numb']) ? $item['numb'] : 1 ?>">
        </div>
      </div>
    </div>
    <div class="card-footer text-sm">
      <button type="submit" class="btn btn-sm bg-gradient-primary submit-check" disabled><i class="far fa-save mr-2"></i><?= luu ?></button>
      <button type="reset" class="btn btn-sm bg-gradient-secondary"><i class="fas fa-redo mr-2"></i><?= lamlai ?></button>
      <a class="btn btn-sm bg-gradient-danger" href="<?= $linkMan ?>" title="<?= thoat ?>"><i class="fas fa-sign-out-alt mr-2"></i><?= thoat ?></a>
      <input type="hidden" name="id" value="<?= (isset($item['id']) && $item['id'] > 0) ? $item['id'] : '' ?>">
    </div>
  </form>
</section>