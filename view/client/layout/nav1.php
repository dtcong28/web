<nav class="primary-nav primary-nav-wrapper--border">
    <div class="container">
        <!--====== Primary Nav ======-->
        <div class="primary-nav">
            <!--====== Main Logo ======-->
            <a class="main-logo" href="/?controller=client&action=index">
                <img src="/public/client/images/logo/logo-1.png" alt=""></a>
            <!--====== End - Main Logo ======-->
            <!--====== Search Form ======-->
            <form class="main-form">
                <label for="main-search"></label>
                <input class="input-text input-text--border-radius input-text--style-1" type="text" id="main-search" placeholder="Search">
                <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
            </form>
            <!--====== End - Search Form ======-->
            <!--====== Dropdown Main plugin ======-->
            <div class="menu-init" id="navigation">
                <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs" type="button"></button>
                <!--====== Menu ======-->
                <div class="ah-lg-mode">
                    <span class="ah-close">✕ Close</span>
                    <!--====== List ======-->
                    <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                        <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">
                            <a><i class="far fa-user-circle"></i></a>
                            <!--====== Dropdown ======-->
                            <span class="js-menu-toggle"></span>
                            <ul style="width:120px">
                                <?php if (isset($_SESSION['user_client'])) : ?>
                                    <li>
                                        <a href="/?controller=account&action=index"><i class="fas fa-user-circle u-s-m-r-6"></i>
                                            <span>Tài khoản</span></a>
                                    </li>
                                <?php endif; ?>
                                <li>
                                    <a href="/?controller=client_authentication&action=register"><i class="fas fa-user-plus u-s-m-r-6"></i>
                                        <span>Đăng ký</span></a>
                                </li>
                                <li>
                                    <a href="/?controller=client_authentication&action=login"><i class="fas fa-lock u-s-m-r-6"></i>
                                        <span>Đăng nhập</span></a>
                                </li>
                                <li>
                                    <a href="/?controller=client_authentication&action=logout"><i class="fas fa-lock-open u-s-m-r-6"></i>
                                        <span>Đăng xuất</span></a>
                                </li>
                            </ul>
                            <!--====== End - Dropdown ======-->
                        </li>
                        <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Settings">
                            <a><i class="fas fa-user-cog"></i></a>
                            <!--====== Dropdown ======-->
                            <span class="js-menu-toggle"></span>
                            <ul style="width:120px">
                                <li class="has-dropdown has-dropdown--ul-right-100">
                                    <a>Language<i class="fas fa-angle-down u-s-m-l-6"></i></a>
                                    <!--====== Dropdown ======-->
                                    <span class="js-menu-toggle"></span>
                                    <ul style="width:120px">
                                        <li>
                                            <a>VIỆT NAM</a>
                                        </li>
                                    </ul>
                                    <!--====== End - Dropdown ======-->
                                </li>
                                <li class="has-dropdown has-dropdown--ul-right-100">
                                    <a>Currency<i class="fas fa-angle-down u-s-m-l-6"></i></a>
                                    <!--====== Dropdown ======-->
                                    <span class="js-menu-toggle"></span>
                                    <ul style="width:225px">
                                        <li>
                                            <a class="u-c-brand">VND</a>
                                        </li>
                                    </ul>
                                    <!--====== End - Dropdown ======-->
                                </li>
                            </ul>
                            <!--====== End - Dropdown ======-->
                        </li>
                        <li data-tooltip="tooltip" data-placement="left" title="Contact">
                            <a href="tel:+0900901904"><i class="fas fa-phone-volume"></i></a>
                        </li>
                        <li data-tooltip="tooltip" data-placement="left" title="Mail">
                            <a href="mailto:contact@domain.com"><i class="far fa-envelope"></i></a>
                        </li>
                    </ul>
                    <!--====== End - List ======-->
                </div>
                <!--====== End - Menu ======-->
            </div>
            <!--====== End - Dropdown Main plugin ======-->
        </div>
        <!--====== End - Primary Nav ======-->
    </div>
</nav>