<?php
require "view/client/layout/header.php";
require "view/client/layout/nav1.php";
require "view/client/layout/nav2.php";
?>
<div class="app-content">
    <div class="u-s-p-t-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <!--====== Product Detail Zoom ======-->
                    <div class="pd u-s-m-b-30">
                        <div class="slider-fouc pd-wrap">
                            <div id="pd-o-initiate">
                                <div class="pd-o-img-wrap" data-src="images/product/product-d-1.jpg">

                                    <img class="u-img-fluid" src="/public/uploads/product/<?= $product->id . '/' . $product->main_image; ?>" data-zoom-image="/public/uploads/product/<?= $product->id . '/' . $product->main_image; ?>" alt="">
                                </div>
                                <?php
                                $detail_images = explode(',', $product->detail_image);
                                $id = $product->id;
                                foreach ($detail_images as $detail_image) :
                                ?>
                                    <div class="pd-o-img-wrap" data-src="/public/uploads/product/<?= $id . '/' . $detail_image ?>">

                                        <img class="u-img-fluid" src="/public/uploads/product/<?= $id . '/' . $detail_image ?>" data-zoom-image="/public/uploads/product/<?= $id . '/' . $detail_image ?>" alt="">
                                    </div>
                                <?php endforeach; ?>

                            </div>

                            <span class="pd-text">Click for larger zoom</span>
                        </div>
                        <div class="u-s-m-t-15">
                            <div class="slider-fouc">
                                <div id="pd-o-thumbnail">
                                    <div>
                                        <img class="u-img-fluid" src="/public/uploads/product/<?= $product->id . '/' . $product->main_image; ?>" alt="">
                                    </div>
                                    <?php foreach ($detail_images as $detail_image) : ?>
                                        <img class="u-img-fluid" src="/public/uploads/product/<?= $id . '/' . $detail_image ?>" alt="">
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Product Detail Zoom ======-->
                </div>
                <div class="col-lg-7">

                    <!--====== Product Right Side Details ======-->
                    <div class="pd-detail">
                        <div>

                            <span class="pd-detail__name"><?= $product->name ?></span>
                        </div>
                        <div>
                            <div class="pd-detail__inline">

                                <span class="pd-detail__price"><?= number_format($product->price) . ' VND' ?></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                <span class="pd-detail__review u-s-m-l-4">

                                    <a data-click-scroll="#view-review">23 Reviews</a></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">

                                <span class="pd-detail__stock">200 in stock</span>

                                <span class="pd-detail__left">Only 2 left</span>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__preview-desc"><?= $product->detail_description ?></span>
                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">

                                <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                    <a href="signin.html">Thêm vào danh sách yêu thích</a>

                                    <span class="pd-detail__click-count">(222)</span></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">

                                <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                    <a href="signin.html">Nhận email khi giá giảm</a>

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
                            <div class="pd-detail__form">
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__label u-s-m-b-8">Color:</span>
                                    <div class="pd-detail__color">
                                        <div class="pd-detail__size">
                                            <div class="color__text ">

                                                <select class="form-select" aria-label="Default select example" id="get_color">
                                                    <option selected>Chọn màu</option>
                                                    <?php
                                                    $array_color = explode(',', $product->options_colours);
                                                    foreach ($array_color as $value) :
                                                    ?>
                                                        <option value="<?= $value ?>"><?= $value ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__label u-s-m-b-8">Size:</span>
                                    <div class="pd-detail__size">
                                        <div class="size__text ">
                                            <select class="form-select" aria-label="Default select example" id="get_size" >
                                                <option selected>Chọn size</option>
                                                <?php
                                                $array_size = explode(',', $product->options_sizes);
                                                foreach ($array_size as $value) :
                                                ?>
                                                    <option value="<?= $value ?>"><?= $value ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="pd-detail-inline-2">
                                    <div class="u-s-m-b-15">
                                        <?php
                                        $cart_ids = !empty($_SESSION['Cart']) ? array_keys($_SESSION['Cart']) : [];
                                        $product_id = $_GET['id'];
                                        ?>
                                        <?php if (!in_array($product_id, $cart_ids)) : ?>
                                            <!--====== Input Counter ======-->
                                            <div class="input-counter">

                                                <span class="input-counter__minus fas fa-minus"></span>

                                                <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" id="number_product" data-product_id=<?= $_GET['id'] ?> data-min="1" data-max="1000" name="number_product">

                                                <span class="input-counter__plus fas fa-plus"></span>
                                            </div>
                                            <!--====== End - Input Counter ======-->
                                        <?php endif ?>
                                    </div>
                                    <!-- chố cũ -->
                                </div>
                                <div class="u-s-m-b-15">
                                    <?php if (!in_array($product_id, $cart_ids)) : ?>
                                        <button class="btn btn--e-brand-b-2" type="submit" id='submit_cart' name="submit_cart">Thêm vào giỏ hàng</button>
                                    <?php else : ?>
                                        <button class="btn btn--e-brand-b-2 disabled">Đã thêm vào giỏ hàng</button>
                                    <?php endif ?>
                                </div>
                            </div>

                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__label u-s-m-b-8">Chính sách sản phẩm:</span>
                            <ul class="pd-detail__policy-list">
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Người mua được bảo vệ.</span>
                                </li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Hoàn trả tiền nếu bạn không nhận được đơn hàng.</span>
                                </li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Trả hàng được chấp nhận nếu sản phẩm không như mô tả.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--====== End - Product Right Side Details ======-->
                </div>
            </div>
        </div>
    </div>

    <!-- ====================== Product detail tab  ======================== -->
    <div class="u-s-p-y-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pd-tab">
                        <div class="u-s-m-b-30">
                            <ul class="nav pd-tab__list">
                                <li class="nav-item">

                                    <a class="nav-link active show" data-toggle="tab" href="#pd-desc">MÔ TẢ</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">

                            <!--====== Tab 1 ======-->
                            <div class="tab-pane fade active show" id="pd-desc">
                                <div class="pd-tab__desc">
                                    <div class="u-s-m-b-15">
                                        <?= $product->detail_description ?>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <ul>
                                            <li><i class="fas fa-check u-s-m-r-8"></i>

                                                <span>Người mua được bảo vệ.</span>
                                            </li>
                                            <li><i class="fas fa-check u-s-m-r-8"></i>

                                                <span>Hoàn trả tiền nếu bạn không nhận được đơn hàng.</span>
                                            </li>
                                            <li><i class="fas fa-check u-s-m-r-8"></i>

                                                <span> Trả hàng được chấp nhận nếu sản phẩm không như mô tả.</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <h4>THÔNG TIN SẢN PHẨM</h4>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <div class="pd-table gl-scroll">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Màu sắc</td>
                                                        <td><?= $product->options_colours ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kích thước</td>
                                                        <td><?= $product->options_sizes ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 1 ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<?php
require "view/client/layout/footer.php";
?>