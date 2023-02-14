<div class="article-container">
    <h1>Thống kê tháng <?= $data['month'] ?></h1>
    <div class="article-items">
        <form class="statistical-month d-flex align-items-center" method="POST" action="">
            <label for="month">Chọn tháng thống kê: </label>
            <input type="month" class="mx-3" name="month" max="<?php echo date("Y-m") ?>" id="month">
            <button type="submit" name="btnStatistical" class="btn btn-month">Thống kê</button>
        </form>
    </div>
    <div class="article-items statistical-container">
        <div>
            <div>
                <div class="small-statistical"><?= $data['count_order'] ?></div>
                <p>Số đơn hàng</p>
            </div>
        </div>
        <div>
            <div>
                <div><?= number_format($data['turnover'], 0, ",", ".") . " đ"  ?></div>
                <p>Doanh thu tháng</p>
            </div>
        </div>
        <div>
            <div>
                <div>
                    <?= $data['product_max'] != null ? $data['product_max']["ten sp"] : "Không bán được sản phẩm nào" ?>
                </div>
                <p>Sản phẩm tiêu thụ nhiều nhất</p>
            </div>
        </div>

        <div>
            <div>
                <div>
                    <?= $data['product_min'] != null ? $data['product_min']["ten sp"] : "Không bán được sản phẩm nào" ?>
                </div>
                <p>Sản phẩm tiêu thụ ít nhất</p>
            </div>
        </div>
    </div>
</div>