<?php
include_once('./Layouts/CMSHeader.php');
include_once('./Layouts/CMSSidebar.php');
include_once('./Layouts/CMSTopbar.php');
// $list = Category::getList();
// $category_parent = Category::getListParent();
$list = Loai::getList();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 d-sm-flex align-items-center justify-content-between mb-4">
  Loai Chung Chi
    <button data-toggle="modal" data-target="#addCategory" class="btn btn-primary btn-icon-split">
      <span class="text">Add New</span>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form method="POST" action="<?=Config::$urlbase?>Controllers/CMS/Category.php" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addCategoryModal">Them Loai Chung Chi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="action" value="add">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
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
  </h1>

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
              <th>Id</th>
              <th>Name</th>
              <th width="120px">Action</th>

            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th width="120px">Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($list as $value) { ?>
              <tr>
                <td><?= $value->id ?></td>
                <td><?= $value->name ?></td>
                <td>
                  <button class="btn btn-danger" onclick="confirm('aaa')?deleteCategory(<?=$value->id?>):alert('xxx')" data-id="<?=$value->id?>"><i class="fa fa-trash"></i></button>
                  <button class="btn btn-warning" onclick="editCategory(<?=$value->id?>)" data-id="<?=$value->id?>"><i class="fa fa-pencil-alt"></i></button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
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
  function deleteCategory(id){
    $.post( "<?=Config::$urlbase?>Controllers/CMS/Category.php",{id:id,action:"delete"}, function( data ) {
      // console.log(data);
      alert("delete success");
      location.reload();
    });
  }
  function editCategory(id){
    $.post( "<?=Config::$urlbase?>Controllers/CMS/Category.php",{id:id,action:"view-edit"}, function( data ) {
    
      $("#editCategory .modal-dialog").html(data);
      $("#editCategory").modal('show');
    });
  }
  $(document).ready(function() {
    
  });
</script>
</body>

</html>