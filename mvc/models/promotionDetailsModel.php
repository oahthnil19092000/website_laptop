<?php 
class promotionDetailsModel extends DB{
    // lấy tất cả sản phẩm với chương trình khuyến mãi có mã km là promotion_id
    public function select($product_id, $promotion_id){
        $qr = "SELECT * FROM `chi tiet khuyen mai` WHERE `ma sp` = ? AND `ma khuyen mai` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id, $promotion_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
        return $data[0];
        else return null;
    }
    public function selectPercentage($product_id, $promotion_id){
        $qr = "SELECT * FROM `chi tiet khuyen mai` WHERE `ma sp` = ? AND `ma khuyen mai` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id, $promotion_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
        return $data[0]['phan tram khuyen mai'];
        else return 0;
    }
    // kiểm tra xem có tồn tại sản phẩm trong giỏ hàng k
    public function exist($product_id, $promotion_id){
        $qr = "SELECT * FROM `chi tiet khuyen mai` WHERE `ma sp` = ? AND `ma khuyen mai` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id, $promotion_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    // thêm khuyến mãi cho sản phẩm
    public function insert($product_id, $promotion_id, $percentage){
        if(!$this->exist($product_id, $promotion_id) && $percentage != 0){
            $qr = "INSERT INTO `chi tiet khuyen mai`(`ma sp`, `ma khuyen mai`, `phan tram khuyen mai`) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$product_id, $promotion_id, $percentage]);
            return true;
        }else if($this->exist($product_id, $promotion_id) && $percentage == 0){
            $this->delete($product_id, $promotion_id);
            return true;
        }else if($this->exist($product_id, $promotion_id) && $percentage != 0) {
            $this->update($product_id, $promotion_id, $percentage);
            return true;
        }
    }
    // sửa phần trăm khuyến mãi cho sản phẩm
    public function update($product_id, $promotion_id, $percentage){
        if($this->exist($product_id, $promotion_id)){
            $qr = "UPDATE `chi tiet khuyen mai` SET `phan tram khuyen mai`= ? WHERE `ma sp`= ? AND `ma khuyen mai`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$percentage, $product_id, $promotion_id]);
            return true;
        }
        else return false;
    }
    // xóa khuyến mãi của sản phẩm
    public function delete($product_id, $promotion_id){
        if($this->exist($product_id, $promotion_id)){
            $qr = "DELETE FROM `chi tiet khuyen mai` WHERE `ma sp`= ? AND `ma khuyen mai`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$product_id, $promotion_id]);
            return true;
        }
        else return false;
    }
}