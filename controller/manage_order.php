<?php
class manage_order extends controller
{
    public function index()
    {
        
        $page = ( !isset( $_GET['page']) ) ?  1 : $_GET['page'];
        $orders = ManageOrderGateWay::list($page);
        $total_order = ManageOrderGateWay::total_order();
        $total_pages = ceil($total_order/5);
        require_once("view/admin/manage_order/index.php");
    }
    public function detail(){
        $id = $_GET['id'];
        $detail_order = ManageOrderGateWay::detail($id);
        $infor =  ManageOrderGateWay::get_infor($id);
        if(!empty($_POST)){
            $status = $_POST['radio'];
            $detail_order = ManageOrderGateWay::update_status($id,$status);
            header("Location:/?controller=manage_order&action=index");
        }else{
            require_once("view/admin/manage_order/detail.php");
        } 
    }
}