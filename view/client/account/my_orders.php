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
                                    <h1 class="dash__h1 u-s-m-b-14">Những Đơn Đặt Hàng</h1>

                                    <span class="dash__text u-s-m-b-30">Tại đây bạn có thể xem tất cả các sản phẩm đã được giao.</span>
                                    <div class="m-order__list">
                                        <?php
                                            $data = array_reverse($infor_order);
                                            foreach ($data as $value) :
                                        ?>
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
                                                                    } elseif ($value->status == 2) {
                                                                        echo "Đã thanh toán";
                                                                    } elseif ($value->status == 3) {
                                                                        echo "Giao thành công";
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
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>

<?php
require "view/client/layout/footer.php";
?>