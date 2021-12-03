<?php
require "layout/header.php";
require "layout/nav1.php";
require "layout/nav2.php";
?>
<!--====== App Content ======-->
<div class="app-content">
    <!--====== Primary Slider ======-->
    <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
        <div class="owl-carousel primary-style-1 " id="hero-slider">
            <div class="hero-slide hero-slide--3">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content slider-content--animation">

                                <span class="content-span-1 u-c-white">THƯỜNG XUYÊN CÓ GIẢM GIÁ TRONG THÁNG</span>

                                <span class="content-span-2 u-c-white">Giảm từ 10%-50%</span>

                                <span class="content-span-3 u-c-white">Tìm đôi giày có giá tốt nhất, đồng thời khám phá hầu hết các sản phẩm bán chạy của chúng tôi</span>

                                <span class="content-span-4 u-c-white">Chỉ từ

                                    <span class="u-c-brand">2.000.000 VND</span></span>

                                <a class="shop-now-link btn--e-brand" href="/?controller=client&action=list">MUA NGAY</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-slide hero-slide--1">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide hero-slide--2">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Primary Slider ======-->

    <!--====== Section 4 ======-->
    <div class="u-s-p-b-60">
        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">HÀNG MỚI</h1>

                            <span class="section__span u-c-silver">CÁC BẠN HÃY NHANH TAY SỞ HỮU NHỮNG MÓN HÀNG MỚI VỀ </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div>
                    <div class="owl-carousel product-slider owl-loaded owl-drag" data-item="4">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-310px, 0px, 0px); transition: all 0s ease 0s; width: 1860px;">
                                <?php foreach ($new_product as $value) : ?>
                                    <div class="owl-item" style="width: 310px;">
                                        <div class="u-s-m-b-30">
                                            <div class="product-o product-o--hover-on">
                                                <div class="product-o__wrap">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                                        <img class="aspect__img" src="/public/uploads/product/<?= $value->id . '/' . $value->main_image ?>" alt=""></a>
                                                </div>

                                                <span class="product-o__name">

                                                    <a href="/?controller=client&action=detail&id=<?= $value->id ?>"><?= $value->name ?></a></span>
                                                <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                    <span class="product-o__review">(0)</span>
                                                </div>

                                                <span class="product-o__price"><?= number_format($value->price) . ' VND' ?><span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="owl-nav">
                            <div class="p-prev"><i class="fas fa-long-arrow-alt-left"></i></div>
                            <div class="p-next"><i class="fas fa-long-arrow-alt-right"></i></div>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 4 ======-->


    <!--====== Section 5 ======-->
    <div class="banner-bg">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-bg__countdown">
                            <div class="countdown countdown--style-banner" data-countdown="2020/05/01"></div>
                        </div>
                        <div class="banner-bg__wrap">
                            <div class="banner-bg__text-1">

                                <span class="u-c-brand">MUA SẮM</span>

                                <span class="u-c-secondary">TOÀN CẦU</span>
                            </div>
                            <div class="banner-bg__text-2">

                                <span class="u-c-secondary">RA MẮT CHÍNH THỨC</span>

                                <span class="u-c-brand">ĐỪNG BỎ LỠ</span>
                            </div>

                            <a class="banner-bg__shop-now btn--e-secondary" href="/?controller=client&action=list">MUA NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 5 ======-->


    <!--====== Section 6 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">SẢN PHẨM NỔI BẬT</h1>

                            <span class="section__span u-c-silver">TÌM HIỂU NHỮNG SẢN PHẨM NỔI BẬT</span>
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
                    <?php foreach ($special_product as $value) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                            <div class="product-o product-o--hover-on u-h-100">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                        <img class="aspect__img" src="/public/uploads/product/<?= $value->id . '/' . $value->main_image ?>" alt=""></a>
                                </div>
                                <span class="product-o__name">

                                    <a href="/?controller=client&action=detail&id=<?= $value->id ?>"><?= $value->name ?></a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                    <span class="product-o__review">(23)</span>
                                </div>
                                <span class="product-o__price"><?= number_format($value->price) . ' VND' ?><span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 6 ======-->

    <!--====== Section 8 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                        <div class="column-product">
                            <span class="column-product__title u-c-secondary u-s-m-b-25">SẢN PHẨM ĐẶC BIỆT</span>
                            <ul class="column-product__list">
                                <?php foreach ($special_product as $value) : ?>
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="/?controller=client&action=detail&id=<?= $value->id ?>">

                                                    <img class="aspect__img" src="/public/uploads/product/<?= $value->id . '/' . $value->main_image ?>" alt=""></a>
                                            </div>
                                            <div class="product-l__info-wrap">
                                                <span class="product-l__name">

                                                    <a href="/?controller=client&action=detail&id=<?= $value->id ?>"><?= $value->name ?></a></span>

                                                <span class="product-l__price"><?= number_format($value->price) . ' VND' ?></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                        <div class="column-product">

                            <span class="column-product__title u-c-secondary u-s-m-b-25">SẢN PHẨM TRONG TUẦN</span>
                            <ul class="column-product__list">
                                <?php foreach ($new_product as $value) : ?>
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="/?controller=client&action=detail&id=<?= $value->id ?>">

                                                    <img class="aspect__img" src="/public/uploads/product/<?= $value->id . '/' . $value->main_image ?>" alt=""></a>
                                            </div>
                                            <div class="product-l__info-wrap">

                                                <span class="product-l__name">

                                                    <a href="/?controller=client&action=detail&id=<?= $value->id ?>"><?= $value->name ?></a></span>

                                                <span class="product-l__price"><?= number_format($value->price) . ' VND' ?></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                        <div class="column-product">

                            <span class="column-product__title u-c-secondary u-s-m-b-25">SẢN PHẨM CHỚP NHOÁNG</span>
                            <ul class="column-product__list">
                                <?php foreach ($flash_deal as $value) : ?>
                                    <li class="column-product__item">
                                        <div class="product-l">
                                            <div class="product-l__img-wrap">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link" href="/?controller=client&action=detail&id=<?= $value->id ?>">

                                                    <img class="aspect__img" src="/public/uploads/product/<?= $value->id . '/' . $value->main_image ?>" alt=""></a>
                                            </div>
                                            <div class="product-l__info-wrap">
                                                <div class="product-l__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div>

                                                <span class="product-l__name">

                                                    <a href="/?controller=client&action=detail&id=<?= $value->id ?>"><?= $value->name ?></a></span>

                                                <span class="product-l__price"><?= number_format($value->price) . ' VND' ?></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 8 ======-->


    <!--====== Section 9 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-truck"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">Miễn Phí Vận Chuyển</span>

                                <span class="service__info-text-2">Giao hàng miễn phí cho tất cả các đơn đặt hàng tại Việt Nam hoặc đơn hàng trên 3.000.000 VND</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-redo"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">Mua Sắm Với Sự Tự Tin</span>

                                <span class="service__info-text-2">Sự bảo vệ của chúng tôi bao gồm việc mua hàng của bạn từ khi nhấp chuột đến khi giao hàng</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="service u-h-100">
                            <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                            <div class="service__info-wrap">

                                <span class="service__info-text-1">Trung Tâm Hỗ Trợ 24/7</span>

                                <span class="service__info-text-2">Hỗ trợ suốt ngày đêm để có trải nghiệm mua sắm suôn sẻ</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 9 ======-->


    <!--====== Section 11 ======-->
    <div class="u-s-p-b-90 u-s-m-b-30">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">PHẢN HỒI TỪ KHÁCH HÀNG</h1>

                            <span class="section__span u-c-silver">KHÁCH HÀNG CỦA CHÚNG TÔI NÓI GÌ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">

                <!--====== Testimonial Slider ======-->
                <div class="slider-fouc">
                    <div class="owl-carousel" id="testimonial-slider">
                        <div class="testimonial">
                            <div class="testimonial__img-wrap">

                                <img class="testimonial__img" src="/public/client/images/about/test-1.jpg" alt="">
                            </div>
                            <div class="testimonial__content-wrap">

                                <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                <blockquote class="testimonial__block-quote">
                                    <p>"Sản phẩm bên shop chất lượng, giao hàng nhanh chóng sau khi đặt "</p>
                                </blockquote>

                                <span class="testimonial__author">Tiến Công</span>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial__img-wrap">

                                <img class="testimonial__img" src="/public/client/images/about/test-2.jpg" alt="">
                            </div>
                            <div class="testimonial__content-wrap">

                                <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                <blockquote class="testimonial__block-quote">
                                    <p>"Giá của các mẫu giày rất hợp lý, nhiều mẫu mã, sẽ ủng hộ shop thêm"</p>
                                </blockquote>

                                <span class="testimonial__author">Thu Hà</span>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial__img-wrap">

                                <img class="testimonial__img" src="/public/client/images/about/test-3.jpg" alt="">
                            </div>
                            <div class="testimonial__content-wrap">

                                <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                <blockquote class="testimonial__block-quote">
                                    <p>"Dịch vụ rất tốt, tư vấn nhiệt tình"</p>
                                </blockquote>

                                <span class="testimonial__author">Nam</span>
                            </div>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial__img-wrap">

                                <img class="testimonial__img" src="/public/client/images/about/test-4.jpg" alt="">
                            </div>
                            <div class="testimonial__content-wrap">

                                <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                <blockquote class="testimonial__block-quote">
                                    <p>"Có nhiều đợt giảm giá, nhiều mẫu mã, đem lại nhiều trải nghiệm tốt cho khách. Uy tín, sau cần mua giày sẽ liên hệ shop"</p>
                                </blockquote>

                                <span class="testimonial__author">Mạnh.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Testimonial Slider ======-->
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 11 ======-->

</div>
<!--====== End - App Content ======-->

<?php
require "layout/footer.php";
?>