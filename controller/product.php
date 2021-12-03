<?php
require_once("model/category.php"); // sử dụng category ở phần add sản phẩm nên phải gọi vào
class product extends controller
{
    public function all()
    {
        $page = ( !isset( $_GET['page']) ) ?  1 : $_GET['page'];
        $products = ProductGateWay::list($page);
        $total_product = ProductGateWay::total_product();
        $total_pages = ceil($total_product/5);
        require_once("view/admin/product/all.php");
    }
    public function add()
    {
        if (!empty($_POST)) {
            $sp = new product_model();
            $sp->name = $_POST['name'];
            $sp->price = $_POST['price'];
            $sp->description = $_POST['description'];
            $sp->detail_description = $_POST['detail_description'];
            // $sp->main_image = $_FILES['main_image']['name'];
            // $sp->detail_image = $_FILES['detail_image']['name'];
            $sp->options = $_POST['options'];
            $sp->category = $_POST['category'];
            // lấy tên ảnh chỉnh để lưu vào obj sp
            $new_image_name = time();
            $ext = substr($_FILES['main_image']['name'], strrpos($_FILES['main_image']['name'], '.') + 1);
            $sp->main_image = $new_image_name . "." . $ext;

            // lấy tên ảnh chi tiết 
            foreach ($_FILES['detail_image']['name'] as $detail) {
                $name[] = $detail;
            }
            for ($i = 0; $i < count($name); $i++) {
                $new_detail_image_name[$i] = time() + $i + 1;
                $ext = substr($name[$i], strrpos($name[$i], '.') + 1);
                $detail_image[$i] = $new_detail_image_name[$i] . "." . $ext;
            }
            $sp->detail_image = $detail_image;

        
            $id = ProductGateWay::add($sp);
            ProductGateWay::add_category($sp,$id);
            // Kiểm tra có dữ liệu fileupload trong $_FILES không
            // Nếu không có thì dừng
            // xu ly upload anh chinh
            if (!isset($_FILES["main_image"])) {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }
            // Kiểm tra dữ liệu có bị lỗi không
            if ($_FILES["main_image"]['error'] != 0) {
                echo "Dữ liệu upload bị lỗi";
                die;
            }
            // Đã có dữ liệu upload, thực hiện xử lý file upload

            //Thư mục bạn sẽ lưu file upload
            $target_dir_main    = "public/uploads/product/" . $id . "/"; //đường dẫn phải được tạo trong thư mục để lưu file ảnh upload
            if (!file_exists($target_dir_main)) {
                mkdir($target_dir_main, 0777, true);
            }
            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            //$target_file_main   = $target_dir_main . basename($_FILES["main_image"]["name"]);


            $target_file_main   = $target_dir_main . $new_image_name . "." . $ext;

            $allowUpload   = true;
            //Lấy phần mở rộng của file (jpg, png, ...)
            //$imageFileType = pathinfo($target_file_main, PATHINFO_EXTENSION);
            $imageFileType = $ext;

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            //Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

            if (isset($_POST["submit_product"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check_main = getimagesize($_FILES["main_image"]["tmp_name"]);
                if ($check_main !== false) {
                    $allowUpload = true; // đây là file ảnh 
                } else {
                    echo "Không phải file ảnh";
                    $allowUpload = false;
                }
            }

            // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
            if (file_exists($target_file_main)) {
                echo "Tên file đã tồn tại trên server, không được ghi đè";
                $allowUpload = false;
            }
            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            if ($_FILES["main_image"]["size"] > $maxfilesize) {
                echo "Không được upload ảnh lớn hơn";
                $allowUpload = false;
            }
            // Kiểm tra kiểu file
            if (!in_array($imageFileType, $allowtypes)) {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                $allowUpload = false;
            }
            if ($allowUpload) {
                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                if (move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file_main)) {
                    echo " Đã upload thành công.";
                } else {
                    echo "Có lỗi xảy ra khi upload file.";
                }
            } else {
                echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
            }

            // xử lý upload nhiều file ảnh chi tiết 
            $name = array();
            $tmp_name = array();
            $error = array();
            $ext = array();
            $size = array();

            // $target_file_detail   = $target_dir_detail . basename($_FILES["main_image"]["name"]);
            // $imageFileType = pathinfo($target_file_main, PATHINFO_EXTENSION);
            foreach ($_FILES['detail_image']['name'] as $detail) {
                $name[] = $detail;
            }
            foreach ($_FILES['detail_image']['error'] as $detail) {
                $error[] = $detail;
            }
            foreach ($_FILES['detail_image']['tmp_name'] as $detail) {
                $tmp_name[] = $detail;
            }
            foreach ($_FILES['detail_image']['type'] as $detail) {
                $ext[] = $detail;
            }
            foreach ($_FILES['detail_image']['size'] as $detail) {
                $size[] = $detail;
            }

            $target_dir_detail    = "public/uploads/product/" . $id . "/";
            // var_dump($name);
            // exit;
            for ($i = 0; $i < count($name); $i++) {
                // var_dump($error[$i]);
                // exit;
                if ($error[$i] > 0) {
                    echo "Lỗi:" . $error[$i];
                } else {
                    if (!file_exists($target_dir_detail)) {
                        mkdir($target_dir_detail, 0777, true);
                    }
                    $target_file_detail   = $target_dir_detail . $detail_image[$i];
                    if (file_exists($target_file_detail)) {
                        echo "File đã tồn tại";
                    } else {
                        if (move_uploaded_file($tmp_name[$i], $target_file_detail)) {
                            echo " Đã upload thành công.";
                        } else {
                            echo "Có lỗi xảy ra khi upload file.";
                        }
                    }
                }
            }

            // require_once("view/admin/product/all.php"); k dùng được đường dẫn này vì nó nối tiếp code vào
            header('location: /?controller=product&action=all'); // còn đây trỏ thằng về mục này 
        } else {
            //$categories = CategoryGateWay::get_family_tree();
            $family_tree = new CategoryGateWay();
            $value = $family_tree->fetchCategoryTreeList();
            require_once("view/admin/product/add.php");
        }
        //var_dump($sp);
    }
    public function detail()
    {
        $id = $_GET['id'];
        $productID = ProductGateWay::getProduct($id);
        $categoryID = ProductGateWay::getCategory($id);

        require_once("view/admin/product/detail.php");
    }
    public function edit()
    {

        $id = $_GET['id'];
        $productID = ProductGateWay::getProduct($id);
        if (!empty($_POST)) {
            $sp = new product_model();
            $sp->id = $_GET['id'];
            $sp->name = $_POST['name'];
            $sp->price = $_POST['price'];
            $sp->description = $_POST['description'];
            $sp->detail_description = $_POST['detail_description'];
            // ảnh chính và ảnh chi tiết sẽ được xử lý ở dưới và lưu lại 
            $sp->options = $_POST['options'];
            $sp->category = $_POST['category'];
            // xử lý edit ảnh chính
            if (!isset($_FILES["main_image"])) {
                echo "Dữ liệu không đúng cấu trúc";
                die;
            }
            // Kiểm tra dữ liệu có bị lỗi không
            if ($_FILES["main_image"]['error'] != 0) {
                echo "Dữ liệu upload bị lỗi";
                die;
            }
            // Đã có dữ liệu upload, thực hiện xử lý file upload
            $target_dir_main    = "public/uploads/product/" . $id . "/"; //đường dẫn phải được tạo trong thư mục để lưu file ảnh upload

            //Vị trí file lưu tạm trong server (file sẽ lưu trong uploads, với tên giống tên ban đầu)
            $new_image_name = time();
            $ext = substr($_FILES['main_image']['name'], strrpos($_FILES['main_image']['name'], '.') + 1);
            $target_file_main   = $target_dir_main . $new_image_name . "." . $ext;
            $sp->main_image = $new_image_name . "." . $ext;
            //ProductGateWay::update($sp);
            $allowUpload   = true;
            //Lấy phần mở rộng của file (jpg, png, ...)
            // $imageFileType = pathinfo($target_file_main, PATHINFO_EXTENSION);
            $imageFileType = $ext;

            // Cỡ lớn nhất được upload (bytes)
            $maxfilesize   = 800000;

            //Những loại file được phép upload
            $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

            if (isset($_POST["update"])) {
                //Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check_main = getimagesize($_FILES["main_image"]["tmp_name"]);
                if ($check_main !== false) {
                    $allowUpload = true; // đây là file ảnh 
                } else {
                    echo "Không phải file ảnh";
                    $allowUpload = false;
                }
            }

            // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
            // if (file_exists($target_file_main)) {
            //     echo "Tên file đã tồn tại trên server, không được ghi đè";
            //     $allowUpload = false;
            // }
            // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
            // if ($_FILES["main_image"]["size"] > $maxfilesize) {
            //     echo "Không được upload ảnh lớn hơn";
            //     $allowUpload = false;
            // }
            // Kiểm tra kiểu file
            if (!in_array($imageFileType, $allowtypes)) {
                echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
                $allowUpload = false;
            }
            // var_dump($allowUpload);
            // exit;
            if ($allowUpload) {
                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                if (move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file_main)) {
                    echo " Upload thành công.";
                } else {
                    echo "Có lỗi xảy ra khi upload file.";
                }
            } else {
                echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
            }

            // xử lý upload nhiều file ảnh chi tiết 
            $name = array();
            $tmp_name = array();
            $error = array();
            $ext = array();
            $size = array();

            // $target_file_detail   = $target_dir_detail . basename($_FILES["main_image"]["name"]);
            // $imageFileType = pathinfo($target_file_main, PATHINFO_EXTENSION);

            foreach ($_FILES['detail_image']['name'] as $detail) {
                $name[] = $detail;
            }
            foreach ($_FILES['detail_image']['error'] as $detail) {
                $error[] = $detail;
            }
            foreach ($_FILES['detail_image']['tmp_name'] as $detail) {
                $tmp_name[] = $detail;
            }
            foreach ($_FILES['detail_image']['type'] as $detail) {
                $ext[] = $detail;
            }
            foreach ($_FILES['detail_image']['size'] as $detail) {
                $size[] = $detail;
            }
            // $new_image_name = time();
            // $ext=substr($_FILES['main_image']['name'],strrpos($_FILES['main_image']['name'],'.')+1);
            // $target_file_main   = $target_dir_main . $new_image_name.".".$ext;
            // $sp->main_image = $new_image_name.".".$ext;
            // ProductGateWay::update($sp);
            for ($i = 0; $i < count($name); $i++) {
                if ($error[$i] > 0) {
                    echo "Lỗi:" . $error[$i];
                } else {
                    $target_dir_detail    = "public/uploads/product/" . $id . "/";

                    $new_detail_image_name[$i] = time() + $i + 1;
                    $ext = substr($name[$i], strrpos($name[$i], '.') + 1);
                    $target_file_detail   = $target_dir_detail . $new_detail_image_name[$i] . "." . $ext;

                    $detail_image[$i] = $new_detail_image_name[$i] . "." . $ext;
                    // var_dump($sp->detail_image);
                    // exit;
                    // $file_name = basename($name[$i]);
                    // $target_file_detail   = $target_dir_detail . $file_name;
                    if (file_exists($target_file_detail)) {
                        echo "File đã tồn tại";
                    } else {
                        if (move_uploaded_file($tmp_name[$i], $target_file_detail)) {
                            echo " Đã upload thành công.";
                        } else {
                            echo "Có lỗi xảy ra khi upload file.";
                        }
                    }
                }
            }
            $sp->detail_image = $detail_image;
            // var_dump($sp);
            // exit;
            ProductGateWay::update($sp);
            header('location: /?controller=product&action=detail&id=' . $id);
        } else {
            $family_tree = new CategoryGateWay();
            $value = $family_tree->fetchCategoryTreeList();
            require_once("view/admin/product/edit.php");
        }
    }
    public function delete()
    {
        $id = $_GET['id'];
        $product = ProductGateWay::delete($id);
        $dirname = "public/uploads/product/" . $id;
        array_map('unlink', glob("$dirname/*.*"));
        rmdir($dirname);
        header('location: /?controller=product&action=all');
    }
}
