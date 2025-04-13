<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

if (!defined('SOURCES')) die("Error");

/* Kiểm tra active import */
if (isset($config['product'])) {
  $arrCheck = array();
  foreach ($config['product'] as $k => $v) if (isset($v['import']) && $v['import'] == true) $arrCheck[] = $k;
  if (!count($arrCheck) || !in_array($type, $arrCheck)) $func->transfer(trangkhongtontai, "index.php", false);
} else {
  $func->transfer(trangkhongtontai, "index.php", false);
}

switch ($act) {
  case "man":
    getImages();
    $template = "import/man/mans";
    break;
  case "uploadImages":
    uploadImages();
    break;
  case "editImages":
    editImages();
    $template = "import/man/man_edit";
    break;
  case "saveImages":
    saveImages();
    break;
  case "deleteImages":
    deleteImages();
    break;
  case "uploadExcel":
    uploadExcel();
    break;
  default:
    $template = "404";
}

/* Get image */
function getImages()
{
  global $d, $langadmin, $func, $type, $curPage, $items, $paging;

  $perPage = 10;
  $startpoint = ($curPage * $perPage) - $perPage;
  $limit = " limit " . $startpoint . "," . $perPage;
  $sql = "select * from #_excel where type = ? order by numb,id desc $limit";
  $items = $d->rawQuery($sql, array($type));
  $sqlNum = "select count(*) as 'num' from #_excel where type = ? order by numb,id desc";
  $count = $d->rawQueryOne($sqlNum, array($type));
  $total = (!empty($count)) ? $count['num'] : 0;
  $url = "index.php?com=import&act=man&type=" . $type;
  $paging = $func->pagination($total, $perPage, $curPage, $url);
}

/* Edit image */
function editImages()
{
  global $d, $langadmin, $func, $item, $type, $curPage;

  $id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

  if (empty($id)) {
    $func->transfer(khongnhanduocdulieu, "index.php?com=import&act=man&type=" . $type . "&p=" . $curPage, false);
  } else {
    $item = $d->rawQueryOne("select * from #_excel where id = ? and type = ? limit 0,1", array($id, $type));

    if (empty($item)) {
      $func->transfer(dulieukhongcothuc, "index.php?com=import&act=man&type=" . $type . "&p=" . $curPage, false);
    }
  }
}

/* Save image */
function saveImages()
{
  global $d, $langadmin, $item, $func, $type, $curPage, $config;

  /* Check post */
  if (empty($_POST)) {
    $func->transfer(khongnhanduocdulieu, "index.php?com=import&act=man&type=" . $type . "&p=" . $curPage, false);
  }

  $id = (!empty($_POST['id'])) ? htmlspecialchars($_POST['id']) : 0;

  if ($id) {
    if ($func->hasFile("file")) {
      $file_name = $func->uploadName($_FILES['file']["name"]);
      if ($photo = $func->uploadImage("file", $config['import']['img_type'], UPLOAD_EXCEL, $file_name)) {
        $data['photo'] = $photo;
        $row = $d->rawQueryOne("select id, photo from #_excel where id = ? and type = ? limit 0,1", array($id, $type));
        if (!empty($row)) $func->deleteFile(UPLOAD_EXCEL . $row['photo']);

        $d->where('id', $id);
        $d->where('type', $type);
        if ($d->update('excel', $data)) {
          $func->transfer(capnhatdulieuthanhcong, "index.php?com=import&act=man&type=" . $type . "&p=" . $curPage);
        } else {
          $func->transfer(capnhatdulieubiloi, "index.php?com=import&act=man&type=" . $type . "&p=" . $curPage, false);
        }
      } else {
        $func->transfer(khongnhanduochinhanhmoi, "index.php?com=import&act=editImages&id=" . $id . "&type=" . $type . "&p=" . $curPage, false);
      }
    } else {
      $func->transfer(khongnhanduochinhanhmoi, "index.php?com=import&act=editImages&id=" . $id . "&type=" . $type . "&p=" . $curPage, false);
    }
  } else {
    $func->transfer(khongnhanduocdulieu, "index.php?com=import&act=man&type=" . $type . "&p=" . $curPage, false);
  }
}

