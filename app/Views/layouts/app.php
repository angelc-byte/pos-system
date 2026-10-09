<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The Daily Fit Clothing Management System">

    <title><?= esc($pageTitle ?? 'Dashboard') ?> | The Daily Fit</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>?v=2">
</head>

<body class="app-body <?= ($activePage ?? '') === 'dashboard' ? 'dashboard-page' : '' ?>">

<?php

$active = $activePage ?? '';
$isGuest = (bool) session()->get('isGuest');

$fullName = $isGuest
    ? 'Guest'
    : (string) session('full_name');

$initials = implode(
    '',
    array_map(
        static fn ($part) => strtoupper(substr($part, 0, 1)),
        array_slice(array_filter(explode(' ', $fullName)), 0, 2)
    )
);

$sessionAvatar = basename((string) session('avatar'));

$sessionAvatarUrl =
    ! $isGuest &&
    $sessionAvatar &&
    is_file(FCPATH . 'uploads/avatars/' . $sessionAvatar)
        ? base_url('uploads/avatars/' . rawurlencode($sessionAvatar))
        : null;

?>

<div class="app-shell">

    <header class="main-header">

        <a class="brand" href="<?= base_url('/') ?>">

            <div class="brand-logo">
                <img
                    src="https://i.postimg.cc/4yxYC6kV/TDF-logo-no-bg.png"
                    alt="The Daily Fit Logo"
                >
            </div>

            <div class="brand-text">
                <strong>THE DAILY FIT</strong>
                <small>Fashion POS</small>
            </div>

        </a>

        <nav class="main-nav">

            <a
                class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>"
                href="<?= base_url('/') ?>"
            >
                Dashboard
            </a>

            <a
                class="nav-link <?= $active === 'products' ? 'active' : '' ?>"
                href="<?= base_url('/products') ?>"
            >
                Products
            </a>

            <a
                class="nav-link <?= $active === 'sales' ? 'active' : '' ?>"
                href="<?= base_url('/sales') ?>"
            >
                Sales
            </a>

            <a
                class="nav-link <?= $active === 'customers' ? 'active' : '' ?>"
                href="<?= base_url('/customers') ?>"
            >
                Customers
            </a>

            <a
                class="nav-link <?= $active === 'users' ? 'active' : '' ?>"
                href="<?= base_url('/users') ?>"
            >
                Staff
            </a>

        </nav>
                <div class="header-right">


            <div class="topbar-date">

                <span>
                    <?= date('l') ?>
                </span>


                <strong>
                    <?= date('M j, Y') ?>
                </strong>


            </div>





            <div class="user-menu-wrap">


                <button 
                    class="user-chip" 
                    id="userMenuBtn" 
                    type="button"
                >


                    <?php if ($isGuest): ?>


                        <span class="avatar guest-avatar">

                            👤

                        </span>



                        <div class="user-copy">


                            <strong>

                                Guest

                            </strong>


                            <small>

                                @guest

                            </small>


                        </div>



                    <?php else: ?>


                        <span class="avatar">


                            <?php if ($sessionAvatarUrl): ?>


                                <img 
                                    src="<?= esc($sessionAvatarUrl) ?>" 
                                    alt=""
                                >



                            <?php else: ?>


                                <?= esc($initials ?: 'U') ?>



                            <?php endif; ?>


                        </span>





                        <div class="user-copy">


                            <strong>

                                <?= esc($fullName ?: 'Staff Member') ?>

                            </strong>



                            <small>

                                @<?= esc((string) session('username')) ?>

                            </small>


                        </div>



                    <?php endif; ?>



                    <span class="chevron">

                        ▾

                    </span>


                </button>







                <div 
                    class="user-dropdown" 
                    id="userDropdown" 
                    hidden
                >



                    <div class="dropdown-heading">


                        <strong>

                            <?= esc($fullName ?: 'Guest') ?>

                        </strong>



                        <small>

                            <?= $isGuest 
                                ? 'Guest Account' 
                                : esc((string) session('email')) 
                            ?>

                        </small>


                    </div>





                    <?php if (! $isGuest): ?>


                        <a 
                            class="dropdown-action" 
                            href="<?= base_url('/profile') ?>"
                        >

                            Edit Profile

                        </a>





                        <form 
                            action="<?= base_url('/logout') ?>" 
                            method="post"
                        >

                            <?= csrf_field() ?>


                            <button 
                                class="dropdown-action" 
                                type="submit"
                            >

                                Sign Out

                            </button>


                        </form>



                    <?php else: ?>


                        <form 
                            action="<?= base_url('/logout') ?>" 
                            method="post"
                        >

                            <?= csrf_field() ?>


                            <button 
                                class="dropdown-action" 
                                type="submit"
                            >

                                Exit Guest Mode

                            </button>


                        </form>



                    <?php endif; ?>



                </div>



            </div>



        </div>



    </header>
    


    <?php if (($activePage ?? '') === 'dashboard'): ?>


    <div class="hero-banner">


        <div class="hero-overlay">


            <h1>

                The Daily Fit

            </h1>



            <p>

                Modern clothing management made simple.

            </p>


        </div>


    </div>


    <?php endif; ?>





    <main class="main-content">





        <?php if (session('success')): ?>


            <div 
                class="alert alert-success" 
                role="status"
            >


                <span>

                    ✓

                </span>



                <?= esc(session('success')) ?>


            </div>



        <?php endif; ?>







        <?php if (session('error')): ?>


            <div 
                class="alert alert-error" 
                role="alert"
            >


                <span>

                    !

                </span>



                <?= esc(session('error')) ?>


            </div>



        <?php endif; ?>







