<?php

class dashboard extends Controller
{
    private $account;
    private $actualProduct;
    private $admin;
    private $cartDetails;
    private $cart;
    private $category;
    private $comment;
    private $customer;
    private $detailedParameters;
    private $favorite;
    private $feedback;
    private $insurance;
    private $order;
    private $parameter;
    private $parameterType;
    private $payments;
    private $product;
    private $promotionDetails;
    private $promotion;
    private $supplier;
    
    // khai báo model qua các biến
    function __construct()
    {
        $this->account = $this->model("accountModel");
        $this->actualProduct = $this->model("actualProductModel");
        $this->admin = $this->model("adminModel");
        $this->cartDetails = $this->model("cartDetailsModel");
        $this->cart = $this->model("cartModel");
        $this->category = $this->model("categoryModel");
        $this->comment = $this->model("commentModel");
        $this->customer = $this->model("customerModel");
        $this->detailedParameters = $this->model("detailedParametersModel");
        $this->favorite = $this->model("favoriteModel");;
        $this->feedback = $this->model("feedbackModel");
        $this->insurance = $this->model("insuranceModel");
        $this->parameterType = $this->model("parameterTypeModel");
        $this->order = $this->model("orderModel");
        $this->parameter = $this->model("parameterModel");
        $this->payments = $this->model("paymentsModel");
        $this->product = $this->model("productModel");
        $this->promotionDetails = $this->model("promotionDetailsModel");
        $this->promotion = $this->model("promotionModel");
        $this->supplier = $this->model("supplierModel");
        if(!isset($_SESSION['user']) || $_SESSION['user']['level'] == 1){
            header("Location: /NLNGANH/");
        }
    }
    function index()
    {
        header("Location: /NLNGANH/dashboard/order_management");
    }
    
