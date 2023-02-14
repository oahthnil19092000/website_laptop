<div class="modal__body">
    <div class="auth-form" id="login-form">
        <form method="POST" action="" class="auth-form__container">
            <div class="auth-form__header">
                <h3 class="dangky">Đăng nhập</h3>
                <a href="home/register" class="dangnhap">Đăng ký</a>
            </div>
            <div class="auth-form__form">

                <div class="auth-form__group">
                    <i class="auth-form__group-icon fas fa-user "></i>
                    <input type="text" class="auth-form__input" name="username" placeholder="Tên tài khoản..." required>
                </div>
                <div class="auth-form__group">
                    <i class="auth-form__group-icon fas fa-lock"></i>
                    <input type="password" class="auth-form__input" name="password" placeholder="Mật khẩu..." required
                        data-meta="f">
                </div>

            </div>
            <div class="auth-form__pass">
                <div class="auth-form__help">
                    <a href="home/forgotpws" class="auth-form__help-link auth-form__help-quenmk ">Quên mật khẩu</a>
                    <span class="auth-form__help-gach"></span>
                    <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                </div>
            </div>
            <div class="auth-form__nut">
                <button class="btn btn--normal auth-form__nut-back" type="button" onclick="window.history.back()">TRỞ
                    LẠI</button>
                <button class="btn btn--primary" name="loginBtn" type="submit">ĐĂNG NHẬP</button>
            </div>
        </form>
    </div>
</div>