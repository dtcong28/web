<?php
    session_start(); /*đăng ký phiên làm việc*/
    ob_start();
    require 'vendor/autoload.php';
	require 'config/config.php';
	require_once("db.php");
    require 'controller/controller.php';
    //var_dump($_SESSION);
    //exit();
    if (isset($_GET["controller"]) && isset($_GET["action"]) ){
        $controller = $_GET["controller"];
        $action = $_GET["action"];
    }
    else 
    {
        $controller = "client"; // ---- 
        $action = "index"; // ----
    }
    
    
    require_once("routes.php");

    ob_end_flush();

?>