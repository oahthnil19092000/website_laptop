<?php 
    if($data['header_data']['level'] == 1){
        $customer_id = "ma kh";
    $customer_name = "ho ten kh";
    $customer_birthday = "ngay sinh";
    $customer_phone = "so dien thoai";
    $customer_address = "dia chi";
    } else {
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
                            TÀI KHOẢN CỦA TÔI
                        </h3>
                        <ul class="category-taikhoan">
                            <li class="category-tk">
                                <a href="<?= $data['header'] == "header-admin" ? "dashboard" : "home" ?>/update_information/<?= $data['customer'][$customer_id]?>"
                                    class="category-tk__link">Cập nhật tài khoản</a>
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
                        <p>THÔNG TIN CỦA TÔI</p>
                    </div>

                </div>
                <?php 
                if($data['customer'] != "null"){?>
                <div class="chitiettk">
                    <div class="cttk" style="margin-top:5px"> <b class="thongtin-lable">Họ và tên:</b>
                        <div><?= $data['customer'][$customer_name]?></div>
                    </div>
                    <div class="cttk"> <b class="thongtin-lable">Ngày Sinh:</b>
                        <div><?= date_format(date_create($data['customer'][$customer_birthday]),"d/m/Y") ?></div>
                    </div>
                    <div class="cttk"> <b class="thongtin-lable">Email:</b>
                        <div><?= $data['email']['email'] ?></div>
                    </div>
                    <div class="cttk"> <b class="thongtin-lable">Số Điện Thoại:</b>
                        <div><?= "( +84) ".number_format($data['customer'][$customer_phone],0,".", " ") ?></div>
                    </div>
                    <div class="cttk"> <b class="thongtin-lable">Địa chỉ:</b>
                        <div><?= $data['customer'][$customer_address]?></div>
                    </div>
                </div>
                <?php }else {

                }?>
            </div>
        </div>
    </div>
</div>