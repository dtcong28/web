<?php
require_once("model/product.php");
class checkout extends controller
{
    
    function __construct()
    {
        $this->is_required_login = false;
    }

    function stripePaymentIntents($price, $metadata = [])
    {
        $stripe = new \Stripe\StripeClient('sk_test_51Jx6KYDUPq2rGFP3nsUMHCPqK2ZY5AEWzuZcb9SHvADVtsyLbLxxGFysHRLbM8z4TBCZarjL9LG251B1HljLx5I200JGEJZpCz');
        $paymentIntent = $stripe->paymentIntents->create(
            [
                'amount' => $price,
                'currency' => 'vnd',
                'metadata' => $metadata,
                'payment_method_types' => [
                    'card'
                ],
            ]
        );
        return $paymentIntent->client_secret;
    }

    function index()
    {
        
        if (isset($_SESSION['Cart'])) {
            $id_product_in_cart = array_keys($_SESSION['Cart']);
            $array_product_in_cart = array();
            $i = 0;
            foreach ($id_product_in_cart as $value) {
                $product = ProductGateWay::getProduct($value);
                $array_product_in_cart[$i] = array(
                    "id" => $value, "name" => $product->name, "price" => $product->price, "image" => $product->main_image,
                    "number_product" => $_SESSION['Cart'][$value]['quantity'], "size" => $_SESSION['Cart'][$value]['size'], "color" => $_SESSION['Cart'][$value]['color']
                );
                $i++;
            }
        }
        $total_money_order = 0;
        if (!empty($array_product_in_cart)) { 
            $cart_id = [$_SESSION['cart_code']];
            foreach ($array_product_in_cart as $value) {
                $total_money_order += $value['price'] * $value['number_product'];
            }
            $total_money_order = $total_money_order + 70000;
            $stripe_secret = $this->stripePaymentIntents($total_money_order,['cart_id' => $cart_id[0]]); // phải truyền thêm metadata
        }

        //var_dump($_SESSION['user_client'][0]->id);
        if (!empty($_POST) && !isset($_SESSION['user_client'])) { //Khách hàng chưa đăng nhập 
            $infor = new checkout_model();
            $infor->code = $_SESSION['cart_code'];
            $infor->user_id = 0;  //xét mặc định 1 dòng dữ liệu có id = 0 với những khách chưa đăng nhập
            $infor->name = $_POST['name'];
            $infor->phone = $_POST['phone'];
            $infor->address = $_POST['address'];
            $infor->payment = $_POST['payment']; // = 1 : Thanh toán khi nhận hàng,
            //  = 0 : Thanh toán bằng thẻ  
            $infor->status = 0; // = 0: đang chờ xử lý
            $infor->note = $_POST['note'];
            $infor->total_money_order = $total_money_order;
            $infor->order_detail = $_SESSION['Cart'];
            $order = CheckOutGateWay::add($infor);
            unset($_SESSION['Cart']);
            unset($_SESSION['cart_code']);
            //header('location: /?controller=account&action=my_orders'); 
            //in ra đã đặt hàng thành công 
        } elseif (!empty($_POST) && isset($_SESSION['user_client'])) { // Khách hàng đã đăng nhập
            $infor = new checkout_model();
            $infor->code = $_SESSION['cart_code'];
            $infor->user_id = $_SESSION['user_client'][0]->id;
            $infor->name = $_POST['name'];
            $infor->phone = $_POST['phone'];
            $infor->address = $_POST['address'];
            $infor->payment = $_POST['payment']; // = 1 : Thanh toán khi nhận hàng,
            //  = 0 : Thanh toán bằng thẻ  
            $infor->status = 0; // = 0: đang chờ xử lý
            $infor->note = $_POST['note'];
            $infor->total_money_order = $total_money_order;
            $infor->order_detail = $_SESSION['Cart'];
            // var_dump($infor->order_detail);
            // exit;
            $order = CheckOutGateWay::add($infor);
            unset($_SESSION['Cart']);
            unset($_SESSION['cart_code']);
            header('location: /?controller=account&action=my_orders');
        } else {
            require_once("view/client/checkout/index.php");
        }
    }

    function pay_success(){
        require_once("view/client/checkout/pay_success.php");
    }

}
