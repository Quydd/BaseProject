<?php


class Loai {

    var $id;
    var $name; // ảnh banner
    
    public function __construct($id,$name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    static function getList(){
        $conn = DBConnect::connect();
        $sql = "SELECT * From loai ";
        $result = $conn->query($sql);
        $ls = [];
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $cate = new Loai($row['id'],$row['name']);
                $ls[] = $cate;
            }
        }    
        //Buoc 3: Dong ket noi
        $conn->close();
        return $ls;
    }

   

    static function getById($id){
        $ls = Loai::getList();
        foreach($ls as $loai){
            if($loai->id == $id)
                return $loai;
        }
        return null;
    }

    static function add($loai){
        $conn = DBConnect::connect();
        
        $sql = "INSERT INTO `loai` (`name`) 
                VALUES ('".$loai->name."')";
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
                                    `name`='".$loai->name."'
                                    
                                    WHERE id = ".$loai->id;
        $result = $conn->query($sql);
        echo $conn->error;
        $conn->close();
    }
}