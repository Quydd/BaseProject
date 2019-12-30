<?php


class HocVien {

    var $id;
    var $name; // ảnh banner
    
    public function __construct($id,$first_name,$last_name,$address,$birthday,$birthaddress)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->address = $address;
        $this->birthday = $birthday;
        $this->birthaddress = $birthaddress;
    }

    static function getList(){
        $conn = DBConnect::connect();
        $sql = "SELECT * From hoc_vien ";
        $result = $conn->query($sql);
        $ls = [];
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $cate = new HocVien($row['id'],$row['first_name'],$row['last_name'],$row['address'],$row['birthday'],$row['birthaddress']);
                $ls[] = $cate;
            }
        }    
        //Buoc 3: Dong ket noi
        $conn->close();
        return $ls;
    }

   

    static function getById($id){
        $ls = HocVien::getList();
        foreach($ls as $hoc_vien){
            if($hoc_vien->id == $id)
                return $hoc_vien;
        }
        return null;
    }

    // static function add($loai){
    //     $conn = DBConnect::connect();
        
    //     $sql = "INSERT INTO `loai` (`name`) 
    //             VALUES ('".$loai->name."')";
    //     echo $sql;
        
    //     $result = $conn->query($sql);
    //     echo $conn->error;
    //     $conn->close();
    // }

    // static function delete($id){
    //     $conn = DBConnect::connect();
    //     $sql = "DELETE FROM `loai` WHERE `id` = ".$id;
    //     $result = $conn->query($sql);
    //     echo $result;
    //     echo $conn->error;
    //     $conn->close();
    // }


    // static function update($loai){
    //     $conn = DBConnect::connect();
    //     $sql = "UPDATE `loai` SET 
    //                                 `name`='".$loai->name."',
                                    
    //                                 WHERE id = ".$loai->id;
    //     $result = $conn->query($sql);
    //     echo $conn->error;
    //     $conn->close();
    // }
}