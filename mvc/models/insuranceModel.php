<?php
class insuranceModel extends DB{
    //lấy tất cả bảo hành
    public function selectAll()
    {
        $qr = "SELECT * FROM `bao hanh`";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // lấy thời gian bảo hành
    public function select($insurance_id)
    {
        $qr = "SELECT * FROM `bao hanh` WHERE `ma bao hanh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$insurance_id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    // lấy mã bảo hành với thời gian | nếu k có thì thêm dô rồi cho ra mã bảo hành
    public function insuranID($insurance_time)
    {
        $qr = "SELECT * FROM `bao hanh` WHERE `thoi han bao hanh` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$insurance_time]);
        $data = $stmt->fetchAll();
        if(!empty($data))
            return $data[0]['ma bao hanh'];
        else return $this->insert($insurance_time);
    }
    // thêm bảo hành rồi trả về mã bảo hành
    public function insert($insurance_time)
    {
        $qr = "INSERT INTO `bao hanh`(`thoi han bao hanh`) VALUES (?)";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$insurance_time]);
        $qr = "SELECT * FROM `bao hanh` ORDER BY `ma bao hanh` DESC LIMIT 1";
        $stmt = $this->conn->query($qr);
        $data = $stmt->fetchAll();
        return $data[0]['ma bao hanh'];
    }
}