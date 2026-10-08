<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<?php $editing = ! empty($customer); $avatarFile = basename((string) ($customer['avatar'] ?? '')); $avatarUrl = $avatarFile && is_file(FCPATH . 'uploads/customers/' . $avatarFile) ? base_url('uploads/customers/' . rawurlencode($avatarFile)) : null; ?>
<section class="page-heading form-page-heading">
    <div><p class="eyebrow">Customer accounts</p><h1><?= $editing ? 'Edit customer' : 'Add a customer' ?></h1><p><?= $editing ? 'Keep this customer’s contact details current.' : 'Create a new customer profile for your store.' ?></p></div>
    <a class="button button-secondary" href="<?= base_url('/customers') ?>">← Back to customers</a>
</section>

<div class="form-layout">
    <section class="panel form-panel">
        <div class="panel-header form-panel-header"><div><p class="eyebrow">Profile details</p><h2>Customer information</h2></div><span class="required-note"><i>*</i> Required fields</span></div>
        <?php if (session('errors')): ?>
            <div class="form-errors" role="alert"><strong>Please review the highlighted information.</strong><ul><?php foreach (session('errors') as $error): ?><li><?= esc($error) ?></li><?php endforeach; ?></ul></div>
        <?php endif; ?>
        <form class="record-form" action="<?= $editing ? base_url('/customers/' . $customer['id']) : base_url('/customers') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="avatar-upload-row">
                <div class="avatar-preview avatar-preview-blue" data-avatar-preview><?php if ($avatarUrl): ?><img src="<?= esc($avatarUrl, 'attr') ?>" alt="Current customer photo"><?php else: ?><span><?= $editing ? esc(strtoupper(substr($customer['full_name'] ?? 'C', 0, 1))) : 'C' ?></span><?php endif; ?></div>
                <div class="avatar-upload-copy">
                    <strong>Customer photo <em>Optional</em></strong>
                    <p>JPG, PNG, or WebP. Maximum size 2 MB.</p>
                    <div class="avatar-upload-actions">
                        <label class="avatar-pick-button" for="avatar">Choose photo</label>
                        <input class="avatar-file-input" id="avatar" name="avatar" type="file" accept="image/jpeg,image/png,image/webp" data-avatar-input>
                        <?php if ($editing && $avatarUrl): ?><label class="remove-avatar"><input type="checkbox" name="remove_avatar" value="1" data-remove-avatar> Remove current photo</label><?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="form-grid">
                <div class="form-group form-span-2"><label for="full_name">Full name <span>*</span></label><input id="full_name" name="full_name" type="text" value="<?= old('full_name', $customer['full_name'] ?? '') ?>" placeholder="e.g. Jordan Reyes" required><small>Use the customer’s complete name.</small></div>
                <div class="form-group"><label for="email">Email address <span>*</span></label><input id="email" name="email" type="email" value="<?= old('email', $customer['email'] ?? '') ?>" placeholder="jordan@example.com" required></div>
                <div class="form-group"><label for="phone">Phone number <span>*</span></label><input id="phone" name="phone" type="tel" value="<?= old('phone', $customer['phone'] ?? '') ?>" placeholder="09XX XXX XXXX" required></div>
            </div>
            <div class="form-actions"><a class="button button-ghost" href="<?= base_url('/customers') ?>">Cancel</a><button class="button button-primary" type="submit"><?= $editing ? 'Save changes' : 'Create customer' ?></button></div>
        </form>
    </section>
    <aside class="panel form-aside"><span class="aside-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></svg></span><h2>Good records build better service</h2><p>Accurate contact information makes account lookup and customer support faster.</p><ul><li>Use a valid, unique email</li><li>Include the correct phone prefix</li><li>Review details before saving</li></ul></aside>
</div>
<?= $this->endSection() ?>
