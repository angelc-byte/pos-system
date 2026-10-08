<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<section class="page-heading dashboard-heading">
    <div>
        <p class="eyebrow">Store overview</p>
        <h1>Good <?= date('H') < 12 ? 'morning' : (date('H') < 18 ? 'afternoon' : 'evening') ?>, <?= esc(explode(' ', (string) session('full_name'))[0] ?? 'there') ?>.</h1>
        <p>Here is a quick look at your POS account directory.</p>
    </div>
    <div class="heading-actions">
        <a class="button button-secondary" href="<?= base_url('/customers/new') ?>">Add customer</a>
        <a class="button button-primary" href="<?= base_url('/users/new') ?>">Add team member</a>
    </div>
</section>

<section class="stats-grid" aria-label="Account totals">
    <article class="stat-card stat-card-primary">
        <div class="stat-icon"><svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8ZM22 21v-2a4 4 0 0 0-3-3.87"/></svg></div>
        <div><span>Customer accounts</span><strong><?= number_format($customerCount) ?></strong><small>Stored customer profiles</small></div>
        <a href="<?= base_url('/customers') ?>" aria-label="View customers">↗</a>
    </article>
    <article class="stat-card stat-card-purple">
        <div class="stat-icon"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2M12 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z"/></svg></div>
        <div><span>Team members</span><strong><?= number_format($userCount) ?></strong><small>Authorized POS users</small></div>
        <a href="<?= base_url('/users') ?>" aria-label="View team members">↗</a>
    </article>
    <article class="stat-card stat-card-green">
        <div class="stat-icon"><svg viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></svg></div>
        <div><span>Security status</span><strong class="status-word">Protected</strong><small>Session access is active</small></div>
        <span class="live-badge"><i></i> Live</span>
    </article>
</section>

<section class="dashboard-grid">
    <article class="panel">
        <div class="panel-header">
            <div><p class="eyebrow">Customers</p><h2>Recently added</h2></div>
            <a class="text-link" href="<?= base_url('/customers') ?>">View all <span>→</span></a>
        </div>
        <div class="activity-list">
            <?php if (empty($recentCustomers)): ?><div class="empty-compact">No customer records yet.</div><?php endif; ?>
            <?php foreach ($recentCustomers as $customer): ?>
                <?php $parts = array_filter(explode(' ', $customer['full_name'])); $initial = strtoupper(substr($parts[0] ?? 'C', 0, 1) . substr(end($parts) ?: '', 0, 1)); $avatarFile = basename((string) ($customer['avatar'] ?? '')); $avatarUrl = $avatarFile && is_file(FCPATH . 'uploads/customers/' . $avatarFile) ? base_url('uploads/customers/' . rawurlencode($avatarFile)) : null; ?>
                <a class="activity-row" href="<?= base_url('/customers/' . $customer['id'] . '/edit') ?>">
                    <span class="record-avatar avatar-blue"><?php if ($avatarUrl): ?><img src="<?= esc($avatarUrl, 'attr') ?>" alt=""><?php else: ?><?= esc($initial) ?><?php endif; ?></span>
                    <span class="activity-copy"><strong><?= esc($customer['full_name']) ?></strong><small><?= esc($customer['email']) ?></small></span>
                    <time><?= ! empty($customer['created_at']) ? date('M j', strtotime($customer['created_at'])) : '—' ?></time>
                </a>
            <?php endforeach; ?>
        </div>
    </article>

    <article class="panel">
        <div class="panel-header">
            <div><p class="eyebrow">Team</p><h2>Latest members</h2></div>
            <a class="text-link" href="<?= base_url('/users') ?>">View all <span>→</span></a>
        </div>
        <div class="activity-list">
            <?php if (empty($recentUsers)): ?><div class="empty-compact">No team records yet.</div><?php endif; ?>
            <?php foreach ($recentUsers as $user): ?>
                <?php $parts = array_filter(explode(' ', $user['full_name'])); $initial = strtoupper(substr($parts[0] ?? 'U', 0, 1) . substr(end($parts) ?: '', 0, 1)); $avatarFile = basename((string) ($user['avatar'] ?? '')); $avatarUrl = $avatarFile && is_file(FCPATH . 'uploads/avatars/' . $avatarFile) ? base_url('uploads/avatars/' . rawurlencode($avatarFile)) : null; ?>
                <a class="activity-row" href="<?= base_url('/users/' . $user['id'] . '/edit') ?>">
                    <span class="record-avatar avatar-purple"><?php if ($avatarUrl): ?><img src="<?= esc($avatarUrl, 'attr') ?>" alt=""><?php else: ?><?= esc($initial) ?><?php endif; ?></span>
                    <span class="activity-copy"><strong><?= esc($user['full_name']) ?></strong><small>@<?= esc($user['username']) ?></small></span>
                    <time><?= ! empty($user['created_at']) ? date('M j', strtotime($user['created_at'])) : '—' ?></time>
                </a>
            <?php endforeach; ?>
        </div>
    </article>
</section>
<?= $this->endSection() ?>
