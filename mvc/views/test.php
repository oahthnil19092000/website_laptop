<?php

require_once "mvc/core/DB.php";

$db = new DB();

$user_id =1 ;
$qr = "SELECT b.* FROM `hoa don` a JOIN `gio hang` b ON (a.`ma gh` = b.`ma gh`) WHERE `ma kh` = ?";
$stmt = $db->conn->prepare($qr);
$stmt->execute([$user_id]);
$data = $stmt->fetchAll();
echo "<pre>";
var_dump($data);