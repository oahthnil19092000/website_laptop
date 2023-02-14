<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once "mvc/views/blocks/head.php";
    ?>
</head>
<body>
<div class="app">
    <header class="header">
    <?php
    require_once "mvc/views/blocks/".$data['header'].".php";
    ?>
    </header>
    <nav>
    <?php
    require_once "mvc/views/blocks/nav.php";
    ?>
    </nav>
    <main>
    <?php
    require_once "mvc/views/pages/".$data['page'].".php";
    ?>
    </main>
    <footer class="footer">
    <?php
    require_once "mvc/views/blocks/footer.php";
    ?>  
    </footer>
</div>
<?php 
require_once "mvc/views/blocks/scripts.php";
?>
</body>
</html>
<?php
// đây giao diện bên kia bạn thiết kế
// chia ra làm nhiều phần nhỏ đúng hong đr
// rồi header bạn để trong file header ok
//rồi cái phần quản cáo á tui k biết nó là cái gì nên tui để đại dô nav ok
// rồi phần nội dung chính thì ở trong file Home home của cái pages đúng ời
// rồi tới phần footer rồi cái scripts nữa
// chỉ là tách nó ra thôi ok
// đây giả sử cái mình saiaf mấy cái kia y chang hết mà cái home khác thì làm gì
// giả sử mình k sài Home mà mình sài Contact thì làm sao để đổi qua  
// làm sao ta 
// đổi cái bên kia đúng ròi quá giỏi 10 điểm luôn 