<?= $this->renderSection('content') ?>

</main>

<footer class="site-footer">
    <div class="site-footer-inner">

        <div class="site-footer-main">

            <div class="footer-about-brand">
                <h3>THE DAILY FIT</h3>
                <p>
                    Modern clothing management made simple.<br>
                    A fashion POS system designed for efficient<br>
                    product and customer management.
                </p>
            </div>

            <div class="footer-column">
                <h4>ABOUT</h4>
                <a href="<?= base_url('/') ?>">Our Story</a>
                <a href="<?= base_url('/') ?>">Careers</a>
                <a href="<?= base_url('/') ?>">Sustainability</a>
            </div>

            <div class="footer-column">
                <h4>CUSTOMER SERVICE</h4>
                <a href="mailto:support@thedailyfit.com">Help Center</a>
                <a href="mailto:support@thedailyfit.com">Contact Us</a>
                <a href="<?= base_url('/') ?>">Privacy Policy</a>
            </div>

            <div class="footer-column">
                <h4>SYSTEM</h4>
                <a href="<?= base_url('/products') ?>">Products</a>
                <a href="<?= base_url('/products') ?>">Inventory</a>
                <a href="<?= base_url('/sales') ?>">Reports</a>
            </div>

        </div>

        <div class="site-footer-bottom">
            <span>
                &copy; <?= date('Y') ?> The Daily Fit. All Rights Reserved.
            </span>

            <div class="footer-social-links">
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">Facebook</a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">Instagram</a>
                <a href="https://x.com/" target="_blank" rel="noopener noreferrer">X</a>
            </div>
        </div>

    </div>
</footer>

</div>

    <script src="<?= base_url('js/app.js') ?>?v=2"></script>

    <script>

    document.addEventListener("DOMContentLoaded", function(){


        const button = document.getElementById("userMenuBtn");

        const dropdown = document.getElementById("userDropdown");



        if(button && dropdown){


            button.addEventListener("click", function(){


                dropdown.hidden = !dropdown.hidden;


            });



            document.addEventListener("click", function(event){


                if(
                    !button.contains(event.target) &&
                    !dropdown.contains(event.target)
                ){

                    dropdown.hidden = true;

                }


            });


        }



    });





    window.addEventListener("scroll", function(){


        const header = document.querySelector(".main-header");



        if(!header){

            return;

        }



        if(window.scrollY > 20){


            header.classList.add("scrolled");


        } else {


            header.classList.remove("scrolled");


        }


    });



    </script>





</body>

</html>