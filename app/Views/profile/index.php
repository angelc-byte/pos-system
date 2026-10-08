<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<?php
$parts = array_filter(explode(' ', $user['full_name']));
$initials = strtoupper(substr($parts[0] ?? 'U', 0, 1) . substr(end($parts) ?: '', 0, 1));
$avatarFile = basename((string) ($user['avatar'] ?? ''));
$avatarUrl = $avatarFile && is_file(FCPATH . 'uploads/avatars/' . $avatarFile)
    ? base_url('uploads/avatars/' . rawurlencode($avatarFile))
    : null;
?>
<section class="page-heading">
    <div><p class="eyebrow">Personal settings</p><h1>My profile</h1><p>Manage the identity and picture shown across your POS workspace.</p></div>
</section>

<div class="profile-layout">
    <aside class="panel profile-summary">
        <div class="profile-hero-avatar avatar-preview-purple"><?php if ($avatarUrl): ?><img src="<?= esc($avatarUrl, 'attr') ?>" alt="<?= esc($user['full_name'], 'attr') ?>"><?php else: ?><span><?= esc($initials) ?></span><?php endif; ?></div>
        <h2><?= esc($user['full_name']) ?></h2>
        <p>@<?= esc($user['username']) ?></p>
        <span class="profile-role">Authorized staff</span>
        <dl>
            <div><dt>Email</dt><dd><?= esc($user['email'] ?? 'Not provided') ?></dd></div>
            <div><dt>Member since</dt><dd><?= ! empty($user['created_at']) ? date('M j, Y', strtotime($user['created_at'])) : 'Not available' ?></dd></div>
        </dl>
    </aside>

    <section class="panel form-panel profile-form-panel">
        <div class="panel-header form-panel-header"><div><p class="eyebrow">Profile details</p><h2>Update your information</h2></div><span class="required-note"><i>*</i> Required fields</span></div>
        <?php if (session('errors')): ?>
            <div class="form-errors" role="alert"><strong>Please review the highlighted information.</strong><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div>
        <?php endif; ?>
        <form class="record-form" action="<?= base_url('/profile') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="avatar-upload-row">
                <div class="avatar-preview avatar-preview-purple" data-avatar-preview><?php if ($avatarUrl): ?><img src="<?= esc($avatarUrl, 'attr') ?>" alt="Current profile picture"><?php else: ?><span><?= esc($initials) ?></span><?php endif; ?></div>
                <div class="avatar-upload-copy">
                    <strong>Profile picture <em>Optional</em></strong>
                    <p>JPG, PNG, or WebP. Maximum size 2 MB.</p>
                    <div class="avatar-upload-actions">
                        <label class="avatar-pick-button" for="avatar">Choose photo</label>
                        <input class="avatar-file-input" id="avatar" name="avatar" type="file" accept="image/jpeg,image/png,image/webp" data-avatar-input>
                        <?php if ($avatarUrl): ?><label class="remove-avatar"><input type="checkbox" name="remove_avatar" value="1" data-remove-avatar> Remove current photo</label><?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-grid">
                <div class="form-group form-span-2"><label for="username">Username</label><input id="username" type="text" value="<?= esc($user['username'], 'attr') ?>" disabled><small>Usernames are managed from the team directory.</small></div>
                <div class="form-group"><label for="full_name">Full name <span>*</span></label><input id="full_name" name="full_name" type="text" value="<?= old('full_name', $user['full_name']) ?>" required></div>
                <div class="form-group"><label for="email">Email address <span>*</span></label><input id="email" name="email" type="email" value="<?= old('email', $user['email'] ?? '') ?>" required></div>
                <div class="form-group form-span-2"><label for="password">New password</label><div class="password-field"><input id="password" name="password" type="password" autocomplete="new-password" placeholder="Leave blank to keep the current password"><button class="password-toggle" type="button" data-password-toggle aria-label="Show password"><svg viewBox="0 0 24 24"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"/><circle cx="12" cy="12" r="2.5"/></svg></button></div><small>Use at least 8 characters when changing it.</small></div>
            </div>
            <div class="form-actions"><button class="button button-primary" type="submit">Save my profile</button></div>
        </form>
    </section>
</div>
<?= $this->endSection() ?>
