<div class="app__container">
    <div class="grid">
        <div class="grid__row app__content">
            <div class="grid__column-10">
                <div class="home-sanpham">
                    <div class="ttsanpham">
                        <div>
                            <h3 class="thongtin_heading">THÔNG TIN SẢN PHẨM</h3>
                            <div class="thongtin">
                                <div class="anhsanpham w-50 d-flex flex-column justify-content-center">
                                    <div id="asp">
                                        <img class="w-100 h-auto" src="<?= $data['product_info']['info']['hinh anh'] ?>"
                                            alt="<?= $data['product_info']['info']['ten sp'] ?>">
                                    </div>

                                    <!-- <div class="album">
                                        <div class="album_anhsanpham">
                                            <img src="public/upload/laptopTest.jpg" alt="">
                                        </div>
                                        <div class="album_anhsanpham">
                                            <img src="public/upload/laptopTest.jpg" alt="">
                                        </div>
                                        <div class="album_anhsanpham">
                                            <img src="public/upload/laptopTest.jpg" alt="">
                                        </div>
                                    </div> -->
                                </div>
                                <div class="ttsp">
                                    <div class="chitiet m-0 mb-2" style="height: unset;">
                                        <div class="tensp"><?= $data['product_info']['info']['ten sp'] ?></div>
                                        <div class="thuonghieu"><b>Thương hiệu : </b>
                                            <?=  $data['product_info']['brand']['ten loai sp'] ?></div>
                                        <div class="giasp">Giá:
                                            <?= $data['product_info']['promotion'] != 0 ? number_format($data['product_info']['info']['gia sp']-$data['product_info']['info']['gia sp']*$data['product_info']['promotion']/100,0,",","."). "đ" : number_format($data['product_info']['info']['gia sp'],0,",","."). "đ" ?>
                                            <?php 
                                            if($data['product_info']['promotion'] != 0)
                                            echo '<span class="rounded border border-danger text-danger px-2 mx-2">'.$data['product_info']['promotion'].'%</span>';
                                            ?>

                                        </div>
                                        <?php 
                                            if($data['product_info']['promotion'] != 0)
                                            echo '<div class="cokhuyenmai"><b>Chương trình khuyến mãi :</b>'.$data['product_info']['promotion_name'].'</div>';
                                            ?>

                                        <div class="thuonghieu"><b>Bảo hành chính hảng :
                                            </b>
                                            <?= $data['product_info']['insurance']['thoi han bao hanh'] != 0 ? $data['product_info']['insurance']['thoi han bao hanh']. " Tháng": "Không bảo hành"?>
                                        </div>
                                        <div class="thuonghieu"><b>Số lượng trong kho :</b>
                                            <?= $data['product_info']['quantity'] == 0 ? "Hết hàng" :  $data['product_info']['quantity'] ?>
                                        </div>
                                        <button
                                            class="btn btn-<?= $data['product_info']['like'] ? "danger" : "success" ?> rounded border border-1"><a
                                                href="<?= $data['product_info']['like'] ? "./home/unlike" : "./home/like" ?>/<?= $data['product_info']['info']['ma sp']?>"
                                                class="d-flex text-white"><i class="my-auto far fa-heart"></i>
                                                <span
                                                    class="px-2"><?= $data['product_info']['like'] ? "Bỏ yêu thích" :"Yêu thích"  ?></span>
                                            </a>
                                        </button>
                                    </div>
                                    <?php if($data['product_info']['insurance']['thoi han bao hanh'] != 0){?>
                                    <div class="giakm">
                                        <H5>THÔNG TIN BẢO HÀNH</H5>
                                        <ul class="policy__list">
                                            <li>
                                                <div class="iconl">
                                                    <i class="icondetail-doimoi"></i>
                                                </div>
                                                <p>
                                                    Hư gì đổi nấy <b>12 tháng</b> tại cửa hàng (miễn phí tháng đầu)
                                                </p>
                                            </li>
                                            <li data-field="IsSameBHAndDT">
                                                <div class="iconl">
                                                    <i class="icondetail-baohanh"></i>
                                                </div>
                                                <p>Bảo hành <b>chính hãng laptop
                                                        <?= $data['product_info']['insurance']['thoi han bao hanh'] != 0 ? $data['product_info']['insurance']['thoi han bao hanh']. " Tháng": "Không bảo hành"?></b>
                                                </p>
                                            </li>
                                            <li>
                                                <div class="iconl"><i class="icondetail-sachhd"></i></div>
                                                <p>Bộ sản phẩm gồm: Dây nguồn, Sách hướng dẫn, Sạc Laptop
                                                    <?=  $data['product_info']['brand']['ten loai sp'] ?>, Thùng
                                                    máy
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php }?>
                                    <?php if($data['product_info']['quantity'] != 0) {?>
                                    <form method="post" action="home/buy_product" class="d-flex flex-column w-100">

                                        <div class="soluong">
                                            <input type="text" name="product_id"
                                                value="<?= $data['product_info']['info']['ma sp'] ?>" hidden>
                                            <span class="my-auto mx-2">Số lượng (Tối đa
                                                <?= $data['product_info']['quantity'] ?>): </span>
                                            <button type="button" onclick="bot()">-</button>
                                            <input type="number" name="quantily" min="1"
                                                max="<?= $data['product_info']['quantity'] ?>" value="1" required>
                                            <button type="button" id="add" onclick="them()">+</button>
                                        </div>

                                        <div>
                                            <button type="submit" name="buyBtn"
                                                class="d-flex flex-column w-100 btn btn-danger py-3 rounded border">

                                                <div class=" text-white h5 mb-0">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    Thêm vào giỏ hàng
                                                </div>
                                                <small class=" text-white">
                                                    ( Giao hàng tận nơi, bảo hành chính hảng )
                                                </small>
                                            </button>
                                        </div>
                                    </form>
                                    <?php 
                                    } else {
                                        echo "<b>Hết hàng</b>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div>
                                <div class="chitietcuthe w-100 py-5 " style="overflow: hidden;height:fit-content">
                                    <H5>THÔNG SỐ KỸ THUẬT</H5>
                                    <div class="d-flex border-0 flex-row flex-wrap">
                                        <?php  foreach($data['product_info']['detail'] as $detail){?>
                                        <div class="d-flex flex-column mx-auto my-4" style="width:23%">
                                            <h6 class="text-uppercase text-start"><?= $detail['name_type']?></h6>
                                            <table>
                                                <?php foreach($detail['details'] as $details){?>
                                                <tr>
                                                    <td class="bg-secondary border text-white"><?= $details['name'] ?>
                                                    </td>
                                                    <td class="text-start bg-light border ">
                                                        <?= $details['value'] != "" ? $details['value'] : "Không" ?>
                                                    </td>
                                                </tr>
                                                <?php }?>
                                            </table>
                                        </div>
                                        <?php }?>
                                    </div>

                                </div>
                            </div>
                            <div class="chitiet-sanpham flex-row">
                                <div class="motasanpham">
                                    <H5>MÔ TẢ CHI TIẾT</H5>
                                    <?= $data['product_info']['info']['mo ta san pham'] ?>
                                    <img src="<?= $data['product_info']['info']['hinh anh'] ?>"
                                        alt="<?= $data['product_info']['info']['ten sp'] ?>"><br>
                                    <span>Sản phẩm có bán trực tiếp tại của hàng Thảo Linh hoặc trên website <a
                                            class="d-inline" href="./">thaolinhmobile.vn</a></span>
                                    <button onclick="hienmota(this)">Hiện mô tả</button>
                                    <div id="hiensp">

                                    </div>
                                    <div id="ansp"></div>
                                </div>
                                <div class="motasanpham">
                                    <div class="chitietmota d-flex flex-column" id="chitietmota">
                                        <H5>ĐÁNH GIÁ</H5>
                                        <form action="" method="post" class="form-danhgia">
                                            <textarea name="danhgia" class="danhgia m-0"
                                                placeholder="Vui lòng không đánh giá" required></textarea>
                                            <input type="text" name="masp-danhgia"
                                                value="<?= $data['product_info']['info']['ma sp']?>" hidden required>
                                            <div class="box-danhgia">
                                                <div class="d-flex" style="flex-direction: row-reverse;">
                                                    <input class="star star-5" id="star-5" type="radio" name="star"
                                                        value="5" required />
                                                    <label class="star star-5 m-0 px-1" for="star-5"></label>
                                                    <input class="star star-4" id="star-4" type="radio" name="star"
                                                        value="4" required />
                                                    <label class="star star-4 m-0 px-1" for="star-4"></label>
                                                    <input class="star star-3" id="star-3" type="radio" name="star"
                                                        value="3" required />
                                                    <label class="star star-3 m-0 px-1" for="star-3"></label>
                                                    <input class="star star-2" id="star-2" type="radio" name="star"
                                                        value="2" required />
                                                    <label class="star star-2 m-0 px-1" for="star-2"></label>
                                                    <input class="star star-1" id="star-1" type="radio" name="star"
                                                        value="1" required />
                                                    <label class="star star-1 m-0 px-1" for="star-1"></label>
                                                </div>
                                                <button type="submit" name="commentBtn" class="btn-danhgia"
                                                    style="height: fit-content; margin: auto !important;">Đánh
                                                    giá</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="mota">

                            </div>
                            <div class="mota">
                                <div class="chitietmota py-4" id="chitietmota3">
                                    <H5 class="mota-heading">TẤT CẢ ĐÁNH GIÁ</H5>
                                    <!-- <i>Sản phẩm này chưa có bình luận.</i> -->
                                    <?php 
                                if($data['product_info']['comments'] != NULL)
                                    foreach($data['product_info']['comments'] as $comment){
                                ?>
                                    <div class="item-danhgia mx-4 my-3">
                                        <b class="text-white"><?= $comment['customer_name'] ?></b>
                                        <div>
                                            <p class="text-white"><b>Điểm đánh giá:
                                                    <?= $comment['comment_content']['diem dg'] ?>
                                                    <i class="fas fa-star"></i></b>
                                            </p>
                                            <div class="d-flex noidungbinhluan">
                                                <span class="text-dark"><b>Nội dung đánh giá:</b></span>
                                                <div class="text-white">
                                                    <?= $comment['comment_content']['nd danh gia'] ?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <button type="button" class="btn-danhgia btn btn-outline-primary">
                                                    <a href="delete_comment/<?= $comment['comment_content']['ma dg']?>">Xóa
                                                        bình luận</a>
                                                </button>
                                                <?php 
                                            if(!empty($comment['admin_feedback_content'])){
                                            ?>
                                                <div class="phanhoi">
                                                    <h4>Phản hồi của shop</h4>
                                                    <!-- <button type="button" class="xemphanhoi btn-danhgia btn btn-outline-primary" onclick="xemphanhoi(this)">Xem phản hồi</button> -->
                                                    <div>
                                                        <div>
                                                            <b>
                                                                <span class="text-dark" style="margin:0 10px">
                                                                    <?= $comment['admin_name']?> :
                                                                </span>
                                                                <span
                                                                    class="text-secondary"><?= $comment['admin_feedback_content']['nd phan hoi'] ?></span>
                                                            </b>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }?>
                                            </div>

                                        </div>

                                    </div>
                                    <?php 
                                    } else echo "<div class=\"m-4\">Chưa có bình luận nào!</div>"
                                ?>
                                    <script>
                                    function xemphanhoi(a) {
                                        if (a.innerText == 'Xem phản hồi') {
                                            a.nextElementSibling.style.display = 'block';
                                            a.innerText = 'Ẩn phản hồi';
                                        } else {
                                            a.nextElementSibling.style.display = 'none';
                                            a.innerText = 'Xem phản hồi';
                                        }
                                    }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>