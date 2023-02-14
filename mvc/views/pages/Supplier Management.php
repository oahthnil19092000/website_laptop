<div class="card">
    <div class="card-header">
        <h3 class="card-title ">
            <div class="h3">Quản lý nhà cung cấp</div>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">

                <table id="example2" class="table table-bordered table-striped">
                    <thead style="background: #007bff6e;">
                        <tr style="font-size: 0.9rem;">
                            <th>Mã<br>nhà cung cấp</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Địa chỉ</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_product_management" style="font-size: 0.9rem;">
                        <?php foreach ($data['supplier'] as $supplier) { ?>
                        <tr>
                            <td>
                                <?= $supplier['ma ncc'] ?>
                            </td>
                            <td style="width:30%">
                                <?= $supplier['ten ncc'] ?>
                            </td>
                            <td style="width:30%">
                                <?= $supplier['dia chi ncc'] ?>
                            </td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/update_supplier/<?= $supplier['ma ncc'] ?>">
                                        <i class="far fa-edit"></i> Sửa
                                    </a>
                                </button>
                            </td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/remove_supplier/<?=$supplier['ma ncc'] ?>">
                                        <i class="fa fa-trash-alt"></i> Xoá
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>Mã<br>nhà cung cấp</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Địa chỉ</th>
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