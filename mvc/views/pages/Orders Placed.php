<main>
    <article class="article-ordersplaced">
        <section class="ordersplaced-container position-relative">
            <h1 style="text-align: center;">
                <?= "Đơn hàng 1" ?>
            </h1>
            <div><b>Mã đơn hàng:</b>
                <?= $data['delivery']['order']['so hd'] ?>
            </div>
            <div><b>Tên khách hàng:</b> <?= $data['delivery']['customer']['ho ten kh'] ?></div>
            <div><b>Nhân viên duyệt:</b>
                <?= $data['delivery']['admin'] != null ? $data['delivery']['admin']['ho ten ad'] : " Trống" ?></div>
            <div><b>Số điện thoại đặt hàng:</b>
                <?= "0" . number_format((int) $data['delivery']['order']['so dien thoai giao hang'], 0, ",", "-") ?>
            </div>
            <div><b>Địa chỉ giao hàng:</b>
                <?= $data['delivery']['order']['dia chi giao'] ?>
            </div>
            <div><b>Ngày đặt hàng:</b>
                <?= date_format(date_create($data['delivery']['order']['ngay lap']), "d/m/Y"); ?>
            </div>
            <div><b>Ngày giao hàng:</b>
                <?= $data['delivery']['order']['ngay giao'] == null ? "Chưa xác định" : date_format(date_create($data['delivery']['order']['ngay giao']), "d/m/Y"); ?>
            </div>
            <div><b>Tình trạng đơn hàng:</b>
                <?php
                if ($data['delivery']['status'] == "2")
                    echo "Đợi duyệt";
                else if ($data['delivery']['status'] == "3")
                    echo "Đã duyệt";
                else if ($data['delivery']['status'] == "4")
                    echo "Đang giao";
                else if ($data['delivery']['status'] == "5")
                    echo "Hoàn tất";
                else if ($data['delivery']['status'] == "0")
                    echo "Đã bị hủy";
                ?>
            </div>
            <div><b>Hình thức thanh toán:</b>
                <?= $data['delivery']['payment'] ? "Thanh toán qua VN-Pay" : "Thanh toán tiền mặt"; ?>
            </div>
            <div class="ordersplaced-item">
                <table class="ordersplaced-table-container">
                    <tr>
                        <th>Danh sách sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Khuyến mãi</th>
                        <th>Hạn bảo hành</th>
                    </tr>
                    <?php
                    $price = 0;
                    $promotion = 0;
                    foreach ($data['delivery']['products'] as $product) {
                        $price += $product['product']['gia sp']*$product['quantily'];
                        $promotion += $product['product']['gia sp']*$product['quantily']*$product['promotion']/100;
                    ?>
                    <tr>
                        <td>
                            <span>
                                <?= $product['product']['ten sp']?>
                            </span>
                        </td>
                        <td>
                            <?= $product['quantily']?>
                        </td>
                        <td>
                            <?= number_format($product['product']['gia sp'], 0, ",", ".") . " đ";  ?>
                        </td>
                        <td>
                            <?= $product['promotion']. "%" ?>
                        </td>
                        <td>
                            <?=
                                $product['insurance']['thoi han bao hanh'] == 0 ? "Không bảo hành" : date_format(date_add(date_create(date_format(date_create($data['delivery']['order']['ngay lap']), "Y-m-d")), date_interval_create_from_date_string($product['insurance']['thoi han bao hanh'] . " " . "months")), "d/m/Y");
                                ?>
                        </td>

                    </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="4">Tổng tiền:</td>
                        <td>
                            <?= number_format($price, 0, ",", ".") . " đ";  ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">Giảm giá:</td>
                        <td>
                            <?= "-" . number_format($promotion, 0, ",", ".") . " đ";  ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">Thành tiền:</td>
                        <td>
                            <?= number_format($price - $promotion, 0, ",", ".") . " đ";  ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="text-align:center; margin:10px 0;">

                <button class="rounded bg-primary border px-5 py-1"><a class="text-light"
                        href="javascript:window.history.back()">Trở
                        lại</a>
                </button>
            </div>
        </section>
    </article>
</main>