    function order_management()#
    {
        
        $status = null;
        $customer = null;
        $admin = null;
        $carts = $this->cart->selectAll();
        $promotions = $this->promotion ->selectAll();
        foreach ($carts as $cart) {
            $order = $this->order->selectWithCartID($cart['ma gh']);
            $products = null;
            $status = $this->cart->statusOfCart($order['ma gh']);
            $customer = $this->customer->selectWithCustomerID($order['ma kh']);
            $admin = $this->admin->selectWithAdminID($order['ma ad'] != NULL ? $order['ma ad'] : 0);
            
            $cart_details = $this->cartDetails->selectAllOfCart($order['ma gh']);
            if(!empty($cart_details)) {
                foreach ($cart_details as $cart_detail) {
                    $percentage = 0;
                    if (!empty($promotions)) {
                        foreach ($promotions as $promotion) {
                            $newPercentage = $this->promotionDetails->select($cart_detail['ma sp'], $promotion['ma khuyen mai']) != null ? $this->promotionDetails->select($cart_detail['ma sp'], $promotion['ma khuyen mai'])['phan tram khuyen mai'] : 0;
                            $percentage = $percentage < $newPercentage ? $newPercentage : $percentage;
                        }
                    }
                    $product = $this->product->selectWithID($cart_detail['ma sp']);
                    $products[] = [
                        "product" => $product,
                        "quantily" => $cart_detail['so luong'],
                        "promotion" => $percentage,
                        "insurance" => $this->insurance->select($product['ma bao hanh']),
                    ];
                }
            }
            $delivery[] = [
                "order" => $order,
                "status" => $status,
                "customer" => $customer,
                "admin" => $admin,
                "products" => $products,
            ];
            unset($products);
        }

        $data = [
            "page" => "Order Management",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "delivery" => $delivery,
        ];
        $this->view("view3", $data);
    }
    function information($admin_id)#
    {
        $admin = $this->admin->selectWithAdminID($admin_id);
        
        $data = [
            "page" => "Information",
            "header" => "header-admin",
            "header_data" => $this->header(),
            "customer" => $admin,
            "email" => $this->account->selectOne($admin["username"])
        ];
        $this->view("view2",$data);   
    }
    //update_information: cập nhật thông tin
    function update_information($customer_id)#
    {
        if(isset($_POST['register'])){
            var_dump($_POST);
            $id = $_POST['thongtinnd-id'];
            $name = $_POST['thongtinnd-name'];
            $birthday = $_POST['thongtinnd-birthday'];
            $phone = $_POST['thongtinnd-tel'];
            $address = $_POST['thongtinnd-diachi'];
            $email = $_POST['thongtinnd-email'];
            $customer = $this->admin->selectWithAdminID($id);
            if($this->admin->selectWithAdminID($id)){
                
                if($this->admin->update($id , $name, $birthday, $phone, $address)){
                    $username = $customer["username"];
                    $this->account->updateEmail($username, $email);
                    header("Location: /NLNGANH/home/information/".$id);
                } else {
                    $data = [
                        "page" => "Update Infomation",
                        "header" => "header-admin",
                        "header_data" => $this->header(),
                        "customer" => $customer,
                        "email" => $this->account->selectOne($customer["username"]),
                        "error" => "Cập nhật người dùng không thành công!"
                    ];
                    $this->view("view2",$data);   
                }
            } else {
                $data = [
                    "page" => "Update Infomation",
                    "header" => "header-admin",
                    "header_data" => $this->header(),
                    "customer" => $customer,
                    "email" => $this->account->selectOne($customer["username"]),
                    "error" => "Người dùng không tồn tại!"
                ];
                $this->view("view2",$data);   
            }
            
            die();
        }
        $customer = $this->admin->selectWithAdminID($customer_id);
        $data = [
            "page" => "Update Infomation",
            "header" => "header-admin",
            "header_data" => $this->header(),
            "customer" => $customer,
            "email" => $this->account->selectOne($customer["username"]),
        ];
        
        $this->view("view2",$data);   
    }
    function reset_password()#
    {
        if(isset($_POST['resetpass'])){
            if($_SESSION['user']['level'] == 1 || $_SESSION['user']['level'] == 0){
                if($_SESSION['user']['level'] == 0){
                    $id = "ma kh";
                    $user = $this->customer->selectWithCustomerID($_SESSION['user']['user']);
                } else {
                    $user = $this->admin->selectWithAdminID($_SESSION['user']['user']);
                    $id = "ma ad";
                }
                
                if($user != "null"){

                    $username = $user["username"];
                    $pass = $_POST['repass'];
                    $repass = $_POST['repass2'];
                    if($pass != $repass){
                        $data = [
                            "page" => "Reset Password",
                            "header" => "header-admin",
                            "header_data" => $this->header(),
                            "error" => "Mật khẩu không khớp!"
                        ];
                    } else {
                        $this->account->updatePassword($username, $pass);
                        header("Location: /NLNGANH/dashboard/information/".$user[$id]);
                    }
                } else {
                    $data = [
                        "page" => "Reset Password",
                        "header" => "header-admin",
                        "header_data" => $this->header(),
                        "error" => "Người dùng không tồn tại!"
                    ];
                }
            } else {
                    $data = [
                        "page" => "Reset Password",
                        "header" => "header-admin",
                        "header_data" => $this->header(),
                        "error" => "Vui lòng kiểm tra lại. Bạn chưa đăng nhập!"
                    ];
            }
            $this->view("view2",$data);   
            die();
        }
        $data = [
            "page" => "Reset Password",
            "header" => "header-admin",
            "header_data" => $this->header(),
            "customer" => $_SESSION['user']['user']
        ];
        $this->view("view2",$data);   
    }
    function remove_customer($customer_id)#
    {
        $this->account->delete($this->customer->selectWithCustomerID($customer_id)['username']);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    function customer_management()#
    {
        $customerss = null;
        $customers = $this->customer->selectAll();
        foreach ($customers as $customer) {
            if ($this->account->existWithU($customer['username'])) {
                $customerss[] = [
                    "account" => $this->account->selectOne($customer['username']),
                    "customer" => $customer
                ];
            }
        }
        $data = [
            "page" => "Customer Management",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "customer" => $customerss
        ];
        $this->view("view3", $data);
    }
    
    function product_management()#
    {
        $products = $this->product->selectNewest();
        foreach ($products as $product) {
            $insurance = $this->insurance->select($product['ma bao hanh']);
            $category = $this->category->selectWithID($product['ma loai sp']);
            $datas[] = [
                "product" => $product,
                "insurance" => $insurance,
                "category" => $category
            ];
        }
        $data = [
            "page" => "Product Management",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "product" => $datas
        ];
        $this->view("view3", $data);
    }
   
    function supplier_management()#
    {
        $suppliers = $this->supplier->selectAll();
        
        $data = [
            "page" => "Supplier Management",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "supplier" => $suppliers
        ];
        $this->view("view3", $data);
    }
    function add_supplier()#
    {
        if (isset($_POST['btnAddSupplier'])) {
            $supplier_name = $_POST['supplier_name'];
            $supplier_address = $_POST['supplier_address'];
            if ($this->supplier->insert($supplier_name, $supplier_address)) {
                header("Location: /NLNGANH/dashboard/supplier_management");
            } else {
                $data = [
                    "page" => "Add Supplier",
                    "aside-page" => "aside-admin",
                    "header_data" => $this->header(),
                    "error" => "Tên nhà cung cấp này đã tồn tại này đã tồn tại!"
                ];
            }
        } else {
            $data = [
                "page" => "Add Supplier",
                "aside-page" => "aside-admin",
                "header_data" => $this->header()
            ];
        }
        $this->view("view3", $data);
    }

    function update_supplier(int $supplier_id = null )#
    {
        if (isset($_POST['btnUpdateSupplier'])) {
            $supplier_id = $_POST['supplier_id'];
            $supplier_name = $_POST['supplier_name'];
            $supplier_address = $_POST['supplier_address'];
            if ($this->supplier->update($supplier_id, $supplier_name, $supplier_address)) {
                header("Location: /NLNGANH/dashboard/supplier_management");
            } else {
                $data = [
                    "page" => "Update Supplier",
                    "aside-page" => "aside-admin",
                    "header_data" => $this->header(),
                    "error" => "Tên nhà cung cấp này đã tồn tại này đã tồn tại!"
                ];
            }
        } else {
            $data = [
                "page" => "Update Supplier",
                "aside-page" => "aside-admin",
                "header_data" => $this->header(),
                "supplier" => $this->supplier->selectWithID($supplier_id),
            ];
        }
        $this->view("view3", $data);
    }
    function add_actual_product(int $product_id = null)# 
    {
        if (isset($_POST['btnAddActualProduct'])) {
            $product_seri = $_POST['seri'];
            $product_id = $_POST['product_id'];
            if ($this->actualProduct->insert($product_id, $product_seri)) {
                $data = [
                    "page" => "Add Actual Product",
                    "aside-page" => "aside-admin",
                    "header_data" => $this->header(),
                    "product" => $this->product->selectWithID($product_id),
                    "success" => "Thêm số Seri thành công!",
                ];
            } else {
                $data = [
                    "page" => "Add Actual Product",
                    "aside-page" => "aside-admin",
                    "header_data" => $this->header(),
                    "product" => $this->product->selectWithID($product_id),
                    "error" => "Số Seri này đã tồn tại này đã tồn tại!",
                ];
            }
        } else {
            $data = [
                "page" => "Add Actual Product",
                "aside-page" => "aside-admin",
                "product" => $this->product->selectWithID($product_id),
                "header_data" => $this->header()
            ];
        }
        $this->view("view3", $data);
        
    }
    function remove_supplier(int $supplier_id = null )#
    {
        $this->supplier->delete($supplier_id);
        header("Location: /NLNGANH/dashboard/supplier_management");
    }
    function logout()#
    {
        unset($_SESSION['user']);
        header("Location: /NLNGANH/");
    }
    function json_specification()#
    {
        $types = $this->parameterType->selectAll();
        foreach ($types as $type) {
            $data[$type['ma loai ts']] = $this->parameter->selectWithType($type['ma loai ts']);
        }
        echo json_encode($data);
    }
    function add_product()#
    {
        if (isset($_POST['btnAddProduct'])) {
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $category_id = $_POST['category_id'];
            $insurance_id = $_POST['insurance_id'];
            $product_image = $_FILES['addproduct-imgs'];
            $product_description = $_POST['description'];
            $specifications = explode("<br />", nl2br($_POST['specification']));
            echo '
            <base href="/NLNGANH/" target="_self">';
            $folder = "public/uploads/";
            $product_images = $folder . $product_image['name'][0];
            move_uploaded_file($product_image['tmp_name'][0], $product_images);
            $product_id = $this->product->insert(
                $product_name,
                $product_price,
                $product_description,
                $product_images,
                $category_id,
                $insurance_id
            );
           
            foreach ($specifications as $specification) {

                $spe = explode(":", $specification);
                if (isset($spe[1])) {
                    $specification_id = $this->parameter->selectIDWithName(trim($spe[0]));
                    $this->detailedParameters->insert($product_id, $specification_id, $spe[1]);
                }
            }
            header("Location: /NLNGANH/dashboard/product_management");
            die();
        }
        
        $category = $this->category->selectAll();
        $insurance = $this->insurance->selectAll();
        $specification_type = $this->parameterType->selectAll();
        $specification = $this->parameter->selectWithType($specification_type[0]['ma loai ts']);

        $data = [
            "page" => "Add Product",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "product" => [
                "category" => $category,
                "insurance" => $insurance,
                "specification_type" => $specification_type,
                "specification" => $specification
            ]
        ];
        $this->view("view3", $data);
    }
    
    function remove_product($product_id)#
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['level'] == 0) {
            $this->product->delete($product_id);
        }

        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    function update_product($product_id)#
    {
        if (isset($_POST['btnUpdateProduct'])) {
            $id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $category_id = $_POST['category_id'];
            $insurance_id = $_POST['insurance_id'];
            $product_description = $_POST['description'];
            $specifications = explode("<br />", nl2br($_POST['specification']));

            $this->product->update(
                $id,
                $product_name,
                $product_price,
                $product_description,
                $category_id,
                $insurance_id
            );
            $this->detailedParameters->deleteAll($product_id);
            foreach ($specifications as $specification) {

                $spe = explode(":", $specification);
                if (isset($spe[1])) {
                    $specification_id = $this->parameter->selectIDWithName(trim($spe[0]));
                    $this->detailedParameters->insert($product_id, $specification_id, $spe[1]);
                }
            }
            header("Location: /NLNGANH/dashboard/product_management");
            die();
        }
        $category = $this->category->selectAll();
        $insurance = $this->insurance->selectAll();
        $specification_type = $this->parameterType->selectAll();
        $specification = $this->parameter->selectAll($specification_type[0]['ma loai ts']);

        $product = $this->product->selectWithID($product_id);
        $detailed_specifications = $this->detailedParameters->select($product_id);
        foreach ($detailed_specifications as $detailed_specification) {
            $details[] = [
                "specification_name" => $this->parameter->selectNameWithID($detailed_specification['ma ts']),
                "details" => $detailed_specification['gia tri thong so']
            ];
        }
        $data = [
            "page" => "Update Product",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "product" => [
                "category" => $category,
                "insurance" => $insurance,
                "specification_type" => $specification_type,
                "specification" => $specification
            ],
            "this_product" => [
                "product" => $product,
                "details" => $details
            ]
        ];
        $this->view("view3", $data);
    }
    function caterogy_management()#
    {
        $categorys = $this->category->selectAll();
        foreach ($categorys as $category) {
            $datas[] = [
                "category" => $category,
                "count" => $this->product->countWithCategoryID($category['ma loai sp']),
                "supplier" => $this->supplier->selectWithID($category['ma ncc']),
            ];
        }
        $data = [
            "page" => "Caterogy Management",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "category" => $datas
        ];
        $this->view("view3", $data);
    }

