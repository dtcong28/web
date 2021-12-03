<?php
    class admin_authentication extends controller{
        function __construct() {
            $this->is_required_login = false;
        }
        function logout() {
            session_destroy(); // xóa session ---------------------------------
            header('location: /?controller=admin_authentication&action=loginAdmin');
        }

        function loginAdmin(){
            if (!empty($_SESSION['useradmin'])){
                header('location: /?controller=admin_home&action=index');
            }
            else {
                $username = $password = $fullName = NULL;
                $error = array();
                $error['username_admin'] = $error['password_admin'] = NULL;

                if (isset($_POST['login_admin'])) {
                    if (empty($_POST['username_admin'])) {
                        $error['username_admin'] = '* Cần điền tên đăng nhập';
                    } else {
                        $username = $_POST['username_admin'];
                    }
                    if (empty($_POST['password_admin'])) {
                        $error['password_admin'] = '* Cần điền mật khẩu';
                    } else {
                        $password = $_POST['password_admin'];
                    }

                    if ($username && $password) {
                        $result = admin_authentication_model::login($username, $password); 
                        $num_rows = admin_authentication_model::num_rows();
                        $check = $num_rows; /*đếm số dòng trong database*/
                    /**
                    * Nếu số dòng trong database > 0 => lưu session + lấy dữ liệu + chuyển hướng
                    * Ngược lại thông báo alert bằng script
                    */
                        if ($check > 0) {
                            $data = $result;//->fetch_array(); /*lấy dữ liệu tương ứng với username và password nhập*/
                            $_SESSION['useradmin'] = $data; /*lưu session*/
                            // var_dump($_SESSION);
                            // exit();
                        /**
                        * Nếu level = 1 thì chuyển hướng đến trang quản trị viên
                        * Ngược lại thì thông báo đăng nhập lại
                        */
                            // var_dump($data);
                            // exit();
                                //var_dump($data[0]['level']);
                                if ( isset($data[0]['level']) && ($data[0]['level'] == '1')) {
                                    header('location: /?controller=admin_home&action=index');
                                } else {
                                    echo "<script>alert('Sai mật khẩu hoặc tên đăng nhập')</script>"; 
                                }
                            
                        } else {
                            echo "<script>alert('Vui lòng đăng nhập lại')</script>";
                        }
                    }
                }
                //var_dump($error);
                //return $error;
                //require("view/admin/admin_login.php");
                foreach ($error as $err => $value){
                    echo $value;
                }
                require_once("view/admin/admin_login.php");
            }
        }
    }
?>