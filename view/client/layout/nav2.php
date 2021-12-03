            <!--====== Nav 2 ======-->
            <nav class="secondary-nav-wrapper">
                <div class="container">

                    <!--====== Secondary Nav ======-->
                    <div class="secondary-nav">
                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation2">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog" type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>



                                <!-- tesstt -->


                                <ul class="ah-list ah-list--design2 ah-list--link-color-secondary">
                                    <li>

                                        <a href="/?controller=client&action=index"><i class="fas fa-home u-c-brand"></i></a>
                                    </li>
                                    <?php if (isset($_SESSION['user_client'])) : ?>
                                        <li class="has-dropdown">
                                            <a href="/?controller=account&action=index">Dashboard<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                            <!--====== Dropdown ======-->

                                            <span class="js-menu-toggle"></span>
                                            <ul style="width:200px">
                                                <li class="has-dropdown has-dropdown--ul-left-100">
                                                    <a href="/?controller=account&action=index">Quản Lý Tài Khoản</a>
                                                </li>
                                                <li>

                                                    <a href="/?controller=account&action=my_profile">Hồ Sơ Của Tôi</a>
                                                </li>
                                                <li class="has-dropdown has-dropdown--ul-left-100">

                                                    <a href="/?controller=account&action=address">Địa Chỉ Giao Hàng</a>
                                                </li>
                                                <li>

                                                    <a href="/?controller=account&action=my_orders">Đơn Đặt Hàng</a>
                                                </li>

                                                <li>
                                                    <a href="/?controller=account&action=track_order">Theo Dõi Đơn Hàng</a>
                                                </li>

                                            </ul>
                                            <!--====== End - Dropdown ======-->
                                        </li>
                                    <?php endif; ?>


                                    <li class="has-dropdown">

                                        <a href="?controller=client&action=list">Cửa Hàng</a>

                                    </li>
                                    <li>
                                        <a href="/?controller=about_us&action=index">Thông Tin Về Chúng Tôi</a>
                                    </li>
                                    <li>

                                        <a href="?controller=contact&action=index">Liên Hệ</a>
                                    </li>
                                </ul>

                                <!-- tessst -->

                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation3">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop" type="button"></button>

                            <span class="total-item-round" id="product_in_cart"><?= !empty($_SESSION['Cart']) ? count($_SESSION['Cart']) : 0 ?></span>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li>

                                        <a href=""><i class="far fa-heart"></i></a>
                                    </li>
                                    <li class="has-dropdown">

                                        <a class="mini-cart-shop-link"><i class="fas fa-shopping-bag"></i>

                                            <span class="total-item-round" id="product_in_cart2"><?= !empty($_SESSION['Cart']) ? count($_SESSION['Cart']) : 0 ?></span></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <div class="mini-cart">


                                            <!--====== Mini Product Statistics ======-->
                                            <div class="mini-product-stat">
                                                <div class="mini-action">

                                                    <a class="mini-link btn--e-brand-b-2" href="/?controller=checkout&action=index">TIẾN HÀNH THANH TOÁN</a>

                                                    <a class="mini-link btn--e-transparent-secondary-b-2" href="/?controller=cart&action=list">XEM GIỎ HÀNG</a>
                                                </div>
                                            </div>
                                            <!--====== End - Mini Product Statistics ======-->
                                        </div>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Secondary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 2 ======-->
            </header>
            <!--====== End - Main Header ======-->