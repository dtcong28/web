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

                                <a href="">Thông báo</a>
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

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about">
                            <div class="about__container">
                                <div class="about__info">
                                    <h2 class="about__h2">CHÚC MỪNG BẠN ĐÃ THANH TOÁN THÀNH CÔNG</h2>

                                    <a class="about__link btn--e-secondary" href="/?controller=account&action=my_orders" target="_blank">Theo dõi đơn hàng</a>
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



    <!--====== Section 4 ======-->
    <div class="u-s-p-b-90 u-s-m-b-30">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">PHẢN HỒI CỦA KHÁCH HÀNG</h1>

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
                <div>
                    <div class="owl-carousel owl-loaded owl-drag" id="testimonial-slider">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2760px;">
                                <div class="owl-item active" style="width: 690px;">
                                    <div class="testimonial">
                                        <div class="testimonial__img-wrap">

                                            <img class="testimonial__img" src="public/client/images/about/test-1.jpg" alt="">
                                        </div>
                                        <div class="testimonial__content-wrap">

                                            <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                            <blockquote class="testimonial__block-quote">
                                                <p>"Sản phẩm bên shop chất lượng, giao hàng nhanh chóng sau khi đặt "</p>
                                            </blockquote>

                                            <span class="testimonial__author">Tiến Công.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 690px;">
                                    <div class="testimonial">
                                        <div class="testimonial__img-wrap">

                                            <img class="testimonial__img" src="public/client/images/about/test-2.jpg" alt="">
                                        </div>
                                        <div class="testimonial__content-wrap">

                                            <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                            <blockquote class="testimonial__block-quote">
                                                <p>"Giá của các mẫu giày rất hợp lý, nhiều mẫu mã, sẽ ủng hộ shop thêm"</p>
                                            </blockquote>

                                            <span class="testimonial__author">Thu Hà.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 690px;">
                                    <div class="testimonial">
                                        <div class="testimonial__img-wrap">

                                            <img class="testimonial__img" src="public/client/images/about/test-3.jpg" alt="">
                                        </div>
                                        <div class="testimonial__content-wrap">

                                            <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                            <blockquote class="testimonial__block-quote">
                                                <p>"Dịch vụ rất tốt, tư vấn nhiệt tình"</p>
                                            </blockquote>

                                            <span class="testimonial__author">Nam.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 690px;">
                                    <div class="testimonial">
                                        <div class="testimonial__img-wrap">

                                            <img class="testimonial__img" src="public/client/images/about/test-4.jpg" alt="">
                                        </div>
                                        <div class="testimonial__content-wrap">

                                            <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                            <blockquote class="testimonial__block-quote">
                                                <p>"Có nhiều đợt giảm giá, nhiều mẫu mã, đem lại nhiều trải nghiệm tốt cho khách. Uy tín, sau cần mua giày sẽ liên hệ shop."</p>
                                            </blockquote>

                                            <span class="testimonial__author">Mạnh.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
                    </div>
                </div>
                <!--====== End - Testimonial Slider ======-->
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 4 ======-->
</div>

<?php
require "view/client/layout/footer.php";
?>