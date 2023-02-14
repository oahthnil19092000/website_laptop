<main class="main-forms">
    <article class="article-login">
        <section class="article-addproduct">
            <h1>Thêm chương trình khuyến mãi</h1>

            <?php
            if (isset($data['error']))
                require_once "mvc/views/blocks/error.php";
            ?>
            <form class="login-form" action="" method="POST" enctype="multipart/form-data">
                <div class="login-item">
                    <table class="w-100" style="font-size: 1rem;">
                        <tr>
                            <td>
                                Tên chương trình<br>khuyến mãi:
                            </td>
                            <td>
                                <input type="text" placeholder="Tên khuyến mãi" name="promotion_name"
                                    onblur="checkinput(this,'Vui lòng nhập tên khuyến mãi!')" required>
                                <b class=" error"></b>
                            </td>
                        </tr>

                        <tr>
                            <td>Thời gian bắt đầu:</td>
                            <td>
                                <input type="date" name="promotion_start_day"
                                    onblur="checkinput(this,'Vui lòng chọn ngày bắt đầu khuyến mãi!');document.getElementsByName('promotion_end_day')[0].min=this.value"
                                    required>
                                <b class=" error"></b>
                            </td>
                        </tr>

                        <tr>
                            <td>Thời gian kết thúc:</td>
                            <td>
                                <input type="date" name="promotion_end_day"
                                    onblur="checkinput(this,'Vui lòng chọn ngày kết thúc khuyến mãi!')" required>
                                <b class=" error"></b>
                            </td>
                        </tr>
                        <tr>
                            <td>Upload ảnh<br>chương trình khuyến mãi:</td>
                            <td>
                                <input type="file" name="addproduct-imgs[]" accept="image/*" onchange="imgschange()"
                                    required>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="product-added-img">
                </div>
                <div class="submit-container">
                    <div class="submit-item">
                        <button type="button" class="btn btn-cancel"><a href="dashboard/promotion_management">Trở
                                lại</a></button>
                        <button type="submit" name="btnAddPromotion" class="btn btn-signup btn-submit"><a>Thêm chương
                                trình
                                khuyến mãi</a></button>
                    </div>
                </div>

            </form>
        </section>
    </article>
</main>