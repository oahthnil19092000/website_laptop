<main class="main-forms">
    <article class="article-login">
        <section class="login-container">
            <h1>Thêm nhà cung cấp</h1>

            <?php
            if (isset($data['error']))
                require_once "mvc/views/blocks/error.php";
            ?>
            <form class="login-form" action="" method="POST">
                <div class="login-item">
                    <table style="font-size: 1rem;">
                        <tr>
                            <td>
                                Tên nhà cung cấp:
                            </td>
                            <td>
                                <input type="text" placeholder="Tên nhà cung cấp" name="supplier_name"
                                    onblur="checkinput(this,'Vui lòng nhập tên nhà cung cấp!')" required>
                                <b class=" error"></b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Địa chỉ nhà cung cấp:
                            </td>
                            <td>
                                <input type="text" placeholder="Địa chỉ nhà cung cấp" name="supplier_address"
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
                        <button type="submit" name="btnAddSupplier" class="btn btn-signup btn-submit"><a>Thêm nhà cung
                                cấp</a></button>
                    </div>
                </div>

            </form>
        </section>
    </article>
</main>