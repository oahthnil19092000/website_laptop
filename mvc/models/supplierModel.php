<?php
class supplierModel extends DB{
    // lấy tất cả các mục trong nhà cung cấp
    function selectAll(){
        $qr = "SELECT * FROM `nha cung cap` WHERE `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([1]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // lấy nhà cung cấp có ma ncc = supplier_id
    function selectWithID($supplier_id){
        $qr = "SELECT * FROM `nha cung cap`  WHERE `ma ncc` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$supplier_id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    function existWithID($supplier_id){
        $qr = "SELECT * FROM `nha cung cap`  WHERE `ma ncc` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$supplier_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    // kiểm tra xem tên loại spnahf cung cấp này có tồn tại chưa
    function existWithName($supplier_name)
    {
        $qr = "SELECT * FROM `nha cung cap`  WHERE `ten ncc` = ? AND `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$supplier_name,1]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    } 
    //thêm nhà cung cấp
    function insert($supplier_name, $supplier_address){
        if(!$this->existWithName($supplier_name)){
            $qr = "INSERT INTO `nha cung cap`(`ten ncc`, `dia chi ncc`) VALUES (?,?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$supplier_name, $supplier_address]);
            return true;
        } else return false;
    }
    //cập nhật nhà cung cấp
    function update($supplier_id, $supplier_name, $supplier_address)
    {
        if(!$this->existWithName($supplier_name)){
            $qr = "UPDATE `nha cung cap` SET `ten ncc`= ? , `dia chi ncc` = ? WHERE `ma ncc`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$supplier_name, $supplier_address, $supplier_id]);
            return true;
        } else return false;
    }
    //xóa nhà cung cấp
    
    function delete($supplier_id)
    {
        if($this->existWithID($supplier_id)){
            $qr = "UPDATE `nha cung cap` SET `tinh trang`= ? WHERE `ma ncc`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([0, $supplier_id]);
            return true;
        } else return false;
    }
}