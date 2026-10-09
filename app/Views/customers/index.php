<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<style>
    /* ========================================
       CUSTOMER DIRECTORY
    ======================================== */

    .customers-page {
        width: 100%;
        max-width: 1440px;
        margin: 0 auto;
        padding: 52px 32px 48px;
        color: #252b35;
    }

    .customers-page *,
    .customers-page *::before,
    .customers-page *::after {
        box-sizing: border-box;
    }

    /* Page heading */

    .customers-page .page-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        margin-bottom: 28px;
    }

    .customers-page .page-heading .eyebrow {
        margin: 0 0 7px;
        color: #9a765d;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.8px;
        text-transform: uppercase;
    }

    .customers-page .page-heading h1 {
        margin: 0;
        color: #252b35;
        font-size: clamp(25px, 3vw, 34px);
        font-weight: 750;
        line-height: 1.2;
        letter-spacing: -1px;
    }

    .customers-page .page-heading p:not(.eyebrow) {
        margin: 9px 0 0;
        color: #858995;
        font-size: 14px;
        line-height: 1.6;
    }

    .customers-page .button-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        min-height: 44px;
        padding: 0 19px;
        border: 1px solid #452718;
        border-radius: 8px;
        background: #452718;
        color: #fff;
        font-size: 13px;
        font-weight: 650;
        text-decoration: none;
        white-space: nowrap;
        box-shadow: 0 3px 8px rgba(69, 39, 24, 0.10);
        transition: background .2s ease, transform .2s ease,
                    box-shadow .2s ease;
    }

    .customers-page .button-primary:hover {
        background: #5b3825;
        color: #fff;
        transform: translateY(-1px);
        box-shadow: 0 5px 12px rgba(69, 39, 24, 0.15);
    }

    .customers-page .button-plus {
        font-size: 19px;
        font-weight: 400;
        line-height: 1;
    }

    /* Directory panel */

    .customers-page .directory-panel {
        overflow: hidden;
        border: 1px solid #ebe8e3;
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 6px 24px rgba(34, 31, 28, 0.045);
    }

    .customers-page .directory-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 21px 24px;
        border-bottom: 1px solid #efede9;
    }

    /* Search */

