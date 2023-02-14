<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <base href="/NLNGANH/" target="_self">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="public/imgs/icon.png">
    <!-- Bootstrap core CSS -->
    <link href="public/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="public/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="public/assets/jquery-1.11.3.min.js"></script>
</head>

<body style="padding:0">
    <?php
    require_once "./mvc/views/blocks/config.php";
    $vnp_SecureHash = $data['vnp_SecureHash'];
    $inputData = array();
    foreach ($data as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }
    unset($inputData['vnp_SecureHashType']);
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . $key . "=" . $value;
        } else {
            $hashData = $hashData . $key . "=" . $value;
            $i = 1;
        }
    }

    //$secureHash = md5($vnp_HashSecret . $hashData);
    $secureHash = hash('sha256', $vnp_HashSecret . $hashData);
    ?>
    <!--Begin display -->
    <div class="container" style="min-width:100%;">
        <div class='window'>
            <div class="header clearfix">
                <h1 class="text-muted" style="margin: auto; text-transform: uppercase;">Thông tin thanh toán</h1>
            </div>
            <div class="table-responsive" style="padding: 0 20px;">
                <div class="form-group">
                    <label class="a1">Mã đơn hàng:</label>

                    <label><?php echo $data['vnp_TxnRef'] ?></label>
                </div>
                <div class="form-group">

                    <label class="a1">Số tiền:</label>
                    <label><?= number_format($data['vnp_Amount'] / 100, 0, ",", ".") ?> VNĐ</label>
                </div>
                <div class="form-group">
                    <label class="a1">Nội dung thanh toán:</label>
                    <label><?php echo $data['vnp_OrderInfo'] ?></label>
                </div>
                <div class="form-group">
                    <label class="a1">Mã phản hồi (vnp_ResponseCode):</label>
                    <label><?php echo $data['vnp_ResponseCode'] ?></label>
                </div>
                <div class="form-group">
                    <label class="a1">Mã GD Tại VNPAY:</label>
                    <label><?php echo $data['vnp_TransactionNo'] ?></label>
                </div>
                <div class="form-group">
                    <label class="a1">Mã Ngân hàng:</label>
                    <label><?php echo $data['vnp_BankCode'] ?></label>
                </div>
                <div class="form-group">
                    <label class="a1">Thời gian thanh toán:</label>
                    <label><?php echo $data['vnp_PayDate'] ?></label>
                </div>
                <div class="form-group">
                    <label class="a1">Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($data['vnp_ResponseCode'] == '00') {

                                echo "GD Thanh cong";
                            } else {
                                echo "GD Khong thanh cong";
                            }
                        } else {
                            echo "Chu ky khong hop le";
                        }
                        ?>

                    </label>
                </div>
                <div class="form-group">
                    <a href="./" style="color:white; width:100%; font-size:20px; text-decooration:none"><button>Quay
                            lại</button></a>
                </div>
            </div>
            <footer class="footer">
                <p>© 2022 - Bản quyền của Lapop Thảo Linh - laptopthaolinh199.com</p>
            </footer>
        </div>
    </div>
</body>

</html>