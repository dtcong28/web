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

                                <a href="/?controller=client&action=index">Trang Chủ</a>
                            </li>
                            <li class="is-marked">

                                <a href="/?controller=cart&action=list">Giỏ Hàng</a>
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
                            <h1 class="section__heading u-c-secondary">GIỎ HÀNG</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                        <div class="table-responsive">
                            <table class="table-p">
                                <tbody>

                                    <!--====== Row ======-->

                                    <?php
                                    if (isset($array_product_in_cart)) :
                                        foreach ($array_product_in_cart as $value) :
                                    ?>
                                            <tr>
                                                <td>
                                                    <div class="table-p__box">
                                                        <div class="table-p__img-wrap">

                                                            <img class="u-img-fluid" src="public/uploads/product/<?= $value['id'] . '/' . $value['image'] ?>" alt="">
                                                        </div>
                                                        <div class="table-p__info">

                                                            <span class="table-p__name">

                                                                <a href="product-detail.html"><?php $value['name'] ?></a></span>

                                                            <ul class="table-p__variant-list">
                                                                <li>

                                                                    <span>Size: <?= $value['size'] ?></span>
                                                                </li>
                                                                <li>

                                                                    <span>Màu sắc: <?= $value['color'] ?></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="table-p__price"><?= number_format($value['price']) ?> VND</span>
                                                </td>
                                                <td>
                                                    <div class="table-p__input-counter-wrap">

                                                        <!--====== Input Counter ======-->
                                                        <div class="input-counter">

                                                            <span class="input-counter__minus fas fa-minus"></span>

                                                            <input class="input-counter__text input-counter--text-primary-style" type="text" value="<?= $value['number_product'] ?>" data-min="1" data-max="1000" data-product_id_in_cart=<?= $value['id'] ?>>

                                                            <span class="input-counter__plus fas fa-plus"></span>
                                                        </div>
                                                        <!--====== End - Input Counter ======-->
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-p__del-wrap">
                                                        <a class="far fa-trash-alt table-p__delete-link" href="/?controller=cart&action=delete_id&id=<?= $value["id"] ?>" id="delete_product_in_cart"></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--====== End - Row ======-->
                                    <?php
                                        endforeach;
                                    endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="route-box">
                            <div class="route-box__g1">

                                <a class="route-box__link" href="/?controller=client&action=list"><i class="fas fa-long-arrow-alt-left"></i>

                                    <span>TIẾP TỤC MUA SẮM</span></a>
                            </div>
                            <div class="route-box__g2">

                                <a class="route-box__link" href="/?controller=cart&action=delete_all"><i class="fas fa-trash"></i>

                                    <span>XÓA GIỎ HÀNG</span></a>

                                <a class="route-box__link" href="/?controller=cart&action=update"><i class="fas fa-sync"></i>

                                    <span>CẬP NHẬT GIỎ HÀNG</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->


    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                        <form class="f-cart">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                    <div class="f-cart__pad-box">
                                        <div class="u-s-m-b-30">
                                            <table class="f-cart__table">
                                                <tbody>
                                                    <tr>
                                                        <td>PHÍ SHIP</td>
                                                        <td>70.000 VND</td>
                                                    </tr>
                                                    <tr>
                                                        <td>THUẾ</td>
                                                        <td>0 VND</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TỔNG CỘNG</td>
                                                        <td>
                                                            <?php
                                                            if (!empty($array_product_in_cart)) {
                                                                $total = 0;
                                                                foreach ($array_product_in_cart as $value) {
                                                                    $total += $value['price'] * $value['number_product'];
                                                                }
                                                                $total = $total + 70000;
                                                                echo number_format($total) . ' VND';
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                        <div>

                                            <button class="btn btn--e-brand-b-2" > <a href="/?controller=checkout&action=index">TIẾN HÀNH THANH TOÁN</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->
</div>
<?php
require "view/client/layout/footer.php";
?>