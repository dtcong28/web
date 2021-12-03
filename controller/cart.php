<?php
require_once("model/product.php");
class cart extends controller
{
    function __construct() {
        $this->is_required_login = false;
    }
    public function add()
    {
        if (!empty($_POST)) {
            $id = $_POST['id'];
            $number_product = $_POST['number'];
            $size = $_POST['size'];
            $color = $_POST['color'];
            if(!isset($_SESSION['cart_code'])){
                $_SESSION['cart_code'] = "THVN" . time();
            }
            if (!isset($_SESSION['Cart'][$id]) ) { 
                $_SESSION['Cart'][$id] = array('quantity'=>$number_product,'size'=>$size,'color'=>$color); // lưu số lượng sp
            } 
            // else {
            //     $_SESSION['Cart'][$id]['quantity'] += $number_product;
            // };
            
        }
    }
    public function list()
    {
        if (isset($_SESSION['Cart'])) {
            $id_product_in_cart = array_keys($_SESSION['Cart']);
            //$array_product_in_cart = array();
            $i = 0;
            foreach ($id_product_in_cart as $value) {
                $product = ProductGateWay::getProduct($value);
                $array_product_in_cart[$i] = array("id" => $value, "name" => $product->name, "price" => $product->price, "image" => $product->main_image, 
                "number_product" => $_SESSION['Cart'][$value]['quantity'], "size"=> $_SESSION['Cart'][$value]['size'], "color"=> $_SESSION['Cart'][$value]['color'] );
                $i++;
            }
            // var_dump($array_product_in_cart);
            // exit;
            // var_dump($array_product_in_cart);
            // exit;
            require_once("view/client/cart/list.php");
        }else{
            require_once("view/client/cart/list.php");
        }
    }
    public function delete_all(){
        unset($_SESSION['Cart']);
        header("location: /?controller=cart&action=list ");
    }
    public function delete_id(){
        $id = $_GET['id'];
        unset($_SESSION['Cart'][$id]);
        header("location: /?controller=cart&action=list ");
    }
    public function update(){
        
    }
}
