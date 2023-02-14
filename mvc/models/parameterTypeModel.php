<?php
class parameterTypeModel extends DB
{
    // lấy hết thông số
    public function selectAll()
    {
        $qr = "SELECT * FROM `loai thong so ky thuat`";
        $stmt = $this->conn->prepare($qr);
        $stmt->execute([]);
        $data = $stmt->fetchAll();
        return $data;
    }
}