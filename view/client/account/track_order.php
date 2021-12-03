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
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Theo Dõi Đơn Hàng</h1>

                                    <span class="dash__text u-s-m-b-30">Để theo dõi đơn hàng, vui lòng nhập ID đơn hàng của bạn vào ô bên dưới và nhấn nút "Theo dõi". Điều này đã được trao cho bạn trên biên nhận của bạn và trong email xác nhận mà bạn đáng lẽ đã nhận được.</span>
                                    <form class="dash-track-order">
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="order-id">Mã đơn hàng *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="order-id" placeholder="Tìm thấy trong email xác nhận của bạn">
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="track-email">Email *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="track-email" placeholder="Email bạn đã sử dụng khi thanh toán">
                                            </div>
                                        </div>

                                        <button class="btn btn--e-brand-b-2" type="submit">THEO DÕI</button>
                                    </form>
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