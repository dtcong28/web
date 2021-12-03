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
                                    <div class="dash__address-header">
                                        <h1 class="dash__h1">Địa Chỉ</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                <div class="dash__table-2-wrap gl-scroll">
                                    <table class="dash__table-2">
                                        <thead>
                                            <tr>
                                                <th>Hoạt động</th>
                                                <th>Tên</th>
                                                <th>Địa chỉ</th>
                                                <th>Số điện thoại</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>

                                                    <a class="address-book-edit btn--e-transparent-platinum-b-2" href="/?controller=account&action=edit_address">Chỉnh sửa</a>
                                                </td>
                                                <td><?= $infor->name ?></td>
                                                <td><?= $infor->address ?></td>
                                                <td><?= $infor->phone ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php if (($infor->address == NULL) || empty($infor->address)) : ?>
                                <div>
                                    <a class="dash__custom-link btn--e-brand-b-2" href="/?controller=account&action=add_address"><i class="fas fa-plus u-s-m-r-8"></i>

                                        <span>Thêm địa chỉ</span></a>
                                </div>
                            <?php endif; ?>
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