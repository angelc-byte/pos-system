<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>


<section class="store-actions">

    <div class="heading-actions">

        <a href="<?= base_url('/guest') ?>" class="button button-secondary">
            Continue as Guest
        </a>


<a class="button button-primary" href="<?= site_url('login') ?>">
    Login / Sign Up
</a>

    </div>

</section>


<!-- FEATURED PRODUCTS -->

<section class="featured-products">


    <div class="section-header">


        <div>

            <p class="eyebrow">
                Collection
            </p>


            <h2>
                Featured Products
            </h2>

        </div>



        <a class="text-link" href="<?= base_url('/products') ?>">

            View all <span>→</span>

        </a>


    </div>




    <div class="featured-grid">



        <article class="featured-card">

            <img 
                src="https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/465760/item/phgoods_03_465760_3x4.jpg?width=300"
                alt="Mini T-Shirt"
            >


            <h3>
                Mini T-Shirt
            </h3>


            <p>
                Tops
            </p>


        </article>



        <article class="featured-card">

            <img 
                src="https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/481602/item/phgoods_31_481602_3x4.jpg?width=300"
                alt="Reversible Parka"
            >


            <h3>
                Reversible Parka
            </h3>


            <p>
                Outerwear
            </p>


        </article>



        <article class="featured-card">

            <img 
                src="https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/488455/item/phgoods_30_488455_3x4.jpg?width=300"
                alt="Denim Culotte"
            >


            <h3>
                Denim Culotte
            </h3>


            <p>
                Bottoms
            </p>


        </article>



        <article class="featured-card">

            <img 
                src="https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/492353/item/phgoods_11_492353_3x4.jpg?width=300"
                alt="Boxy Short Sleeve Shirt"
            >


            <h3>
                Boxy Short Sleeve Shirt
            </h3>


            <p>
                Tops
            </p>


        </article>
                <article class="featured-card">

            <img 
                src="https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/487855/item/phgoods_32_487855_3x4.jpg?width=300"
                alt="Relaxed Cardigan"
            >


            <h3>
                Relaxed Cardigan
            </h3>


            <p>
                Sweaters & Knitwear
            </p>


        </article>




        <article class="featured-card">

            <img 
                src="https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/484062/item/phgoods_00_484062_3x4.jpg?width=300"
                alt="Shirt Dress"
            >


            <h3>
                Shirt Dress
            </h3>


            <p>
                Dresses & Skirts
            </p>


        </article>




        <article class="featured-card">

            <img 
                src="https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/482280/item/phgoods_64_482280_3x4.jpg?width=300"
                alt="Barrel Jeans"
            >


            <h3>
                Barrel Jeans
            </h3>


            <p>
                Bottoms
            </p>


        </article>




        <article class="featured-card">

            <img 
                src="https://image.uniqlo.com/UQ/ST3/ph/imagesgoods/469871/item/phgoods_30_469871_3x4.jpg?width=300"
                alt="Puff Parka"
            >


            <h3>
                Puff Parka
            </h3>


            <p>
                Outerwear
            </p>


        </article>



    </div>


</section>


<?= $this->endSection() ?>