<?php


class Cap {

    var $id;
    var $loai_id;
    var $hoc_vien_id;
    var $ngay_cap;
    var $so_cap;
    var $diem_thuc_hanh;
    var $diem_ly_thuyet;
    
    public function __construct($id,$loai_id,$hoc_vien_id,$ngay_cap,$so_cap,$diem_thuc_hanh,$diem_ly_thuyet)
    {
        $this->id = $id;
        $this->loai_id = $loai_id;
        $this->hoc_vien_id = $hoc_vien_id;
        $this->ngay_cap = $ngay_cap;
        $this->so_cap = $so_cap;
        $this->diem_thuc_hanh = $diem_thuc_hanh;
        $this->diem_ly_thuyet = $diem_ly_thuyet;
    }

    static function getList($loai = null){
        $conn = DBConnect::connect();
        if($loai != null)
            $sql = "SELECT * From cap where loai_id = ".$loai;
        else
            $sql = "SELECT * From cap ";
        $result = $conn->query($sql);
        $ls = [];
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $cate = new Cap($row['id'],$row['loai_id'],$row['hoc_vien_id'],$row['ngay_cap'],$row['so_cap'],$row['diem_thuc_hanh'],$row['diem_ly_thuyet']);
                $ls[] = $cate;
            }
        }    
        //Buoc 3: Dong ket noi
        $conn->close();
        return $ls;
    }

   

    static function getById($id){
        $ls = Cap::getList();
        foreach($ls as $loai){
            if($loai->id == $id)
                return $loai;
        }
        return null;
    }

    static function add($cap){
        $conn = DBConnect::connect();
        
        $sql = "INSERT INTO `cap` (`loai_id`,`hoc_vien_id`,`ngay_cap`,`so_cap`,`diem_thuc_hanh`,`diem_ly_thuyet`) 
                VALUES (".$cap->loai_id.",".$cap->hoc_vien_id.",'".$cap->ngay_cap."','".$cap->so_cap."',".$cap->diem_thuc_hanh.",".$cap->diem_ly_thuyet.")";
        echo $sql;
        
        $result = $conn->query($sql);
        echo $conn->error;
        $conn->close();
    }

    static function delete($id){
        $conn = DBConnect::connect();
        $sql = "DELETE FROM `loai` WHERE `id` = ".$id;
        $result = $conn->query($sql);
        echo $result;
        echo $conn->error;
        $conn->close();
    }


    static function update($loai){
        $conn = DBConnect::connect();
        $sql = "UPDATE `loai` SET 
                                    `name`='".$loai->name."',
                                    
                                    WHERE id = ".$loai->id;
        $result = $conn->query($sql);
        echo $conn->error;
        $conn->close();
    }
}