<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{

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
    private $payments;
    private $product;
    private $promotion;
    private $promotionDetails;
    private $parameterTypes;
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
        $this->order = $this->model("orderModel");
        $this->parameter = $this->model("parameterModel");
        $this->payments = $this->model("paymentsModel");
        $this->product = $this->model("productModel");
        $this->promotion = $this->model("promotionModel");
        $this->promotionDetails = $this->model("promotionDetailsModel");
        $this->parameterTypes = $this->model("parameterTypeModel");
        if(isset($_SESSION['user']) && $_SESSION['user']['level'] == 0){
            header("Location: /NLNGANH/dashboard/");
        }
    }
    
    function index(){
        $products = $this->product->selectNewest() ;
        $category_id = "ma loai sp";
        $promotion_id = "ma khuyen mai";
        $product_id = "ma sp";
        $discount = "phan tram khuyen mai";
        $product_name = "ten sp";
        $promotions = $this->promotion->selectAll();
        if(!empty($products))
        
        foreach($products as $product){
            $percentage = 0;
            if(!empty($promotions))
            foreach($promotions as $promotion){
                if($this->promotionDetails->exist($product[$product_id], $promotion[$promotion_id]))
                {
                    $promotion_detail = $this->promotionDetails->select($product[$product_id],$promotion[$promotion_id]) != null ? $this->promotionDetails->select($product[$product_id],$promotion[$promotion_id])['phan tram khuyen mai'] : 0;
                } else {
                    $promotion_detail = 0;
                }
                if($percentage < $promotion_detail)
                    $percentage = $promotion_detail;
            }
            $datas[] = [
                "category" => $this->category->selectWithID($product[$category_id]),
                "product" => $product,
                "insurance" =>  $this->insurance->selectAll(),
                "promotion" => $percentage,
                "liked" => isset($_SESSION['user']) && $this->favorite->exist($_SESSION['user']['user'], $product[$product_id]),

            ];
        }
        else $datas = [];
        // echo "<pre>";
        // var_dump($datas);
        $data = [
            "page" => "Home",
            "header" => "header",
            "header_data" => $this->header(),
            "products" => $datas
        ];
        $this->view("view1",$data);
    }
    function search(){
        
        $products = $this->product->searchWithName($_POST['searchsp']);
        $category_id = "ma loai sp";
        $promotion_id = "ma khuyen mai";
        $product_id = "ma sp";
        $discount = "phan tram khuyen mai";
        $product_name = "ten sp";
        $promotions = $this->promotion->selectAll();
        if(!empty($products))
        
        foreach($products as $product){
            $percentage = 0;
            if(!empty($promotions))
            foreach($promotions as $promotion){
                if($this->promotionDetails->exist($product[$product_id], $promotion[$promotion_id]))
                {
                    $promotion_detail = $this->promotionDetails->select($product[$product_id],$promotion[$promotion_id]) != null ? $this->promotionDetails->select($product[$product_id],$promotion[$promotion_id])['phan tram khuyen mai'] : 0;
                } else {
                    $promotion_detail = 0;
                }
                if($percentage < $promotion_detail)
                    $percentage = $promotion_detail;
            }
            $datas[] = [
                "category" => $this->category->selectWithID($product[$category_id]),
                "product" => $product,
                "insurance" =>  $this->insurance->selectAll(),
                "promotion" => $percentage,
                "liked" => isset($_SESSION['user']) && $this->favorite->exist($_SESSION['user']['user'], $product[$product_id]),

            ];
        }
        else $datas = [];
        // echo "<pre>";
        // var_dump($datas);
        $data = [
            "page" => "Home",
            "header" => "header",
            "header_data" => $this->header(),
            "products" => $datas
        ];
        $this->view("view1",$data);
    }
    function category($category_id){
        $products = $this->product->selectWithCategoryID($category_id);
        $category_id = "ma loai sp";
        $promotion_id = "ma khuyen mai";
        $product_id = "ma sp";
        $discount = "phan tram khuyen mai";
        $product_name = "ten sp";
        $promotions = $this->promotion->selectAll();
        if(!empty($products)){
            foreach($products as $product){
                $percentage = 0;
                if(!empty($promotions))
                foreach($promotions as $promotion){
                    if($this->promotionDetails->exist($product[$product_id], $promotion[$promotion_id]))
                {
                    $promotion_detail = $this->promotionDetails->select($product[$product_id],$promotion[$promotion_id]) != null ? $this->promotionDetails->select($product[$product_id],$promotion[$promotion_id])['phan tram khuyen mai'] : 0;
                } else {
                    $promotion_detail = 0;
                }
                    if($percentage < $promotion_detail)
                        $percentage = $promotion_detail;
                }
                $datas[] = [
                    "category" => $this->category->selectWithID($product[$category_id]),
                    "product" => $product,
                    "insurance" =>  $this->insurance->selectAll(),
                    "promotion" => $percentage,
                    "liked" => isset($_SESSION['user']) && $this->favorite->exist($_SESSION['user']['user'], $product[$product_id]),

                ];
            }
        } else $datas = [];
        // echo "<pre>";
        // var_dump($datas);
        $data = [
            "page" => "Home",
            "header" => "header",
            "header_data" => $this->header(),
            "products" => $datas
        ];
        $this->view("view1",$data);
    }
    // chi tiết sản phẩm
    function product($product_id){
        if($this->product->existWithID($product_id)){
            if(isset($_POST['commentBtn']) && isset($_SESSION['user']) && $_SESSION['user']['level'] == 1){
                $score_rating = $_POST['star'];
                $id = $_POST['masp-danhgia'];
                $comment_content = $_POST['danhgia'];
                $customer_id = $_SESSION['user']['user'];
                $this->comment->insert($id, $customer_id, $comment_content, $score_rating);
            }
            $product = $this->product->selectWithID($product_id);
            $brand = $this->category->selectWithID($product['ma loai sp']);
            $insurance = $this->insurance->select($product['ma bao hanh']);
            $promotions = $this->promotion->selectAll();
            $promo =0;
            $promo_name = "";
            $comments = $this->comment->selectAllOfProduct($product_id);
            if(!empty($comments))
            foreach($comments as $comment){
                $customer_id = $comment['ma kh'];
                if(isset($_SESSION['user']) && $customer_id == $_SESSION['user']['user'] && $_SESSION['user']['level'] ==1){
                    $customer = "Bạn";
                } else {
                    $customer_arr = $this->customer->selectWithCustomerID($customer_id);
                    $customers = explode(' ', $customer_arr['ho ten kh']);
                    $customer = implode(" ",[$customers[count($customers)-2],$customers[count($customers)-1]]);
                }

                $feedback = $this->feedback->select($comment['ma dg']);
                if(!empty($feedback)){
                    $admin_id = $feedback[0]['ma ad'];
                    if(isset($_SESSION['user']) && $admin_id == $_SESSION['user']['user'] && $_SESSION['user']['level'] ==0){
                        $admin = "Bạn";
                    } else {
                        $admin_arr = $this->admin->selectWithAdminID($admin_id);
                        $admins = explode(' ', $admin_arr['ho ten ad']);
                        $admin = implode(" ",[$admins[count($admins)-2],$admins[count($admins)-1]]);
                    }
                } else 
                {
                    $admin = NULL;
                    $feedback[] = NULL;
                }
                $comment_all[] = [
                    "comment_content" => $comment,
                    "customer_name" => $customer,
                    "admin_feedback_content" => $feedback[0],
                    "admin_name" => $admin 
                ];
            } else 
            $comment_all = NULL;
            foreach($promotions as $promotion){
                if($this->promotionDetails->exist($product_id, $promotion['ma khuyen mai'])){
                    $new = $this->promotionDetails->select($product_id, $promotion['ma khuyen mai']);
                    if($new['phan tram khuyen mai'] > $promo){
                        $promo = $new['phan tram khuyen mai'];
                        $promo_name = $promotion['ten khuyen mai'];
                    }
                }
            }
            $parameters_types =  $this->parameterTypes->selectAll();
            foreach($parameters_types as $parameters_type){
                $parameters = $this->parameter->selectWithType($parameters_type['ma loai ts']);
                foreach($parameters as $parameter){
                    $detailedParameter = $this->detailedParameters->selectOne($product_id,$parameter['ma ts']);
                    if(strpos(" ".$detailedParameter,", ")!= 0 ){
                        $detailedParameter = "- ". str_replace(", ","<br />- ",$detailedParameter);
                    }
                    $detail[] = [
                        "name" => $parameter['thong so'],
                        "value" => $detailedParameter
                    ];
                }
                $details[] = [
                    "name_type" => $parameters_type['ten loai ts'],
                    "details" => $detail
                ];
                unset($detail);
            }
            $data = [
                "page" => "Product",
                "header" => "header",
                "header_data" => $this->header(),
                "product_info" => [
                    "info" => $product,
                    "quantity" => $this->actualProduct->count($product_id),
                    "like" => isset($_SESSION['user']) &&  $_SESSION['user']['level'] ==1 ? $this->favorite->exist($_SESSION['user']['user'], $product_id) : false,
                    "brand" => $brand,
                    "insurance" => $insurance,
                    "detail" => $details,
                    "promotion" => $promo,
                    "promotion_name" => $promo_name,
                    "comments" => $comment_all,
                ]
            ];
            $this->view("view2",$data);
        } else {
            header("Location: /");
        }
        
    }
    function cart(){
        if(isset($_SESSION['user']) && $_SESSION['user']['level'] == 1){
            if(isset($_POST['btnPayments'] )){
                $user_id = $_SESSION['user']['user'];
                $cart_id = $_POST['ID_Cart'];
                $products_id = $_POST['ID_Products'];
                $delivery_phone = $_POST['sdtdathang'];
                $delivery_address = $_POST['address'].", ".$_POST['ward'];
                $payments = $_POST['payments'] == '2' ? true : false;

                $cart_details = $this->cartDetails->selectAllOfCart($cart_id);
                if (count($products_id) == $this->cartDetails->countProductOfCart($cart_id)) {
                    $this->order->order($cart_id, $delivery_address , $delivery_phone, date("Y-m-d H:i:s"));
                    $this->cart->update($cart_id, 2);
                } else {

                    $this->cart->insert($user_id);

                    $cart1_id = $this->cart->selectLastID();
                    foreach ($cart_details as $detail) {

                        if (!in_array($detail['ma sp'], $products_id)) {
                            
                            $this->cartDetails->move($cart_id, $cart1_id, $detail['ma sp']);
                        }
                    }
                    $this->order->insert($cart1_id, $user_id);
                    $this->order->order($cart_id, $delivery_address , $delivery_phone, date("Y-m-d H:i:s"));
                    $this->cart->update($cart_id, 2);
                }

                if ($payments) {
                    header("Location: /NLNGANH/home/payment_vnpay/" . $cart_id);
                    die();
                }
                header("Location: /NLNGANH/");
                die();
            } else{
                $customer_id = $_SESSION['user']['user'];
                $deliverys = $this->order->selectWithCustomerID($customer_id);
                $cart = null;
                $orders = null;
                $cart_detail = null;
                $cart_details = null;
                $order_items = null;
                $promotion_of_cart = $this->promotion->selectAll();
                if(!empty($deliverys))
                    foreach($deliverys as $delivery){
                        if($this->cart->statusOfCart($delivery['ma gh']) == 1){
                            $cart = $delivery; 
                        } else {
                            $orders[] = $delivery;
                        }
                    }
                
                if($cart != null){
                    $cart_detail = $this->cartDetails->selectAllOfCart($cart['ma gh']);
                }
                if($cart_detail != null ){
                    foreach($cart_detail as $detail){
                        if(!empty($promotion_of_cart)){
                            foreach($promotion_of_cart as $promo){
                                if($this->promotionDetails->exist($detail['ma sp'], $promo['ma khuyen mai'])){
                                    $tmp = $this->promotionDetails->select($detail['ma sp'], $promo['ma khuyen mai']);
                                    $promotion = $tmp['phan tram khuyen mai'];
                                } else $promotion = 0;
                            }
                        }
                        else $promotion = 0;
                        $cart_details[] = [
                            "product_info" => $this->product->selectWithID($detail["ma sp"]),
                            "quantily" => $detail["so luong"],
                            "max_quantily" => $this->actualProduct->count($detail["ma sp"]),
                            "promotion" => $promotion,
                        ];
                    }
                }
                $cart = [
                    "cart_id" => $cart!= null ?  $cart['ma gh']: null,
                    "details" => $cart_details,
                ];
                $cart_details = null;
                if($orders != null)
                foreach($orders as $order){
                    if($order != null){
                        $cart_detail = $this->cartDetails->selectAllOfCart($order['ma gh']);
                        $promotion_of_cart = $this->promotion->selectWithTime($order['ngay lap']);
                    }
                    if($cart_detail != null ){
                        foreach($cart_detail as $detail){
                            if(!empty($promotion_of_cart)){
                                foreach($promotion_of_cart as $promo){
                                    if($this->promotionDetails->exist($detail['ma sp'], $promo['ma khuyen mai'])){
                                        $tmp = $this->promotionDetails->select($detail['ma sp'], $promo['ma khuyen mai']);
                                        $promotion = $tmp['phan tram khuyen mai'];
                                    } else $promotion = 0;
                                }
                            }
                            else $promotion = 0;
                            $cart_details[] = [
                                "product_info" => $this->product->selectWithID($detail["ma sp"]),
                                "insurance" => $this->insurance->select($this->product->selectWithID($detail["ma sp"])['ma bao hanh']),
                                "quantily" => $detail["so luong"],
                                "max_quantily" => $this->actualProduct->count($detail["ma sp"]),
                                "promotion" => $promotion,
                            ];
                        }
                    }
                    $order_items[] = [
                        "cart_id" => $order['ma gh'],
                        "cart" => $order,
                        "status" => $this->cart->statusOfCart($order['ma gh']),
                        "details" => $cart_details,
                    ];
                    $cart_details = null;
                }
                $data = [
                    "page" => "Shoping Cart",
                    "header" => "header",
                    "header_data" => $this->header(),
                    "cart" => $cart,
                    "order" => $order_items,
                ];
                // echo "<pre>";
                // var_dump($data['cart']);
                $this->view("view2",$data);
            }
        } else {
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }
    }
    //yêu thích
    function like($product_id){
        if($this->product->existWithID($product_id))
            if(isset($_SESSION['user']) && $_SESSION['user']['level'] == 1){
                $customer_id = $_SESSION['user']['user'];
                $this->favorite->insert($customer_id, $product_id);
            }
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    function unlike($product_id){
        if($this->product->existWithID($product_id))
            if(isset($_SESSION['user']) && $_SESSION['user']['level'] == 1){
                $customer_id = $_SESSION['user']['user'];
                
                if($this->favorite->delete($customer_id, $product_id)){
                    echo "a";
                } else echo "b";
            }

        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    function update_product_in_cart($cart_id, $product_id, $product_quantily)
    {
        if(isset($_SESSION['user']) && $_SESSION['user']['level'] == 1)
        {
            $customer_id = $_SESSION['user']['user'];
            if($this->order->existCartOfCustomer($customer_id, $cart_id) && $this->cart->statusOfCart($cart_id) == 1){
                $this->cartDetails->update($cart_id,$product_id,$product_quantily);
            }
        }
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
    
    function buy_product()
    {
        if(isset($_POST['buyBtn'])){
            if(isset($_SESSION['user']) && $_SESSION['user']['level'] == 1)
            {
                $product_id = $_POST['product_id'];
                $product_quantily = $_POST['quantily'];
                $customer_id = $_SESSION['user']['user'];
                if(!empty($this->order->selectWithCustomerID($customer_id))){
                    $deliverys = $this->order->selectWithCustomerID($customer_id);
                    $cart_id = null;
                    foreach($deliverys as $delivery){
                        if($this->cart->statusOfCart($delivery['ma gh']) == 1){
                            $cart_id = $delivery['ma gh'];
                        }
                    }
                    if($cart_id == null){
                        $cart_id = $this->cart->insert();
                        $this->order->insert($cart_id, $customer_id);

                    } else {

                    }
                    if(!$this->cartDetails->insert($product_id,$cart_id,$product_quantily)){
                        $this->cartDetails->update($cart_id,$product_id,$product_quantily);
                    }
                } else {
                    $cart_id = $this->cart->insert();
                    $this->order->insert($cart_id, $customer_id);
                    if(!$this->cartDetails->insert($product_id,$cart_id,$product_quantily)){
                        $this->cartDetails->update($cart_id,$product_id,$product_quantily);
                    }
                }
            }
        }
        
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }

    function filter($attribute_1 = null, $value_1 = null,  $attribute_2 = null , $value_2 = null,  $attribute_3 = null , $value_3 = null)
    {
        if($attribute_1 != NULL){
            $attributes[] = [
                "attr" => $attribute_1,
                "val" => $value_1,
            ];
        }
        if($attribute_2 != NULL){
            $attributes[] = [
                "attr" => $attribute_2,
                "val" => $value_2,
            ];
        }
        if($attribute_3 != NULL){
            $attributes[] = [
                "attr" => $attribute_3,
                "val" => $value_3,
            ];
        }
        foreach($attributes as $attr){
            
            if($attr['attr'] == "price"){
                
                $val = $attr['val'];
                if($val == "duoi-10-trieu"){
                    $min = 0;
                    $max = 10000000;
                } else if($val == "tu-10-trieu-den-15-trieu"){
                    $min = 10000000;
                    $max = 15000000;
                } else if($val == "tu-15-trieu-den-20-trieu"){
                    $min = 15000000;
                    $max = 20000000;
                } else if($val == "tren-20-trieu"){
                    $min = 20000000;
                    $max = 1000000000;
                } else {
                    $min = 0;
                    $max = 1000000000;
                }
                $filters[] = $this->product->selectWithPrice($min, $max);
            } else if($attr['attr'] == "order_by"){
                $val = $attr['val'];
                if($val == "ban-chay")
                $pros = $this->cartDetails->count();
                if(!empty($pros)){
                    foreach($pros as $pro){
                        $prod[] = $this->product->selectWithID($pro['ma sp']);
                    }
                    $filters[] = $prod;
                }
            } else if($attr['attr'] == "sort"){
                $val = $attr['val'];
                if($val == "gia-tu-cao-den-thap")
                    $sort = "up";
                else $sort = "down";
            }
        }
        // khúc này ok
        if(count($filters) == 2 ){
            $test = array_intersect($filters[1],$filters[2]);
        } else $test = $filters[0];
        

        if(isset($sort)){
            for($i=0; $i< count($test); $i++){
                for($j= count($test)-1; $j>$i; $j--){
                    if($sort === "up"){
                        if($test[$j] < $test[$j-1]){
                            $temp = $test[$j];
                            $test[$j] = $test[$j-1];
                            $test[$j-1] = $temp;
                        }
                    } else if($sort === "down"){
                        if($test[$j] > $test[$j-1]){
                            $temp = $test[$j];
                            $test[$j] = $test[$j-1];
                            $test[$j-1] = $temp;
                        }
                    }
                }
              }
        }
        $products = $test;
        $category_id = "ma loai sp";
        $promotion_id = "ma khuyen mai";
        $product_id = "ma sp";
        $discount = "phan tram khuyen mai";
        $product_name = "ten sp";
        $promotions = $this->promotion->selectAll();
        if(!empty($products))
        
        foreach($products as $product){
            $percentage = 0;
            if(!empty($promotions))
            foreach($promotions as $promotion){
                if($this->promotionDetails->exist($product[$product_id], $promotion[$promotion_id]))
                {
                    $promotion_detail = $this->promotionDetails->select($product[$product_id],$promotion[$promotion_id]) != null ? $this->promotionDetails->select($product[$product_id],$promotion[$promotion_id])['phan tram khuyen mai'] : 0;
                } else {
                    $promotion_detail = 0;
                }
                if($percentage < $promotion_detail)
                    $percentage = $promotion_detail;
            }
            $datas[] = [
                "category" => $this->category->selectWithID($product[$category_id]),
                "product" => $product,
                "insurance" =>  $this->insurance->selectAll(),
                "promotion" => $percentage,
                "liked" => isset($_SESSION['user']) && $this->favorite->exist($_SESSION['user']['user'], $product[$product_id]),

            ];
        }
        else $datas = [];
        // echo "<pre>";
        // var_dump($datas);
        $data = [
            "page" => "Home",
            "header" => "header",
            "header_data" => $this->header(),
            "products" => $datas
        ];
        $this->view("view1",$data);
        
    }
    function favorite(){
        if(isset($_SESSION['user']) && $_SESSION['user']['level'] == 1){
            $customer_id = $_SESSION['user']['user'];
            $detail = $this->favorite->select($customer_id);
            foreach($detail as $pro){
                $products[] = $this->product->selectWithID($pro['ma sp']);
            }
            $category_id = "ma loai sp";
            $promotion_id = "ma khuyen mai";
            $product_id = "ma sp";
            $discount = "phan tram khuyen mai";
            $product_name = "ten sp";
            $promotions = $this->promotion->selectAll();
            if(!empty($products))
            
            foreach($products as $product){
                $percentage = 0;
                if(!empty($promotions))
                foreach($promotions as $promotion){
                    
                        if($this->promotionDetails->exist($product[$product_id], $promotion[$promotion_id]))
                    {
                        $promotion_detail = $this->promotionDetails->select($product[$product_id],$promotion[$promotion_id]) != null ? $this->promotionDetails->select($product[$product_id],$promotion[$promotion_id])['phan tram khuyen mai'] : 0;
                    } else {
                        $promotion_detail = 0;
                    }
                    if($percentage < $promotion_detail)
                        $percentage = $promotion_detail;
                }
                $datas[] = [
                    "category" => $this->category->selectWithID($product[$category_id]),
                    "product" => $product,
                    "insurance" =>  $this->insurance->selectAll(),
                    "promotion" => $percentage,
                    "liked" => isset($_SESSION['user']) && $this->favorite->exist($_SESSION['user']['user'], $product[$product_id]),

                ];
            }
            else $datas = [];
            // echo "<pre>";
            // var_dump($datas);
            $data = [
                "page" => "Home",
                "header" => "header",
                "header_data" => $this->header(),
                "products" => $datas
            ];
            $this->view("view1",$data);  
        }
    }
    //login
    function login(){
        if(isset($_POST['loginBtn'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($this->account->existWithUP($username, $password)){
                if($this->admin->isAdmin($username)){
                    $id = "ma ad";
                    $_SESSION['user'] = [
                        "user" => $this->admin->selectWithUsername($username)[$id],
                        "level" => 0
                    ];
                    header("Location: /NLNGANH/dashboard/order_management");
                    die();
                } else {
                    $id = "ma kh";
                    $_SESSION['user'] = [
                        "user" => $this->customer->selectWithUsername($username)[$id],
                        "level" => 1
                    ];
                }
            }
            header("Location: /");
        } else {
            $data = [
                "page" => "login",
                "header" => "header",
                "header_data" => $this->header()
            ];
            $this->view("view2",$data);   
        }
        
    }
    function register(){
        if(isset($_POST['btnRegister'])){
            $customer_name = $_POST['name'];
            $customer_birthday = $_POST['birthday'];
            $customer_phone = $_POST['phone'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($this->account->insert($username, $password, $email)){
                $this->customer->insert($username, $customer_name, $customer_birthday, $customer_phone, "");
                header("Location: /");
            } else {
                $data = [
                    "page" => "Register",
                    "header" => "header",
                    "header_data" => $this->header(),
                    "error" => "Tên tài khoản này đã tồn tại"
                ];
            }
        }
        $data = [
            "page" => "Register",
            "header" => "header",
            "header_data" => $this->header()
        ];

        $this->view("view2",$data);  
    }
    function handle_forgotpws(string $resend = null)
    {

        if($resend == "resend_code"){
            $username = $_SESSION['username'];
            $token = $this->account->sendMail($username);
            if($token == 0 ){
                $data = [
                    "page" => "forgotpws",
                    "header" => "header",
                    "header_data" => $this->header(),
                    "message" => "Email gửi đi không thành công"
                ];
            
                $this->view("view2",$data);  
                die();
            } else {
                $_SESSION['token'] = md5($token);
                header("Location: /NLNGANH/home/submit_code");
                die();
            }
        } else if($resend == null)
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $_SESSION['username'] = $username;
            if($this->account->existWithU($username)){
                $token = $this->account->sendMail($username);
                if($token == 0 ){
                    $data = [
                        "page" => "forgotpws",
                        "header" => "header",
                        "header_data" => $this->header(),
                        "message" => "Email gửi đi không thành công"
                    ];
            
                    $this->view("view2",$data);  
    
                    die();
                } else {
                    $_SESSION['token'] = md5($token);
                    header("Location: /NLNGANH/home/submit_code");
                    die();
                }
            } else {
                $data = [
                    "page" => "forgotpws",
                    "header" => "header",
                    "header_data" => $this->header(),
                    "message" => "Vui lòng kiểm tra lại tên đăng nhập"
                ];
        
                $this->view("view2",$data);  

                die();
            }
        }
    }
    function submit_code()
    {
        if(isset($_POST['code'])){
            $code = md5($_POST['code']);
            if($code == $_SESSION['token']){
                unset($_SESSION['token']);
                header("Location: /NLNGANH/home/reset_passwords");
            } else {
                $data = [
                    "page" => "Submit Code",
                    "header" => "header",
                    "header_data" => $this->header(),
                    "message" => "Mã xác nhận không khớp"
                ];
        
                $this->view("view2",$data);  
            }
            die();
        }
        $data = [
            "page" => "Submit Code",
            "header" => "header",
            "header_data" => $this->header()
        ];

        $this->view("view2",$data);  
    }
    function reset_passwords()
    {
        if(isset($_POST['resetpass'])){
            $username = $_SESSION["username"];
            unset($_SESSION["username"]);
            $pass = $_POST['repass'];
            $repass = $_POST['repass2'];
            if($pass != $repass){
                $data = [
                    "page" => "Reset Password",
                    "header" => "header",
                    "header_data" => $this->header(),
                    "error" => "Mật khẩu không khớp!"
                ];
            } else {
            $this->account->updatePassword($username, $pass);
                header("Location: /NLNGANH/");
            }
        }
        if(isset($_SESSION['username'])){
            $data = [
                "page" => "Reset Password Of FP",
                "header" => "header",
                "header_data" => $this->header(),
            ];
            $this->view("view2",$data);
        }
    }
    function forgotpws(){
        
        $data = [
            "page" => "forgotpws",
            "header" => "header",
            "header_data" => $this->header()
        ];

        $this->view("view2",$data);  
    }
    function logout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }
    //information:thông tin
    function information($customer_id){
        $customer = $this->customer->selectWithCustomerID($customer_id);
        
        $data = [
            "page" => "Information",
            "header" => "header",
            "header_data" => $this->header(),
            "customer" => $customer,
            "email" => $this->account->selectOne($customer["username"])
        ];
        $this->view("view2",$data);   
    }
    //update_information: cập nhật thông tin
    function update_information($customer_id){
        if(isset($_POST['register'])){
            var_dump($_POST);
            $id = $_POST['thongtinnd-id'];
            $name = $_POST['thongtinnd-name'];
            $birthday = $_POST['thongtinnd-birthday'];
            $phone = $_POST['thongtinnd-tel'];
            $address = $_POST['thongtinnd-diachi'];
            $email = $_POST['thongtinnd-email'];
            $customer = $this->customer->selectWithCustomerID($id);
            
            if($this->customer->existWithCustomerID($id)){
                
                if($this->customer->update($id , $name, $birthday, $phone, $address)){
                    $username = $customer["username"];
                    $this->account->updateEmail($username, $email);
                    header("Location: /NLNGANH/home/information/".$id);
                } else {
                    $data = [
                        "page" => "Update Infomation",
                        "header" => "header",
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
                    "header" => "header",
                    "header_data" => $this->header(),
                    "customer" => $customer,
                    "email" => $this->account->selectOne($customer["username"]),
                    "error" => "Người dùng không tồn tại!"
                ];
                $this->view("view2",$data);   
            }
            
            die();
        }
        $customer = $this->customer->selectWithCustomerID($customer_id);
        $data = [
            "page" => "Update Infomation",
            "header" => "header",
            "header_data" => $this->header(),
            "customer" => $customer,
            "email" => $this->account->selectOne($customer["username"]),
        ];
        
        $this->view("view2",$data);   
    }
    function reset_password()
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
                            "header" => "header",
                            "header_data" => $this->header(),
                            "error" => "Mật khẩu không khớp!"
                        ];
                    } else {
                        $this->account->updatePassword($username, $pass);
                        header("Location: /NLNGANH/home/information/".$user[$id]);
                    }
                } else {
                    $data = [
                        "page" => "Reset Password",
                        "header" => "header",
                        "header_data" => $this->header(),
                        "error" => "Người dùng không tồn tại!"
                    ];
                }
            } else {
                    $data = [
                        "page" => "Reset Password",
                        "header" => "header",
                        "header_data" => $this->header(),
                        "error" => "Vui lòng kiểm tra lại. Bạn chưa đăng nhập!"
                    ];
            }
            $this->view("view2",$data);   
            die();
        }
        $data = [
            "page" => "Reset Password",
            "header" => "header",
            "header_data" => $this->header(),
            "customer" => $_SESSION['user']['user']
        ];
        $this->view("view2",$data);   
    }
    // thông tin giỏ hàng
    function ordersplaced($order_id)
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
                            $newPercentage = $this->promotionDetails->select($cart_detail['ma sp'], $promotion['ma khuyen mai'])!= null ? $this->promotionDetails->select($cart_detail['ma sp'], $promotion['ma khuyen mai'])['phan tram khuyen mai'] : 0;
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
        $this->view("view2", $data);
    }
    function remove_product_in_cart($cart_id = null,$product_id = null)
    {
        if(isset($_SESSION['user']) && $this->order->existCartOfCustomer($_SESSION['user']['user'], $cart_id)){
            $this->cartDetails->delete($cart_id,$product_id);
        } 
        header("Location: /NLNGANH/home/cart");
    }
    function remove_bill($cart_id = null)
    {
        if(isset($_SESSION['user']) && $this->order->existCartOfCustomer($_SESSION['user']['user'], $cart_id)){
            $this->cart->delete($cart_id);
        } 
        header("Location: /NLNGANH/home/cart");
    }
    function payment_vnpay($cart_id)
    {
        $money = null;
        $delivery = null;

        // mày coi đoạn code này đi mai t rãnh t sửa cho giờ t đi ngủ rồi , sáng 4h qua nhà anh 2 chuẩn bị r
        //ok m, sửa đoạn này đi mai t kiểm tra, nhớ đừng có run trên localhost nha nó chạy loạn là t k biết sửa á
        // m sửa tới  đâu rồit sửa xong rồi :))) tau sửa đại theo quán tính :))) nó khác gì ban đầu ?
        // tau đấm dô cái cuốn họng à lươn không ủa có sửa thiệt bộ chai'fii :)) m sửa cái gì đâu mấy cái select đó :))
        // t quá mệt mỏi ròi // ứng cử BCH Đoàn khoa kìa muốn làm mà đâu dc :)))
        // để t đi đề cử m cho
        // nốt lần này làm DB tiếng việt nha m lần sau làm tiếng anh á
        //oke con dê m

        $order =  $this->order->selectWithCartID($cart_id)['so hd'];
        $carts = $this->cartDetails->selectAllOfCart($cart_id);
        $promotions =  $this->promotion->selectAll();
        $money = 0;
        if (!empty($carts))
            foreach ($carts as $cart) {
                $product = $this->product->selectWithID($cart['ma sp'])['gia sp'];
                $promo = 0;
                if (!empty($promotions))
                    foreach ($promotions as $promotion) {
                        $promo =  $this->promotionDetails->selectPercentage($cart['ma sp'], $promotion['ma khuyen mai']) > $promo ? $this->promotionDetails->selectPercentage($cart['ma sp'], $promotion['ma khuyen mai']) : $promo;
                    }
                $money += $cart['so luong'] * $product - $cart['so luong'] * $product * $promo / 100;
            }

        $data = [
            "page" => "VN-Pay 1",
            "order" => $order,
            "money" => $money
        ];
        $this->view("view-payment", $data);
    }
    function vnpay_create_payment()#
    {
        $data = [
            "page" => "VN-Pay 2"
        ];
        $this->view("view-payment", $data);
    }
    function vnpay_return()#
    {
        // $gets = substr($get, 1);
        $get = substr(urldecode($_SERVER['REQUEST_URI']), strpos(urldecode($_SERVER['REQUEST_URI']), "?") + 1);
        $datas = explode("&", $get);
        foreach ($datas as $a) {
            $check = explode("=", $a);
            $data[$check[0]] = $check[1];
        }
        $order_id = $data['vnp_TxnRef'];
        $money = $data['vnp_Amount'] / 100;
        $note = $data['vnp_OrderInfo'];
        $vnp_response_code = $data['vnp_ResponseCode'];
        $code_vnpay = $data['vnp_TransactionNo'];
        $code_bank = $data['vnp_BankCode'];
        $time = $data['vnp_PayDate'];
        $date_time = substr($time, 0, 4) . '-' . substr($time, 4, 2) . '-' . substr($time, 6, 2) . ' ' . substr($time, 8, 2) . ' ' . substr($time, 10, 2) . ' ' . substr($time, 12, 2);
        if ($data['vnp_ResponseCode'] == '00') {
            $this->payments->insert($order_id, "", $money, $note, $vnp_response_code, $code_vnpay, $code_bank);
            $this->order->paid($order_id);
        }
        $data["page"] = "VN-Pay 3";
        $this->view("view-payment", $data);
    }
    function test(){
        
        $data = [
            
            
        ];
        $this->view("test", $data);
    }
    function add_product_with_test(){
        $data = [
            "a" => "a"
        ];
        $this->view("add_product_with_test", $data);
    }
    private function header(){
        $cart_id = "ma gh";
        if(isset($_SESSION['user'])){
            $favorite = $this->favorite->count($_SESSION['user']['user']);
            $orders = $this->order->selectWithCustomerID($_SESSION['user']['user']);
            if(!empty($orders)){
                $cart = 0 ;
                foreach($orders as $order){
                    if($this->cart->statusOfCart($order[$cart_id]) == 1 ){
                        $cart = $this->cartDetails->countProductOfCart($order[$cart_id]);
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
        $data = [
            "favorite" => $favorite,
            "cart" => $cart,
            "user" => $user,
            "level" => $level,
            "category" => $this->category->selectAll(),
        ];
        return $data;
    }
}
?>