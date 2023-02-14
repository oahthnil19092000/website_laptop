<div class="app__container">
    <div class="grid">
        <div class="grid__row app__content">
            <!-- Danh mục sản phẩm -->
            <div class="grid__column-2">
                <nav class="category">
                    <div class="hienthi_dmsp">
                        <h3 class="category-heading category-item--active"
                            onclick="if(dmsp.style.display=='none')dmsp.style.display='block'; else dmsp.style.display='none';">
                            <i class="fas fa-align-justify"></i>
                            DANH MỤC SẢN PHẨM
                        </h3>

                        <div class="dmsp" id="dmsp" style="display:none">
                            <ul class="category-list">
                                <?php foreach($data['header_data']['category'] as $category){?>
                                <li class="category-item">
                                    <a href="home/category/<?= $category['ma loai sp']?>"
                                        class="category-item__link"><?= $category['ten loai sp']?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Sản phẩm -->
            <div class="grid__column-10">
                <div class="home-filter">
                    <div class="home-filter-1">
                        <span class="home-filter__label">Mức giá :</span>
                        <!-- <a href="javascript:filter('price','duoi-10-trieu')" style="text-decoration: none;"><button
                                class="home-filter__btn btn ">Dưới
                                10
                                triệu</button></a> -->
                        <a href="javascript:filter('price','tu-10-trieu-den-15-trieu')"><button
                                class="home-filter__btn btn">Từ 10 triệu
                                đến 15 triệu</button></a>
                        <a href="javascript:filter('price','tu-15-trieu-den-20-trieu')"><button
                                class="home-filter__btn btn ">Từ
                                15 triệu đến 20
                                triệu</button></a>
                        <a href="javascript:filter('price','tren-20-trieu')"><button class="home-filter__btn btn ">Từ 20
                                triệu trở lên</button></a>

                    </div>
                    <!-- <div class="home-filter-2">
                        <span class="home-filter__label">Sắp xếp theo: </span>
                        <a href=""><button class="home-filter__btn btn btn--primary">Mới nhất</button></a>
                        <a href="javascript:filter('order_by','ban-chay')"><button class="home-filter__btn btn ">Bán
                                chạy</button></a>
                        <div class="select-input">
                            <span class="select-input__label">Giá</span>
                            <i class="select-input__icon fas fa-angle-down"></i>
                            <ul class="select-input__list">
                                <li class="select-input__item">
                                    <a href="javascript:filter('sort','gia-tu-cao-den-thap')"
                                        class="select-input__link">Giá:
                                        thấp đến cao</a>
                                </li>
                                <li class="select-input__item">
                                    <a href="javascript:filter('sort','gia-tu-thap-den-cao')"
                                        class="select-input__link">Giá:
                                        cao đến thấp</a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <div class="home-sanpham">

                    <?php 
                    if(!empty($data["products"]))
                    foreach($data["products"] as $i => $products){
                            $category_id = "ma loai sp";
                            $promotion_id = "ma khuyen mai";
                            $product_id = "ma sp";
                            $discount = "phan tram khuyen mai";
                            $product_name = "ten sp";
                            $product_price = "gia sp";
                            $product_img = "hinh anh";
                            if((int)$i % 10 == 0) {
                                ?>
                    <div class="grid__row1" id="page-<?= round($i/10 + 1)?>"
                        style="<?= round($i/10 + 1) != 1 ? "display:none" :""?>">

                        <?php } ?>

                        <div class="grid__column-2-4">


                            <a class="home-sp-item" href="home/product/<?= $products["product"][$product_id]?>">
                                <div style="padding-top: 20%;margin-bottom: -10%;">
                                    <div class="home-sp-item__img"
                                        style="background-image: url(<?= $products["product"][$product_img] ?>);">
                                    </div>
                                </div>
                                <h4 class="home-sp-item__name"><?= $products["product"][$product_name] ?></h4>
                                <div class="home-sp-item__gia">
                                    <?php if($products['promotion']>0) {?>
                                    <span
                                        class="home-sp-item__gia-cu"><?= number_format($products["product"][$product_price],0,".",",")."₫"  ?></span>
                                    <span
                                        class="home-sp-item__gia-moi"><?= number_format($products["product"][$product_price]-$products["product"][$product_price]*$products['promotion']/100,0,".",",")."₫"  ?></span>
                                    <?php } else {?>
                                    <span
                                        class="home-sp-item__gia-moi"><?= number_format($products["product"][$product_price],0,".",",")."₫"  ?></span>
                                    <?php } ?>
                                </div>
                                <?php if($products['liked']){?>
                                <div class="home-sp-iten__favourite">
                                    <i class="fas fa-check"></i>
                                    <span>Yêu thích</span>
                                </div>
                                <?php }?>
                                <?php if($products['promotion'] != 0){?>
                                <div class="home-sp-item-sale-off">
                                    <span class="home-sp-item-sale-percent"><?= $products['promotion']."%" ?></span>
                                    <span class="home-sp-item-sale-label">GIẢM</span>
                                </div>
                                <?php }?>
                            </a>
                        </div>
                        <?php 
                if((int)$i % 10 == 9 || count($data["products"]) == $i+1) {
                    ?>
                    </div>
                    <?php } 
                    } else {
                        echo "Không có sản phẩm nào";
                    }?>


                    <div>
                        <ul class="phantrang home-sanpham__phantrang">
                            <li class="phantrang-item ">
                                <span onclick="prepage()" class="phantrang-item__link">
                                    <i class="phantrang-item__icon  fas fa-angle-left"></i>
                                </span>
                            </li>
                            <li class="phantrang-item phantrang-item--active">


                                <div class="d-flex">
                                    <?php foreach($data["products"] as $i => $products){ 
                                    if((int)$i % 10 == 0){ ?>

                                    <span onclick="check('page-<?= round($i/10 +1)?>-check',this)" era="Linh"
                                        class="phantrang-item__link mx-2 <?= round($i/10 +1)!= 1 ? "bg-light border text-dark" : "active"?>"><?= round($i/10 +1)?></span>
                                    <?php }
                                }?>
                                </div>
                            </li>
                            <li class="phantrang-item">
                                <span onclick="nextpage()" class="phantrang-item__link">
                                    <i class="phantrang-item__icon  fas fa-angle-right"></i>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>