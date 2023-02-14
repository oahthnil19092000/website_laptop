<div class="modal__body">
    <div class="auth-form" id="login-form">
        <form method="POST" action="" class="auth-form__container">
            <div class="auth-form__header">
                <h3 class="dangky">Đăng ký</h3>
                <a href="home/login" class="dangnhap">Đăng nhập</a>
            </div>
            <?php require_once "mvc/views/blocks/error.php" ?>
            <div class="auth-form__form">
                <div>
                    <div class="auth-form__group">
                        <label for="">Họ và Tên:</label>
                        <input type="text" class="auth-form__input" name="name" placeholder="Nhập họ và tên của bạn"
                            required>
                    </div>
                    <div class="auth-form__group">
                        <label for="">Ngày Sinh:</label>
                        <input type="date" class="auth-form__input" name="birthday" placeholder="Ngày sinh của bạn"
                            required>
                    </div>
                    <div class="auth-form__group">
                        <label for="">Số điện thoại:</label>
                        <input type="text" class="auth-form__input" name="phone"
                            placeholder="Nhập số điện thoại của bạn" required>
                    </div>
                    <div class="auth-form__group">
                        <label for="">Tên tài khoản:</label>
                        <input type="text" class="auth-form__input" name="username"
                            placeholder="Nhập tên tài khoản của bạn" required>
                    </div>
                    <div class="auth-form__group">
                        <label for="">Email:</label>
                        <input type="text" class="auth-form__input" name="email" placeholder="Email của bạn" required>
                    </div>
                    <div class="auth-form__group">
                        <label for="">Địa chỉ:</label>
                        <input type="text" class="auth-form__input" name="address" placeholder="Địa chỉ của bạn"
                            required>
                    </div>
                    <div class="auth-form__group">
                        <label for="">Mật Khẩu:</label>
                        <input type="password" class="auth-form__input" name="password" placeholder="Mật khẩu của bạn"
                            required data-meta="f">
                    </div>
                    <div class="auth-form__group">
                        <label for="">Nhập Lại Mật Khẩu:</label>
                        <input type="password" class="auth-form__input" name="password"
                            placeholder="Nhập lại mật khẩu của bạn" required data-meta="f">
                    </div>
                </div>
            </div>
            <!-- <div class="auth-form__pass">
                        <div class="auth-form__help">
                            <a href="" class="auth-form__help-link auth-form__help-quenmk ">Quên mật khẩu</a>
                            <span class="auth-form__help-gach"></span>
                            <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                        </div>
                    </div> -->
            <div class="auth-form__nut">
                <button class="btn btn--normal auth-form__nut-back" type="button" onclick="window.history.back()">TRỞ
                    LẠI</button>
                <button class="btn btn--primary" name="btnRegister" type="submit">ĐĂNG KÝ</button>
            </div>
        </form>
    </div>
</div>