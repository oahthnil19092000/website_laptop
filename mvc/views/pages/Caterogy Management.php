<div class="card">
    <div class="card-header">
        <h3 class="card-title ">
            <div class="h3">Quản lý loại</div>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <?php
        // echo "<pre>";
        // var_dump($data["bill"])
        ?>
        <div class="row">
            <div class="col-sm-12">

                <table id="example2" class="table table-bordered table-striped">
                    <thead style="background: #007bff6e;">
                        <tr style="font-size: 0.9rem;">
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th>Nhà cung cấp</th>
                            <th>Số sản phẩm</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_product_management" style="font-size: 0.9rem;">
                        <?php foreach ($data['category'] as $category) { ?>
                        <tr>
                            <td><?= $category['category']['ma loai sp']  ?></td>
                            <td><?= $category['category']['ten loai sp']  ?></td>
                            <td><?= $category['supplier']['ten ncc']  ?></td>
                            <td><?= $category['count']?></td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/update_category/<?= $category['category']['ma loai sp']  ?>">
                                        <i class="far fa-edit"></i> Sửa
                                    </a>
                                </button>
                            </td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/remove_category/<?= $category['category']['ma loai sp']  ?>">
                                        <i class="fa fa-trash-alt"></i> Xoá
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th>Nhà cung cấp</th>
                            <th>Số sản phẩm</th>
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