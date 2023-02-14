<?php
class parameterModel extends DB
{
    // lấy hết thông số
    public function selectAll()
    {
        $qr = "SELECT * FROM `thong so ky thuat`";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // lấy mã thông số dựa trên tên ts
    public function selectIDWithName($specification_name)
    {
        $qr = "SELECT * FROM `thong so ky thuat` WHERE `thong so` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$specification_name]);
        $data = $stmt->fetchAll();
        if (!empty($data))
            return $data[0]['ma ts'];
        else return 0;
    }
    // lấy tên thông số dựa trên ma ts
    public function selectNameWithID($specification_id)
    {
        $qr = "SELECT * FROM `thong so ky thuat` WHERE `ma ts` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$specification_id]);
        $data = $stmt->fetchAll();
        if (!empty($data))
            return $data[0]['thong so'];
        else return 0;
    }
    public function selectWithType($specification_type_id)
    {
        $qr = "SELECT * FROM `thong so ky thuat` WHERE `ma loai ts` = ?";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([$specification_type_id]);
        $data = $stmt->fetchAll();
        return $data;
    }
}