<main class="main-forms">
    <article class="article-login">
        <section class="article-addproduct">
            <h1>Thêm thương hiệu</h1>

            <?php
            if (isset($data['error']))
                require_once "mvc/views/blocks/error.php";
            ?>
            <form class="login-form" action="" method="POST" enctype="multipart/form-data">
                <div class="login-item">
                    <table style="font-size: 1rem;">
                        <tr>
                            <td>
                                Tên thương hiệu:
                            </td>
                            <td>
                                <input type="text" placeholder="Tên thương hiệu" name="brand_name"
                                    onblur="checkinput(this,'Vui lòng nhập tên thương hiệu!')" required>
                                <b class=" error"></b>
                            </td>
                        </tr>
                        <tr>
                            <td>Ảnh sản phẩm:</td>
                            <td>
                                <input type="file" name="addproduct-imgs[]" alt="" accept="image/*"
                                    onchange="imgschange()" required />
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="product-added-img">
                </div>
                <div class="submit-container">
                    <div class="submit-item">
                        <button type="button" class="btn btn-cancel"><a href="home">Trở lại</a></button>
                        <button type="submit" name="btnAddBrand" class="btn btn-signup btn-submit"><a>Thêm thương
                                hiệu</a></button>
                    </div>
                </div>

            </form>
        </section>
    </article>
</main>