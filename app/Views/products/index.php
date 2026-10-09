
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="products-page" id="all-products">

    <!-- PAGE HEADING -->
    <div class="products-header">
        <div>
            <p class="eyebrow">Collection</p>
            <h1>The Daily Fit Products</h1>
            <p class="products-subtitle">
                Explore our latest clothing collections.
            </p>
        </div>
    </div>

    <!-- CATEGORY NAVIGATION -->
    <nav class="category-navigation" aria-label="Product categories">

        <a href="#all-products" class="category-nav-item active">
            <img
                src="https://i.postimg.cc/NFqvZQ1h/all-removebg-preview.png"
                alt="All clothing categories"
                loading="lazy"
            >
            <span class="category-nav-label">All</span>
        </a>

        <a href="#outerwear" class="category-nav-item">
            <img
                src="https://im.uniqlo.com/global-cms/spa/resdd12e4b205fcae6af0d3acbc49de04d3fr.png"
                alt=""
                loading="lazy"
            >
            <span class="category-nav-label">Outerwear</span>
        </a>

        <a href="#tshirts-sweats-fleece" class="category-nav-item">
            <img
                src="https://im.uniqlo.com/global-cms/spa/res61ed311d767c362c429f3a7f058f5712fr.png"
                alt=""
                loading="lazy"
            >
            <span class="category-nav-label">T-shirts, Sweats &amp; Fleece</span>
        </a>

        <a href="#shirts-blouses-polo" class="category-nav-item">
            <img
                src="https://im.uniqlo.com/global-cms/spa/resd7b749c5298d8902ff5143a683f5b8e4fr.png"
                alt=""
                loading="lazy"
            >
            <span class="category-nav-label">Shirts, Blouses &amp; Polo Shirts</span>
        </a>

        <a href="#sweaters-knitwear" class="category-nav-item">
            <img
                src="https://im.uniqlo.com/global-cms/spa/resf0f030a5fbf76a905f19e9e0d8bc6f87fr.png"
                alt=""
                loading="lazy"
            >
            <span class="category-nav-label">Sweaters &amp; Knitwear</span>
        </a>

        <a href="#bottoms" class="category-nav-item">
            <img
                src="https://image.uniqlo.com/UQ/CMS/navi/image/NAVI_488701_67.jpg"
                alt=""
                loading="lazy"
            >
            <span class="category-nav-label">Bottoms</span>
        </a>

        <a href="#dresses-skirts" class="category-nav-item">
            <img
                src="https://im.uniqlo.com/global-cms/spa/res481d2cf0c771035cfea8004701d3b146fr.jpg"
                alt=""
                loading="lazy"
            >
            <span class="category-nav-label">Dresses &amp; Skirts</span>
        </a>

    </nav>

    <!-- OUTERWEAR -->
    <section class="product-category" id="outerwear">

        <div class="category-header">
            <h2>Outerwear</h2>
            <span>8 Items</span>
        </div>

        <div class="product-grid">

            <?php
            $outerwear = [
                [
                    'name' => 'PUFFTECH Parka',
                    'price' => 3490,
                    'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/469871/item/phgoods_71_469871_3x4.jpg?width=300'
                ],
                [
                    'name' => 'Windproof Fleece Reversible Full-Zip Hoodie',
                    'price' => 2490,
                    'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/487603/item/phgoods_02_487603_3x4.jpg?width=300'
                ],
                [
                    'name' => 'Utility Cotton Blend Parka',
                    'price' => 2990,
                    'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/487396/item/phgoods_19_487396_3x4.jpg?width=300'
                ],
                [
                    'name' => 'Reversible Parka',
                    'price' => 1990,
                    'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/481602/item/phgoods_60_481602_3x4.jpg?width=300'
                ],
                [
                    'name' => 'Cotton Blend Short Parka',
                    'price' => 2490,
                    'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/479229/item/phgoods_09_479229_3x4.jpg?width=300'
                ],
                [
                    'name' => 'Pocketable UV Protection Parka',
                    'price' => 1990,
                    'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/485671/item/phgoods_10_485671_3x4.jpg?width=300'
                ],
                [
                    'name' => 'PUFFTECH Parka',
                    'price' => 3490,
                    'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/469871/item/phgoods_60_469871_3x4.jpg?width=300'
                ],
                [
                    'name' => 'Seamless Down Parka',
                    'price' => 6990,
                    'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/489429/item/phgoods_57_489429_3x4.jpg?width=300'
                ],
            ];
            ?>

            <?php foreach ($outerwear as $productIndex => $product): ?>

                <article class="fashion-card">

                    <img
                        src="<?= esc($product['image'], 'attr') ?>"
                        alt="<?= esc($product['name'], 'attr') ?>"
                        loading="lazy"
                    >

                    <button
                        class="wishlist-button"
                        type="button"
                        aria-label="Add <?= esc($product['name'], 'attr') ?> to wishlist"
                        aria-pressed="false"
                        title="Add to wishlist"
                    >
                        <span aria-hidden="true">♡</span>
                    </button>

                    <div class="fashion-info">

                        <p class="product-size">Women, XS–XL</p>

                        <h3><?= esc($product['name']) ?></h3>

                        <p class="product-category-label">Outerwear</p>

                        <div class="product-price-row">

                            <?php if ($productIndex % 3 === 0): ?>

                                <strong class="sale-price">
                                    ₱<?= number_format($product['price'] * 0.75, 2) ?>
                                </strong>

                                <del class="original-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </del>

                            <?php else: ?>

                                <strong class="regular-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </strong>

                            <?php endif; ?>

                        </div>

                        <?php if ($productIndex % 3 === 0): ?>
                            <span class="product-sale-label">Sale</span>
                        <?php endif; ?>

                        <div class="product-rating" aria-label="Rated 4.6 out of 5">
                            <span aria-hidden="true">★</span>
                            <strong>4.6</strong>
                            <span class="review-count">
                                (<?= 3 + ($productIndex % 8) ?>)
                            </span>
                        </div>

                    </div>


