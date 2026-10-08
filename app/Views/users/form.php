<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<?php $editing = ! empty($user); $avatarFile = basename((string) ($user['avatar'] ?? '')); $avatarUrl = $avatarFile && is_file(FCPATH . 'uploads/avatars/' . $avatarFile) ? base_url('uploads/avatars/' . rawurlencode($avatarFile)) : null; ?>
<section class="page-heading form-page-heading">
    <div><p class="eyebrow">Team access</p><h1><?= $editing ? 'Edit team member' : 'Add a team member' ?></h1><p><?= $editing ? 'Update this staff profile or reset its password.' : 'Create secure access for a new staff member.' ?></p></div>
    <a class="button button-secondary" href="<?= base_url('/users') ?>">← Back to team</a>
</section>

<div class="form-layout">
    <section class="panel form-panel">
        <div class="panel-header form-panel-header"><div><p class="eyebrow">Account details</p><h2>Staff information</h2></div><span class="required-note"><i>*</i> Required fields</span></div>
        <?php if (session('errors')): ?>
            <div class="form-errors" role="alert"><strong>Please review the highlighted information.</strong><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div>
        <?php endif; ?>
        <form class="record-form" action="<?= $editing ? base_url('/users/' . $user['id']) : base_url('/users') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="avatar-upload-row">
                <div class="avatar-preview avatar-preview-purple" data-avatar-preview><?php if ($avatarUrl): ?><img src="<?= esc($avatarUrl, 'attr') ?>" alt="Current team member photo"><?php else: ?><span><?= $editing ? esc(strtoupper(substr($user['full_name'] ?? 'U', 0, 1))) : 'U' ?></span><?php endif; ?></div>
                <div class="avatar-upload-copy">
                    <strong>Profile picture <em>Optional</em></strong>
                    <p>JPG, PNG, or WebP. Maximum size 2 MB.</p>
                    <div class="avatar-upload-actions">
                        <label class="avatar-pick-button" for="avatar">Choose photo</label>
                        <input class="avatar-file-input" id="avatar" name="avatar" type="file" accept="image/jpeg,image/png,image/webp" data-avatar-input>
                        <?php if ($editing && $avatarUrl): ?><label class="remove-avatar"><input type="checkbox" name="remove_avatar" value="1" data-remove-avatar> Remove current photo</label><?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-grid">
                <div class="form-group form-span-2"><label for="full_name">Full name <span>*</span></label><input id="full_name" name="full_name" type="text" value="<?= old('full_name', $user['full_name'] ?? '') ?>" placeholder="e.g. Jordan Reyes" required></div>
                <div class="form-group"><label for="username">Username <span>*</span></label><div class="prefixed-input"><span>@</span><input id="username" name="username" type="text" value="<?= old('username', $user['username'] ?? '') ?>" placeholder="jordan" autocomplete="username" required></div></div>
                <div class="form-group"><label for="email">Email address <span>*</span></label><input id="email" name="email" type="email" value="<?= old('email', $user['email'] ?? '') ?>" placeholder="jordan@example.com" required></div>
                <div class="form-group form-span-2"><label for="password"><?= $editing ? 'New password' : 'Password' ?> <?= $editing ? '' : '<span>*</span>' ?></label><div class="password-field"><input id="password" name="password" type="password" autocomplete="new-password" placeholder="<?= $editing ? 'Leave blank to keep the current password' : 'At least 8 characters' ?>" <?= $editing ? '' : 'required' ?>><button class="password-toggle" type="button" data-password-toggle aria-label="Show password"><svg viewBox="0 0 24 24"><path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12Z"/><circle cx="12" cy="12" r="2.5"/></svg></button></div><small><?= $editing ? 'Only enter a value when changing this password.' : 'Use 8 or more characters.' ?></small></div>
            </div>
            <div class="form-actions"><a class="button button-ghost" href="<?= base_url('/users') ?>">Cancel</a><button class="button button-primary" type="submit"><?= $editing ? 'Save changes' : 'Create account' ?></button></div>
        </form>
    </section>
    <aside class="panel form-aside"><span class="aside-icon aside-icon-purple"><svg viewBox="0 0 24 24"><rect x="4" y="10" width="16" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg></span><h2>Keep staff access secure</h2><p>Every password is hashed before it is stored. The original password is never saved in the database.</p><ul><li>Give each person a unique account</li><li>Use a password they do not reuse</li><li>Remove accounts no longer needed</li></ul></aside>
</div>
<?= $this->endSection() ?>
