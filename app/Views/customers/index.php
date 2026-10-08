<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <div><p class="eyebrow">Directory</p><h1>Customer accounts</h1><p>View and maintain the people your store serves.</p></div>
    <a class="button button-primary" href="<?= base_url('/customers/new') ?>"><span class="button-plus">+</span> Add customer</a>
</section>

<section class="panel directory-panel">
    <div class="directory-toolbar">
        <div class="search-control">
            <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
            <label class="sr-only" for="customerSearch">Search customers</label>
            <input id="customerSearch" type="search" placeholder="Search by name, email, or phone" data-table-search="customerTable">
        </div>
        <span class="record-count"><strong data-record-count><?= count($customers) ?></strong> customer<?= count($customers) === 1 ? '' : 's' ?></span>
    </div>

    <div class="table-wrap">
        <table class="data-table" id="customerTable">
            <thead><tr><th>Customer</th><th>Contact</th><th>Phone</th><th>Added</th><th class="actions-heading">Actions</th></tr></thead>
            <tbody>
            <?php foreach ($customers as $customer): ?>
                <?php $parts = array_filter(explode(' ', $customer['full_name'])); $initial = strtoupper(substr($parts[0] ?? 'C', 0, 1) . substr(end($parts) ?: '', 0, 1)); $avatarFile = basename((string) ($customer['avatar'] ?? '')); $avatarUrl = $avatarFile && is_file(FCPATH . 'uploads/customers/' . $avatarFile) ? base_url('uploads/customers/' . rawurlencode($avatarFile)) : null; ?>
                <tr>
                    <td><div class="identity-cell"><span class="record-avatar avatar-blue"><?php if ($avatarUrl): ?><img src="<?= esc($avatarUrl, 'attr') ?>" alt=""><?php else: ?><?= esc($initial) ?><?php endif; ?></span><div><strong><?= esc($customer['full_name']) ?></strong><small>Customer #<?= str_pad((string) $customer['id'], 4, '0', STR_PAD_LEFT) ?></small></div></div></td>
                    <td><a class="cell-link" href="mailto:<?= esc($customer['email'], 'attr') ?>"><?= esc($customer['email']) ?></a></td>
                    <td><?= esc($customer['phone']) ?></td>
                    <td><span class="date-cell"><?= ! empty($customer['created_at']) ? date('M j, Y', strtotime($customer['created_at'])) : '—' ?></span></td>
                    <td><div class="row-actions">
                        <a class="action-button" href="<?= base_url('/customers/' . $customer['id'] . '/edit') ?>" aria-label="Edit <?= esc($customer['full_name'], 'attr') ?>"><svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4L16.5 3.5Z"/></svg></a>
                        <form action="<?= base_url('/customers/' . $customer['id'] . '/delete') ?>" method="post" data-confirm="Remove <?= esc($customer['full_name'], 'attr') ?> from customer accounts?">
                            <?= csrf_field() ?><button class="action-button action-danger" type="submit" aria-label="Delete <?= esc($customer['full_name'], 'attr') ?>"><svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v5M14 11v5"/></svg></button>
                        </form>
                    </div></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="empty-table <?= empty($customers) ? '' : 'is-hidden' ?>" data-table-empty="customerTable"><span>⌕</span><strong>No customers found</strong><p>Try a different search or add a customer account.</p></div>
    </div>
</section>
<?= $this->endSection() ?>
