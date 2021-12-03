<?php

class account extends controller
{
    function __construct()
    {
        $this->is_required_login = false;
    }
    public function index(){
        $infor = AccountGateWay::get();
        $id_user = $infor->id;
        $infor_order = AccountGateWay::get_infor_order($id_user);
        require_once("view/client/account/index.php");
    }
    public function my_profile(){
        $infor = AccountGateWay::get();
        require_once("view/client/account/my_profile.php");
    }
    public function address(){
        $infor = AccountGateWay::get();
        require_once("view/client/account/address.php");
    }
    public function add_address(){
        //$infor = AccountGateWay::get();
        if(!empty($_POST)){
            $address = $_POST['address'];
            $data = AccountGateWay::add($address);
            header('location:/?controller=account&action=address');
        }else{
            require_once("view/client/account/add_address.php");
        }
    }
    public function edit_address(){
        if(!empty($_POST)){
            $infor = new account_model();
            $infor->name = $_POST['name'];
            $infor->phone = $_POST['phone'];
            $infor->address = $_POST['address'];
            AccountGateWay::update($infor);
            header('location:/?controller=account&action=address');
        }else{
            $infor = AccountGateWay::get();
            require_once("view/client/account/edit_address.php");
        }
    }
    public function track_order(){
        $infor = AccountGateWay::get();
        require_once("view/client/account/track_order.php");
    }
    public function my_orders(){
        $infor = AccountGateWay::get();
        $id_user = $infor->id;
        $infor_order = AccountGateWay::get_infor_order($id_user);
        require_once("view/client/account/my_orders.php");
    }
}
