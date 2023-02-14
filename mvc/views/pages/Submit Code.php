<style>
@import url("https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css");
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');

/* * {
    font-family: 'Montserrat', sans-serif;
} */



h1 {
    color: #8291ac;
    font-size: 1.2rem;
}

.content {
    height: 60%;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -ms-flex-align: center;
    -webkit-align-items: center;
    -webkit-box-align: center;
    align-items: center;
    flex-direction: column;
    background: aliceblue;
}

.wrapper {
    position: relative;
    width: 430px;
    margin: 137.5px auto;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 0 26px rgba(0, 0, 0, 0.13);
}

@media screen and (max-width: 750px) {
    .wrapper {
        width: 90%;
    }
}

@media screen and (max-width: 480px) {
    .wrapper {
        width: 100%;
    }
}

.registred {
    position: relative;
    width: 300px;
    height: 160px;
    background: #fff;
    display: none;
    margin: 15px auto;
    text-align: center;
}

.registred button {
    width: 90px;
    background: #fda2ba;
    border: none;
    border-radius: 5px;
    padding: 0px 15px;
    position: absolute;
    bottom: 18px;
    right: 18px;
    color: #fff;
}

.registred h1 {
    font-size: 1rem;
}

.login--content {
    display: none;
}

.register--content,
.login--content {
    width: 300px;
    margin: 20px 20px 20px 50px;
}

.floating-label {
    position: absolute;
    pointer-events: none;
    left: 0px;
    top: 20px;
    font-size: 16px;
    color: #b3bbce;
    transition: 0.2s ease all;
}

.email,
.password,
.name {
    position: relative;
    margin: 10px 0;
}

.inputText {
    font-size: 12px;
    width: 100%;
    height: 40px;
    border: none;
    border-bottom: 1px solid #b3bbce;
    outline: none;
    color: #9390a1;
    font-weight: 900;
}

input:focus~.floating-label,
input:not(:focus):valid~.floating-label {
    top: 2px;
    bottom: 10px;
    left: 0px;
    font-size: 11px;
    opacity: 1;
    color: #fda2ba;
}

.social {
    width: 100%;
    background: #3b5999;
    height: 40px;
    line-height: 35px;

    text-align: center;
    border-radius: 5px;
}

.social a {
    text-decoration: none;
    line-height: 45px;
    color: #fff;
}

.social span i {
    color: #fff;
    float: left;
    line-height: 45px;
    margin-left: 26px;
}

.via-email {
    text-align: center;
    padding: 20px 0;
    color: #8291ac;
}

input[type="submit"] {
    width: 100%;
    position: relative;
    height: 40px;
    background-color: #68a7e0;
    color: #fff;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    margin: 24px 0 16px;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1.1rem;
    letter-spacing: 0.1rem;
    font-weight: 100;
}

.login--button {
    /* position: absolute; */
    /* top: -30px; */
    /* right: 0; */
    text-align: right;
}

.login--button a {
    background: #fda2ba;
    padding: 7px 14px;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}
</style>

<body>
    <form action="" method="post">
        <div class="content">
            <div class="wrapper">

                <div class="register--content">
                    <h1>Mã xác nhận</h1>

                    <?php if (session_id() === '') session_start();
                    date_default_timezone_set("Asia/Ho_Chi_Minh");
                            
                        ?>
                    <div><?= isset($data['message']) ? $data['message'] : "" ?></div>
                    <div class="email">
                        <input type="text" name="code" class="inputText" required />
                        <span class="floating-label">Vui lòng điền mã xác thực</span>
                    </div>

                    <input type="submit" class="register-buttton" value="Kiểm tra" name="register">
                    <div class="login--button">
                        <span>Gửi lại
                            mã xác nhận</span>
                        <a class="btn" data-popup-open="register-popup" href="home/handle_forgotpws/resend_code">Gửi
                            lại</a>
                    </div>


                </div>
            </div>
        </div>
    </form>
</body>