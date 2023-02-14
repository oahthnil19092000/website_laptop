<div class="main-forms my-5">
    <div class="article-addproduct">
        <h1>Thêm sản phẩm</h1>
        <form class="addproduct-form" action="" method="POST" enctype="multipart/form-data">
            <div class="addproduct-item">
                <table class="table-1" style="font-size: 1rem;">
                    <tr>
                        <td>Tên sản phẩm:</td>
                        <td>
                            <input type="text" placeholder="Tên sản phẩm" name="product_name"
                                onblur="checkinput(this,'Vui lòng nhập tên sản phẩm!')" required>
                            <b class="error"></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Giá sản phẩm:</td>
                        <td>
                            <input type="number" placeholder="Giá sản phẩm" name="product_price" min="10000"
                                step="10000" onblur="checkinput(this,'Vui lòng nhập giá sản phẩm!')" required>
                            <b class="error"></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Phân loại:</td>
                        <td>
                            <select name="category_id">
                                <?php foreach ($data['product']['category'] as $category) { ?>
                                <option value="<?= $category['ma loai sp'] ?>"><?= $category['ten loai sp'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Hạn bảo hành:</td>
                        <td>
                            <select name="insurance_id">
                                <?php foreach ($data['product']['insurance'] as $insurance) { ?>
                                <option value="<?= $insurance['ma bao hanh'] ?>">
                                    <?= $insurance['thoi han bao hanh'] == 0 ? "Không bảo hành" : $insurance['thoi han bao hanh']." Tháng" ?>
                                </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ảnh sản phẩm:</td>
                        <td>
                            <input type="file" name="addproduct-imgs[]" alt="" accept="image/*" onchange="imgschange()"
                                required />
                        </td>
                    </tr>

                </table>
                <table style="font-size: 1rem;">

                    <tr>
                        <td colspan="2">Loại thông số:</td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <select name="specification_type_id" id="specification_type"
                                onchange="specification1(document.getElementById('specification'), this)">
                                <?php foreach ($data['product']['specification_type'] as $specification_type) { ?>
                                <option value="<?= $specification_type['ma loai ts'] ?>">
                                    <?= $specification_type['ten loai ts'] ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Thông số sản phẩm:(Xóa khi giá trị rỗng)</td>
                    </tr>
                    <tr>
                        <td>
                            <select id="specification">
                                <?php foreach ($data['product']['specification'] as $specification) { ?>
                                <option value="<?= $specification['thong so']?>">
                                    <?= $specification['thong so']?>
                                </option>
                                <?php } ?>
                            </select>
                        </td>
                        <td colspan="1" rowspan="1">
                            <input type="text" id="content" placeholder="Giá trị thông số">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <button class="btn w-50" type="button"
                                onclick="addparameter(document.getElementById('content'),document.getElementById('specification'))">
                                Thêm
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Mô tả sản phẩm:</td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="4">
                            <textarea name="description" onblur="checkinput(this,'Vui lòng nhập mô tả sản phẩm!')"
                                required></textarea>
                            <b class="error"></b>
                        </td>

                    </tr>
                </table>
                <textarea name="specification" id="parameters" hidden></textarea>
                <table id="parameters-table">
                    <tr>
                        <th>Bảng thông số</th>
                        <th></th>
                    </tr>
                </table>
            </div>
            <div class="product-added-img">
            </div>
            <div class="submit-container">
                <div class="submit-item">
                    <button type="button" class="btn btn-cancel"><a href="dashboard/product_management">Trở
                            lại</a></button>
                    <button type="submit" class="btn btn-signup" name="btnAddProduct"><a>Thêm sản phẩm</a></button>
                </div>
            </div>

        </form>
    </div>
</div>