<?php
class about_us extends controller
{
    function __construct()
    {
        $this->is_required_login = false;
    }
    function index(){
       require_once("view/client/about_us/index.php");
    }
}
?>