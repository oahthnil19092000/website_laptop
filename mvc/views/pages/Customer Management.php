<div class="card">
    <div class="card-header">
        <h3 class="card-title ">
            <div class="h3">Quản lý khách hàng</div>
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
                            <th>Mã <br>Khách hàng</th>
                            <th>Tên Khách hàng</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_product_management" style="font-size: 0.9rem;">
                        <?php 
                        if($data['customer'] != null)
                        foreach ($data['customer'] as $customer) {

                        ?>
                        <tr>
                            <td><?= $customer['customer']['ma kh']?></td>
                            <td><?= $customer['customer']['ho ten kh']?></td>
                            <td><?= date_format(date_create($customer['customer']['ngay sinh']), "d/m/Y") ?></td>
                            <td><?= $customer['customer']['so dien thoai']?></td>
                            <td style="width: 400px;">
                                <?= $customer['customer']['dia chi'] == "" ? "Trống" : $customer['customer']['dia chi'] 
                                ?></td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/remove_customer/<?= $customer['customer']['ma kh']?>">
                                        <i class="fa fa-trash-alt"></i> Xoá
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php
                        } ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>Mã nhân viên</th>
                            <th>Tên nhân viên</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
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