    function add_caterogy()#
    {
        if (isset($_POST['btnAddCategory'])) {
            $category_name = $_POST['category_name'];
            $supplier_id = $_POST['supplier_id'];
            if ($this->category->insert($category_name, $supplier_id)) {
                header("Location: /NLNGANH/dashboard/caterogy_management");
            } else {
                $data = [
                    "page" => "Add Caterogy",
                    "aside-page" => "aside-admin",
                    "header_data" => $this->header(),
                    "supplier" => $this->supplier->selectAll(),
                    "error" => "Loại sản phẩm này đã tồn tại!"
                ];
            }
        } else {
            $data = [
                "page" => "Add Caterogy",
                "aside-page" => "aside-admin",
                "header_data" => $this->header(),
                "supplier" => $this->supplier->selectAll(),
            ];
        }
        $this->view("view3", $data);
    }
    function update_category($category_id)#
    {
        if (isset($_POST['btnUpdateCategory'])) {
            $category_name = $_POST['category_name'];
            $supplier_id = $_POST['supplier_id'];
            if ($this->category->update($category_id, $category_name, $supplier_id)) {
                header("Location: /NLNGANH/dashboard/caterogy_management");
            }
        }

        $data = [
            "page" => "Update Caterogy",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "supplier" => $this->supplier->selectAll(),
            "category" => [
                "id" => $category_id,
                "name" => $this->category->selectWithID($category_id)
            ]
        ];
        $this->view("view3", $data);
    }
    function remove_category($category_id)#
    {
        $this->category->delete($category_id);
        header("Location: /NLNGANH/dashboard/caterogy_management");
    }

    
    function promotion_management()#
    {
        $promotions = $this->promotion->selectAll();
        $data = [
            "page" => "Promotion Management",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "promotion" => $promotions
        ];
        $this->view("view3", $data);
    }
    function add_promotion()#
    {
        if (isset($_POST['btnAddPromotion'])) {
            $promotion_name = $_POST['promotion_name'];
            $promotion_image = $_FILES['addproduct-imgs'];
            $promotion_start_day = $_POST['promotion_start_day'];
            $promotion_end_day = $_POST['promotion_end_day'];

            echo '<base href="/NLNGANH/" target="_self">';
            $folder = "public/uploads/banners/";
            $promotion_images = $folder . $promotion_image['name'][0];
            if ($this->promotion->insert($promotion_name, $promotion_images, $promotion_start_day, $promotion_end_day)) {
                move_uploaded_file($promotion_image['tmp_name'][0], $promotion_images);
                header("Location: /NLNGANH/dashboard/promotion_management");
            } else {
                $data = [
                    "page" => "Add Promotion",
                    "aside-page" => "aside-admin",
                    "header_data" => $this->header(),
                    "error" => "Khuyến mãi này đã tồn tại!"
                ];
            }
        } else {
            $data = [
                "page" => "Add Promotion",
                "aside-page" => "aside-admin",
                "header_data" => $this->header()
            ];
        }
        $this->view("view3", $data);
    }
    function update_promotion($promotion_id)#
    {

        if (isset($_POST['btnUpdatePromotion'])) {
            $promotion_name = $_POST['promotion_name'];
            $promotion_time_start = $_POST['promotion_start_day'];
            $promotion_time_end = $_POST['promotion_end_day'];
            if ($this->promotion->update($promotion_id, $promotion_name, $promotion_time_start, $promotion_time_end)) {
                header("Location: /NLNGANH/dashboard/promotion_management");
            }
        }

        $data = [
            "page" => "Update Promotion",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "promotion" => $this->promotion->select($promotion_id)[0]
        ];
        $this->view("view3", $data);
    }
    function remove_promotion($promotion_id)#
    {
        $this->promotion->delete($promotion_id);
        header("Location: /NLNGANH/dashboard/promotion_management");
    }
    function add_product_promotion($promotion_id)#
    {
        if (isset($_POST['btnAddProductPromotion'])) {
            $product_id = $_POST['product_id'];
            $promotion_details_percentage = $_POST['promotion_details_percentage'];
            if ($this->promotionDetails->insert($product_id, $promotion_id, $promotion_details_percentage)) {
                header("Location: /NLNGANH/dashboard/promotion_management");
            }
        }

        $data = [
            "page" => "More Promotions For Products",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "promotion" => $this->promotion->select($promotion_id)[0],
            "product" => $this->product->selectNewest()
        ];
        $this->view("view3", $data);
    }

