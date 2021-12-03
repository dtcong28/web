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
                            <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">

                            </div>
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Quản Lý Tài Khoản</h1>

                                    <span class="dash__text u-s-m-b-30">Từ Trang tổng quan tài khoản của tôi, bạn có thể xem ảnh chụp nhanh về hoạt động tài khoản gần đây và cập nhật thông tin tài khoản của mình. Chọn một liên kết bên dưới để xem hoặc chỉnh sửa thông tin.</span>
                                    <div class="row">
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">HỒ SƠ CÁ NHÂN</h2>

                                                    <span class="dash__text"><?= $infor->name ?></span>

                                                    <span class="dash__text"><?= $infor->email ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                                                <div class="dash__pad-3">
                                                    <h2 class="dash__h2 u-s-m-b-8">ĐỊA CHỈ</h2>

                                                    <span class="dash__text"><?= $infor->address ?></span>

                                                    <span class="dash__text"><?= $infor->phone ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-9 col-md-12">
                                    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                        <div class="dash__pad-2">
                                            <h1 class="dash__h1 u-s-m-b-14">Đơn Hàng Gần Đây</h1>

                                            <span class="dash__text u-s-m-b-30">Tại đây bạn có thể xem tất cả các sản phẩm đã được giao.</span>
                                            <div class="m-order__list">
                                                <?php foreach ($infor_order as $value) : ?>
                                                    <div class="m-order__get">
                                                        <div class="manage-o__header u-s-m-b-30">
                                                            <div class="dash-l-r">
                                                                <div>
                                                                    <div class="manage-o__text-2 u-c-secondary">Mã đơn #<?= $value->code ?></div>
                                                                    <div class="manage-o__text u-c-silver">Thời gian: <?= $value->created_at ?></div>
                                                                </div>
                                                                <div>
                                                                    <div>

                                                                        <span class="manage-o__badge badge--processing">
                                                                            <?php
                                                                            if ($value->status == 0) {
                                                                                echo "Chờ xử lý";
                                                                            } elseif ($value->status == 1) {
                                                                                echo "Đang giao";
                                                                            }
                                                                            ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
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