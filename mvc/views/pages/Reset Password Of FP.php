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
                    <input type="password" name="repass" placeholder="Mật khẩu" class="inputText" required />
                </div>
                <div class="email">
                    <span class="floating-label">Vui lòng nhập lại mật khẩu mới</span>
                    <input type="password" name="repass2" placeholder="Nhập lại mật khẩu" class="inputText" required />
                </div>
                <div class="email">
                    <input type="checkbox" id="show_password" onchange="showpass(this);">
                    <span class="floating-label">Hiện mật khẩu</span>
                </div>
                <div style="display: flex; justify-content:center; margin:10px 0;">
                    <button type="button" style="padding: 10px 20px; background: #407dd4;height: unset"
                        class="register-buttton" onclick="window.history.back(-1)">
                        Trở lại</button>
                    <input type="submit" style="padding: 10px 20px; background: #407dd4;height: unset" name="resetpass"
                        class="register-buttton" value="Đổi mật khẩu" name="register">

                </div>
            </div>
        </div>
    </div>
</form>