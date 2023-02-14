<?php
// test sau tết
class feedbackModel extends DB{
    // lấy phản hồi của đánh giá có ma dg = comment_id k
    function select($comment_id)
    {
        $qr = "SELECT * FROM `phan hoi` WHERE `ma dg` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$comment_id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // kiểm tra có phản hồi của đánh giá có ma dg = comment_id k
    function exist($comment_id)
    {
        $qr = "SELECT * FROM `phan hoi` WHERE `ma dg` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$comment_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    } 
    //thêm phản hồi
    function insert($comment_id, $feedback_content, $admin_id)
    {
        $qr = "INSERT INTO `phan hoi`(`ma dg`, `nd phan hoi`, `ma ad`) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$comment_id, $feedback_content, $admin_id]);
        return true;
    } 
    function delete($comment_id)
    {
        $qr = "DELETE FROM `phan hoi` WHERE `ma dg` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$comment_id]);
        return true;
    } 
    
}