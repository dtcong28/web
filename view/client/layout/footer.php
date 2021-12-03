<!--====== Main Footer ======-->
<footer>
    <div class="outer-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="outer-footer__content u-s-m-b-40">
                        <?php $infor = ContactGateWay::list(); ?>
                        <span class="outer-footer__content-title">LIÊN HỆ VỚI CHÚNG TÔI</span>

                        <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>
                            <span><?= $infor['address'] ?></span>
                        </div>
                        <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

                            <span><?= $infor['phone'] ?></span>
                        </div>
                        <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

                            <span><?= $infor['email'] ?></span>
                        </div>
                        <div class="outer-footer__social">
                            <ul>
                                <li>

                                    <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>

                                    <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>

                                    <a class="s-youtube--color-hover" href="#"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li>

                                    <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>

                                    <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">

                                <span class="outer-footer__content-title">Thông tin</span>
                                <div class="outer-footer__list-wrap">
                                    <ul>
                                        <li>

                                            <a href="/?controller=cart&action=list">Giỏ hàng</a>
                                        </li>
                                        <?php if (isset($_SESSION['user_client'])) : ?>
                                            <li>

                                                <a href="/?controller=account&action=index">Tài khoản</a>
                                            </li>
                                        <?php endif; ?>
                                        <li>

                                            <a href="#">Nhà sản xuất</a>
                                        </li>
                                        <li>

                                            <a href="">Tài chính</a>
                                        </li>
                                        <li>

                                            <a href="/?controller=client&action=list">Cửa hàng</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">
                                <div class="outer-footer__list-wrap">

                                    <span class="outer-footer__content-title">Cửa hàng của chúng tôi</span>
                                    <ul>
                                        <li>

                                            <a href="/?controller=about_us&action=index">Thông tin</a>
                                        </li>
                                        <li>

                                            <a href="/?controller=contact&action=index">Liên hệ</a>
                                        </li>
                                        <li>

                                            <a href="/?controller=client&action=index">Trang web</a>
                                        </li>
                                        <li>

                                            <a href="#">Vận chuyển</a>
                                        </li>
                                        <li>

                                            <a href="/?controller=client&action=list">Cửa hàng</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="outer-footer__content">

                        <span class="outer-footer__content-title">Tham gia bản tin của chúng tôi</span>
                        <form class="newsletter">
                            <div class="u-s-m-b-15">
                                <div class="radio-box newsletter__radio">

                                    <input type="radio" id="male" name="gender">
                                    <div class="radio-box__state radio-box__state--primary">

                                        <label class="radio-box__label" for="male">Nam</label>
                                    </div>
                                </div>
                                <div class="radio-box newsletter__radio">

                                    <input type="radio" id="female" name="gender">
                                    <div class="radio-box__state radio-box__state--primary">

                                        <label class="radio-box__label" for="female">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="newsletter__group">

                                <label for="newsletter"></label>

                                <input class="input-text input-text--only-white" type="text" id="newsletter" placeholder="Enter your Email">

                                <button class="btn btn--e-brand newsletter__btn" type="submit">SUBSCRIBE</button>
                            </div>

                            <span class="newsletter__text">Theo dõi email để nhận thông tin cập nhật về các chương trình khuyến mãi, hàng mới, chiết khấu và phiếu giảm giá.</span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="lower-footer__content">
                        <div class="lower-footer__payment">
                            <ul>
                                <li><i class="fab fa-cc-stripe"></i></li>
                                <li><i class="fab fa-cc-paypal"></i></li>
                                <li><i class="fab fa-cc-mastercard"></i></li>
                                <li><i class="fab fa-cc-visa"></i></li>
                                <li><i class="fab fa-cc-discover"></i></li>
                                <li><i class="fab fa-cc-amex"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--====== Modal Section ======-->


