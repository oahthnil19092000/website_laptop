<main class="main-forms">
    <article class="article-login">
        <section class="article-addproduct">
            <h1>Cập nhật chương trình khuyến mãi</h1>

            <?php
            if (isset($data['error']))
                require_once "mvc/views/blocks/error.php";
            ?>
            <form class="login-form" action="" method="POST" enctype="multipart/form-data">
                <div class="login-item">
                    <table class="w-100">
                        <tr>
                        <tr>
                            <td>Mã chương trình khuyến mãi:</td>
                            <td>
                                <input type="text" value="<?= $data['promotion']['ma khuyen mai'] ?>" disabled />
                            </td>
                        </tr>

                        <td>
                            Tên chương trình khuyến mãi:
                        </td>
                        <td>
                            <input type="text" placeholder="Tên khuyến mãi" name="promotion_name"
                                value="<?= $data['promotion']['ten khuyen mai'] ?>"
                                onblur="checkinput(this,'Vui lòng nhập tên khuyến mãi!')" required>
                            <b class=" error"></b>
                        </td>
                        </tr>
                        <tr>
                            <td>Thời gian bắt đầu:</td>
                            <td>
                                <input type="date" name="promotion_start_day"
                                    value="<?= date_format(date_create($data['promotion']['tg bat dau']),"Y-m-d") ?>"
                                    onblur="checkinput(this,'Vui lòng chọn ngày bắt đầu khuyến mãi!');document.getElementsByName('promotion_end_day')[0].min=this.value"
                                    required>
                                <b class=" error"></b>
                            </td>
                        </tr>

                        <tr>
                            <td>Thời gian kết thúc:</td>
                            <td>
                                <input type="date" name="promotion_end_day"
                                    value="<?= date_format(date_create($data['promotion']['tg ket thuc']),"Y-m-d") ?>"
                                    onblur="checkinput(this,'Vui lòng chọn ngày kết thúc khuyến mãi!')" required>
                                <b class=" error"></b>
                            </td>
                        </tr>


                    </table>
                </div>
                <div class="submit-container">
                    <div class="submit-item">
                        <button type="button" class="btn btn-cancel"><a href="dashboard/promotion_management">Trở
                                lại</a></button>
                        <button type="submit" name="btnUpdatePromotion" class="btn btn-signup btn-submit"><a>Cập nhật
                                chương
                                trình
                                khuyến mãi</a></button>
                    </div>
                </div>

            </form>
        </section>
    </article>
</main>