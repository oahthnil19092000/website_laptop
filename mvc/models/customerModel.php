<?php
class customerModel extends DB{
    // lấy tất cả dòng trong bảng admin
    public function selectAll(){
        $qr = "SELECT * FROM `khach hang`";
        $stmt = $this->conn->query($qr);
        $data = $stmt->fetchAll();
        return $data;
    }
    //lấy dòng có mã kh = customer_id
    public function selectWithCustomerID($customer_id){
        $qr = "SELECT * FROM `khach hang` WHERE `ma kh`= ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$customer_id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    //lấy dòng có mã ad = admin_id
    public function selectWithUsername($username){
        $qr = "SELECT * FROM `khach hang` WHERE `username` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$username]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    function isCustomer($username){
        $qr = "SELECT * FROM `khach hang` WHERE `username` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$username]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    //kiểm tra xem có dòng có mã kh = customer_id ở trong bảng không
    public function existWithCustomerID($customer_id){
        $qr = "SELECT * FROM `khach hang` WHERE `ma kh`= ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$customer_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    //kiểm tra xem có dòng có họ tên kh = customer_name ở trong bảng không
    public function existWithCustomerName($customer_name){
        $qr = "SELECT * FROM `khach hang` WHERE `ho ten kh`= ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$customer_name]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    //kiểm tra xem có admin trong bảng không 
    public function exist($username, $customer_name, $customer_birthday, $customer_phone, $customer_address){
        $qr = "SELECT * FROM `khach hang` WHERE `username` = ? AND `ho ten kh`= ? AND `ngay sinh` = ? AND `so dien thoai`= ? AND  `dia chi` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$username, $customer_name, $customer_birthday, $customer_phone, $customer_address]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }   
    
    // Thêm admin
    public function insert($username, $customer_name, $customer_birthday, $customer_phone, $customer_address){
        if(!$this->exist($username, $customer_name, $customer_birthday, $customer_phone, $customer_address)){
            $qr = "INSERT INTO `khach hang`(`username`,`ho ten kh`, `ngay sinh`, `so dien thoai`, `dia chi`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$username, $customer_name, $customer_birthday, $customer_phone, $customer_address]);
            return true;
        } else return false;
    }
    
    // Sửa thông tin admin
    public function update($customer_id , $customer_name, $customer_birthday, $customer_phone, $customer_address){
        if($this->existWithCustomerID($customer_id)){
            $qr = "UPDATE `khach hang` SET `ho ten kh`= ?,`ngay sinh`= ?,`so dien thoai`= ?,`dia chi`= ? WHERE `ma kh`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$customer_name, $customer_birthday, $customer_phone, $customer_address, $customer_id]);
            return true;
        } else return false;
    }
    // xóa Customer
    public function delete($customer_id){
        if($this->existWithCustomerID($customer_id)){
            $qr = "DELETE FROM `khach hang` WHERE `ma kh`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$customer_id]);
            return true;
        } else return false;
    }
    // xong Customer

}
?>