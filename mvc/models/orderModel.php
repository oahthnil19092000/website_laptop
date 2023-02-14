<?php
class orderModel extends DB{
    // lấy hết tất cả hóa đơn
    function selectAll(){
        $qr = "SELECT * FROM `hoa don` WHERE `so hd` != ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([0]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // lấy hóa đơn có mã gh = cart_id
    function selectWithCartID($cart_id){
        $qr = "SELECT * FROM `hoa don` WHERE `ma gh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$cart_id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    function selectWithPaidAndDate($month, $year){
        $qr = "SELECT * FROM `hoa don` WHERE `da thanh toan` = ? AND `ngay lap` BETWEEN ? AND ?;";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([1,$year."-".$month."-01",$year."-".$month."-31"]);
        $data = $stmt->fetchAll();
        return $data;
    }
    function existCartOfCustomer($customer_id, $cart_id)
    {
        $qr = "SELECT * FROM `hoa don` WHERE `ma kh` = ? AND `ma gh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$customer_id, $cart_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }

    // lấy hóa đơn có mã kh = customer_id
    function selectWithCustomerID($customer_id){
        $qr = "SELECT * FROM `hoa don` WHERE `ma kh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$customer_id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // lấy hóa đơn có so hd = order_id
    function selectWithID($order_id){
        $qr = "SELECT * FROM `hoa don` WHERE `so hd` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$order_id]);
        $data = $stmt->fetchAll();
            return $data[0];
    }
    // thêm hóa đơn
    
    function insert($cart_id, $customer_id){
        $qr = "INSERT INTO `hoa don`(`ma gh`, `ma kh`) VALUES (?, ?)";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$cart_id, $customer_id]);
        return true;
    }
    // cập nhật hóa đơn
    function order($cart_id, $customer_address , $customer_phone, $order_date )
    {
        $qr = "UPDATE `hoa don` SET `dia chi giao`= ?,`so dien thoai giao hang`= ?,`ngay lap`=? WHERE `ma gh`=?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$customer_address , $customer_phone, $order_date, $cart_id]);
        return true;
    }
    function paid($cart_id)
    {
        $qr = "UPDATE `hoa don` SET `da thanh toan`= ? WHERE `ma gh`=?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([1 , $cart_id]);
        return true;
    }
    function update($cart_id, $admin_id,$delivery_date)
    {
        $qr = "UPDATE `hoa don` SET `ma ad`=? ,`ngay giao`= ? WHERE `ma gh`=?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$admin_id, $delivery_date , $cart_id]);
        return true;
    }
}