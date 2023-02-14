<div class="card">
    <div class="card-header">
        <h3 class="card-title ">
            <div class="h3">Quản lý bình luận đánh giá</div>
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <style>
        i.fa.fa-star {
            color: transparent;
            background: linear-gradient(to left, #fff000, #fff000, #ff9900);
            -webkit-background-clip: text;
        }
        </style>
        <div class="row">
            <div class="col-sm-12">

                <table id="example2" class="table table-bordered table-striped">
                    <thead style="background: #007bff6e;">
                        <tr style="font-size: 0.9rem;">
                            <th>Mã<br>bình luận</th>
                            <th>Sản phẩm</th>
                            <th>Khách hàng</th>
                            <th>Nội dung bình luận</th>
                            <th>Điểm<br>đánh giá</th>
                            <th>Thời gian</th>
                            <th>Phản hồi bình luận</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_product_management" style="font-size: 0.9rem;">
                        <?php foreach ($data['comments'] as $feedback) {
                        ?>
                        <tr>
                            <td><?= $feedback['feedback']['ma dg']?></td>
                            <td><?= $feedback['product']['ten sp']?></td>
                            <td><?= $feedback['customer']['ho ten kh']?></td>
                            <td><?= $feedback['feedback']['nd danh gia']?></td>
                            <td><?= $feedback['feedback']['diem dg']?> <i class="fa fa-star"></i></td>
                            <td><?= date_format(date_create($feedback['feedback']['tg danh gia']), "d/m/Y") ?></td>
                            <td>
                                <?php 
                                if ( !empty($feedback['admin-feedback']) ) {
                                       echo $feedback['admin-feedback']['nd phan hoi'] . "<br>(" . $feedback['admin']['ho ten ad'] . ")";
                                    } else { 
                                        ?>
                                <form action="" method="post">
                                    <input type="text" value="<?= $feedback['feedback']['ma dg']?>" name="feedback_id"
                                        hidden>
                                    <input type="text" name="admin_feedback_content"
                                        placeholder="Phản hồi bình luận này" class="w-100 my-2" required>
                                    <button type="submit" name="btnAdminFeedback" class="btn w-100 py-0 my-2">Phản
                                        hồi</button>
                                </form>
                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn">
                                    <a href="dashboard/remove_feedback/<?= $feedback['feedback']['ma dg']?>">
                                        <i class="fa fa-trash-alt"></i> Xoá
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>Mã<br>bình luận</th>
                            <th>Sản phẩm</th>
                            <th>Khách hàng</th>
                            <th>Nội dung bình luận</th>
                            <th>Điểm<br>đánh giá</th>
                            <th>Thời gian</th>
                            <th>Phản hồi bình luận</th>
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