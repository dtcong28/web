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

                                <a href="?controller=client&action=index">Trang Chủ</a>
                            </li>
                            <li class="is-marked">

                                <a href="/?controller=client_authentication&action=login">Đăng Ký</a>
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
                            <h1 class="section__heading u-c-secondary">TẠO TÀI KHOẢN</h1>
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
                                <h1 class="gl-h1">THÔNG TIN CÁ NHÂN</h1>
                                <form class="l-f-o__form" method="post">
                                    <div class="gl-s-api">
                                        <div class="u-s-m-b-15">

                                            <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i class="fab fa-facebook-f"></i>

                                                <span>Đăng ký với Facebook</span></button>
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>

                                                <span>Đăng ký với Google</span></button>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-lname">HỌ VÀ TÊN *</label>

                                        <input class="input-text input-text--primary-style" type="text" name="name" placeholder="Họ và tên">
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-lname">SĐT *</label>

                                        <input class="input-text input-text--primary-style" type="tel" name="phone" placeholder="Số điện thoại">
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-lname">NGÀY SINH </label>

                                        <input class="input-text input-text--primary-style" type="date" name="birthday" placeholder="Ngày sinh">
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="gender">GIỚI TÍNH</label><select class="select-box select-box--primary-style u-w-100" name="gender">
                                                <option selected="">Chọn</option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-email">E-MAIL *</label>

                                        <input class="input-text input-text--primary-style" type="email" name="email" placeholder="Nhập E-mail">
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-password">MẬT KHẨU *</label>

                                        <input class="input-text input-text--primary-style" type="password" name="password" placeholder="Nhập mật khẩu">
                                    </div>
                                    <div class="u-s-m-b-15">

                                        <button class="btn btn--e-transparent-brand-b-2" type="submit" name="submit">TẠO</button>
                                    </div>

                                    <a class="gl-link" href="?controller=client&action=index">Trở về cửa hàng</a>
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