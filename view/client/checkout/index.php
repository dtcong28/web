<?php
require "view/client/layout/header.php";
require "view/client/layout/nav1.php";
require "view/client/layout/nav2.php";
?>

<!--====== App Content ======-->
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

                                <a href="/?controller=checkout&action=index">Thanh Toán</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->

    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="checkout-f">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">THÔNG TIN GIAO HÀNG</h1>
                            <form class="checkout-f__delivery" id="payment-form">
                                <div class="u-s-m-b-30">
                                    <!--====== First Name, Last Name ======-->
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-15">

                                            <label class="gl-label" for="billing-fname">HỌ VÀ TÊN *</label>

                                            <input class="input-text input-text--primary-style" type="text" name="name" data-bill="" required>
                                        </div>
                                    </div>
                                    <!--====== End - First Name, Last Name ======-->

                                    <!--====== PHONE ======-->
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-phone">SĐT *</label>

                                        <input class="input-text input-text--primary-style" type="tel" name="phone" data-bill="" required>
                                    </div>
                                    <!--====== End - PHONE ======-->


                                    <!--======Address ======-->
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-phone">ĐỊA CHỈ *</label>

                                        <input class="input-text input-text--primary-style" type="text" name="address" data-bill="" required>
                                    </div>
                                    <!--====== End Address ======-->

                                    <div class="u-s-m-b-10">

                                        <label class="gl-label" for="order-note">LƯU Ý ĐƠN HÀNG</label><textarea class="text-area text-area--primary-style" name="note"></textarea>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box" id="method_payment">
                                        <h1 class="checkout-f__h1">THÔNG TIN THANH TOÁN</h1>

                                        <div class="u-s-m-b-10">

                                            <!--====== Radio Box ======-->
                                            <div class="radio-box">
                                                <input type="radio" value="1" name="payment" id="payment_1" required>
                                                <div class="radio-box__state radio-box__state--primary">

                                                    <label class="radio-box__label" for="cash-on-delivery">Thanh Toán Khi Giao Hàng</label>
                                                </div>
                                            </div>
                                            <!--====== End - Radio Box ======-->

                                            <span class="gl-text u-s-m-t-6">Thanh toán tiền mặt khi nhận hàng. (Dịch vụ này chỉ khả dụng cho một số quốc gia)</span>
                                        </div>
                                        <div class="u-s-m-b-10">

                                            <!--====== Radio Box ======-->
                                            <div class="radio-box">

                                                <input type="radio" value="0" name="payment" id="payment_2" required>
                                                <div class="radio-box__state radio-box__state--primary">

                                                    <label class="radio-box__label" for="pay-with-card">Thanh Toán Bằng Thẻ Tín Dụng / Thẻ Ghi Nợ</label>
                                                </div>
                                            </div>
                                            <input type="hidden" id="stripe_key" value="<?= $stripe_secret ?>">
                                            <div id="payment-element"></div>
                                            <!--====== End - Radio Box ======-->
                                            <span class="gl-text u-s-m-t-6">Thẻ tín dụng quốc tế phải đủ điều kiện để sử dụng tại Việt Nam.</span>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <!--====== Check Box ======-->
                                            <div class="check-box">
                                                <input type="checkbox" id="term-and-condition" required>
                                                <div class="check-box__state check-box__state--primary">
                                                    <label class="check-box__label" for="term-and-condition">Tôi đồng ý</label>
                                                </div>
                                            </div>
                                            <!--====== End - Check Box ======-->
                                            <a class="gl-link">điều khoản dịch vụ.</a>
                                        </div>
                                    </div>
                                </div>

                                <button id="submit" class="button_payment">
                                    <div class="spinner hidden" id="spinner"></div>
                                    <span id="button-text">ĐẶT HÀNG TẬN NƠI</span>
                                </button>
                                <div id="payment-message" class="hidden"></div>

                            </form>
                        </div>
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">TỔNG ĐƠN HÀNG</h1>

                            <!--====== Order Summary ======-->
                            <div class="o-summary">
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__item-wrap gl-scroll">
                                        <?php
                                        if (isset($array_product_in_cart)) :
                                            foreach ($array_product_in_cart as $value) :

                                        ?>
                                                <div class="o-card">
                                                    <div class="o-card__flex">
                                                        <div class="o-card__img-wrap">

                                                            <img class="u-img-fluid" src="public/uploads/product/<?= $value['id'] . '/' . $value['image'] ?>" alt="">
                                                        </div>
                                                        <div class="o-card__info-wrap">

                                                            <span class="o-card__name">

                                                                <a href="product-detail.html"><?= $value['name'] ?></a></span>

                                                            <span class="o-card__quantity">Số Lượng x <?= $value['number_product'] ?></span>

                                                            <span class="o-card__price"><?= number_format($value['price']) ?> VND</span>
                                                        </div>
                                                    </div>

                                                </div>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <table class="o-summary__table">
                                            <tbody>
                                                <tr>
                                                    <td>VẬN CHUYỂN</td>
                                                    <td>70.000 VND</td>
                                                </tr>
                                                <tr>
                                                    <td>THUẾ</td>
                                                    <td>0 VND</td>
                                                </tr>
                                                <tr>
                                                    <td>TỔNG TIỀN</td>
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
                                </div>
                                <!-- Choox cu -->
                            </div>
                            <!--====== End - Order Summary ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->
</div>
<!--====== End - App Content ======-->


<!--====== Modal Section ======-->


<!--====== End - Modal Section ======-->
</div>
<!--====== End - Main App ======-->

<?php
require "view/client/layout/footer.php";
?>