/* Upload image */
function uploadImages()
{
  global $d, $langadmin, $type, $func, $config;

  if (isset($_POST['uploadImg']) && isset($_FILES['files'])) {
    $str_remove = '';
    $arr_file_delete = array();

    if (isset($_POST['jfiler-items-exclude-files-0'])) {
      $str_remove = str_replace('"', '', $_POST['jfiler-items-exclude-files-0']);
      $str_remove = str_replace('[', '', $str_remove);
      $str_remove = str_replace(']', '', $str_remove);
      $str_remove = str_replace('\\', '', $str_remove);
      $str_remove = str_replace('0://', '', $str_remove);
      $arr_file_delete = explode(',', $str_remove);
    }

    $flagCount = 0;
    $myFile = $_FILES['files'];
    $fileCount = count($myFile["name"]);

    for ($i = 0; $i < $fileCount; $i++) {
      if (!in_array($myFile["name"][$i], $arr_file_delete, true)) {
        $data = array();
        $data['numb'] = (isset($_POST['numb-filer'][$flagCount]) && $_POST['numb-filer'][$flagCount] > 0) ? (int)$_POST['numb-filer'][$flagCount] : 0;
        $data['type'] = $type;

        if ($d->insert('excel', $data)) {
          $id_insert = $d->getLastInsertId();

          $_FILES['file'] = array('name' => $myFile['name'][$i], 'type' => $myFile['type'][$i], 'tmp_name' => $myFile['tmp_name'][$i], 'error' => $myFile['error'][$i], 'size' => $myFile['size'][$i]);

          if ($func->hasFile("file")) {
            $photoUpdate = array();
            $file_name = $func->uploadName($myFile["name"][$i]);

            if ($photo = $func->uploadImage("file", $config['import']['img_type'], UPLOAD_EXCEL, $file_name)) {
              $photoUpdate['photo'] = $photo;
              $d->where('id', $id_insert);
              $d->update('excel', $photoUpdate);
              unset($photoUpdate);
            }
          }
        } else {
          $func->transfer(luuhinhanhbiloi, "index.php?com=import&act=man&type=" . $type, false);
        }

        $flagCount++;
      }
    }

    $func->transfer(luuhinhanhthanhcong, "index.php?com=import&act=man&type=" . $type);
  } else {
    $func->transfer(dulieurong, "index.php?com=import&act=man&type=" . $type, false);
  }
}

/* Delete image */
function deleteImages()
{
  global $d, $langadmin, $type, $func, $curPage;

  $id = (!empty($_GET['id'])) ? htmlspecialchars($_GET['id']) : 0;

  if ($id) {
    $row = $d->rawQueryOne("select id, photo from #_excel where id = ? and type = ? limit 0,1", array($id, $type));

    if (!empty($row)) {
      $func->deleteFile(UPLOAD_EXCEL . $row['photo']);
      $d->rawQuery("delete from #_excel where id = ? and type = ?", array($id, $type));
      $func->transfer(xoadulieuthanhcong, "index.php?com=import&act=man&type=" . $type . "&p=" . $curPage);
    } else {
      $func->transfer(xoadulieubiloi, "index.php?com=import&act=man&type=" . $type . "&p=" . $curPage, false);
    }
  } elseif (isset($_GET['listid'])) {
    $listid = explode(",", $_GET['listid']);

    for ($i = 0; $i < count($listid); $i++) {
      $id = htmlspecialchars($listid[$i]);
      $row = $d->rawQueryOne("select id, photo from #_excel where id = ? and type = ? limit 0,1", array($id, $type));

      if (!empty($row)) {
        $func->deleteFile(UPLOAD_EXCEL . $row['photo']);
        $d->rawQuery("delete from #_excel where id = ? and type = ?", array($id, $type));
      }
    }

    $func->transfer(xoadulieuthanhcong, "index.php?com=import&act=man&type=" . $type . "&p=" . $curPage);
  } else {
    $func->transfer(khongnhanduocdulieu, "index.php?com=import&act=man&type=" . $type . "&p=" . $curPage, false);
  }
}

/* Transfer image */
function transferPhoto($photo)
{
  global $d, $langadmin;

  $oldpath = UPLOAD_EXCEL . $photo;
  $newpath = UPLOAD_PRODUCT . $photo;

  if (file_exists($oldpath)) {
    if (rename($oldpath, $newpath)) {
      $d->rawQuery("delete from #_excel where photo = ?", array($photo));
    }
  }
}

