<?php
class categoryModel extends DB{
    // lấy tất cả các mục trong loại sản phẩm
    function selectAll(){
        $qr = "SELECT * FROM `loai san pham` WHERE `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([1]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // lấy loại sản phẩm có mã loại sp = category_id
    function selectWithID($category_id){
        $qr = "SELECT * FROM `loai san pham`  WHERE `ma loai sp` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$category_id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    // kiểm tra xem tên loại sp này có tồn tại chưa
    function existWithNameAndSupID($category_name, $supplier_id)
    {
        $qr = "SELECT * FROM `loai san pham`  WHERE `ten loai sp` = ? AND `ma ncc` = ? AND `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$category_name, $supplier_id, 1]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    } 
    function existWithName($category_name)
    {
        $qr = "SELECT * FROM `loai san pham`  WHERE `ten loai sp` = ? AND `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$category_name,1]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    } 
    //thêm loại
    function insert($category_name, $supplier_id){
        if(!$this->existWithName($category_name)){
            $qr = "INSERT INTO `loai san pham`(`ten loai sp`, `ma ncc`) VALUES (?,?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$category_name, $supplier_id]);
            return true;
        } else return false;
    }
    //cập nhật loại
    function update($category_id, $category_name, $supplier_id)
    {
        if(!$this->existWithNameAndSupID($category_name, $supplier_id)){
            $qr = "UPDATE `loai san pham` SET `ten loai sp`= ?, `ma ncc` = ? WHERE `ma loai sp`= ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$category_name, $supplier_id, $category_id]);
            return true;
        } else return false;
    }
    //xóa loại
    
    function delete($category_id)
    {
        $qr = "UPDATE `loai san pham` SET `tinh trang`= ? WHERE `ma loai sp`= ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([0, $category_id]);
        return true;
    }
}