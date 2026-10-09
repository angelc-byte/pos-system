<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?php
    $editing = ! empty($customer);

    $avatarFile = basename((string) ($customer['avatar'] ?? ''));

    $avatarUrl = $avatarFile &&
        is_file(FCPATH . 'uploads/customers/' . $avatarFile)
        ? base_url('uploads/customers/' . rawurlencode($avatarFile))
        : null;

    $customerName = old('full_name', $customer['full_name'] ?? '');
    $customerInitial = strtoupper(
        substr(trim($customerName) !== '' ? trim($customerName) : 'C', 0, 1)
    );
?>

<style>
    /* ========================================
       CUSTOMER FORM PAGE
    ======================================== */

    .customer-form-page {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        padding: 54px 30px 48px;
        color: #292d35;
    }

    .customer-form-page *,
    .customer-form-page *::before,
    .customer-form-page *::after {
        box-sizing: border-box;
    }

    /* Page heading */

    .customer-form-page .page-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }

    .customer-form-page .eyebrow {
        margin: 0 0 7px;
        color: #98765e;
        font-size: 10px;
        font-weight: 750;
        letter-spacing: 1.6px;
        text-transform: uppercase;
    }

    .customer-form-page .page-heading h1 {
        margin: 0;
        color: #282c34;
        font-size: clamp(26px, 3vw, 33px);
        font-weight: 750;
        line-height: 1.2;
        letter-spacing: -0.8px;
    }

    .customer-form-page .page-heading > div > p:last-child {
        margin: 8px 0 0;
        color: #818590;
        font-size: 13px;
        line-height: 1.6;
    }

    /* Buttons */

    .customer-form-page .button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 39px;
        padding: 0 15px;
        border: 1px solid transparent;
        border-radius: 7px;
        font-family: inherit;
        font-size: 12px;
        font-weight: 650;
        line-height: 1.2;
        text-decoration: none;
        white-space: nowrap;
        cursor: pointer;
        transition: background .2s ease, border-color .2s ease,
                    color .2s ease, transform .2s ease,
                    box-shadow .2s ease;
    }

    .customer-form-page .button-primary {
        border-color: #452718;
        background: #452718;
        color: #fff;
        box-shadow: 0 3px 8px rgba(69, 39, 24, .10);
    }

    .customer-form-page .button-primary:hover {
        border-color: #5b3825;
        background: #5b3825;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 5px 12px rgba(69, 39, 24, .15);
    }

    .customer-form-page .button-secondary,
    .customer-form-page .button-ghost {
        border-color: #e6e2dc;
        background: #fff;
        color: #615d57;
    }

    .customer-form-page .button-secondary:hover,
    .customer-form-page .button-ghost:hover {
        border-color: #d6c4b4;
        background: #faf7f3;
        color: #452718;
    }

    /* Main layout */

    .customer-form-page .form-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 270px;
        align-items: start;
        gap: 22px;
    }

    .customer-form-page .panel {
        min-width: 0;
        border: 1px solid #ebe7e1;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 5px 20px rgba(34, 31, 28, .04);
    }

    .customer-form-page .form-panel {
        overflow: hidden;
    }

    .customer-form-page .form-panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 21px 24px;
        border-bottom: 1px solid #efede9;
    }

    .customer-form-page .form-panel-header .eyebrow {
        margin-bottom: 5px;
    }

    .customer-form-page .form-panel-header h2 {
        margin: 0;
        color: #2d3038;
        font-size: 17px;
        font-weight: 750;
    }

    .customer-form-page .required-note {
        color: #858078;
        font-size: 11px;
        white-space: nowrap;
    }

    .customer-form-page .required-note i {
        color: #b84d42;
        font-style: normal;
        font-weight: 750;
    }

    /* Validation errors */

    .customer-form-page .form-errors {
        margin: 20px 24px 0;
        padding: 13px 15px;
        border: 1px solid #f0d0cc;
        border-radius: 7px;
        background: #fff5f4;
        color: #963d35;
        font-size: 12px;
        line-height: 1.6;
    }

    .customer-form-page .form-errors strong {
        display: block;
        margin-bottom: 5px;
    }

    .customer-form-page .form-errors ul {
        margin: 0;
        padding-left: 18px;
    }

    /* Form body */

    .customer-form-page .record-form {
        padding: 24px;
    }

    /* Avatar upload */

    .customer-form-page .avatar-upload-row {
        display: flex;
        align-items: center;
        gap: 19px;
        margin-bottom: 26px;
        padding: 17px;
        border: 1px solid #eee8e1;
        border-radius: 9px;
        background: #fcfaf7;
    }

    .customer-form-page .avatar-preview {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 86px;
        height: 86px;
        min-width: 86px;
        overflow: hidden;
        border: 1px solid #e7dbce;
        border-radius: 10px;
        background: #f1e8df;
        color: #65472f;
        font-size: 25px;
        font-weight: 750;
    }

    .customer-form-page .avatar-preview img {
        display: block;
        width: 100%;
        height: 100%;
        border-radius: inherit;
        object-fit: cover;
    }

    .customer-form-page .avatar-upload-copy {
        min-width: 0;
    }

    .customer-form-page .avatar-upload-copy > strong {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        color: #30333a;
        font-size: 13px;
        font-weight: 700;
    }

    .customer-form-page .avatar-upload-copy > strong em {
        padding: 4px 7px;
        border-radius: 5px;
        background: #f0ebe4;
        color: #82766b;
        font-size: 10px;
        font-style: normal;
        font-weight: 600;
    }

    .customer-form-page .avatar-upload-copy p {
        margin: 6px 0 12px;
        color: #85858b;
        font-size: 11px;
        line-height: 1.5;
    }

    .customer-form-page .avatar-upload-actions {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 13px;
    }

    .customer-form-page .avatar-pick-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 31px;
        padding: 0 11px;
        border: 1px solid #e1d8ce;
        border-radius: 6px;
        background: #fff;
        color: #594332;
        font-size: 11px;
        font-weight: 650;
        cursor: pointer;
        transition: background .2s ease, border-color .2s ease;
    }

    .customer-form-page .avatar-pick-button:hover {
        border-color: #c9b29d;
        background: #f8f2eb;
    }

    .customer-form-page .avatar-file-input {
        position: absolute;
        width: 1px;
        height: 1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        clip-path: inset(50%);
    }

    .customer-form-page .avatar-file-input:focus-visible + .avatar-upload-copy {
        outline: 2px solid #98765e;
    }

    .customer-form-page .remove-avatar {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #8a615b;
        font-size: 11px;
        cursor: pointer;
    }

    .customer-form-page .remove-avatar input {
        width: 13px;
        height: 13px;
        margin: 0;
        accent-color: #795548;
    }

    /* Input grid */

    .customer-form-page .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px 17px;
    }

    .customer-form-page .form-group {
        display: flex;
        flex-direction: column;
        min-width: 0;
        gap: 8px;
    }

    .customer-form-page .form-span-2 {
        grid-column: 1 / -1;
    }

    .customer-form-page .form-group > label {
        color: #41434b;
        font-size: 12px;
        font-weight: 700;
    }

    .customer-form-page .form-group > label span {
        color: #b84d42;
    }

    .customer-form-page .form-group input {
        display: block;
        width: 100%;
        min-width: 0;
        height: 42px;
        padding: 0 12px;
        border: 1px solid #e3e0da;
        border-radius: 7px;
        outline: none;
        background: #fff;
        color: #30333a;
        font-family: inherit;
        font-size: 12px;
        box-shadow: none;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .customer-form-page .form-group input::placeholder {
        color: #aaa7a1;
    }

    .customer-form-page .form-group input:focus {
        border-color: #a98b75;
        box-shadow: 0 0 0 3px rgba(169, 139, 117, .12);
    }

    .customer-form-page .form-group small {
        color: #898991;
        font-size: 11px;
        line-height: 1.5;
    }

    /* Footer actions */

    .customer-form-page .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 27px;
        padding-top: 20px;
        border-top: 1px solid #efede9;
    }

    .customer-form-page .form-actions .button {
        min-width: 105px;
    }

    /* Information panel */

    .customer-form-page .form-aside {
        padding: 22px 20px;
    }

    .customer-form-page .aside-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        margin-bottom: 16px;
        border-radius: 9px;
        background: #f4eee7;
        color: #79563d;
    }

    .customer-form-page .aside-icon svg {
        display: block;
        width: 19px;
        height: 19px;
        fill: none;
        stroke: currentColor;
        stroke-width: 1.7;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .customer-form-page .form-aside h2 {
        margin: 0 0 9px;
        color: #30333a;
        font-size: 15px;
        font-weight: 750;
        line-height: 1.45;
    }

    .customer-form-page .form-aside p {
        margin: 0;
        color: #81838b;
        font-size: 12px;
        line-height: 1.7;
    }

    .customer-form-page .form-aside ul {
        display: grid;
        gap: 10px;
        margin: 18px 0 0;
        padding: 16px 0 0 17px;
        border-top: 1px solid #efede9;
        color: #686a72;
        font-size: 11px;
        line-height: 1.5;
    }

    .customer-form-page .form-aside li::marker {
        color: #a98b75;
    }

    /* Responsive */

    @media (max-width: 850px) {
        .customer-form-page .form-layout {
            grid-template-columns: minmax(0, 1fr);
        }

        .customer-form-page .form-aside {
            display: none;
        }
    }

    @media (max-width: 600px) {
        .customer-form-page {
            padding: 24px 16px 36px;
        }

        .customer-form-page .page-heading {
            align-items: flex-start;
            flex-direction: column;
            gap: 15px;
        }

        .customer-form-page .page-heading h1 {
            font-size: 27px;
        }

        .customer-form-page .form-panel-header {
            align-items: flex-start;
            flex-direction: column;
            padding: 18px;
        }

        .customer-form-page .record-form {
            padding: 17px;
        }

        .customer-form-page .avatar-upload-row {
            align-items: flex-start;
            gap: 13px;
            padding: 12px;
        }

        .customer-form-page .avatar-preview {
            width: 68px;
            height: 68px;
            min-width: 68px;
        }

        .customer-form-page .form-grid {
            grid-template-columns: minmax(0, 1fr);
            gap: 18px;
        }

        .customer-form-page .form-span-2 {
            grid-column: auto;
        }

        .customer-form-page .form-actions {
            justify-content: stretch;
        }

        .customer-form-page .form-actions .button {
            flex: 1;
            min-width: 0;
        }
    }
</style>

<div class="customer-form-page">

    <section class="page-heading">
        <div>
            <p class="eyebrow">Customer accounts</p>

            <h1><?= $editing ? 'Edit customer' : 'Add a customer' ?></h1>

            <p>
                <?= $editing
                    ? 'Keep this customer’s contact details current.'
                    : 'Create a new customer profile for your store.' ?>
            </p>
        </div>

        <a class="button button-secondary" href="<?= base_url('/customers') ?>">
            <span aria-hidden="true">←</span>
            Back to customers
        </a>
    </section>

    <div class="form-layout">

        <section class="panel form-panel">

            <div class="form-panel-header">
                <div>
                    <p class="eyebrow">Profile details</p>
                    <h2>Customer information</h2>
                </div>

                <span class="required-note">
                    <i>*</i> Required fields
                </span>
            </div>

            <?php if (session('errors')): ?>
                <div class="form-errors" role="alert">
                    <strong>Please review the highlighted information.</strong>

                    <ul>
                        <?php foreach (session('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form
                class="record-form"
                action="<?= $editing
                    ? base_url('/customers/' . $customer['id'])
                    : base_url('/customers') ?>"
                method="post"
                enctype="multipart/form-data"
            >
                <?= csrf_field() ?>

                <div class="avatar-upload-row">

                    <div
                        class="avatar-preview avatar-preview-blue"
                        data-avatar-preview
                    >
                        <?php if ($avatarUrl): ?>
                            <img
                                src="<?= esc($avatarUrl, 'attr') ?>"
                                alt="Current customer photo"
                            >
                        <?php else: ?>
                            <span><?= esc($customerInitial) ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="avatar-upload-copy">
                        <strong>
                            Customer photo
                            <em>Optional</em>
                        </strong>

                        <p>JPG, PNG, or WebP. Maximum size 2 MB.</p>

                        <div class="avatar-upload-actions">

                            <label class="avatar-pick-button" for="avatar">
                                Choose photo
                            </label>

                            <input
                                class="avatar-file-input"
                                id="avatar"
                                name="avatar"
                                type="file"
                                accept="image/jpeg,image/png,image/webp"
                                data-avatar-input
                            >

                            <?php if ($editing && $avatarUrl): ?>
                                <label class="remove-avatar">
                                    <input
                                        type="checkbox"
                                        name="remove_avatar"
                                        value="1"
                                        data-remove-avatar
                                    >
                                    Remove current photo
                                </label>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <div class="form-grid">

                    <div class="form-group form-span-2">
                        <label for="full_name">
                            Full name <span>*</span>
                        </label>

                        <input
                            id="full_name"
                            name="full_name"
                            type="text"
                            value="<?= esc($customerName, 'attr') ?>"
                            placeholder="e.g. Jordan Reyes"
                            maxlength="120"
                            autocomplete="name"
                            required
                        >

                        <small>Use the customer’s complete name.</small>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            Email address <span>*</span>
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="<?= esc(old('email', $customer['email'] ?? ''), 'attr') ?>"
                            placeholder="jordan@example.com"
                            maxlength="150"
                            autocomplete="email"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="phone">
                            Phone number <span>*</span>
                        </label>

                        <input
                            id="phone"
                            name="phone"
                            type="tel"
                            value="<?= esc(old('phone', $customer['phone'] ?? ''), 'attr') ?>"
                            placeholder="09XX XXX XXXX"
                            maxlength="30"
                            autocomplete="tel"
                            required
                        >
                    </div>

                </div>

                <div class="form-actions">
                    <a class="button button-ghost" href="<?= base_url('/customers') ?>">
                        Cancel
                    </a>

                    <button class="button button-primary" type="submit">
                        <?= $editing ? 'Save changes' : 'Create customer' ?>
                    </button>
                </div>

            </form>
        </section>

        <aside class="panel form-aside">

            <span class="aside-icon">
                <svg viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 11v5M12 8h.01"/>
                </svg>
            </span>

            <h2>Good records build better service</h2>

            <p>
                Accurate contact information makes account lookup and
                customer support faster.
            </p>

            <ul>
                <li>Use a valid, unique email</li>
                <li>Include the correct phone prefix</li>
                <li>Review details before saving</li>
            </ul>

        </aside>

    </div>

</div>

<?= $this->endSection() ?>