/* Upload excel */
function uploadExcel()
{
  global $d, $langadmin, $type, $func, $config;

  if (isset($_POST['importExcel'])) {
    $file_type = $_FILES['file-excel']['type'];

    if ($file_type == "application/vnd.ms-excel" || $file_type == "application/x-ms-excel" || $file_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
      $mess = '';
      $filename = $func->changeTitle($_FILES["file-excel"]["name"]);
      move_uploaded_file($_FILES["file-excel"]["tmp_name"], $filename);
      /**  Identify the type of $filename  **/
      $file_type = IOFactory::identify($filename);
      /**  Create a new Reader of the type that has been identified  **/
      $reader = IOFactory::createReader($file_type);
      /**  Load $filename to a Spreadsheet Object  **/
      $spreadsheet = $reader->load($filename);
      /**  Convert Spreadsheet Object to an Array for ease of use  **/
      $worksheets = $spreadsheet->getActiveSheet()->toArray();

      if (!empty($worksheets)) {
        foreach ($worksheets as $key => $worksheet) {
          if ($key >= 1) {
            $data = array();
            $data['numb'] = (int)$worksheet[0] ?? 0;
            $data['id_list'] = (int)$worksheet[1] ?? 0;
            $data['id_cat'] = (int)$worksheet[2] ?? 0;
            $data['code'] = htmlspecialchars($worksheet[3]) ?? '';
            $data['namevi'] = htmlspecialchars($worksheet[4]) ?? '';
            $data['slugvi'] = $func->changeTitle($worksheet[4]) ?? '';
            $data['regular_price'] = $worksheet[5] ?? '';
            $data['sale_price'] = $worksheet[6] ?? '';
            $data['discount'] = $worksheet[7] ?? '';
            $data['descvi'] = (!empty($worksheet[8])) ? htmlspecialchars($worksheet[8]) : '';
            $data['contentvi'] = (!empty($worksheet[9])) ? htmlspecialchars($worksheet[9]) : '';
            if (isset($config['import']['images']) && $config['import']['images'] == true) {
              $photo = $worksheet[10];
              if ($photo != "") {
                if (filter_var($photo, FILTER_VALIDATE_URL)) {
                  /* Get Images Online */
                  $random = $func->digitalRandom(0, 9, 12);
                  $ext = substr(basename($photo), strrpos(basename($photo), ".") + 1);
                  $tmp = explode('?', $ext);
                  $ext = $tmp[0];
                  $name = $random . "_online_img." . $ext;
                  $pathOnlineImg = $photo;
                  $pathSaveImg = UPLOAD_EXCEL . $name;
                  $ch = curl_init($pathOnlineImg);
                  $fp = fopen($pathSaveImg, 'wb');
                  curl_setopt($ch, CURLOPT_FILE, $fp);
                  curl_setopt($ch, CURLOPT_HEADER, 0);
                  curl_exec($ch);
                  curl_close($ch);
                  fclose($fp);
                  $data['photo'] = $name;
                  $photo = $name;
                } else {
                  /* Get Images Local */
                  $data['photo'] = $photo;
                }
              } else $data['photo'] = '';
            } else {
              $data['photo'] = '';
            }
            $data['type'] = $type;
            $data['status'] = 'hienthi';

            if (isset($productImport['id']) && $productImport['id'] > 0) {
              $d->where('type', $type);
              if ($d->update('product', $data)) {
                if (isset($config['import']['images']) && $config['import']['images'] == true) {
                  /* Cập nhật hình */
                  /* Nếu tồn tại hình mới thì xóa hình cũ và cập nhật hình mới */
                  $oldPhoto = $productImport['photo'];
                  if (($photo != "") && ($photo != $oldPhoto)) {
                    /* Xóa hình cũ */
                    $oldpathphoto = UPLOAD_PRODUCT . $oldPhoto;
                    if (file_exists($oldpathphoto)) unlink($oldpathphoto);

                    /* Chuyển hình mới từ thư mục excel sang thư mục cần chuyển */
                    transferPhoto($photo);
                  }
                }
              } else {
                $mess .= 'Lỗi import';
              }
            } else {
              if ($d->insert('product', $data)) {
                if (isset($config['import']['images']) && $config['import']['images'] == true) {
                  /* Chuyển hình trong thư mục excel sang thư mục cần chuyển */
                  if ($photo != "") transferPhoto($photo);
                }
              } else {
                $mess .= 'Lỗi import';
              }
            }
          }
        }
      }

      /* Xóa tập tin sau khi đã import xong */
      unlink($filename);

      /* Kiểm tra kết quả import */
      if ($mess == '') {
        $mess = "Import danh sách thành công";
        $func->transfer($mess, "index.php?com=import&act=man&type=" . $type);
      } else {
        $func->transfer($mess, "index.php?com=import&act=man&type=" . $type, false);
      }
    } else {
      $mess = "Không hỗ trợ kiểu tập tin này";
      $func->transfer($mess, "index.php?com=import&act=man&type=" . $type, false);
    }
  } else {
    $func->transfer(dulieurong, "index.php?com=import&act=man&type=" . $type, false);
  }
}
