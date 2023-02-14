<main class="main-forms">
    <article class="article-login">
        <section class="login-container">
            <h1>Thêm seri sản phẩm</h1>

            <?php
            if (isset($data['error']))
                require_once "mvc/views/blocks/error.php";
            else if (isset($data['success']))
            require_once "mvc/views/blocks/success.php";
            ?>
            <form class="login-form" action="" method="POST">
                <div class="login-item">
                    <table style="font-size: 1rem;">
                        <tr>
                            <td>
                                Tên sản phẩm:
                            </td>
                            <td>
                                <input type="text" placeholder="Tên loại sản phẩm"
                                    value="<?= $data['product']['ten sp'] ?>" disabled>
                                <input type="text" name="product_id" value="<?= $data['product']['ma sp'] ?>" hidden>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Số Seri sản phẩm:
                            </td>
                            <td>
                                <input type="text" placeholder="Seri sản phẩm" name="seri"
                                    onblur="checkinput(this,'Vui lòng nhập số Seri sản phẩm!')" required>
                                <b class=" error"></b>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="submit-container">
                    <div class="submit-item">
                        <button type="button" class="btn btn-cancel"><a href="dashboard/product_management">Trở
                                lại</a></button>
                        <button type="submit" name="btnAddActualProduct" class="btn btn-signup btn-submit"><a>Thêm
                                seri</a></button>
                    </div>
                </div>

            </form>
        </section>
    </article>
</main>