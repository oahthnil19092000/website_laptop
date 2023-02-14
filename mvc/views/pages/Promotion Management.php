<div class="card">
    <div class="card-header">
        <h3 class="card-title ">
            <div class="h3">Quản lý khuyến mãi</div>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">

                <table id="example2" class="table table-bordered table-striped">
                    <thead style="background: #007bff6e;">
                        <tr style="font-size: 0.9rem;">
                            <th>Mã<br>khuyến mãi</th>
                            <th>Tên khuyến mãi</th>
                            <th>Thêm sản phẩm <br> khuyến mãi cho chương trình</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_product_management" style="font-size: 0.9rem;">
                        <?php foreach ($data['promotion'] as $promotion) { ?>
                        <tr>
                            <td><?= $promotion['ma khuyen mai'] ?></td>
                            <td style="width:30%"><?= $promotion['ten khuyen mai'] ?></td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/add_product_promotion/<?= $promotion['ma khuyen mai'] ?>">
                                        <i class="fas fa-plus"></i> Thêm sản phẩm
                                    </a>
                                </button>
                            </td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/update_promotion/<?= $promotion['ma khuyen mai'] ?>">
                                        <i class="far fa-edit"></i> Sửa
                                    </a>
                                </button>
                            </td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/remove_promotion/<?= $promotion['ma khuyen mai'] ?>">
                                        <i class="fa fa-trash-alt"></i> Xoá
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>Mã<br>khuyến mãi</th>
                            <th>Tên khuyến mãi</th>
                            <th>Thêm sản phẩm <br> khuyến mãi <br> cho chương trình</th>
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