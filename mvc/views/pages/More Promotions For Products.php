<main class="main-forms">
    <article class="article-login">
        <section class="article-addproduct">
            <h1>Thêm khuyến mãi cho sản phẩm</h1>

            <?php
            if (isset($data['error']))
                require_once "mvc/views/blocks/error.php";
            ?>
            <form class="login-form" action="" method="POST" enctype="multipart/form-data">
                <div class="login-item">
                    <table class="w-100" style="font-size: 1rem;">
                        <tr>
                        <tr>
                            <td>Tên chương trình khuyến mãi:</td>
                            <td>
                                <input type="text" value="<?= $data['promotion']['ten khuyen mai']?>" disabled />
                            </td>
                        </tr>

                        <td>
                            Tên sản phẩm:
                        </td>
                        <td>
                            <select name="product_id" required>
                                <option value="">Chọn sản phẩm</option>
                                <?php 
                                foreach ($data['product'] as $product) { ?>
                                <option value="<?= $product['ma sp'] ?>"><?= $product['ten sp'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td>Phần trăm khuyến mãi:</td>
                            <td>
                                <div class="d-flex">
                                    <input type="number" name="promotion_details_percentage" min="0" max="95" value="5"
                                        step="5" required><span class="mx-5 my-auto display-5"> %</span>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="submit-container">
                    <div class="submit-item">
                        <button type="button" class="btn btn-cancel"><a href="dashboard/promotion_management">Trở
                                lại</a></button>
                        <button type="submit" name="btnAddProductPromotion" class="btn btn-signup btn-submit"><a>Thêm
                                khuyến
                                mãi cho sản phẩm</a></button>
                    </div>
                </div>

            </form>
        </section>
    </article>
</main>