<main class="main-forms">
    <article class="article-login">
        <section class="login-container">
            <h1>Thêm loại sản phẩm</h1>

            <?php
            if (isset($data['error']))
                require_once "mvc/views/blocks/error.php";
            ?>
            <form class="login-form" action="" method="POST">
                <div class="login-item">
                    <table style="font-size: 1rem;">
                        <tr>
                            <td>
                                Tên loại sản phẩm:
                            </td>
                            <td>
                                <input type="text" placeholder="Tên loại sản phẩm" name="category_name"
                                    onblur="checkinput(this,'Vui lòng nhập tên loại sản phẩm!')" required>
                                <b class=" error"></b>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Nhà cung cấp:
                            </td>
                            <td>
                                <select type="text" name="supplier_id"
                                    onchange="checkinput(this,'Vui lòng chọn nhà cung cấp!')" required>
                                    <option value="">---Chọn nhà cung cấp---</option>
                                    <?php foreach($data['supplier'] as $supplier){ ?>
                                    <option value="<?= $supplier['ma ncc'] ?>"><?= $supplier['ten ncc'] ?></option>
                                    <?php }?>
                                </select>
                                <b class=" error"></b>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="submit-container">
                    <div class="submit-item">
                        <button type="button" class="btn btn-cancel"><a href="dashboard/caterogy_management">Trở
                                lại</a></button>
                        <button type="submit" name="btnAddCategory" class="btn btn-signup btn-submit"><a>Thêm loại sản
                                phẩm</a></button>
                    </div>
                </div>

            </form>
        </section>
    </article>
</main>