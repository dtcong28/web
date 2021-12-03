<?php
class category extends controller
{
    public function all()
    {
        $page = isset( $_GET['page']) ? $_GET['page'] : '1';
        $categories = CategoryGateWay::list($page);
        $total_categori = CategoryGateWay::total_category();
        $total_pages = ceil($total_categori/5);
        require_once("view/admin/category/all.php");
    }
    public function add()
    {
        if (!empty($_POST)) { 
            $dm = new category_model();
            $dm->name = $_POST['name'];
            $dm->description = $_POST['description'];
            $dm->parent_id = $_POST['parent_id'];
            $category = CategoryGateWay::add($dm);
            header('location: /?controller=category&action=all');
        }else {
            $category = CategoryGateWay::list();
            require_once("view/admin/category/add.php");
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        CategoryGateWay::delete($id);
        header('location: /?controller=category&action=all');
    }
    public function edit()
    {
        $id = $_GET['id'];
        if (!empty($_POST)) { 
            $dmID = new category_model();
            $dmID->id = $id;
            $dmID->name = $_POST['name'];
            $dmID->description = $_POST['description'];
            $dmID->parent_id = $_POST['parent_id'];
            $category = CategoryGateWay::update($dmID);
            header('location: /?controller=category&action=all');
        }else {
            $category = CategoryGateWay::getCategory($id);
            $category_1 = CategoryGateWay::list();
            require_once("view/admin/category/edit.php");
        }
    }
    // public function get_family_tree_id (){
    //     $category = CategoryGateWay::get_family_tree();
    // }

}
