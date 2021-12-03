<?php
require "view/client/layout/header.php";
require "view/client/layout/nav1.php";
require "view/client/layout/nav2.php";
?>
<div class="app-content">

    <?php require "view/client/account/layout/section1.php"; ?>


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            <?php require "view/client/account/layout/siderbar.php"; ?>
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Hồ Sơ Của Tôi</h1>
                                    <div class="row">
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <h2 class="dash__h2 u-s-m-b-8">Họ và tên</h2>

                                            <span class="dash__text"><?= $infor->name ?></span>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                            <span class="dash__text"><?= $infor->email ?></span>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <h2 class="dash__h2 u-s-m-b-8">Số điện thoại</h2>
                                            <span class="dash__text"><?= $infor->phone ?></span>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <h2 class="dash__h2 u-s-m-b-8">Sinh nhật</h2>

                                            <span class="dash__text"><?= $infor->date_of_birth ?></span>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <h2 class="dash__h2 u-s-m-b-8">Giới tính</h2>

                                            <span class="dash__text"><?= $infor->gender ?></span>
                                        </div>
                                    </div>
                                </div>
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