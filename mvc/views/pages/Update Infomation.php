<?php 
    if($data['header'] == 'header'){
        $customer_id = "ma kh";
        $customer_name = "ho ten kh";
        $customer_birthday = "ngay sinh";
        $customer_phone = "so dien thoai";
        $customer_address = "dia chi";
    } else{
        $customer_id = "ma ad";
        $customer_name = "ho ten ad";
        $customer_birthday = "ngay sinh";
        $customer_phone = "so dien thoai";
        $customer_address = "dia chi";
    }
    

?>
<div class="app__container">
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-2">
                <div class="thongtintaikhoan">
                    <div class="dmsp_thongtintk">
                        <h3 class="category-heading category-item--active"
                            onclick="if(dmsp.style.display=='none')dmsp.style.display='block'; else dmsp.style.display='none';">
                            <i class="far fa-id-card"></i>

                            <a
                                href="<?= $data['header'] == "header-admin" ? "dashboard" : "home" ?>/information/<?= $data['customer'][$customer_id]?>">TÀI
                                KHOẢN CỦA TÔI</a>
                        </h3>
                        <ul class="category-taikhoan">
                            <li class="category-tk" style="margin-left:10px; color:red;">
                                <a <?= $data['customer'][$customer_id]?>class="category-tk__link">Cập nhật tài khoản</a>
                            </li>
                            <li class="category-tk">
                                <a href="<?= $data['header'] == "header-admin" ? "dashboard" : "home" ?>/reset_password"
                                    class="category-tk__link">Đổi mật khẩu</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="chitietthongtin">
                <div class="thongtin-heading">
                    <div>
                        <p>CẬP NHẬT THÔNG TIN CỦA TÔI</p>
                    </div>
                    <?php
                        if (isset($data['error']))
                            require_once "mvc/views/blocks/error.php";
                    ?>
                    <style>
                    label {
                        display: flex;
                        width: unset;
                    }

                    label input {
                        width: 80% !important;
                        margin-left: 20px;
                    }

                    label b {
                        width: 120px !important;
                    }
                    </style>
                    <div>
                        <form action="" method="post">
                            <input type="text" name="thongtinnd-id" value="<?= $data['customer'][$customer_id]?>"
                                hidden>
                            <div class="update_thongtin">
                                <div class="item1">
                                    <div class="namekh">
                                        <label>
                                            <b>Tên người dùng:</b>
                                            <input type="text" name="thongtinnd-name" class="inputText"
                                                placeholder="Vui lòng nhập tên"
                                                value="<?= $data['customer'][$customer_name]?>" required />
                                        </label>
                                    </div>

                                    <div class="ngaysinh">
                                        <label>
                                            <b>Ngày sinh:</b>
                                            <input type="date" name="thongtinnd-birthday" class="inputText"
                                                value="<?= $data['customer'][$customer_birthday]?>" required />
                                        </label>
                                    </div>
                                    <div class="diachi">
                                        <label>
                                            <b>Địa chỉ:</b>
                                            <input type="text" name="thongtinnd-diachi" class="inputText"
                                                value="<?= $data['customer'][$customer_address]?>" required />
                                        </label>
                                    </div>
                                </div>

                                <div class="item2">
                                    <div class="cmnd">
                                        <label>
                                            <b>Email:</b>
                                            <input type="email" class="inputText" name="thongtinnd-email"
                                                placeholder="Vui lòng nhập Email" value="<?= $data['email']['email']?>"
                                                required />
                                        </label>
                                    </div>
                                    <div class="tel">
                                        <label>
                                            <b>Số điện thoại:</b>
                                            <input type="tel" class="inputText" name="thongtinnd-tel"
                                                placeholder="Vui lòng nhập số điện thoại"
                                                value="<?=$data['customer'][$customer_phone] ?>" required />
                                        </label>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <input type="submit" class="register-buttton" value="Lưu Thông Tin"
                        style="padding: 10px 20px; background: #407dd4;height: unset" name="register">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>