<?php if (session('role') === 'staff'): ?>
    <a
        href="<?= site_url('sales') ?>"
        class="add-product-button"
    >
        Add Product
    </a>
<?php endif; ?>

                </article>

            <?php endforeach; ?>

        </div>
    </section>

    <!-- T-SHIRTS, SWEATS & FLEECE -->
    <section class="product-category" id="tshirts-sweats-fleece">

        <div class="category-header">
            <h2>T-shirts, Sweats &amp; Fleece</h2>
            <span>8 Items</span>
        </div>

        <div class="product-grid">

            <?php
            $tops = [
                ['name' => 'Mini T-Shirt', 'price' => 590, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/465760/item/phgoods_03_465760_3x4.jpg'],
                ['name' => 'Mini T-Shirt', 'price' => 590, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/487277/item/phgoods_14_487277_3x4.jpg?width=300'],
                ['name' => 'Rib Mini T-Shirt', 'price' => 590, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/484457/item/phgoods_10_484457_3x4.jpg?width=300'],
                ['name' => 'Rib Mini T-Shirt', 'price' => 390, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/484457/item/phgoods_09_484457_3x4.jpg?width=300'],
                ['name' => 'Mini T-Shit', 'price' => 590, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/465760/item/phgoods_00_465760_3x4.jpg?width=300'],
                ['name' => 'AIRism Cotton Short Sleeve T-Shirt', 'price' => 790, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/480054/item/phgoods_59_480054_3x4.jpg?width=300'],
                ['name' => 'AIRism UV Protection DRY-EX T-Shirt', 'price' => 790, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/487300/item/phgoods_07_487300_3x4.jpg?width=300'],
                ['name' => 'Hooded Ribbed T-Shirt Long Sleeve', 'price' => 990, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/488298/item/phgoods_60_488298_3x4.jpg?width=300'],
            ];
            ?>

            <?php foreach ($tops as $productIndex => $product): ?>

                <article class="fashion-card">

                    <img
                        src="<?= esc($product['image'], 'attr') ?>"
                        alt="<?= esc($product['name'], 'attr') ?>"
                        loading="lazy"
                    >

                    <button
                        class="wishlist-button"
                        type="button"
                        aria-label="Add <?= esc($product['name'], 'attr') ?> to wishlist"
                        aria-pressed="false"
                        title="Add to wishlist"
                    >
                        <span aria-hidden="true">♡</span>
                    </button>

                    <div class="fashion-info">

                        <p class="product-size">Women, XS–XL</p>

                        <h3><?= esc($product['name']) ?></h3>

                        <p class="product-category-label">
                            T-shirts, Sweats &amp; Fleece
                        </p>

                        <div class="product-price-row">

                            <?php if ($productIndex % 3 === 0): ?>

                                <strong class="sale-price">
                                    ₱<?= number_format($product['price'] * 0.75, 2) ?>
                                </strong>

                                <del class="original-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </del>

                            <?php else: ?>

                                <strong class="regular-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </strong>

                            <?php endif; ?>

                        </div>

                        <?php if ($productIndex % 3 === 0): ?>
                            <span class="product-sale-label">Sale</span>
                        <?php endif; ?>

                        <div class="product-rating" aria-label="Rated 4.6 out of 5">
                            <span aria-hidden="true">★</span>
                            <strong>4.6</strong>
                            <span class="review-count">
                                (<?= 3 + ($productIndex % 8) ?>)
                            </span>
                        </div>

                    </div>


<?php if (session('role') === 'staff'): ?>
    <a
        href="<?= site_url('sales') ?>"
        class="add-product-button"
    >
        Add Product
    </a>
<?php endif; ?>


                </article>

            <?php endforeach; ?>

        </div>
    </section>

    <!-- SHIRTS, BLOUSES & POLO SHIRTS -->
    <section class="product-category" id="shirts-blouses-polo">

        <div class="category-header">
            <h2>Shirts, Blouses &amp; Polo Shirts</h2>
            <span>8 Items</span>
        </div>

        <div class="product-grid">

            <?php
            $shirts = [
                ['name' => 'Oxford Shirt', 'price' => 999, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/492353/item/phgoods_11_492353_3x4.jpg'],
                ['name' => 'Rayon Skipper Collar 3/4 Sleeve Blouse', 'price' => 990, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/484256/item/phgoods_34_484256_3x4.jpg?width=300'],
                ['name' => 'Flannel Boxy Shirt Long Sleeve', 'price' => 1990, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/489508/item/phgoods_64_489508_3x4.jpg?width=300'],
                ['name' => 'Flannel Boxy Shirt Long Sleeve', 'price' => 1990, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/489407/item/phgoods_32_489407_3x4.jpg?width=300'],
                ['name' => 'Cotton Polo Shirt', 'price' => 799, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/489406/item/phgoods_30_489406_3x4.jpg?width=300'],
                ['name' => 'Striped Button Shirt', 'price' => 1099, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/488559/item/phgoods_30_488559_3x4.jpg?width=300'],
                ['name' => 'Casual Polo', 'price' => 849, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/489509/item/phgoods_62_489509_3x4.jpg?width=300'],
                ['name' => 'Oversized Shirt', 'price' => 1199, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/489427/item/phgoods_12_489427_3x4.jpg?width=300'],
            ];
            ?>

            <?php foreach ($shirts as $productIndex => $product): ?>

                <article class="fashion-card">

                    <img
                        src="<?= esc($product['image'], 'attr') ?>"
                        alt="<?= esc($product['name'], 'attr') ?>"
                        loading="lazy"
                    >

                    <button
                        class="wishlist-button"
                        type="button"
                        aria-label="Add <?= esc($product['name'], 'attr') ?> to wishlist"
                        aria-pressed="false"
                        title="Add to wishlist"
                    >
                        <span aria-hidden="true">♡</span>
                    </button>

                    <div class="fashion-info">

                        <p class="product-size">Women, XS–XL</p>

                        <h3><?= esc($product['name']) ?></h3>

                        <p class="product-category-label">
                            Shirts, Blouses &amp; Polo Shirts
                        </p>

                        <div class="product-price-row">

                            <?php if ($productIndex % 3 === 0): ?>

                                <strong class="sale-price">
                                    ₱<?= number_format($product['price'] * 0.75, 2) ?>
                                </strong>

                                <del class="original-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </del>

                            <?php else: ?>

                                <strong class="regular-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </strong>

                            <?php endif; ?>

                        </div>

                        <?php if ($productIndex % 3 === 0): ?>
                            <span class="product-sale-label">Sale</span>
                        <?php endif; ?>

                        <div class="product-rating" aria-label="Rated 4.6 out of 5">
                            <span aria-hidden="true">★</span>
                            <strong>4.6</strong>
                            <span class="review-count">
                                (<?= 3 + ($productIndex % 8) ?>)
                            </span>
                        </div>

                    </div>


<?php if (session('role') === 'staff'): ?>
    <a
        href="<?= site_url('sales') ?>"
        class="add-product-button"
    >
        Add Product
    </a>
<?php endif; ?>


                </article>

            <?php endforeach; ?>

        </div>
    </section>

    <!-- SWEATERS & KNITWEAR -->
    <section class="product-category" id="sweaters-knitwear">

        <div class="category-header">
            <h2>Sweaters &amp; Knitwear</h2>
            <span>8 Items</span>
        </div>

        <div class="product-grid">

            <?php
            $knitwear = [
                ['name' => 'Relaxed Cardigan', 'price' => 1299, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/487855/item/phgoods_32_487855_3x4.jpg'],
                ['name' => 'Crew Neck Sweater', 'price' => 1199, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/487855/item/phgoods_41_487855_3x4.jpg?width=300'],
                ['name' => 'Merino Knit Sweater', 'price' => 1499, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/485329/item/phgoods_10_485329_3x4.jpg?width=300'],
                ['name' => 'Cable Knit Pullover', 'price' => 1399, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/485717/item/phgoods_01_485717_3x4.jpg?width=300'],
                ['name' => 'Ribbed Cardigan', 'price' => 1099, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/484505/item/phgoods_01_484505_3x4.jpg?width=300'],
                ['name' => 'Mock Neck Sweater', 'price' => 1299, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/465484/item/phgoods_11_465484_3x4.jpg?width=300'],
                ['name' => 'Soft Knit Top', 'price' => 999, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/488839/item/phgoods_50_488839_3x4.jpg?width=300'],
                ['name' => 'V-Neck Cardigan', 'price' => 1199, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/469411/item/phgoods_34_469411_3x4.jpg?width=300'],
            ];
            ?>

            <?php foreach ($knitwear as $productIndex => $product): ?>

                <article class="fashion-card">

                    <img
                        src="<?= esc($product['image'], 'attr') ?>"
                        alt="<?= esc($product['name'], 'attr') ?>"
                        loading="lazy"
                    >

                    <button
                        class="wishlist-button"
                        type="button"
                        aria-label="Add <?= esc($product['name'], 'attr') ?> to wishlist"
                        aria-pressed="false"
                        title="Add to wishlist"
                    >
                        <span aria-hidden="true">♡</span>
                    </button>

                    <div class="fashion-info">

                        <p class="product-size">Women, XS–XL</p>

                        <h3><?= esc($product['name']) ?></h3>

                        <p class="product-category-label">
                            Sweaters &amp; Knitwear
                        </p>

                        <div class="product-price-row">

                            <?php if ($productIndex % 3 === 0): ?>

                                <strong class="sale-price">
                                    ₱<?= number_format($product['price'] * 0.75, 2) ?>
                                </strong>

                                <del class="original-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </del>

                            <?php else: ?>

                                <strong class="regular-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </strong>

                            <?php endif; ?>

                        </div>

                        <?php if ($productIndex % 3 === 0): ?>
                            <span class="product-sale-label">Sale</span>
                        <?php endif; ?>

                        <div class="product-rating" aria-label="Rated 4.6 out of 5">
                            <span aria-hidden="true">★</span>
                            <strong>4.6</strong>
                            <span class="review-count">
                                (<?= 3 + ($productIndex % 8) ?>)
                            </span>
                        </div>

                    </div>


<?php if (session('role') === 'staff'): ?>
    <a
        href="<?= site_url('sales') ?>"
        class="add-product-button"
    >
        Add Product
    </a>
<?php endif; ?>

                </article>

            <?php endforeach; ?>

        </div>
    </section>

    <!-- BOTTOMS -->
    <section class="product-category" id="bottoms">

        <div class="category-header">
            <h2>Bottoms</h2>
            <span>8 Items</span>
        </div>

        <div class="product-grid">

            <?php
            $bottoms = [
                ['name' => 'Wide Leg Jeans', 'price' => 1499, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/469869/item/phgoods_64_469869_3x4.jpg'],
                ['name' => 'Straight Jeans', 'price' => 1399, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/463857/item/phgoods_64_463857_3x4.jpg?width=300'],
                ['name' => 'Pleated Wide Pants', 'price' => 1299, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/475303/item/phgoods_09_475303_3x4.jpg?width=300'],
                ['name' => 'Smart Ankle Pants', 'price' => 1299, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/463858/item/phgoods_09_463858_3x4.jpg?width=300'],
                ['name' => 'Denim Shorts', 'price' => 999, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/469870/item/phgoods_64_469870_3x4.jpg?width=300'],
                ['name' => 'Linen Blend Pants', 'price' => 1499, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/475304/item/phgoods_09_475304_3x4.jpg?width=300'],
                ['name' => 'Relaxed Cargo Pants', 'price' => 1399, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/471809/item/phgoods_09_471809_3x4.jpg?width=300'],
                ['name' => 'Casual Jogger Pants', 'price' => 1199, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/465185/item/phgoods_09_465185_3x4.jpg?width=300'],
            ];
            ?>

            <?php foreach ($bottoms as $productIndex => $product): ?>

                <article class="fashion-card">

                    <img
                        src="<?= esc($product['image'], 'attr') ?>"
                        alt="<?= esc($product['name'], 'attr') ?>"
                        loading="lazy"
                    >

                    <button
                        class="wishlist-button"
                        type="button"
                        aria-label="Add <?= esc($product['name'], 'attr') ?> to wishlist"
                        aria-pressed="false"
                        title="Add to wishlist"
                    >
                        <span aria-hidden="true">♡</span>
                    </button>

                    <div class="fashion-info">

                        <p class="product-size">Women, XS–XL</p>

                        <h3><?= esc($product['name']) ?></h3>

                        <p class="product-category-label">Bottoms</p>

                        <div class="product-price-row">

                            <?php if ($productIndex % 3 === 0): ?>

                                <strong class="sale-price">
                                    ₱<?= number_format($product['price'] * 0.75, 2) ?>
                                </strong>

                                <del class="original-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </del>

                            <?php else: ?>

                                <strong class="regular-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </strong>

                            <?php endif; ?>

                        </div>

                        <?php if ($productIndex % 3 === 0): ?>
                            <span class="product-sale-label">Sale</span>
                        <?php endif; ?>

                        <div class="product-rating" aria-label="Rated 4.6 out of 5">
                            <span aria-hidden="true">★</span>
                            <strong>4.6</strong>
                            <span class="review-count">
                                (<?= 3 + ($productIndex % 8) ?>)
                            </span>
                        </div>

                    </div>


<?php if (session('role') === 'staff'): ?>
    <a
        href="<?= site_url('sales') ?>"
        class="add-product-button"
    >
        Add Product
    </a>
<?php endif; ?>


                </article>

            <?php endforeach; ?>

        </div>
    </section>

    <!-- DRESSES & SKIRTS -->
    <section class="product-category" id="dresses-skirts">

        <div class="category-header">
            <h2>Dresses &amp; Skirts</h2>
            <span>8 Items</span>
        </div>

        <div class="product-grid">

            <?php
            $dresses = [
                ['name' => 'Sleeveless Dress', 'price' => 1499, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/475541/item/phgoods_09_475541_3x4.jpg?width=300'],
                ['name' => 'Cotton Shirt Dress', 'price' => 1599, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/475542/item/phgoods_09_475542_3x4.jpg?width=300'],
                ['name' => 'Pleated Skirt', 'price' => 1299, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/475543/item/phgoods_09_475543_3x4.jpg?width=300'],
                ['name' => 'A-Line Skirt', 'price' => 1199, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/475544/item/phgoods_09_475544_3x4.jpg?width=300'],
                ['name' => 'Casual Midi Dress', 'price' => 1699, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/475545/item/phgoods_09_475545_3x4.jpg?width=300'],
                ['name' => 'Linen Blend Dress', 'price' => 1799, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/475546/item/phgoods_09_475546_3x4.jpg?width=300'],
                ['name' => 'Flared Skirt', 'price' => 1099, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/475547/item/phgoods_09_475547_3x4.jpg?width=300'],
                ['name' => 'Relaxed Maxi Dress', 'price' => 1899, 'image' => 'https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/475548/item/phgoods_09_475548_3x4.jpg?width=300'],
            ];
            ?>

            <?php foreach ($dresses as $productIndex => $product): ?>

                <article class="fashion-card">

                    <img
                        src="<?= esc($product['image'], 'attr') ?>"
                        alt="<?= esc($product['name'], 'attr') ?>"
                        loading="lazy"
                    >

                    <button
                        class="wishlist-button"
                        type="button"
                        aria-label="Add <?= esc($product['name'], 'attr') ?> to wishlist"
                        aria-pressed="false"
                        title="Add to wishlist"
                    >
                        <span aria-hidden="true">♡</span>
                    </button>

                    <div class="fashion-info">

                        <p class="product-size">Women, XS–XL</p>

                        <h3><?= esc($product['name']) ?></h3>

                        <p class="product-category-label">Dresses &amp; Skirts</p>

                        <div class="product-price-row">

                            <?php if ($productIndex % 3 === 0): ?>

                                <strong class="sale-price">
                                    ₱<?= number_format($product['price'] * 0.75, 2) ?>
                                </strong>

                                <del class="original-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </del>

                            <?php else: ?>

                                <strong class="regular-price">
                                    ₱<?= number_format($product['price'], 2) ?>
                                </strong>

                            <?php endif; ?>

                        </div>

                        <?php if ($productIndex % 3 === 0): ?>
                            <span class="product-sale-label">Sale</span>
                        <?php endif; ?>

                        <div class="product-rating" aria-label="Rated 4.6 out of 5">
                            <span aria-hidden="true">★</span>
                            <strong>4.6</strong>
                            <span class="review-count">
                                (<?= 3 + ($productIndex % 8) ?>)
                            </span>
                        </div>

                    </div>


<?php if (session('role') === 'staff'): ?>
    <a
        href="<?= site_url('sales') ?>"
        class="add-product-button"
    >
        Add Product
    </a>
<?php endif; ?>


                </article>

            <?php endforeach; ?>

        </div>
    </section>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.wishlist-button').forEach(function (button) {
        button.addEventListener('click', function () {
            const isActive = button.getAttribute('aria-pressed') === 'true';

            button.setAttribute('aria-pressed', String(!isActive));

            const heart = button.querySelector('span');

            if (heart) {
                heart.textContent = isActive ? '♡' : '♥';
            }
        });
    });
});
</script>

<?= $this->endSection() ?>
