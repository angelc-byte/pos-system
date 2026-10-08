<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <div><p class="eyebrow">Access control</p><h1>Team members</h1><p>Manage the staff accounts permitted to use the POS system.</p></div>
    <a class="button button-primary" href="<?= base_url('/users/new') ?>"><span class="button-plus">+</span> Add team member</a>
</section>

<section class="panel directory-panel">
    <div class="directory-toolbar">
        <div class="search-control">
            <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
            <label class="sr-only" for="userSearch">Search team members</label>
            <input id="userSearch" type="search" placeholder="Search by name, username, or email" data-table-search="userTable">
        </div>
        <span class="record-count"><strong data-record-count><?= count($users) ?></strong> member<?= count($users) === 1 ? '' : 's' ?></span>
    </div>

    <div class="table-wrap">
        <table class="data-table" id="userTable">
            <thead><tr><th>Team member</th><th>Username</th><th>Email</th><th>Created</th><th class="actions-heading">Actions</th></tr></thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <?php $parts = array_filter(explode(' ', $user['full_name'])); $initial = strtoupper(substr($parts[0] ?? 'U', 0, 1) . substr(end($parts) ?: '', 0, 1)); $avatarFile = basename((string) ($user['avatar'] ?? '')); $avatarUrl = $avatarFile && is_file(FCPATH . 'uploads/avatars/' . $avatarFile) ? base_url('uploads/avatars/' . rawurlencode($avatarFile)) : null; ?>
                <tr>
                    <td><div class="identity-cell"><span class="record-avatar avatar-purple"><?php if ($avatarUrl): ?><img src="<?= esc($avatarUrl, 'attr') ?>" alt=""><?php else: ?><?= esc($initial) ?><?php endif; ?></span><div><strong><?= esc($user['full_name']) ?></strong><small><?= (int) $user['id'] === (int) session('user_id') ? 'Current account' : 'Staff account' ?></small></div></div></td>
                    <td><span class="username-pill">@<?= esc($user['username']) ?></span></td>
                    <td><a class="cell-link" href="mailto:<?= esc($user['email'] ?? '', 'attr') ?>"><?= esc($user['email'] ?? '—') ?></a></td>
                    <td><span class="date-cell"><?= ! empty($user['created_at']) ? date('M j, Y', strtotime($user['created_at'])) : '—' ?></span></td>
                    <td><div class="row-actions">
                        <a class="action-button" href="<?= base_url('/users/' . $user['id'] . '/edit') ?>" aria-label="Edit <?= esc($user['full_name'], 'attr') ?>"><svg viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4L16.5 3.5Z"/></svg></a>
                        <?php if ((int) $user['id'] !== (int) session('user_id')): ?>
                            <form action="<?= base_url('/users/' . $user['id'] . '/delete') ?>" method="post" data-confirm="Remove <?= esc($user['full_name'], 'attr') ?> from team accounts?">
                                <?= csrf_field() ?><button class="action-button action-danger" type="submit" aria-label="Delete <?= esc($user['full_name'], 'attr') ?>"><svg viewBox="0 0 24 24"><path d="M3 6h18M8 6V4h8v2M19 6l-1 15H6L5 6M10 11v5M14 11v5"/></svg></button>
                            </form>
                        <?php else: ?><span class="protected-label">Protected</span><?php endif; ?>
                    </div></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="empty-table <?= empty($users) ? '' : 'is-hidden' ?>" data-table-empty="userTable"><span>⌕</span><strong>No team members found</strong><p>Try a different search or add a staff account.</p></div>
    </div>
</section>
<?= $this->endSection() ?>
