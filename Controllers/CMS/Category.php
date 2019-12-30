<?php

session_start();
include('../../Models/DBConnect.php');
include('../../Models/Loai.php');
include('../../config.php');
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $action = $_REQUEST['action'];
  if($action == 'add'){
   
    $category = new Loai(null,$_REQUEST['name']);
    Loai::add($category);
    header('Location: '.$_SERVER['HTTP_REFERER']);
  }else if($action == "delete"){
    Loai::delete($_REQUEST['id']);
  }else if($action == "edit"){
    $loai = Loai::getById($_REQUEST['id']);
   
    $loai->name = $_REQUEST['name'];
    Loai::update($loai);
    header('Location: '.$_SERVER['HTTP_REFERER']);
  }else if($action == "view-edit"){ 
    $loai = Loai::getById($_REQUEST['id']);
    
    
    echo '<form method="POST" action="'.Config::$urlbase.'Controllers/CMS/Category.php" enctype="multipart/form-data"> 
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editCategoryModal">Edit Category '.$loai->id.'</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <input type="hidden" name="action" value="edit">
          <input type="hidden" name="id" value="'.$loai->id.'">
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="'.$loai->name.'" placeholder="Enter name">
            </div>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </form>';
  }


}
?>