<!--====== Quick Look Modal ======-->
<div class="modal fade" id="quick-look">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal--shadow">

            <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5">

                        <!--====== Product Breadcrumb ======-->
                        <div class="pd-breadcrumb u-s-m-b-30">
                            <ul class="pd-breadcrumb__list">
                                <li class="has-separator">

                                    <a href="index.hml">Home</a>
                                </li>
                                <li class="has-separator">

                                    <a href="shop-side-version-2.html">Electronics</a>
                                </li>
                                <li class="has-separator">

                                    <a href="shop-side-version-2.html">DSLR Cameras</a>
                                </li>
                                <li class="is-marked">

                                    <a href="shop-side-version-2.html">Nikon Cameras</a>
                                </li>
                            </ul>
                        </div>
                        <!--====== End - Product Breadcrumb ======-->


                        <!--====== Product Detail ======-->
                        <div class="pd u-s-m-b-30">
                            <div class="pd-wrap">
                                <div id="js-product-detail-modal">
                                    <div>

                                        <img class="u-img-fluid" src="/public/client/images/product/product-d-1.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="/public/client/images/product/product-d-2.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="/public/client/images/product/product-d-3.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="/public/client/images/product/product-d-4.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="/public/client/images/product/product-d-5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="u-s-m-t-15">
                                <div id="js-product-detail-modal-thumbnail">
                                    <div>

                                        <img class="u-img-fluid" src="/public/client/images/product/product-d-1.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="/public/client/images/product/product-d-2.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="/public/client/images/product/product-d-3.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="/public/client/images/product/product-d-4.jpg" alt="">
                                    </div>
                                    <div>

                                        <img class="u-img-fluid" src="/public/client/images/product/product-d-5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Product Detail ======-->
                    </div>
                    <div class="col-lg-7">

                        <!--====== Product Right Side Details ======-->
                        <div class="pd-detail">
                            <div>

                                <span class="pd-detail__name">Nikon Camera 4k Lens Zoom Pro</span>
                            </div>
                            <div>
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__price">$6.99</span>

                                    <span class="pd-detail__discount">(76% OFF)</span><del class="pd-detail__del">$28.97</del>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                    <span class="pd-detail__review u-s-m-l-4">

                                        <a href="product-detail.html">23 Reviews</a></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__stock">200 in stock</span>

                                    <span class="pd-detail__left">Only 2 left</span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">

                                <span class="pd-detail__preview-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                        <a href="signin.html">Add to Wishlist</a>

                                        <span class="pd-detail__click-count">(222)</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                        <a href="signin.html">Email me When the price drops</a>

                                        <span class="pd-detail__click-count">(20)</span></span>
                                </div>
                            </div>
                            <div class="u-s-m-b-15">
                                <ul class="pd-social-list">
                                    <li>

                                        <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a>
                                    </li>
                                    <li>

                                        <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="u-s-m-b-15">
                                <form class="pd-detail__form">
                                    <div class="pd-detail-inline-2">
                                        <div class="u-s-m-b-15">

                                            <!--====== Input Counter ======-->
                                            <div class="input-counter">

                                                <span class="input-counter__minus fas fa-minus"></span>

                                                <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                                <span class="input-counter__plus fas fa-plus"></span>
                                            </div>
                                            <!--====== End - Input Counter ======-->
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="u-s-m-b-15">

                                <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                                <ul class="pd-detail__policy-list">
                                    <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                        <span>Buyer Protection.</span>
                                    </li>
                                    <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                        <span>Full Refund if you don't receive your order.</span>
                                    </li>
                                    <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                        <span>Returns accepted if product not as described.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--====== End - Product Right Side Details ======-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Quick Look Modal ======-->


<!--====== Add to Cart Modal ======-->
<div class="modal fade" id="add-to-cart">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-radius modal-shadow">

            <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="success u-s-m-b-30">
                            <div class="success__text-wrap"><i class="fas fa-check"></i>

                                <span>Đã thêm sản phẩm thành công!</span>
                            </div>
                            <div class="success__img-wrap">

                                <img class="u-img-fluid" id="product_image_view" src="/public/client/images/product/electronic/product1.jpg" alt="">
                            </div>
                            <div class="success__info-wrap">

                                <span class="success__name" id="product_name"></span>

                                <span class="success__quantity">Số lương: 1</span>

                                <span class="success__price" id="product_price_view"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="s-option">

                            <span class="s-option__text">1 item (s) in your cart</span>
                            <div class="s-option__link-box">

                                <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">TIẾP TỤC MUA SẮM</a>

                                <a class="s-option__link btn--e-white-brand-shadow" href="/?controller=cart&action=list">XEM GIỎ HÀNG</a>

                                <a class="s-option__link btn--e-brand-shadow" href="checkout.html">THỰC HIỆN THANH TOÁN</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Add to Cart Modal ======-->


