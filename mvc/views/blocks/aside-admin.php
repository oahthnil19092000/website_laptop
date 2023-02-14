<aside style="margin-right: 10px; border-radius: 5px; min-height: 10%;"
    class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <style>
        li a {
            font-size: 15px;
            color: black;
            opacity: 0.8;
        }
        </style>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="dashboard/order_management" class="nav-link">
                        <i class="nav-icon fas fa-tasks"></i>
                        <p>
                            Quản lý đơn hàng
                            <?php //if ($data['header']['countBill'] != 0) { ?>
                            <span class="right badge badge-success">
                                <?= $data['header_data']['ordering']. " Đơn" ?>
                            </span>
                            <?php //} ?>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="dashboard/customer_management" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Quản lý khách hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="dashboard/product_management" class="nav-link">
                                <i class="fas fa-th nav-icon"></i>
                                <p>Quản lý</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="dashboard/add_product" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Thêm sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Quản lý loại
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="dashboard/caterogy_management" class="nav-link">
                                <i class="fas fa-th nav-icon"></i>
                                <p>Quản lý</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="dashboard/add_caterogy" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Thêm loại</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Quản lý nhà cung cấp
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="dashboard/supplier_management" class="nav-link">
                                <i class="fas fa-th nav-icon"></i>
                                <p>Quản lý</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="dashboard/add_supplier" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Thêm nhà cung cấp</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-percent"></i>
                        <p>
                            Quản lý khuyến mãi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="dashboard/promotion_management" class="nav-link">
                                <i class="fas fa-th nav-icon"></i>
                                <p>Quản lý</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="dashboard/add_promotion" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Thêm khuyến mãi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="dashboard/feedback_management" class="nav-link">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            Quản lý bình luận đánh giá
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="dashboard/statistical" class="nav-link">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                            Thống kê
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>