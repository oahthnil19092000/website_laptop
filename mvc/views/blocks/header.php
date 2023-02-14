<div class="grid">
    <div class="header-with-search">
        <!-- Logo -->
        <div class="header__logo">
            <a href="" class="header__logo-link">
                <img src="public/upload/logo1.png" alt="logo" class="logo-img">
            </a>
            <a href="" class="header__logo-name-link">
                <h3 class="logo-name">THẢO LINH</h3>
            </a>
        </div>
        <!-- Search -->
        <form method="post" action="home/search" class="header_search">
            <div class="header_search-input-wrap">
                <input required type="search" name="searchsp" autocomplete="off" class="header_search-input"
                    style="width:98%" placeholder="Tìm kiếm sản phẩm">
                <!-- <div class="header_search-history">
                    <h4 class="header_search-history-heading">Lịch sử tìm kiếm</h4>
                    <ul class="header_search-history-list">
                        <li class="header_search-history-item">
                            <a href="">Laptop</a>
                            <a href="" class="xoatimkiem">x</a>
                        </li>
                        <li class="header_search-history-item">
                            <a href="">Laptop</a>
                            <a href="" class="xoatimkiem">x</a>
                        </li>
                    </ul>
                </div> -->
            </div>
            <button type="submit" class="header_search-btn">
                <i class="header_search-btn-icon fas fa-search"></i>
            </button>
        </form>
        <div class="header_cart">
            <div class="header_cart-wrap" title="Đã thích">
                <a href="<?= isset($_SESSION['user']) ? "home/favorite" : "./"?> ">
                    <i class="header_cart-icon far fa-heart"></i>
                    <span class="header_cart-thongbao">
                        <?= $data['header_data']['favorite'] ?  $data['header_data']['favorite'] : "0" ?>
                    </span>
                </a>
            </div>
        </div>
        <div class="header_cart">

            <div class="header_cart-wrap" title="Giỏ hàng">
                <a href="<?= isset($_SESSION['user']) ? "home/cart" : "./"?>">
                    <i class="header_cart-icon fas fa-shopping-cart"></i>
                    <span class="header_cart-thongbao">
                        <?= $data['header_data']['cart'] ?  $data['header_data']['cart'] : "0" ?>
                    </span>
                    <!-- No sp: header_cart-list--no-cart -->
                </a>
            </div>
        </div>
        <div class="header__navbar-list">
            <li class="header__navbar-item header__navbar-user">
                <i class="fas fa-user-circle avt"></i>
                <?php  if($data['header_data']['user'] != "null"){ ?>
                <span class="header__navbar-user-name">
                    <?php 
                        $name_customer = "ho ten kh";
                        $id_customer = "ma kh";
                        $name =  $data['header_data']['user'][$name_customer] ;
                        $names = explode(" ", $name);
                        echo $names[count($names)-2]." ". $names[count($names)-1];
                    ?>
                </span>
                <ul class="header__navbar-user-menu">
                    <li class="header__navbar-user-menu-item">
                        <a href="home/information/<?= $data['header_data']['user'][$id_customer]?>">Tài khoản của
                            tôi</a>
                    </li>
                    <li class="header__navbar-user-menu-item header__navbar-user-menu-item--separate">
                        <a href="home/logout">Đăng xuất</a>
                    </li>
                </ul>
                <?php } else { ?>

                <span class="header__navbar-user-name">Tài khoản </span>
                <ul class="header__navbar-user-menu">
                    <li class="header__navbar-user-menu-item">
                        <a href="home/login">Đăng nhập</a>
                    </li>
                    <li class="header__navbar-user-menu-item">
                        <a href="home/register">Đăng kí</a>
                    </li>
                    <li class="header__navbar-user-menu-item">
                        <a href="home/forgotpws">Quên mật khẩu</a>
                    </li>
                </ul>

                <?php }?>
            </li>
        </div>
    </div>
</div>