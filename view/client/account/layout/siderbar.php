<div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
    <div class="dash__pad-1">

        <span class="dash__text u-s-m-b-16">Xin chào, <?=$infor->name?></span>
        <ul class="dash__f-list">
            <li>

                <a class="<?= $_GET['action'] == 'index' ? "dash-active" : "" ?>" href="/?controller=account&action=index">Quản Lý Tài Khoản</a>
            </li>
            <li>

                <a class="<?= $_GET['action'] == 'my_profile' ? "dash-active" : "" ?>" href="/?controller=account&action=my_profile">Hồ Sơ</a>
            </li>
            <li>

                <a class="<?= $_GET['action'] == 'address' ? "dash-active" : "" ?>" href="/?controller=account&action=address">Địa Chỉ</a>
            </li>
            <li>

                <a class="<?= $_GET['action'] == 'track_order' ? "dash-active" : "" ?>" href="/?controller=account&action=track_order">Theo Dõi Đơn Hàng</a>
            </li>
            <li>

                <a class="<?= $_GET['action'] == 'my_orders' ? "dash-active" : "" ?>" href="/?controller=account&action=my_orders">Những Đơn Đặt Hàng</a>
            </li>
        </ul>
    </div>
</div>