<div class="card">
    <div class="card-header">
        <h3 class="card-title ">
            <div class="h3">Quản lý thương hiệu</div>
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
                    <thead>
                        <tr>
                            <th>Mã thương hiệu</th>
                            <th>Tên thương hiệu</th>
                            <th>Số sản phẩm</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_product_management">
                        <?php //foreach ($data['brand'] as $brand) { ?>
                        <tr>
                            <td>1</td>
                            <td>MSI</td>
                            <td>70</td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/update_brand/1">
                                        <i class="far fa-edit"></i> Sửa
                                    </a>
                                </button>
                            </td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/remove_brand/1">
                                        <i class="fa fa-trash-alt"></i> Xoá
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php //} ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Mã thương hiệu</th>
                            <th>Tên thương hiệu</th>
                            <th>Số sản phẩm</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
</div>