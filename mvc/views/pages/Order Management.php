<div class="card">
    <div class="card-header">
        <h3 class="card-title ">
            <div class="h3">Quản lý đơn hàng</div>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <style>
                button {
                    font-size: 15px;
                }
                </style>
                <div class="dt-buttons btn-group flex-wrap">
                    <button class="btn-primary rounded px-2 py-1 mx-1" type="button"
                        onclick="searchProductManegement('',this)"><a>Tất cả</a></button>
                    <button class="btn-light rounded px-2 py-1  mx-1" type="button"
                        onclick="searchProductManegement('Đợi duyệt',this)"><a>Đợi duyệt</a></button>
                    <button class="btn-light rounded px-2 py-1  mx-1" type="button"
                        onclick="searchProductManegement('Đã duyệt',this)"><a>Đã duyệt</a></button>
                    <button class="btn-light rounded px-2  py-1 mx-1" type="button"
                        onclick="searchProductManegement('Đang giao',this)"><a>Đang giao</a></button>
                    <button class="btn-light rounded px-2 py-1  mx-1" type="button"
                        onclick="searchProductManegement('Đã giao',this)">
                        <a>Đã giao</a>
                    </button>
                    <button class="btn-light rounded px-2 py-1  mx-1" type="button"
                        onclick="searchProductManegement('Đã bị hủy',this)"><a>Đã bị hủy</a></button>
                </div>
            </div>
        </div>
        <?php
        // echo "<pre>";
        // var_dump($data["delivery"])
        ?>
        <div class="row">
            <div class="col-sm-12">

                <table id="example2" class="table table-bordered table-striped">
                    <thead style="background: #007bff6e;">
                        <tr style="font-size: 0.9rem;">
                            <th>Mã đơn hàng</th>
                            <th>Danh sách sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Duyệt</th>
                            <th>Tình trạng</th>
                            <th>Xem</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_product_management" style="font-size: 0.9rem;">
                        <?php foreach ($data["delivery"] as $delivery) {
                        ?>
                        <tr>
                            <td><?= $delivery["order"]['so hd'] ?>
                            </td>
                            <td>
                                <?php foreach ($delivery["products"] as $product) {
                                        echo $product["product"]['ten sp'] . "<br>";
                                    } ?>
                            </td>
                            <td>
                                <?php foreach ($delivery["products"] as $product) {
                                        echo $product["quantily"] . "<br>";
                                    } ?>
                            </td>
                            <td><?= "Ngày " . date_format(date_create($delivery['order']['ngay lap']), "d/m/Y") ?>
                            </td>
                            <td>
                                <?php if ($delivery['status'] != "5" &&  $delivery['status'] != "0") { ?>
                                <select onchange="censorship(this.value,<?= $delivery['order']['so hd'] ?>)">
                                    <option value="">Cập nhật</option>
                                    <?php if ($delivery['status'] == "2") { ?><option value="3">Duyệt</option>
                                    <?php } ?>
                                    <?php if ($delivery['status'] <= "3") { ?><option value="4">Giao hàng
                                    </option>
                                    <?php } ?>
                                    <?php if ($delivery['status'] <= "4") { ?><option value="5">Thành công
                                    </option>
                                    <?php } ?>
                                    <?php if ($delivery['status'] != "4") { ?><option value="0">Hủy đơn hàng
                                    </option>
                                    <?php } ?>
                                </select>
                                <?php } else if ($delivery['status'] == "5") echo "Thành công";
                                    else  echo "Đã bị hủy"; ?>
                            </td>
                            <td>
                                <?php
                                    if ($delivery['status'] == "2")
                                        echo "Đợi duyệt";
                                    else if ($delivery['status'] == "3")
                                        echo "Đã duyệt";
                                    else if ($delivery['status'] == "4")
                                        echo "Đang giao";
                                    else if ($delivery['status'] == "5")
                                        echo "Hoàn tất";
                                    else if ($delivery['status'] == "0")
                                        echo "Đã bị hủy";
                                    ?>
                            </td>
                            <td>
                                <button class="btn-primary rounded px-2 py-1 mx-1 text-light">
                                    <a class="text-light"
                                        href="dashboard/ordersplaced/<?= $delivery["order"]['so hd'] ?>">Xem</a>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Danh sách sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Duyệt</th>
                            <th>Tình trạng</th>
                            <th>Xem</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
</div>