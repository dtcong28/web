<?php
class user extends controller
{
    public function list()
    {
        $page = ( !isset( $_GET['page']) ) ?  1 : $_GET['page'];
        $user = user_model::list($page);
        $total_user = user_model::total_user();
        $total_pages = ceil($total_user/5);
        require_once("view/admin/user/list.php");
    }
}