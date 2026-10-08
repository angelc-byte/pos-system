<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Northstar POS account management">
    <title><?= esc($pageTitle ?? 'Dashboard') ?> | Northstar POS</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="app-body">
<?php
    $active = $activePage ?? '';
    $fullName = (string) session('full_name');
    $initials = implode('', array_map(static fn ($part) => strtoupper(substr($part, 0, 1)), array_slice(array_filter(explode(' ', $fullName)), 0, 2)));
    $sessionAvatar = basename((string) session('avatar'));
    $sessionAvatarUrl = $sessionAvatar && is_file(FCPATH . 'uploads/avatars/' . $sessionAvatar)
        ? base_url('uploads/avatars/' . rawurlencode($sessionAvatar))
        : null;
?>
<div class="app-shell">
    <aside class="sidebar" id="sidebar" aria-label="Primary navigation">
        <a class="brand" href="<?= base_url('/') ?>" aria-label="Northstar POS dashboard">
            <span class="brand-mark" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M4 7.5 12 3l8 4.5v9L12 21l-8-4.5v-9Z"/><path d="m8 10 4 2.2 4-2.2M12 12.2V17"/></svg>
            </span>
            <span><strong>Northstar</strong><small>Point of Sale</small></span>
        </a>

        <nav class="side-nav">
            <span class="nav-label">Workspace</span>
            <a class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>" href="<?= base_url('/') ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 13h6V4H4v9Zm0 7h6v-4H4v4Zm10 0h6v-9h-6v9Zm0-16v4h6V4h-6Z"/></svg>
                <span>Dashboard</span>
            </a>
            <a class="nav-link <?= $active === 'customers' ? 'active' : '' ?>" href="<?= base_url('/customers') ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <span>Customers</span>
            </a>
            <a class="nav-link <?= $active === 'users' ? 'active' : '' ?>" href="<?= base_url('/users') ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"/></svg>
                <span>Team members</span>
            </a>

            <span class="nav-label nav-label-secondary">System</span>
            <a class="nav-link <?= $active === 'profile' ? 'active' : '' ?>" href="<?= base_url('/profile') ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
                <span>My profile</span>
            </a>
            <a class="nav-link <?= $active === 'about' ? 'active' : '' ?>" href="<?= base_url('/about') ?>">
                <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></svg>
                <span>About</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <span class="status-dot" aria-hidden="true"></span>
            <div><strong>System online</strong><small>CodeIgniter 4</small></div>
        </div>
    </aside>
    <button class="sidebar-scrim" id="sidebarScrim" type="button" aria-label="Close navigation"></button>

    <div class="main-shell">
        <header class="topbar">
            <div class="topbar-left">
                <button class="icon-button menu-button" id="menuButton" type="button" aria-label="Open navigation" aria-expanded="false">
                    <svg viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                </button>
                <div>
                    <span class="topbar-kicker">Account management</span>
                    <strong class="topbar-title"><?= esc($pageTitle ?? 'Dashboard') ?></strong>
                </div>
            </div>
            <div class="topbar-right">
                <div class="topbar-date">
                    <span><?= date('l') ?></span>
                    <strong><?= date('M j, Y') ?></strong>
                </div>
                <div class="user-menu-wrap">
                    <button class="user-chip" id="userMenuButton" type="button" aria-expanded="false">
                        <span class="avatar"><?php if ($sessionAvatarUrl): ?><img src="<?= esc($sessionAvatarUrl, 'attr') ?>" alt=""><?php else: ?><?= esc($initials ?: 'U') ?><?php endif; ?></span>
                        <span class="user-copy"><strong><?= esc($fullName ?: 'Staff member') ?></strong><small>@<?= esc((string) session('username')) ?></small></span>
                        <svg class="chevron" viewBox="0 0 24 24" aria-hidden="true"><path d="m8 10 4 4 4-4"/></svg>
                    </button>
                    <div class="user-dropdown" id="userDropdown" hidden>
                        <div class="dropdown-heading"><strong><?= esc($fullName ?: 'Staff member') ?></strong><small><?= esc((string) session('email')) ?></small></div>
                        <a class="dropdown-action dropdown-profile" href="<?= base_url('/profile') ?>">
                            <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
                            Edit my profile
                        </a>
                        <form action="<?= base_url('/logout') ?>" method="post">
                            <?= csrf_field() ?>
                            <button class="dropdown-action" type="submit">
                                <svg viewBox="0 0 24 24"><path d="M10 17l5-5-5-5M15 12H3M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/></svg>
                                Sign out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="main-content">
            <?php if (session('success')): ?>
                <div class="alert alert-success" role="status"><span>✓</span><?= esc(session('success')) ?></div>
            <?php endif; ?>
            <?php if (session('error')): ?>
                <div class="alert alert-error" role="alert"><span>!</span><?= esc(session('error')) ?></div>
            <?php endif; ?>
            <?= $this->renderSection('content') ?>
        </main>
    </div>
</div>
<script src="<?= base_url('js/app.js') ?>"></script>
</body>
</html>
