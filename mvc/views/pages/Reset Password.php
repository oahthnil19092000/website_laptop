<script>
function showpass(a) {
    var input = document.querySelectorAll("input");
    if (a.checked == true) {
        input[1].type = "text";
        input[2].type = "text";
    } else {
        input[1].type = "password";
        input[2].type = "password";
    }
}
</script>
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
                                href="<?= $data['header'] == "header-admin" ? "dashboard" : "home" ?>/information/<?= $data['customer']?>">TÀI
                                KHOẢN CỦA TÔI</a>
                        </h3>
                        <ul class="category-taikhoan">
                            <li class="category-tk">
                                <a href="<?= $data['header'] == "header-admin" ? "dashboard" : "home" ?>/update_information/<?= $data['customer']?>"
                                    class="category-tk__link">Cập
                                    nhật tài khoản</a>
                            </li>
                            <li class="category-tk" style="margin-left:10px; color:red;">
                                <a <?= $data['customer']?>class="category-tk__link">Đổi mật khẩu</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="chitietthongtin">
                <form method="POST" action="">
                    <div class="content">
                        <div class="wrapper">
                            <div class="register--content">
                                <h1 style="text-align:center">Đổi mật khẩu</h1>
                                <?php
                                    if (isset($data['error']))
                                        require_once "mvc/views/blocks/error.php";
                                ?>
                                <div class="email">
                                    <span class="floating-label">Vui lòng nhập mật khẩu mới</span>
                                    <input type="password" name="repass" placeholder="Mật khẩu" class="inputText"
                                        required />
                                </div>
                                <div class="email">
                                    <span class="floating-label">Vui lòng nhập lại mật khẩu mới</span>
                                    <input type="password" name="repass2" placeholder="Nhập lại mật khẩu"
                                        class="inputText" required />
                                </div>
                                <div class="email">
                                    <input type="checkbox" id="show_password" onchange="showpass(this);">
                                    <span class="floating-label">Hiện mật khẩu</span>
                                </div>
                                <div style="display: flex; justify-content:center; margin:10px 0;">
                                    <button type="button" style="padding: 10px 20px; background: #407dd4;height: unset"
                                        class="register-buttton" onclick="window.history.back(-1)">
                                        Trở lại</button>
                                    <input type="submit" style="padding: 10px 20px; background: #407dd4;height: unset"
                                        name="resetpass" class="register-buttton" value="Đổi mật khẩu" name="register">

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>