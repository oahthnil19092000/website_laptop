<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="/NLNGANH/" target="_self">
</head>

<?php
require_once "mvc/core/DB.php";
$db = new DB();
$qr = "INSERT INTO `san pham`(`ma loai sp`, `ten sp`, `gia sp`, `mo ta san pham`, `hinh anh`, `ma bao hanh`, `tinh trang`) VALUES (?, ?, ? ,? , ? ,? ,?)";

$maloaisp=0;
$motasanpham = "";
$mabaohanh = 1; 
$tinhtrang = 1;
$hinhanh[] = "";
$tensp[] = "";
$giasp[] =  "";

echo "<pre>";
for($i = 0 ; $i < count($tensp); $i++){
    $giasp[$i] = str_replace(".","",$giasp[$i]);
    $giasp[$i] = str_replace("₫","",$giasp[$i]);
    $hinhanh[$i] = "public/uploads/".$hinhanh[$i];
    echo $giasp[$i]."<br>";
    // $stmt = $db->conn->prepare($qr);
    // $stmt->execute([$maloaisp,$tensp[$i],$giasp[$i],$motasanpham,$hinhanh[$i],$mabaohanh,1]);
}



// $stmt = $this->conn->prepare($qr);
// $stmt->execute([$username, md5($password), $email, 1]);
?>