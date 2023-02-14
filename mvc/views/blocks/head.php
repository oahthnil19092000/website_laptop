<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $data['page']?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<base href="/NLNGANH/" target="_self">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
<link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@500&amp;display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<link rel="stylesheet" href="public/css/index.css">
<link rel="stylesheet" href="public/css/base.css">
<link rel="stylesheet" href="public/css/sanpham.css">
<link rel="stylesheet" href="public/css/giohang.css">
<link rel="stylesheet" href="public/css/login.css">
<link rel="stylesheet" href="public/css/taikhoan.css">
<link rel="stylesheet" href="public/css/themthongtin.css">
<link rel="icon" href="public/upload/logo1.png" type="image/x-icon">
<script src="public/js/script.js"></script>
<script src="public/js/forms.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php 
if($data['page'] == "Shoping Cart"){ ?>
<link rel="stylesheet" href="public/css/re css/shoppingcart.css">
<link rel="stylesheet" href="public/css/re css/ordersplaced.css">
<link rel="stylesheet" href="public/css/re css/forms.css">
<script src="public/js/configs.js"></script>
<script src="public/js/product.js"></script>
<script src="public/js/forms.js"></script>
<script src="public/js/shoppingcart.js"></script>
<?php }
?>