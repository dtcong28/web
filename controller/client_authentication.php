<?php
class client_authentication extends controller
{
    function __construct()
    {
        $this->is_required_login = false;
    }
    function register()
    {
        if (!empty($_POST)) {
            $user = new client_authentication_model;
            $user->name = $_POST['name'];
            $user->phone = $_POST['phone'];
            $user->birthday = $_POST['birthday'];
            $user->gender = $_POST['gender'];
            $user->email = $_POST['email'];
            $user->password = md5($_POST['password']);
            $user->level = 0;
            ClientAuthenticationGateWay::add($user);
            header('location:/?controller=client_authentication&action=login');
        } else {
            require_once("view/client/authentication/register.php");
        }
    }
    function login()
    {
        if (!empty($_SESSION['user_client'])) {
            header('location: /?controller=account&action=index');
        } else {
            $username = $password = $fullName = NULL;
            $error = array();
            $error['username_client'] = $error['password_client'] = NULL;

            if (isset($_POST['submit'])) {
                if (empty($_POST['email'])) {
                    $error['username_client'] = '* Cần điền tên đăng nhập';
                } else {
                    $username = $_POST['email'];
                }
                if (empty($_POST['password'])) {
                    $error['password_client'] = '* Cần điền mật khẩu';
                } else {
                    $password = md5($_POST['password']);
                }

                if ($username && $password) {
                    $result = ClientAuthenticationGateWay::login($username, $password);

                    $num_rows = ClientAuthenticationGateWay::num_rows();
                    $check = $num_rows; /*đếm số dòng trong database*/
                    /**
                     * Nếu số dòng trong database > 0 => lưu session + lấy dữ liệu + chuyển hướng
                     * Ngược lại thông báo alert bằng script
                     */
                    if ($check > 0) {
                        $data = $result;
                        $_SESSION['user_client'] = $data; /*lưu session*/
                        if (isset($data[0]->level) && ($data[0]->level == '0')) {
                            header('location: /?controller=account&action=index');
                        }else {
                            echo "<script>alert('Sai mật khẩu hoặc tên đăng nhập')</script>";
                        }
                    } else {
                        echo "<script>alert('Vui lòng đăng nhập lại')</script>";
                    }
                }
            }
            foreach ($error as $err => $value) {
                echo $value;
            }
            require_once("view/client/authentication/login.php");
        }
    }
    function logout()
    {
        //unset($_SESSION['user_client']);; // xóa session ---------------------------------
        session_destroy();
        header('location:/?controller=client_authentication&action=login');
    }
}
