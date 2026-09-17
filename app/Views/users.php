<!DOCTYPE html>
<html>
<head>
    <title>POS System - User Accounts</title>
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
        <h2>User Accounts</h2>

        <p>
            Below is the list of system users and staff.
        </p>

        <table>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
                <th>Role</th>
            </tr>

            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td><?= esc($user['role']) ?></td>
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