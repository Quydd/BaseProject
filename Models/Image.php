<?php

// require 'db.php';

class Image {

    var $id;
    var $product_id;
    var $image;
    public function __construct($id,$product_id,$image)
    {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->image = $image;
        echo "XCVCVBBVCBCVBCV";
    }

    static function getListByProduct($product_id){
        $conn = DBConnect::connect();
        // print_r($conn);
        //Buoc 2: Thao tac voi CSDL: CRUD
        $sql = "SELECT * FROM images WHERE product_id = $product_id";
        $result = $conn->query($sql);
        $ls = [];
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $images = new Image($row['id'],$row['product_id'],$row['image']);
                $ls[] = $images;
            }
        }   
        //Buoc 3: Dong ket noi
        $conn->close();
        return $ls;
    }

    static function add($image){
        echo "ZXczxc";
        echo "zxcxzc";
        $conn = DBConnect::connect();
        
        $sql = "INSERT INTO `images` (`product_id`, `image`) 
                VALUES ('".$image->product_id."',
                        '".$image->image."')";
        $result = $conn->query($sql);
        echo $conn->error;
        echo "------";
        $conn->close();
    }

    static function delete($id){
        $conn = DBConnect::connect();
        $sql = "DELETE FROM `images` WHERE `id` = ".$id;
        $result = $conn->query($sql);
        echo $conn->error;
        $conn->close();
    }
    
}