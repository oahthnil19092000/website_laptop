<div class="app__container">
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-10">
                <div class="home-sanpham">
                    <table>
                        <tr>
                            <th style="width: 7%;">Chọn</th>
                            <th style="width: 15%;">Sản phẩm</th>
                            <th style="width: 10%;">Hình ảnh</th>
                            <th style="width: 5%;">Số lượng</th>
                            <th style="width: 7%;">Khuyến mãi</th>
                            <th style="width: 10%;">Tổng giá</th>
                            <th style="width: 10%;">Xóa</th>
                            <th style="width: 10%;">Đặt hàng</th>
                        </tr>
                        <tr>
                            <td><input type="checkbox" checked="checked" value=""><br></td>
                            <td>Laptop Dell </td>
                            <td><img src="public/upload/laptopTest.jpg" alt="samsung" class="img_dh"></td>
                            <td>
                                <form method="get" action="server.php" class="soluong abc">
                                    <button type="button" onclick="window.location.href=''">-</button>
                                    <input type="text" name="thaydoi" value="" hidden>
                                    <input type="text" name="madhduyet" value="" hidden>
                                    <input type="number" name="soluong" id="soluong" value="" min="1" required max="10">
                                    <button type="button" id="add" onclick="window.location.href=''">+</button>
                                </form>
                            </td>
                            <td>0 %</td>
                            <td>25.000.000đ</td>
                            <td>
                                <a href="" class="iconhd">
                                    <div class="nuthdh">
                                        <i class="fas fa-trash" style="margin-right: 5px"></i>Xóa
                                    </div>
                                </a>
                            </td>
                            <td rowspan="">
                                <div style="display:flex">
                                    <a href="" class="iconhd">
                                        <div class="nutdh">Đặt hàng</div>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>