.customers-page .search-control {
    display: flex;
    align-items: center;
    gap: 8px;
    width: 320px;
    min-height: 36px;
    padding: 0 10px;
    border: 1px solid #e6e3de;
    border-radius: 7px;
    background: #fff;
    transition: border-color .2s ease, box-shadow .2s ease;
}

    .customers-page .search-control:focus-within {
        border-color: #a98b75;
        box-shadow: 0 0 0 3px rgba(169, 139, 117, 0.12);
    }

    .customers-page .search-control svg {
        display: block;
        width: 18px;
        height: 18px;
        min-width: 18px;
        fill: none;
        stroke: #92918d;
        stroke-width: 1.8;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .customers-page .search-control .sr-only {
    position: absolute !important;
    width: 1px !important;
    height: 1px !important;
    padding: 0 !important;
    margin: -1px !important;
    overflow: hidden !important;
    clip: rect(0, 0, 0, 0) !important;
    white-space: nowrap !important;
    border: 0 !important;
}

    .customers-page .search-control input {
        width: 100%;
        min-width: 0;
        height: 40px;
        padding: 0;
        border: 0;
        outline: 0;
        background: transparent;
        color: #30343c;
        font-family: inherit;
        font-size: 10px;
        box-shadow: none;
    }

    .customers-page .search-control input::placeholder {
        color: #a2a19c;
    }

    .customers-page .search-control input:focus {
        outline: none;
        border: 0;
        box-shadow: none;
    }

    .customers-page .record-count {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        flex-shrink: 0;
        padding: 8px 12px;
        border: 1px solid #eee8e1;
        border-radius: 7px;
        background: #faf8f5;
        color: #81796f;
        font-size: 12px;
    }

    .customers-page .record-count strong {
        color: #452718;
        font-size: 13px;
        font-weight: 750;
    }

    /* Table */

    .customers-page .table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .customers-page .data-table {
        width: 100%;
        min-width: 760px;
        border-collapse: separate;
        border-spacing: 0;
        text-align: left;
    }

    .customers-page .data-table thead th {
        padding: 15px 22px;
        border-bottom: 1px solid #eeece8;
        background: #fcfbf9;
        color: #858078;
        font-size: 10px;
        font-weight: 750;
        letter-spacing: 1.05px;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .customers-page .data-table thead th:first-child,
    .customers-page .data-table tbody td:first-child {
        padding-left: 25px;
    }

    .customers-page .data-table tbody td {
        padding: 17px 22px;
        border-bottom: 1px solid #f0eeea;
        background: #fff;
        color: #555964;
        font-size: 12px;
        vertical-align: middle;
        transition: background .15s ease;
    }

    .customers-page .data-table tbody tr:last-child td {
        border-bottom: 0;
    }

    .customers-page .data-table tbody tr:hover td {
        background: #fdfbf8;
    }

    .customers-page .data-table tbody tr[hidden] {
        display: none;
    }

    /* Customer identity */

    .customers-page .identity-cell {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 205px;
    }

    .customers-page .record-avatar {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 43px;
        height: 43px;
        min-width: 43px;
        overflow: hidden;
        border: 1px solid #eee5db;
        border-radius: 50%;
        background: #f1e8df;
        color: #65472f;
        font-size: 12px;
        font-weight: 750;
    }

    .customers-page .record-avatar img {
        display: block;
        width: 100%;
        height: 100%;
        border-radius: inherit;
        object-fit: cover;
    }

    .customers-page .identity-cell > div {
        display: flex;
        flex-direction: column;
        gap: 5px;
        min-width: 0;
    }

    .customers-page .identity-cell strong {
        color: #30333b;
        font-size: 13px;
        font-weight: 700;
        line-height: 1.35;
        overflow-wrap: anywhere;
    }

    .customers-page .identity-cell small {
        color: #a09a92;
        font-size: 11px;
        line-height: 1.3;
    }

    .customers-page .cell-link {
        color: #686c76;
        text-decoration: none;
        overflow-wrap: anywhere;
        transition: color .2s ease;
    }

    .customers-page .cell-link:hover {
        color: #87583a;
        text-decoration: underline;
    }

    .customers-page .date-cell {
        color: #858078;
        white-space: nowrap;
    }

    .customers-page .actions-heading {
        text-align: center;
    }

    /* Edit and delete buttons */

    .customers-page .row-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .customers-page .row-actions form {
        display: inline-flex;
        margin: 0;
    }

    .customers-page .action-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        padding: 0;
        border: 1px solid #e8e4de;
        border-radius: 7px;
        background: #fff;
        color: #6f6257;
        cursor: pointer;
        text-decoration: none;
        transition: color .2s ease, background .2s ease,
                    border-color .2s ease, transform .2s ease;
    }

    .customers-page .action-button:hover {
        transform: translateY(-1px);
        border-color: #d7c5b5;
        background: #f7f1eb;
        color: #452718;
    }

    .customers-page .action-button svg {
        display: block;
        width: 16px;
        height: 16px;
        fill: none;
        stroke: currentColor;
        stroke-width: 1.7;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .customers-page .action-button.action-danger {
        color: #a45c55;
    }

    .customers-page .action-button.action-danger:hover {
        border-color: #ebceca;
        background: #fff2f0;
        color: #a3342b;
    }

    /* Empty/search state: retain existing message */

    .customers-page .empty-table {
        padding: 28px 20px;
        color: #737681;
        text-align: center;
    }

    .customers-page .empty-table > span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 35px;
        height: 35px;
        margin-bottom: 9px;
        border-radius: 50%;
        background: #f5f0e9;
        color: #85674f;
        font-size: 21px;
    }

    .customers-page .empty-table strong {
        display: block;
        color: #343740;
        font-size: 13px;
    }

    .customers-page .empty-table p {
        margin: 6px 0 0;
        color: #8b8c94;
        font-size: 12px;
    }

    .customers-page .empty-table.is-hidden {
        display: none;
    }

    /* Responsive layout */

    @media (max-width: 700px) {
        .customers-page {
            padding: 22px 16px 35px;
        }

        .customers-page .page-heading {
            align-items: flex-start;
            flex-direction: column;
            gap: 17px;
            margin-bottom: 21px;
        }

        .customers-page .page-heading h1 {
            font-size: 27px;
        }

        .customers-page .directory-toolbar {
            align-items: stretch;
            flex-direction: column;
            gap: 12px;
            padding: 17px;
        }

        .customers-page .search-control {
            width: 100%;
        }

        .customers-page .record-count {
            align-self: flex-start;
        }

        .customers-page .data-table thead th {
            padding: 13px 16px;
        }

        .customers-page .data-table tbody td {
            padding: 14px 16px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .customers-page *,
        .customers-page *::before,
        .customers-page *::after {
            scroll-behavior: auto !important;
            transition-duration: .01ms !important;
            animation-duration: .01ms !important;
        }
    }
</style>

<div class="customers-page">

    <section class="page-heading">
        <div>
            <p class="eyebrow">Customer directory</p>
            <h1>Customer accounts</h1>
            <p>View and maintain the people your store serves.</p>
        </div>

        <a class="button button-primary" href="<?= base_url('/customers/new') ?>">
            <span class="button-plus" aria-hidden="true">+</span>
            Add customer
        </a>
    </section>

    <section class="panel directory-panel">
        <div class="directory-toolbar">
            <div class="search-control">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="m20 20-4-4"></path>
                </svg>

                <label class="sr-only" for="customerSearch">
                    Search customers
                </label>

                <input
                    id="customerSearch"
                    type="search"
                    placeholder="Search by name, email, or phone"
                    data-table-search="customerTable"
                >
            </div>

            <span class="record-count">
                <strong data-record-count><?= count($customers) ?></strong>
                customer<?= count($customers) === 1 ? '' : 's' ?>
            </span>
        </div>

        <div class="table-wrap">
            <table class="data-table" id="customerTable">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Phone</th>
                        <th>Added</th>
                        <th class="actions-heading">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($customers as $customer): ?>
                        <?php
                            $parts = array_values(
                                array_filter(
                                    explode(' ', trim($customer['full_name'] ?? ''))
                                )
                            );

                            $initial = strtoupper(
                                substr($parts[0] ?? 'C', 0, 1) .
                                substr($parts[count($parts) - 1] ?? '', 0, 1)
                            );

                            $avatarFile = basename(
                                (string) ($customer['avatar'] ?? '')
                            );

                            $avatarUrl = $avatarFile &&
                                is_file(FCPATH . 'uploads/customers/' . $avatarFile)
                                ? base_url('uploads/customers/' . rawurlencode($avatarFile))
                                : null;
                        ?>

                        <tr>
                            <td>
                                <div class="identity-cell">
                                    <span class="record-avatar avatar-blue">
                                        <?php if ($avatarUrl): ?>
                                            <img
                                                src="<?= esc($avatarUrl, 'attr') ?>"
                                                alt="<?= esc($customer['full_name'], 'attr') ?>"
                                            >
                                        <?php else: ?>
                                            <?= esc($initial) ?>
                                        <?php endif; ?>
                                    </span>

                                    <div>
                                        <strong>
                                            <?= esc($customer['full_name']) ?>
                                        </strong>

                                        <small>
                                            Customer #<?= str_pad(
                                                (string) $customer['id'],
                                                4,
                                                '0',
                                                STR_PAD_LEFT
                                            ) ?>
                                        </small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <a
                                    class="cell-link"
                                    href="mailto:<?= esc($customer['email'], 'attr') ?>"
                                >
                                    <?= esc($customer['email']) ?>
                                </a>
                            </td>

                            <td><?= esc($customer['phone']) ?></td>

                            <td>
                                <span class="date-cell">
                                    <?= ! empty($customer['created_at'])
                                        ? date('M j, Y', strtotime($customer['created_at']))
                                        : '—' ?>
                                </span>
                            </td>

                            <td>
                                <div class="row-actions">
                                    
<a
    class="action-button edit-staff-button"
    href="<?= base_url('/users/' . $user['id'] . '/edit') ?>"
    aria-label="Edit <?= esc($user['full_name'], 'attr') ?>"
    title="Edit staff member"
>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        width="16"
        height="16"
        fill="none"
        stroke="currentColor"
        stroke-width="1.7"
        stroke-linecap="round"
        stroke-linejoin="round"
        aria-hidden="true"
    >
        <path d="M12 20h9"/>
        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4L16.5 3.5Z"/>
    </svg>
</a>


                                    <form
                                        action="<?= base_url('/customers/' . $customer['id'] . '/delete') ?>"
                                        method="post"
                                        data-confirm="Remove <?= esc($customer['full_name'], 'attr') ?> from customer accounts?"
                                    >
                                        <?= csrf_field() ?>

                                        <button
                                            class="action-button action-danger"
                                            type="submit"
                                            aria-label="Delete <?= esc($customer['full_name'], 'attr') ?>"
                                            title="Delete customer"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                aria-hidden="true"
                                            >
                                                <path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v5M14 11v5"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div
                class="empty-table <?= empty($customers) ? '' : 'is-hidden' ?>"
                data-table-empty="customerTable"
            >
                <span aria-hidden="true">⌕</span>
                <strong>No customers found</strong>
                <p>Try a different search or add a customer account.</p>
            </div>
        </div>
    </section>

</div>

<?= $this->endSection() ?>