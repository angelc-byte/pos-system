<!DOCTYPE html>
<html>
<head>
    <title>POS System - About</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Point-of-Sale System</h1>
    </div>

    <nav class="navbar">
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('/about') ?>">About</a>
        <a href="<?= base_url('/customers') ?>">Customer Accounts</a>
        <a href="<?= base_url('/users') ?>">User Accounts</a>
    </nav>

    <div class="content">
        <h2>About the POS System</h2>

        <p>
            This is a basic Point-of-Sale system developed using CodeIgniter 4.
        </p>

        <p>
            The system demonstrates routing, controllers, views,
            static PHP arrays, and basic MVC architecture.
        </p>
    </div>

    <div class="footer">
        <p>Basic POS System | CodeIgniter 4</p>
    </div>

</div>

</body>
</html>