<div class="card">
    <div class="card-header">
        <h3 class="card-title ">
            <div class="h3">Quản lý Sản phẩm</div>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <style>
        th {
            text-align: center;
        }
        </style>
        <div class="row">
            <div class="col-sm-12">

                <table id="example2" class="table table-bordered table-striped">
                    <thead style="background: #007bff6e;">
                        <tr style="font-size: 0.9rem;">
                            <th>Mã <br>sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Thương hiệu</th>
                            <th>Bảo hành</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_product_management" style="font-size: 0.9rem;">
                        <?php foreach ($data['product'] as $product) { ?>
                        <tr>
                            <td><?= $product['product']['ma sp'] ?></td>
                            <td><img style="height: 100px ;" src="<?= $product['product']['hinh anh'] ?>"
                                    alt="<?= $product['product']['ten sp'] ?>">
                            </td>
                            <td><?= $product['product']['ten sp'] ?></td>
                            <td><?= number_format($product['product']['gia sp'], 0, ",", ".") . "đ"; ?></td>
                            <td><?= $product['category']['ten loai sp'] ?></td>
                            <td>
                                <?= $product['insurance']['thoi han bao hanh'] == 0 ? "Không bảo hành" : $product['insurance']['thoi han bao hanh']." Tháng"?>
                            </td>
                            <td>
                                <button class="btn mb-2">
                                    <a href="dashboard/add_actual_product/<?= $product['product']['ma sp'] ?>">
                                        <i class="fas fa-plus nav-icon"></i> Thêm seri
                                    </a>
                                </button>
                                <button class="btn mb-2">
                                    <a href="dashboard/update_product/<?= $product['product']['ma sp'] ?>">
                                        <i class="far fa-edit"></i> Sửa
                                    </a>
                                </button>
                                <button class="btn mb-2">
                                    <a href="dashboard/remove_product/<?= $product['product']['ma sp'] ?>">
                                        <i class="fa fa-trash-alt"></i> Xoá
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>Mã sản<br>phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Thương hiệu</th>
                            <th>Bảo hành</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
</div>