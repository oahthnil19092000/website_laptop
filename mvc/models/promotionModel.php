<?php 
class promotionModel extends DB{
    // lấy tất cả chương trình khuyến mãi
    public function selectAll(){
        $qr = "SELECT * FROM `khuyen mai` WHERE (? BETWEEN `tg bat dau` AND `tg ket thuc`) AND `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([date("Y-m-d"),1]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function selectWithTime($date){
        $qr = "SELECT * FROM `khuyen mai` WHERE (? BETWEEN `tg bat dau` AND `tg ket thuc`) AND `tinh trang` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$date,1]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function select($promotion_id){
        $qr = "SELECT * FROM `khuyen mai` WHERE `ma khuyen mai` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$promotion_id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // thêm khuyến mãi cho sản phẩm
    public function insert($promotion_name, $promotion_poster , $promotion_time_start, $promotion_time_end){
        $qr = "INSERT INTO `khuyen mai`(`ten khuyen mai`,`hinh km`, `tg bat dau`, `tg ket thuc`, `tinh trang`) VALUES (?, ?, ?, ? , ?)";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$promotion_name, $promotion_poster , $promotion_time_start, $promotion_time_end,1]);
        return true;
    }
    // sửa phần trăm khuyến mãi cho sản phẩm
    public function update($promotion_id, $promotion_name, $promotion_time_start, $promotion_time_end){
        $qr = "UPDATE `khuyen mai` SET `ten khuyen mai`= ?,`tg bat dau`=?,`tg ket thuc`=? WHERE `ma khuyen mai`= ? ";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$promotion_name, $promotion_time_start, $promotion_time_end, $promotion_id]);
        return true;
    }
    // xóa khuyến mãi của sản phẩm
    public function delete($promotion_id){
            $qr = "UPDATE `khuyen mai` SET `tinh trang`= ? WHERE `ma khuyen mai`= ? ";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([0, $promotion_id]);
            return true;
    }
}