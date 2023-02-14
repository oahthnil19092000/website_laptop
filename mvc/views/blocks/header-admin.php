<div class="grid">
    <div class="header-with-search">
        <!-- Logo -->
        <div class="header__logo">
            <a href="/NLNGANH/dashboard" class="header__logo-link">
                <img src="public/upload/logo1.png" alt="logo" class="logo-img">
            </a>
            <a href="/NLNGANH/dashboard" class="header__logo-name-link">
                <h3 class="logo-name">THẢO LINH</h3>
            </a>
        </div>
        <!-- Search -->

        <div class="header__navbar-list">
            <li class="header__navbar-item header__navbar-user">
                <i class="fas fa-user-circle avt"></i>
                <?php  if($data['header_data']['user'] != "null"){ ?>
                <span class="header__navbar-user-name">
                    <?php 
                        $name_customer = "ho ten ad";
                        $id_customer = "ma ad";
                        $name =  $data['header_data']['user'][$name_customer] ;
                        $names = explode(" ", $name);
                        echo $names[count($names)-2]." ". $names[count($names)-1];
                    ?>
                </span>
                <?php } ?>
                <ul class="header__navbar-user-menu">
                    <li class="header__navbar-user-menu-item">
                        <a href="dashboard/information/<?= $data['header_data']['user'][$id_customer]?>">Tài khoản của
                            tôi</a>
                    </li>
                    <li class="header__navbar-user-menu-item header__navbar-user-menu-item--separate">
                        <a href="dashboard/logout">Đăng xuất</a>
                    </li>
                </ul>
            </li>
        </div>
    </div>
</div>