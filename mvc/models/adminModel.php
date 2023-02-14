<?php
class adminModel extends DB{
    // lấy tất cả dòng trong bảng admin
    public function selectAll(){
        $qr = "SELECT * FROM `admin`";
        $stmt = $this->conn->query($qr);
        $data = $stmt->fetchAll();
        return $data;
    }
    //lấy dòng có mã ad = admin_id
    public function selectWithAdminID($admin_id){
        $qr = "SELECT * FROM `admin` WHERE `ma ad`= ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$admin_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
        return $data[0];
        else return null;
    }
    //lấy dòng có mã ad = admin_id
    public function selectWithUsername($username){
        $qr = "SELECT * FROM `admin` WHERE `username` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$username]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    function isAdmin($username){
        $qr = "SELECT * FROM `admin` WHERE `username` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$username]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    //kiểm tra xem có dòng có mã ad = admin_id ở trong bảng không
    public function existWithAdminID($admin_id){
        $qr = "SELECT * FROM `admin` WHERE `ma ad`= ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$admin_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    //kiểm tra xem có dòng có họ tên ad = admin_name ở trong bảng không
    public function existWithAdminName($admin_name){
        $qr = "SELECT * FROM `admin` WHERE `ho ten ad`= ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$admin_name]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    //kiểm tra xem có admin trong bảng không 
    public function exist($username, $admin_name, $admin_birthday, $admin_phone, $admin_address){
        $qr = "SELECT * FROM `admin` WHERE `username` = ? AND `ho ten ad`= ? AND `ngay sinh` = ? AND `so dien thoai`= ? AND  `dia chi` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$username, $admin_name, $admin_birthday, $admin_phone, $admin_address]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }   
    
    // Thêm admin
    public function insert($username, $admin_name, $admin_birthday, $admin_phone, $admin_address){
        if(!$this->exist($username, $admin_name, $admin_birthday, $admin_phone, $admin_address)){
            $qr = "INSERT INTO `admin`(`username`,`ho ten ad`, `ngay sinh`, `so dien thoai`, `dia chi`) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$username, $admin_name, $admin_birthday, $admin_phone, $admin_address]);
            return true;
        } else return false;
    }
    
    // Sửa thông tin admin
    public function update($admin_id , $admin_name, $admin_birthday, $admin_phone, $admin_address){
        if($this->existWithAdminID($admin_id)){
            $qr = "UPDATE `admin` SET `ho ten ad`= ?,`ngay sinh`= ?,`so dien thoai`= ?,`dia chi`= ? WHERE `ma ad`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$admin_name, $admin_birthday, $admin_phone, $admin_address,$admin_id]);
            return true;
        } else return false;
    }
    // xóa Admin
    public function delete($admin_id){
        if($this->existWithAdminID($admin_id)){
            $qr = "DELETE FROM `admin` WHERE `ma ad`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$admin_id]);
            return true;
        } else return false;
    }
    // xong Admin

}
?>