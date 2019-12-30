<?php
include_once('./Layouts/CMSHeader.php');
include_once('./Layouts/CMSSidebar.php');
include_once('./Layouts/CMSTopbar.php');
$request_loai = null;
if (isset($_REQUEST['loai']) && $_REQUEST['loai'] != null)
  $request_loai = $_REQUEST['loai'];
$list = Cap::getList($request_loai);
$list_loai = Loai::getList();
$list_hoc_vien = HocVien::getList();

?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 text-center">
    HỆ THỐNG QUẢN LÝ CHỨNG CHỈ TIN HỌC
  </h1>
  <!-- Modal -->

  <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form method="POST" action="<?= Config::$urlbase ?>Controllers/CMS/Cap.php" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addCategoryModal">Cap chung chi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="action" value="add">
            <div class="form-group">
              <label for="hoc_vien_id">Hoc Vien</label>
              <select class="form-control" id="hoc_vien_id" name="hoc_vien_id" placeholder="Enter name">
                <?php foreach ($list_hoc_vien as $key => $value) { ?>
                  <option value="<?= $value->id ?>"><?= $value->first_name . " " . $value->last_name ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="loai_id">Loai Chung Chi</label>
              <select class="form-control" id="loai_id" name="loai_id" placeholder="Enter name">
                <?php foreach ($list_loai as $key => $value) { ?>
                  <option value="<?= $value->id ?>"><?= $value->name; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="ngay_cap">Ngay Cap</label>
              <input type="date" class="form-control" id="ngay_cap" name="ngay_cap" placeholder="Nhap ngay cap">
            </div>
            <div class="form-group">
              <label for="so_cap">So Cap</label>
              <input type="text" class="form-control" id="so_cap" name="so_cap" placeholder="Nhap so cap">
            </div>
            <div class="form-group">
              <label for="diem_thuc_hanh">Diem Thuc Hanh</label>
              <input type="text" class="form-control" id="diem_thuc_hanh" name="diem_thuc_hanh" placeholder="Nhap diem thuc hanh">
            </div>
            <div class="form-group">
              <label for="diem_ly_thuyet">Diem Ly Thuyet</label>
              <input type="text" class="form-control" id="diem_ly_thuyet" name="diem_ly_thuyet" placeholder="Nhap diem ly thuyet">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </form>

    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <form method="GET" class="form-inline" action="<?= Config::$urlbase ?>Views/CMS/index.php" enctype="multipart/form-data">
        <label class="sr-only" for="inlineFormInputName2">Loại Chứng Chỉ:</label>
        <select class="form-control mb-2  " style="width:300px" id="loai" name="loai" placeholder="Enter name">
          <option value="null">None</option>
          <?php foreach ($list_loai as $key => $value) { ?>
            <option value="<?= $value->id ?>"><?= $value->name; ?></option>
          <?php } ?>
        </select>
        <button type="submit" class="btn btn-primary mb-2 btn-icon-split">
          <span class="text">Loc</span>
        </button>
      </form>
    </div>

    <div class="col-md-3">
      <a class="nav-link" href="<?=Config::$urlbase?>Views/CMS/Category.php">
        <button class="btn btn-primary btn-icon-split">
          <span class="text">Quản lý chứng chỉ</span>
        </button>
      </a>
    </div>
  </div>


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Category</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>STT</th>
              <th>Ho va Ten</th>
              <th>Ngay Sinh</th>
              <th>Noi Sinh</th>
              <th>Que Quan</th>
              <th>Ngay Cap</th>
              <th>So Cap</th>
              <!-- <th width="120px">Action</th> -->

            </tr>
          </thead>

          <tbody>
            <?php
            $i = 0;
            foreach ($list as $value) {
              $i++;
              $hoc_vien = HocVien::getById($value->hoc_vien_id);
              ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $hoc_vien->first_name . " " . $hoc_vien->last_name ?></td>
                <td><?= $hoc_vien->birthday ?></td>
                <td><?= $hoc_vien->address ?></td>
                <td><?= $hoc_vien->birthaddress ?></td>
                <td><?= $value->ngay_cap ?></td>
                <td><?= $value->so_cap ?></td>
                <!-- <td>
                  <button class="btn btn-danger" onclick="confirm('aaa')?deleteCategory(<?= $value->id ?>):alert('xxx')" data-id="<?= $value->id ?>"><i class="fa fa-trash"></i></button>
                  <button class="btn btn-warning" onclick="editCategory(<?= $value->id ?>)" data-id="<?= $value->id ?>"><i class="fa fa-pencil-alt"></i></button>
                </td> -->
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
    <button data-toggle="modal" data-target="#addCategory" class="btn btn-primary btn-icon-split mb-3 float-right">
      <span class="text">Them Hoc Vien duoc cap chung chi </span>
    </button>
  <div style="clear:both;"></div>
  <div class="modal fade" id="editCategory" tabindex="-1" role="dialog" aria-labelledby="editCategoryModal" aria-hidden="true">
    <div class="modal-dialog" role="document">

    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php
include_once('./Layouts/CMSFooter.php');
?>
<script>
  function deleteCategory(id) {
    $.post("<?= Config::$urlbase ?>Controllers/CMS/Category.php", {
      id: id,
      action: "delete"
    }, function(data) {
      // console.log(data);
      alert("delete success");
      location.reload();
    });
  }

  function editCategory(id) {
    $.post("<?= Config::$urlbase ?>Controllers/CMS/Category.php", {
      id: id,
      action: "view-edit"
    }, function(data) {

      $("#editCategory .modal-dialog").html(data);
      $("#editCategory").modal('show');
    });
  }
  $(document).ready(function() {

  });
</script>
</body>

</html>