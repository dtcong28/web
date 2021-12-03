<?php
    class admin_home extends controller{
        public function index() {
            $sum_order = AdminHomeGateWay::sum_order();
            $sum_user = AdminHomeGateWay::sum_user();
            require_once("view/admin/admin_view.php");
        }
    }
?>