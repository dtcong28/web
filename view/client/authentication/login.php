<?php
require "view/client/layout/header.php";
require "view/client/layout/nav1.php";
require "view/client/layout/nav2.php";
?>

<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">

                                <a href="/?controller=client&action=index">Trang Chủ</a>
                            </li>
                            <li class="is-marked">

                                <a href="/?controller=client_authentication&action=login">Đăng Nhập</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">BẠN ĐÃ ĐĂNG KÝ CHƯA?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row row--center">
                    <div class="col-lg-6 col-md-8 u-s-m-b-30">
                        <div class="l-f-o">
                            <div class="l-f-o__pad-box">
                                <h1 class="gl-h1">TÔI LÀ KHÁCH HÀNG MỚI</h1>

                                <span class="gl-text u-s-m-b-30">Bằng cách tạo tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể thực hiện quy trình thanh toán nhanh hơn, lưu trữ địa chỉ giao hàng, xem và theo dõi đơn đặt hàng trong tài khoản của bạn và hơn thế nữa.</span>
                                <div class="u-s-m-b-15">

                                    <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="/?controller=client_authentication&action=register">TẠO TÀI KHOẢN</a>
                                </div>
                                <h1 class="gl-h1">ĐĂNG NHẬP</h1>

                                <span class="gl-text u-s-m-b-30">Nếu bạn có tài khoản với chúng tôi, vui lòng đăng nhập.</span>
                                <form class="l-f-o__form" method="post">
                                    <div class="gl-s-api">
                                        <div class="u-s-m-b-15">

                                            <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i class="fab fa-facebook-f"></i>

                                                <span>Đăng nhập với Facebook</span></button>
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>

                                                <span>Đăng nhập với Google</span></button>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="login-email">E-MAIL *</label>

                                        <input class="input-text input-text--primary-style" type="email" name="email" placeholder="Nhập E-mail" required>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="login-password">MẬT KHẨU *</label>

                                        <input class="input-text input-text--primary-style" type="password" name="password" placeholder="Nhập mật khẩu">
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label"><a href="/?controller=admin_authentication&action=loginAdmin">Đăng nhập vào admin</a></label>
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <button class="btn btn--e-transparent-brand-b-2" type="submit" name="submit">ĐĂNG NHẬP</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>

<?php
require "view/client/layout/footer.php";
?>