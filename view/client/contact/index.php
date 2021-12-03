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

                                <a href="index.html">Trang Chủ</a>
                            </li>
                            <li class="is-marked">

                                <a href="contact.html">Liên Hệ</a>
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
                        <div class="g-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4429.020202921282!2d105.76132045211301!3d21.018788816729515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454a15b9aeb8d%3A0x84ec0f4d29a7ab36!2zU8OibiB24bqtbiDEkeG7mW5nIFF14buRYyBnaWEgTeG7uSDEkMOsbmg!5e0!3m2!1svi!2s!4v1636340291580!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="contact-o u-h-100">
                            <div class="contact-o__wrap">
                                <div class="contact-o__icon"><i class="fas fa-phone-volume"></i></div>

                                <span class="contact-o__info-text-1">HÃY GỌI</span>

                                <span class="contact-o__info-text-2"><?= $infor['phone'];?></span>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="contact-o u-h-100">
                            <div class="contact-o__wrap">
                                <div class="contact-o__icon"><i class="fas fa-map-marker-alt"></i></div>

                                <span class="contact-o__info-text-1">VỊ TRÍ CỦA CHÚNG TÔI</span>

                                <span class="contact-o__info-text-2"><?= $infor['address'];?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                        <div class="contact-o u-h-100">
                            <div class="contact-o__wrap">
                                <div class="contact-o__icon"><i class="far fa-clock"></i></div>

                                <span class="contact-o__info-text-1">THỜI GIAN LÀM VIỆC</span>

                                <span class="contact-o__info-text-2">Từ thứ 2 đến thứ 7</span>

                                <span class="contact-o__info-text-2">Từ 9 sáng đến 19 giờ tối </span>
                            </div>
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

<?php
require "view/client/layout/footer.php";
?>