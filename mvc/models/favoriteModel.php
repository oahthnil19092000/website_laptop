<?php 
class favoriteModel extends DB{
    public function select($customer_id){
        $qr = "SELECT * FROM `yeu thich` WHERE `ma kh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$customer_id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    
    public function count($customer_id){
        $qr = "SELECT * FROM `yeu thich` WHERE `ma kh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$customer_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return count($data);
        else return 0;
    }
    
    public function exist($customer_id, $product_id){
        $qr = "SELECT * FROM `yeu thich` WHERE `ma kh` = ? AND `ma sp` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$customer_id, $product_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return true;
        else return false;
    }
    
    public function insert($customer_id, $product_id){
        if(!$this->exist($customer_id, $product_id)){
            $qr = "INSERT INTO `yeu thich`(`ma kh`, `ma sp`) VALUES (?, ?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$customer_id, $product_id]);
            return true;
        }
        else return false;
    }
    
    public function delete($customer_id, $product_id){
        if($this->exist($customer_id, $product_id)){
            $qr = "DELETE FROM `yeu thich` WHERE `ma kh` = ? AND `ma sp` = ?";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$customer_id, $product_id]);
            return true;
        }
        else return false;
    }
}