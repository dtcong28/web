<?php
require "view/client/layout/header.php";
require "view/client/layout/nav1.php";
require "view/client/layout/nav2.php";
?>

<div class="u-s-p-y-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="shop-w-master">
                    <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

                        <span>FILTERS</span>
                    </h1>
                    <div class="shop-w-master__sidebar sidebar--bg-snow">
                        <div class="u-s-m-b-30">
                            <form class="shop-w" method="post">
                                <div class="shop-w__intro-wrap">
                                    <h1 class="shop-w__h">NHÓM </h1>

                                    <span class="fas fa-minus shop-w__toggle" data-target="#s-category" data-toggle="collapse"></span>
                                </div>
                                <div class="shop-w__wrap collapse show" id="s-category">
                                    <?php foreach ($value as $v) : ?>
                                        <ul>
                                            <li>
                                                <?= $v; ?>
                                            </li>
                                        </ul>
                                    <?php endforeach; ?>
                                    <div class="shop-w__intro-wrap">
                                        <h1 class="shop-w__h">GIÁ</h1>
                                    </div>
                                    <div class="shop-w__form-p-wrap">
                                        <div>

                                            <label for="price-min"></label>

                                            <input class="input-text input-text--primary-style" type="text" name="price_min" placeholder="Min" required>
                                        </div>
                                        <div>

                                            <label for="price-max"></label>

                                            <input class="input-text input-text--primary-style" type="text" name="price_max" placeholder="Max" required>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn--e-brand-b-2" name="submit">Lọc</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="shop-p">
                    <div class="shop-p__toolbar u-s-m-b-30">
                        <div class="shop-p__tool-style">
                            <div class="tool-style__group u-s-m-b-8">

                                <span class="js-shop-grid-target is-active">Grid</span>

                                <span class="js-shop-list-target">List</span>
                            </div>
                        </div>
                    </div>
                    <div class="shop-p__collection">

                        <div class="row is-grid-active">
                            <?php
                            $i = 1;
                            foreach ($products as $product) :
                            ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product-m">
                                        <div class="product-m__thumb">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="/?controller=client&action=detail&id=<?= $product->id ?>">
                                                <img class="aspect__img" src="public/uploads/product/<?= $product->id . '/' . $product->main_image ?>" alt=""></a>
                                            <div class="product-m__add-cart">
                                                <?php
                                                $cart_ids = !empty($_SESSION['Cart']) ? array_keys($_SESSION['Cart']) : [];
                                                $product_id = $product->id;
                                                if (!in_array($product_id, $cart_ids)) :
                                                ?>
                                                    <a class="btn--e-brand product" data-modal="modal" data-product_id="<?= $product->id ?>" data-product_name="<?= $product->name ?>" data-product_image="public/uploads/product/<?= $product->id . '/' . $product->main_image ?>" data-product_price="<?= number_format($product->price) ?>VND">Thêm vào giỏ hàng</a>
                                                <?php else : ?>
                                                    <a class="btn btn--e-brand-b-2 disabled">Đã thêm vào giỏ hàng</a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                        <div class="product-m__content">
                                            <div class="product-m__category">

                                                <a href="shop-side-version-2.html">Sneaker</a>
                                            </div>
                                            <div class="product-m__name">

                                                <a href="/?controller=client&action=detail&id=<?= $product->id ?>"><?= $product->name ?></a>
                                            </div>
                                            <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                <span class="product-m__review">(23)</span>
                                            </div>
                                            <div class="product-m__price"><?= number_format($product->price) ?>VND</div>
                                            <div class="product-m__hover">
                                                <div class="product-m__preview-description">

                                                    <span><?= $product->description ?></span>
                                                </div>
                                                <div class="product-m__wishlist">

                                                    <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $i++;
                            endforeach;
                            ?>
                        </div>

                    </div>
                    <div class="u-s-p-y-60">

                        <!--====== Pagination ======-->

                        <ul class="shop-p__pagination">
                            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                <li class="is-active">
                                    <a href="/?controller=client&action=list&page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>

                        <!--====== End - Pagination ======-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require "view/client/layout/footer.php";
?>