<?php
class client extends controller
{
    function __construct()
    {
        $this->is_required_login = false;
    }
    function index()
    {
        $new_product = ProductGateWay::get_new_product();
        $special_product = ProductGateWay::get_special_product();
        $flash_deal = ProductGateWay::flash_deal();
        require_once("view/client/home.php");
    }
    function list()
    {
        if (!empty($_POST)) {

            $array_category = isset($_POST["category"]) ?  $_POST["category"] : NULL;
            $price_min = isset($_POST["price_min"]) ?  $_POST["price_min"] : NULL;
            $price_max = isset($_POST["price_max"]) ?  $_POST["price_max"] : NULL;

            $family_tree = new CategoryGateWay();
            $value = $family_tree->fetchCategoryTreeList();
            $products = ProductGateWay::filter($array_category, $price_min, $price_max);
            require_once("view/client/product/list.php");
        } else {
            $page = (!isset($_GET['page'])) ?  1 : $_GET['page'];
            $products = ProductGateWay::list_client($page);
            $total_product = ProductGateWay::total_product();
            $total_pages = ceil($total_product / 9);    
            $family_tree = new CategoryGateWay();
            $value = $family_tree->fetchCategoryTreeList();
            
            require_once("view/client/product/list.php");
        }
    }
    function detail()
    {
        $id = $_GET['id'];
        $product = ProductGateWay::getProduct($id);
        // var_dump($product);
        // exit;
        require_once("view/client/product/product_detail.php");
    }
}
