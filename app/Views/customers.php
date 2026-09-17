<!DOCTYPE html>
<html>
<head>
    <title>POS System - Customer Accounts</title>
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
        <h2>Customer Accounts</h2>

        <p>
            Below is the list of customer accounts.
        </p>

        <table>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>

            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>

    <div class="footer">
        <p>Basic POS System | CodeIgniter 4</p>
    </div>

</div>

</body>
</html>