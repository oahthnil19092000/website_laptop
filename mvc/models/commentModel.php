<?php 
class commentModel extends DB{
    
    public function selectAll(){
        $qr = "SELECT * FROM `binh luan`";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // lấy tất cả bình luận của 1 sản phẩm với mã kh
    public function selectAllOfProduct($product_id){
        $qr = "SELECT * FROM `binh luan` WHERE `ma sp` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // lấy tất cả bình luận của 1 sản phẩm với mã kh
    public function selectAllOfCustomer($customer_id){
        $qr = "SELECT * FROM `binh luan` WHERE `ma kh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$customer_id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // lấy điểm đánh giá trung bình của một sản phẩm
    public function averageRatingOfProduct($product_id){
        $qr = "SELECT * FROM `binh luan` WHERE `ma sp` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id]);
        $data = $stmt->fetchAll();
        if(!empty($data)){
            $rating = 0 ;
            foreach($data as $comment){
                $rating += $comment['diem dg'];
            }
            return number_format($rating/count($data),1,".",",");
        }
        else return 5;
    }
    
    // kiểm tra xem có tồn tại bình luận này không
    public function exist($product_id, $customer_id){
        $qr = "SELECT * FROM `binh luan` WHERE `ma sp` = ? AND `ma kh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id, $customer_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    // Thêm bình luận
    public function insert($product_id, $customer_id, $comment_content, $score_rating){
        if(!$this->exist($product_id, $customer_id)){
            $qr = "INSERT INTO `binh luan`(`ma sp`, `ma kh`, `nd danh gia`, `diem dg`) VALUES (? , ? , ? , ?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$product_id, $customer_id, $comment_content, $score_rating]);
            return true;
        } else return false;
    }
    // Xóa bình luận
    public function delete($comment_id){
        $qr = "DELETE FROM `binh luan` WHERE `ma dg` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$comment_id]);
        return true;
    }
    

}