    function feedback_management()#
    {
        if (isset($_POST['btnAdminFeedback'])) {
            $feedback_id = $_POST['feedback_id'];
            $admin_feedback_content = $_POST['admin_feedback_content'];
            $admin_id = $_SESSION['user']['user'];
            $this->feedback->insert($feedback_id, $admin_feedback_content, $admin_id);
        }
        $comments = $this->comment->selectAll();
        $datas = [];
        foreach ($comments as $comment) {
            $admin = null;
            $product = $this->product->selectWithID($comment['ma sp']);
            $customer = $this->customer->selectWithCustomerID($comment['ma kh']);
            $feedback = !empty($this->feedback->select($comment['ma dg'])) ? $this->feedback->select($comment['ma dg'])[0] : null;
            $admin = !empty($this->feedback->select($comment['ma dg'])) ? $this->admin->selectWithAdminID($feedback['ma ad']): null;

            $datas[] = [
                "feedback" => $comment,
                "product" => $product,
                "customer" => $customer,
                "admin-feedback" => $feedback,
                "admin" => $admin
            ];
        }
        $data = [
            "page" => "Feedback Management",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "comments" => $datas
        ];
        $this->view("view3", $data);
    }
    function remove_feedback($comment_id)#
    {   
        $this->feedback->delete($comment_id);
        $this->comment->delete($comment_id);
        header("Location: /NLNGANH/dashboard/feedback_management");
    }

