<?php
//require_once("model/cart.php");
class contact extends controller
{
    function __construct()
    {
        $this->is_required_login = false;
    }
    function index()
    {
        $infor = ContactGateWay::list();
        require_once("view/client/contact/index.php");
    }
    function add()
    {
        //require_once("view/admin/contact/add.php");
        $get_infor = ContactGateWay::list();
        // var_dump($get_infor);
        // exit;
        if (empty($get_infor)) {
            if (!empty($_POST)) {
                $infor = new contact_model();
                $infor->address = $_POST['address'];
                $infor->email = $_POST['email'];
                $infor->phone = $_POST['phone'];
                //$key = key((array)$infor);
                // $fields = get_object_vars($infor);
                // var_dump($fields);
                // exit;
                ContactGateWay::add($infor);
                header('Location:/?controller=contact&action=add');
            } else {
                require_once("view/admin/contact/add.php");
            }
        }else{
            if (!empty($_POST)) {
                $infor = new contact_model();
                $infor->address = $_POST['address'];
                $infor->email = $_POST['email'];
                $infor->phone = $_POST['phone'];
                //$key = key((array)$infor);
                // $fields = get_object_vars($infor);
                // var_dump($fields);
                // exit;
                ContactGateWay::update($infor);
                header('Location:/?controller=contact&action=add');
            }else{
                require_once("view/admin/contact/update.php");
            }
        }
    }
}
