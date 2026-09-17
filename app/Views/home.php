<!DOCTYPE html>
<html>
<head>
    <title>POS System - Home</title>
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
        <h2>Welcome!</h2>

        <p>
            Welcome to our Point-of-Sale System.
            This application demonstrates the basic use of CodeIgniter 4
            and the MVC architecture.
        </p>

        <p>
            Use the navigation menu above to view the different sections
            of the system.
        </p>
    </div>

    <div class="footer">
        <p>Basic POS System | CodeIgniter 4</p>
    </div>

</div>

</body>
</html>