<!--====== Newsletter Subscribe Modal ======-->
<!-- <div class="modal fade new-l" id="newsletter-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal--shadow">

                    <button class="btn new-l__dismiss fas fa-times" type="button" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row u-s-m-x-0">
                            <div class="col-lg-6 new-l__col-1 u-s-p-x-0">

                                <a class="new-l__img-wrap u-d-block" href="shop-side-version-2.html">

                                    <img class="u-img-fluid u-d-block" src="/public/client/images/newsletter/newsletter.jpg" alt=""></a></div>
                            <div class="col-lg-6 new-l__col-2">
                                <div class="new-l__section u-s-m-t-30">
                                    <div class="u-s-m-b-8 new-l--center">
                                        <h3 class="new-l__h3">Newsletter</h3>
                                    </div>
                                    <div class="u-s-m-b-30 new-l--center">
                                        <p class="new-l__p1">Sign up for emails to get the scoop on new arrivals, special sales and more.</p>
                                    </div>
                                    <form class="new-l__form">
                                        <div class="u-s-m-b-15">

                                            <input class="news-l__input" type="text" placeholder="E-mail Address"></div>
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-brand-b-2" type="submit">Sign up!</button></div>
                                    </form>
                                    <div class="u-s-m-b-15 new-l--center">
                                        <p class="new-l__p2">By Signing up, you agree to receive Reshop offers,<br />promotions and other commercial messages. You may unsubscribe at any time.</p>
                                    </div>
                                    <div class="u-s-m-b-15 new-l--center">

                                        <a class="new-l__link" data-dismiss="modal">No Thanks</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
<!--====== End - Newsletter Subscribe Modal ======-->
<!--====== End - Modal Section ======-->
</div>
<!--====== End - Main App ======-->


<!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>

<!--====== Vendor Js ======-->
<script src="/public/client/js/vendor.js"></script>

<!--====== Google Map Mới ======-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-MO9uPLS-ApTqYs0FpYdVG8cFwdq6apw"></script>

<!--====== Google Map Init Mới ======-->
<script src="js/map-init.js"></script>

<!--====== jQuery Shopnav plugin ======-->
<script src="/public/client/js/jquery.shopnav.js"></script>

<!--====== App Mới ======-->
<script src="js/app.js"></script>

<!--====== App ======-->
<script src="/public/client/js/app.js"></script>

<!--====== Noscript ======-->
<noscript>
    <div class="app-setting">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="app-setting__wrap">
                        <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                        <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</noscript>
<script>
    $(document).ready(function() {
        $(".product").click(
            function(event) {
                let selector = $(this)
                let product_id = selector.data('product_id')
                $.post("/?controller=cart&action=add", {
                    id: product_id,
                    number: 1,

                }).done(function() {
                    let product_in_cart = $('#product_in_cart').html()
                    $('#product_in_cart').html(parseInt(product_in_cart) + 1)
                    $('#product_in_cart2').html(parseInt(product_in_cart) + 1)
                    selector.html('Đã Thêm Vào Giỏ Hàng')
                    $('#product_name').html(selector.data('product_name'))
                    $('#product_price_view').html(selector.data('product_price'))
                    $("#product_image_view").attr("src", selector.data('product_image'));
                    $('#add-to-cart').modal('show');

                });
            }
        );

        $("#submit_cart").click(function() {
            let selector = $("#number_product")
            let number = selector.val()
            let product_id = selector.data('product_id')

            $.post("/?controller=cart&action=add", {
                    id: product_id,
                    number: number,
                    size: $('#get_size option:selected').val(),
                    color: $('#get_color option:selected').val(),
                })
                .done(function() {
                    let product_in_cart = $('#product_in_cart').html()
                    $('#product_in_cart').html(parseInt(product_in_cart) + 1)
                    $('#product_in_cart2').html(parseInt(product_in_cart) + 1)
                    $('#submit_cart').html('Đã Thêm Vào Giỏ Hàng')
                });
        });

        $("delete_product_in_cart").click(function() {
            let selector = $(this)
            let product_id_in_cart = selector.data('product_id_in_cart')

        });
    });
</script>

</body>

</html>