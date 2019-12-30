<?php

session_start();
include('../../Models/DBConnect.php');
include('../../Models/Cap.php');
include('../../config.php');
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $action = $_REQUEST['action'];
  if($action == 'add'){
    $cap = new Cap(null,$_REQUEST['loai_id'],
                    $_REQUEST['hoc_vien_id'],
                    $_REQUEST['ngay_cap'],
                    $_REQUEST['so_cap'],
                    $_REQUEST['diem_thuc_hanh'],
                    $_REQUEST['diem_ly_thuyet']);
    Cap::add($cap);
    header('Location: '.$_SERVER['HTTP_REFERER']);
  }


}
?>