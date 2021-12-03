<?php
    function call($controller,$action){
        require_once("controller/$controller.php");
        require_once("model/$controller.php");
        //require_once("model/gate_way/{$controller}_gate_way.php");
        require_once("model/gate_way/product_gate_way.php");
        require_once("model/gate_way/category_gate_way.php");
        require_once("model/gate_way/contact_gate_way.php"); 
        require_once("model/gate_way/client_authentication_gate_way.php");
        require_once("model/gate_way/account_gate_way.php"); 
        require_once("model/gate_way/checkout_gate_way.php");
        require_once("model/gate_way/manage_order_gate_way.php");
        require_once("model/gate_way/report_gate_way.php");
        require_once("model/gate_way/admin_home_gate_way.php");
        $controller=new $controller;
        

        // check session và login, is_required_login = true; cần phải login 
        $is_required_login = $controller->is_required_login;
        //var_dump($is_required_login);
        if ($is_required_login) {
            if (empty($_SESSION['useradmin']) || $_SESSION['useradmin'][0]['level'] != ADMIN_LEVEL) {
                header('location: /?controller=admin_authentication&action=loginAdmin');
            }
        }
        $controller->{$action}();
    }

    $controllers = array('admin_authentication' => ['loginAdmin','logout'],
                        'admin_home' => ['index'],
                        'client'=>['index','list','detail'],
                        'category'=>['all','add','delete','edit'],
                        'product'=>['all','add','edit','delete','detail'],
                        'cart'=>['list','add','delete_all','delete_id','update'],
                        'checkout'=>['index','pay_success'],
                        'contact'=>['index','add'],
                        'about_us'=>['index'],
                        'client_authentication'=>['login','register','logout'],
                        'account'=>['index','my_profile','address','add_address','edit_address','track_order','my_orders'],
                        'user'=>['list'],
                        'manage_order'=>['index','detail'],
                        'webhook'=>['index']);

    if (array_key_exists($controller, $controllers)) {
        if (in_array($action, $controllers[$controller])) {
            call($controller, $action);
        } else {
            call('errorController', 'error');
        }
        
    } else {
        call('errorController', 'error');
    }
?>