    function statistical()#
    {
        
        $month = (int) date("m");
        $year = (int) date("Y");
        
        if(isset($_POST['month'])){
            $month = date_format(date_create($_POST['month']),"m");
            $year = date_format(date_create($_POST['month']),"Y");
        }
        $orders = $this->order->selectWithPaidAndDate($month, $year);
        $count = count($orders);
        $turnover = 0;
        foreach($orders as $order){
            $details = $this->cartDetails->selectAllOfCart($order['ma gh']);
            $promotions = $this->promotion->selectWithTime($order['ngay lap']);
            $max_percent = 0;
            foreach($details as $detail){

                if(!empty($promotions)){
                    foreach($promotions as $promotion){
                        $detailpromo = $this->promotionDetails->select($detail['ma sp'], $promotion['ma khuyen mai']);
                        $percentage = $detailpromo != null ? $detailpromo['phan tram khuyen mai'] : 0 ;
                        $max_percent = $percentage > $max_percent ? $percentage : $max_percent;
                    }
                }
                $pro_price = $this->product->selectWithID($detail['ma sp'])['gia sp'];
                
                $turnover += ($detail['so luong']*$pro_price - $detail['so luong']*$pro_price*$max_percent/100);
                
                if(!isset($products[$detail['ma sp']])){
                    $products[$detail['ma sp']] = $detail['so luong'];
                } else {
                    $products[$detail['ma sp']] += $detail['so luong'];
                }
            }
        }
        if(!isset($products))
        {
            $max = 0;
            $min = 0;
            $max_quatily = 0;
            $max_quatily = 0;
        } else {
            $max = 0;
            $min = 0;
            $max_quatily = 0;
            $min_quatily = 999999;
            foreach($products as $index => $product){
                if($max_quatily < $product){
                    $max = $index;
                    $max_quatily = $product;
                }
                if($min_quatily > $product){
                    $min = $index;
                    $min_quatily = $product;
                }
            }
        }
        
        
        $data = [
            "page" => "Statistical",
            "aside-page" => "aside-admin",
            "header_data" => $this->header(),
            "turnover" => $turnover,
            "count_order" => $count,
            "product_max" => $this->product->selectWithID($max),
            "product_min" => $this->product->selectWithID($min),
            "month" => $month . "/" . $year
        ];
        $this->view("view3", $data);
    }
    function censorship($order_status, $order_id)#
    {
        $cart_id = $this->order->selectWithID($order_id)['ma gh'];
        if ($order_status == "3") {
            $admin_id = $_SESSION['user']['user'];
            $this->order->update($cart_id, $admin_id ,date("Y-m-d"));
        }
        $this->cart->update($cart_id, $order_status);
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
    
    function ordersplaced($order_id)#
    {
        $order = $this->order->selectWithID($order_id);
        $status = null;
        $customer = null;
        $admin = null;
        $cart = $this->cart->select($order['ma gh']);
        $promotions = $this->promotion ->selectWithTime($order['ngay lap']);
            
            $products = null;
            $status = $this->cart->statusOfCart($order['ma gh']);
            $customer = $this->customer->selectWithCustomerID($order['ma kh']);
            $admin = $this->admin->selectWithAdminID($order['ma ad'] != NULL ? $order['ma ad'] : 0);
            
            $cart_details = $this->cartDetails->selectAllOfCart($order['ma gh']);
            if(!empty($cart_details)) {
                foreach ($cart_details as $cart_detail) {
                    $percentage = 0;
                    if (!empty($promotions)) {
                        foreach ($promotions as $promotion) {
                            $newPercentage = !empty($this->promotionDetails->select($cart_detail['ma sp'], $promotion['ma khuyen mai'])) ? $this->promotionDetails->select($cart_detail['ma sp'], $promotion['ma khuyen mai'])['phan tram khuyen mai'] : 0;
                            $percentage = $percentage < $newPercentage ? $newPercentage : $percentage;
                        }
                    }
                    $product = $this->product->selectWithID($cart_detail['ma sp']);
                    $products[] = [
                        "product" => $product,
                        "quantily" => $cart_detail['so luong'],
                        "promotion" => $percentage,
                        "insurance" => $this->insurance->select($product['ma bao hanh']),
                    ];
                }
            }
            $delivery = [
                "order" => $order,
                "payment" => $this->payments->exist($order['so hd']),
                "status" => $status,
                "customer" => $customer,
                "admin" => $admin,
                "products" => $products,
            ];

        $data = [
            "page" => "Orders Placed",
            "header" => $this->header()['level'] == 0 ? "header-admin" : "header",
            "header_data" => $this->header(),
            "delivery" => $delivery,
        ];
        $this->view("view3", $data);
    }
    private function header(){
        $cart_id = "ma gh";
        if(isset($_SESSION['user'])){
            $favorite = $this->favorite->count($_SESSION['user']['user']);
            $orders = $this->order->selectWithCustomerID($_SESSION['user']['user']);
            if(!empty($orders)){
                foreach($orders as $order){
                    if($this->cart->statusOfCart($order[$cart_id]) == 1 ){
                        $cart = $this->cartDetails->countProductOfCart($order[$cart_id]);
                    }
                    else{
                        $cart = 0;
                    }
                }
            } else {
                $cart = 0;
            }
            if($_SESSION['user']['level'] == 1){
                $user = $this->customer->selectWithCustomerID($_SESSION['user']['user']);
                $level = 1;
            } else {
                $user = $this->admin->selectWithAdminID($_SESSION['user']['user']);
                $level = 0;
            } 
        } else {
            $favorite = 0;
            $cart = 0 ;
            $user = "null";
            $level = -1;
        }
        if($level == 1){
            header("Location: /");
        }
        $data = [
            "favorite" => $favorite,
            "cart" => $cart,
            "user" => $user,
            "level" => $level,
            "ordering" => $this->cart->count(),
        ];
        return $data;
    }
}