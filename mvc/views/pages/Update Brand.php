<main class="main-forms">
    <article class="article-login">
        <section class="login-container">
            <h1>Cập nhật thương hiệu</h1>

            <?php
            if (isset($data['error']))
                require_once "mvc/views/blocks/error.php";
            ?>
            <form class="login-form" action="" method="POST">
                <div class="login-item">
                    <table>
                        <tr>
                            <td>
                                Mã thương hiệu:
                            </td>
                            <td>
                                <input type="text" value="<?= $data['brand']['id'] ?>" disabled>
                                <b class=" error"></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tên thương hiệu:
                            </td>
                            <td>
                                <input type="text" placeholder="Tên thương hiệu" name="brand_name"
                                    value="<?= $data['brand']['name'] ?>"
                                    onblur="checkinput(this,'Vui lòng nhập tên thương hiệu!')" required>
                                <b class=" error"></b>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="submit-container">
                    <div class="submit-item">
                        <button type="button" class="btn btn-cancel"><a href="home">Trở lại</a></button>
                        <button type="submit" name="btnUpdateBrand" class="btn btn-signup btn-submit"><a>Cập nhật
                                thương hiệu</a></button>
                    </div>
                </div>

            </form>
        </section>
    </article>
</main>