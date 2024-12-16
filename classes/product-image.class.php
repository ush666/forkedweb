<?php

require_once 'product.class.php';

class ProductImage extends Product{
    public $file_path = '';
    public $image_role = '';

    function addImage($id='') {
        $sql = "INSERT INTO product_image (product_id, file_path, image_role) VALUES (:product_id, :file_path, :image_role);";
        $query = $this->db->connect()->prepare($sql);

        $last_inserted_product = $this->db->connect()->lastInsertId();
        $id ? $last_inserted_product = $id : '';

        $query->bindParam(':product_id', $last_inserted_product);
        $query->bindParam(':file_path', $this->file_path);
        $query->bindParam(':image_role', $this->image_role);
        return $query->execute();
    }

    function deleteImage($recordID) {
        $sql = "DELETE FROM product_image WHERE product_id = :recordID AND image_role = 'main';";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':recordID', $recordID);
        return $query->execute();
    }
}