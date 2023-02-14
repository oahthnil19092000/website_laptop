<?php 
class detailedParametersModel extends DB{
    // lấy tất cả thông số của sản phẩm
    public function select($product_id){
        $qr = "SELECT * FROM `chi tiet thong so` WHERE `ma sp` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function selectOne($product_id,$paramater_id){
        $qr = "SELECT * FROM `chi tiet thong so` WHERE `ma sp` = ? AND `ma ts` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id,$paramater_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
        return $data[0]['gia tri thong so'];
        else return "";
    }
    // thêm thông số 
    public function insert($product_id,$paramater_id,$paramater){
        $qr = "INSERT INTO `chi tiet thong so`(`ma sp`, `ma ts`, `gia tri thong so`) VALUES (? ,? ,?)";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id,$paramater_id,$paramater]);
        return true;
    }
    // xóa hết thông số của sản phẩm
    public function deleteAll($product_id){
        $qr = "DELETE FROM `chi tiet thong so` WHERE `ma sp` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id]);
        return true;
    }
}