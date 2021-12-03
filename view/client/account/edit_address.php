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
                                <div class="dash__pad-1">
                                    <ul class="dash__w-list">
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                <span class="dash__w-text">4</span>

                                                <span class="dash__w-name">Orders Placed</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                <span class="dash__w-text">0</span>

                                                <span class="dash__w-name">Cancel Orders</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                <span class="dash__w-text">0</span>

                                                <span class="dash__w-name">Wishlist</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Chỉnh sửa địa chỉ</h1>

                                    <span class="dash__text u-s-m-b-30">Chúng tôi cần một địa chỉ để chúng tôi có thể cung cấp sản phẩm.</span>
                                    <form class="dash-address-manipulation" method="post">
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="address-fname">TÊN *</label>

                                                <input class="input-text input-text--primary-style" type="text" name="name" value="<?=$infor->name?>" required>
                                            </div>
                                        </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="address-phone">SỐ ĐIỆN THOẠI *</label>

                                                <input class="input-text input-text--primary-style" type="text" name="phone" value="<?=$infor->phone?>" required>
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="address-street">ĐỊA CHỈ *</label>

                                                <input class="input-text input-text--primary-style" type="text" name="address" value="<?=$infor->address?>" required>
                                            </div>
                                        </div>
                                        <button class="btn btn--e-brand-b-2" type="submit" name="submit">LƯU</button>
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