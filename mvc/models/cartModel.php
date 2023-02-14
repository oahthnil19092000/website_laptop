<?php 
class cartModel extends DB{
    //tình trạng của giỏ hàng có mã gh = cart_id
    //tình trạng = 0: đã bị hủy hoặc không có; 
    //tình trạng = 1: giỏ hàng chưa mua;
    //tình trạng = 2: giỏ hàng đã đặt hàng (đợi duyệt);
    //tình trạng = 3: (đã được admin duyệt); 
    //tình trạng = 4: đang giao; 
    //tình trạng = 5: đã giao (hoàn tất)
    
    function select($cart_id){
        $qr = "SELECT * FROM `gio hang` WHERE `ma gh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$cart_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return $data[0];
        else return null;
    }
    function statusOfCart($cart_id){
        $qr = "SELECT * FROM `gio hang` WHERE `ma gh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$cart_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return $data[0]['tinh trang'];
        else return 0;
    }

    function selectAll(){
        $qr = "SELECT * FROM `gio hang` WHERE `tinh trang` > ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([1]);
        $data = $stmt->fetchAll();
        return $data;
    }

    function count(){
        $qr = "SELECT * FROM `gio hang` WHERE `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([2]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return count($data);
        else return 0;
    }
    public function selectLastID()
    {
        $qr = "SELECT * FROM `gio hang` ORDER BY `ma gh` DESC LIMIT 1";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([]);
        $data = $stmt->fetchAll();
        return $data[0]['ma gh'];
    }
    
    // Thêm giỏ hàng mới
    function insert(){
        $qr = "INSERT INTO `gio hang`(`tinh trang`) VALUES (?)";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([1]);
        $qr = "SELECT * FROM `gio hang` ORDER BY `ma gh` DESC LIMIT 1";
        $stmt = $this->conn->query($qr);
        $data = $stmt->fetchAll();
        return $data[0]['ma gh'];
    }
    // cập nhật tình trạng giỏ hàng
    function update($cart_id, $cart_status){
        $qr = "UPDATE `gio hang` SET `tinh trang`= ? WHERE `ma gh`= ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$cart_status, $cart_id]);
        return true;
    }
    // xóa giỏ hàng
    function delete($cart_id){
        return $this->update($cart_id, 0);
    }
}