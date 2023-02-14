<?php 

class cartDetailsModel extends DB{
    //lấy tất cả sản phẩm trong giỏ hàng
    public function selectAllOfCart($cart_id){
        $qr = "SELECT * FROM `chi tiet gio hang` WHERE `ma gh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$cart_id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // đếm số sản phẩm khác loại trong giỏ hàng
    public function countProductOfCart($cart_id){
        $qr = "SELECT * FROM `chi tiet gio hang` WHERE `ma gh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$cart_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return count($data);
        else return 0;
    }
    public function count()
    {
        $qr = "SELECT sum(`so luong`) as `sum`,`ma sp` FROM `chi tiet gio hang` ORDER BY `sum` GROUP BY `ma sp`";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }
    //số lượng sản phẩm trong giỏ hàng
    public function quantilyProductOfCart($cart_id,$product_id){
        $qr = "SELECT * FROM `chi tiet gio hang` WHERE `ma gh` = ? AND `ma sp` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$cart_id,$product_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return $data[0]['so luong'];
        else return 0;
    }
    // kiểm tra xem có tồn tại sản phẩm trong giỏ hàng k
    public function exist($cart_id,$product_id){
        $qr = "SELECT * FROM `chi tiet gio hang` WHERE `ma gh` = ? AND `ma sp` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$cart_id,$product_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    // Thêm sản phẩm vào giỏ hàng
    public function insert($product_id,$cart_id,$product_quantily){
        if(!$this->exist($cart_id,$product_id)){
            $qr = "INSERT INTO `chi tiet gio hang`(`ma sp`, `ma gh`, `so luong`) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$product_id,$cart_id,$product_quantily]);
            return true;
        } else return false;
    }
    // cập nhật số lượng của sản phẩm trong giỏ hàng
    public function update($cart_id,$product_id,$product_quantily){
        if($this->exist($cart_id,$product_id)){
            $qr = "UPDATE `chi tiet gio hang` SET `so luong`= ? WHERE `ma sp`= ? AND `ma gh`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$product_quantily,$product_id,$cart_id]);
            return true;
        }
    }
    // Xóa sản phẩm trong giỏ hàng
    public function delete($cart_id,$product_id){
        if($this->exist($cart_id,$product_id)){
        $qr = "DELETE FROM `chi tiet gio hang` WHERE `ma sp`= ? AND `ma gh`= ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id,$cart_id]);
        return true;
        } else return false;
    }
    public function move($old_cart_id, $new_cart_id, $product_id)
    {
        if ($this->exist($old_cart_id, $product_id)) {
            $qr = "UPDATE `chi tiet gio hang` SET `ma gh`=? WHERE `ma gh`=? AND `ma sp`=?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$new_cart_id, $old_cart_id, $product_id]);
            return true;
        } else return false;
    }
}