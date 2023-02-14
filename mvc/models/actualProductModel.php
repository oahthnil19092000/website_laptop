<?php
class actualProductModel extends DB
{
    // lấy 1 seri của sản phẩm thực tế có mã sp =  product_id
    function selectID($product_id)
    {
        $qr = "SELECT * FROM `san pham cu the` WHERE `ma sp`= ? AND `so hd` IS NULL LIMIT 1";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id]);
        $data = $stmt->fetchAll();
        return $data[0]['so seri'];
    }
    function count($product_id)
    {
        $qr = "SELECT * FROM `san pham cu the` WHERE `ma sp`= ? AND `so hd` IS NULL";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_id]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return count($data);
        else return 0;
    }
    function exist($product_seri)
    {
        $qr = "SELECT * FROM `san pham cu the` WHERE `so seri`= ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$product_seri]);
        $data = $stmt->fetchAll();
        if(!empty($data)){
            return true;
        }
        else{
        } return false;
    }
    // thêm sản phẩm thực tế mưới
    function insert($product_id, $product_seri)
    {
        if(!$this->exist($product_seri)){
            $qr = "INSERT INTO `san pham cu the`(`ma sp`, `so seri`) VALUES (?,?)";
            $stmt = $this->conn->prepare($qr);
            $stmt->execute([$product_id, $product_seri]);
            
            return true;
        }
        else return false;
        
    }
    // đặt mua sản phẩm có số seri = product_seri với hóa đơn có so hd = order_id
    function buy($product_id,$order_id)
    {
        $qr = "UPDATE `san pham cu the` SET `so hd`= ? WHERE `ma sp`= ? LIMIT 1";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$order_id,$product_id]);
        return true;
    }
}