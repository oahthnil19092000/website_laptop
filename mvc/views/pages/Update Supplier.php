<main class="main-forms">
    <article class="article-login">
        <section class="login-container">
            <h1>Cập nhật nhà cung cấp</h1>

            <?php
            if (isset($data['error']))
                require_once "mvc/views/blocks/error.php";
            ?>
            <form class="login-form" action="" method="POST">
                <div class="login-item">
                    <table>
                        <tr>
                            <td>
                                Mã nhà cung cấp:
                            </td>
                            <td>
                                <input type="text" placeholder="Tên nhà cung cấp"
                                    value="<?= $data['supplier']['ma ncc'] ?>" disabled>
                                <input type="text" placeholder="Tên nhà cung cấp" name="supplier_id"
                                    value="<?= $data['supplier']['ma ncc'] ?>" hidden required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tên nhà cung cấp:
                            </td>
                            <td>
                                <input type="text" placeholder="Tên nhà cung cấp" name="supplier_name"
                                    value="<?= $data['supplier']['ten ncc'] ?>"
                                    onblur="checkinput(this,'Vui lòng nhập tên nhà cung cấp!')" required>
                                <b class=" error"></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Địa chỉ nhà cung cấp:
                            </td>
                            <td>
                                <input type="text" placeholder="Địa chỉ nhà cung cấp"
                                    value="<?= $data['supplier']['dia chi ncc'] ?>" name="supplier_address"
                                    onblur="checkinput(this,'Vui lòng nhập địa chỉ nhà cung cấp!')" required>
                                <b class=" error"></b>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="submit-container">
                    <div class="submit-item">
                        <button type="button" class="btn btn-cancel"><a href="dashboard/supplier_management">Trở
                                lại</a></button>
                        <button type="submit" name="btnUpdateSupplier" class="btn btn-signup btn-submit"><a>Cập nhật nhà
                                cung
                                cấp</a></button>
                    </div>
                </div>

            </form>
        </section>
    </article>
</main>