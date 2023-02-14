<style>
h1 {
    color: unset !important;
    background: unset !important;
}
</style>
<main>
    <article class="article-shopingcart">
        <section class="shopingcart-container">
            <h1>Giỏ hàng</h1>
            <div class="shopingcart-item">
                <table class="shopingcart-table-container">
                    <tr>
                        <th>
                            <input type="checkbox" onchange="checkforall(this)">
                        </th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Khuyến<br>mãi</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>
                            <a><i class="far fa-trash-alt"></i></a>
                        </th>
                        <th>Đặt hàng</th>
                    </tr>
                    <?php if ($data['cart']["details"] != null)
                        foreach ($data['cart']["details"] as $index => $product) { ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="sp[]" value="" onchange="checkproduct()">
                        </td>
                        <td>
                            <img src="<?= $product['product_info']['hinh anh'] ?>"
                                title="<?= $product['product_info']['ten sp'] ?>" />
                        </td>
                        <td>
                            <span><?= $product['product_info']['ten sp'] ?></span>
                        </td>
                        <td>
                            <?= number_format($product['product_info']['gia sp'] , 0, ",", ".") . " đ" ?>
                        </td>
                        <td>
                            <?= $product['promotion'] . "%" ?>
                        </td>
                        <td>
                            <div class="form-orders">
                                <input type="text" name="mspgiohang" value="<?= $data['cart']['cart_id'] ?>" hidden>
                                <div class="form-orders-numbers">
                                    <button type="button" class="sub-btn"
                                        onclick="quantily(<?= $data['cart']['cart_id']?>,<?= $product['product_info']['ma sp'] ?>,<?= $product['quantily'] - 1?>)">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                    <input id="quantity" type="number" name="slsp"
                                        onblur="quantily(<?= $data['cart']['cart_id']?>,<?= $product['product_info']['ma sp'] ?>,this.value)"
                                        value="<?= $product['quantily'] ?>" min="1"
                                        max="<?=  $product['max_quantily'] ?>">
                                    <button type="button" class="add-btn"
                                        onclick="quantily(<?= $data['cart']['cart_id']?>,<?= $product['product_info']['ma sp'] ?>,<?= $product['quantily'] + 1 >  $product['max_quantily'] ?  $product['max_quantily'] :  $product['quantily'] + 1 ?>)">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <?= number_format($product['product_info']['gia sp']*$product['quantily'] - $product['product_info']['gia sp']*$product['quantily']*$product['promotion']/100, 0, ",", ".") . " đ"  ?>
                        </td>

                        <td>
                            <a
                                href="home/remove_product_in_cart/<?=  $data['cart']['cart_id'] ?>/<?= $product['product_info']['ma sp'] ?>"><i
                                    class="far fa-trash-alt"></i></a>
                        </td>
                        <?php if ($index ==0) { ?>
                        <td rowspan="<?= count($data['cart']["details"]) ?>">
                            <button type="button" class="btn buy-btn"
                                style="padding: 0 ; margin:10px; border: 1px solid;background: #0eaeff;"
                                onclick="orders()">Đặt hàng</button>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>
        <section class="payment-container">
            <h1>Đặt hàng</h1>
            <div>
                <form action="" method="post">
                    <input type="text" name="ID_Cart" value="<?= $data['cart']['cart_id']?>" hidden>
                    <?php if ($data['cart']["details"] != null)
                        foreach ($data['cart']["details"] as $product) { ?>
                    <input type="checkbox" name="ID_Products[]" value="<?= $product['product_info']['ma sp'] ?>" hidden>
                    <?php } ?>
                    <input type="tel" id="sdtdathang" name="sdtdathang" placeholder="Số điện thoại"
                        title="Số điện thoại" pattern="[0-9]{10}" required />
                    <input type="text" name="address" placeholder="Số nhà/Hẻm/Đường">
                    <select name="province" onfocus="provincerender(this)"
                        onblur="districtrender(this.nextElementSibling,this)">
                        <option value="">Tỉnh/Thành phố</option>
                    </select>
                    <select name="district" onblur="wardrender(this.nextElementSibling,this)">
                        <option value="">Quận/Huyện</option>
                    </select>
                    <select name="ward">
                        <option value="">Xã/Phường/Thị Trấn</option>
                    </select>
                    <div class="payments">
                        <h4>Hình thức thanh toán</h4>
                        <div>
                            <div>
                                <input type="radio" id="tienmat" name="payments" value="1" checked hidden>
                                <div class="cash-payment" onclick="choosepayments(this)"></div>
                            </div>
                            <div>
                                <input type="radio" id="vnpay" name="payments" value="2" hidden>
                                <div class="vnpay-payment" onclick="choosepayments(this)"></div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn bg-warning text-light" name="btnPayments">Đặt hàng</button>
                </form>
                <table class="payment-table-container">
                    <tr>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                    </tr>

                    <?php if ($data['cart']["details"] != null)
                        foreach ($data['cart']["details"] as $product) { ?>
                    <tr>
                        <td>
                            <img src="<?= $product['product_info']['hinh anh'] ?>"
                                title="<?= $product['product_info']['ten sp'] ?>" />
                        </td>
                        <td>
                            <span><?= $product['product_info']['ten sp'] ?></span>
                        </td>
                        <td>
                            <?= number_format($product['product_info']['gia sp'] - $product['product_info']['gia sp']*$product['promotion']/100, 0, ",", ".") . " đ"  ?>
                        </td>
                        <td>
                            <?= $product['quantily'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>

        </section>
        <section class="ordersplaced-container">
            <h1>Đơn hàng đã đặt</h1>
            <div class="ordersplaced-item">
                <table class="ordersplaced-table-container">
                    <tr>
                        <th class="text-center">Mã đơn<br>hàng</th>
                        <th>Danh sách sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Hạn bảo hành</th>
                        <th>Tình trạng<br>đơn hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Xem đơn hàng</th>
                        <th>Hủy đơn hàng</th>
                    </tr>
                    <?php 
                    
                    if ($data["order"] != null)
                        foreach ($data["order"] as $order) { ?>
                    <tr>
                        <td>
                            <?= $order['cart_id']?>
                        </td>
                        <td>
                            <span>
                                <?php foreach ($order['details'] as $product) {
                                        echo $product['product_info']['ten sp'] . "<br>";
                                    } ?>
                            </span>
                        </td>
                        <td>
                            <?php foreach ($order['details'] as $product) {
                                    echo $product['quantily'] . "<br>";
                                } ?>
                        </td>
                        <td>
                            <?php
                                $quantily = 0;
                                foreach ($order['details'] as $product) {
                                    $quantily += $product['product_info']['gia sp'] * $product['quantily'] - $product['product_info']['gia sp'] * $product['quantily'] * $product['promotion'] / 100;
                                }
                                echo number_format($quantily, 0, ",", ".") . " đ";
                                ?>
                        </td>
                        <td>

                            <?php foreach ($order['details'] as $product) {
                                    echo $product['insurance']['thoi han bao hanh'] ." Tháng";
                                    echo  "<br>";
                                } ?>
                        </td>
                        <td>
                            <?php
                                if ($order['status'] == "2")
                                    echo "Đợi duyệt";
                                else if ($order['status'] == "3")
                                    echo "Đã duyệt";
                                else if ($order['status'] == "4")
                                    echo "Đang giao";
                                else if ($order['status'] == "5")
                                    echo "Hoàn tất";
                                else if ($order['status'] == "0")
                                    echo "Đã bị hủy";
                                ?>
                        </td>
                        <td>
                            <?= date_format(date_create($order['cart']['ngay lap']), "d/m/Y"); ?>
                        </td>
                        <td>
                            <button class="px-3 py-1 bg-warning rounded"><a class="text-dark"
                                    href="home/ordersplaced/<?= $order['cart']['so hd'] ?>">Xem</a></button>
                        </td>
                        <td>
                            <?php if ($order['status'] == 2 || $order['status'] == 3) { ?>
                            <button class="px-3 py-1 bg-danger rounded"><a class="text-light"
                                    href="home/remove_bill/<?= $order['cart']['so hd'] ?>">Hủy
                                    đơn
                                    hàng</a></button>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>
    </article>
</main>