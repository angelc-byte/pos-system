<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<section class="page-heading">
    <div><p class="eyebrow">System information</p><h1>About Northstar POS</h1><p>A focused account-management project built with CodeIgniter 4.</p></div>
</section>

<section class="about-grid">
    <article class="panel about-main">
        <span class="about-mark"><svg viewBox="0 0 24 24"><path d="M4 7.5 12 3l8 4.5v9L12 21l-8-4.5v-9Z"/><path d="m8 10 4 2.2 4-2.2M12 12.2V17"/></svg></span>
        <p class="eyebrow">Northstar POS</p>
        <h2>Simple records. Secure access.</h2>
        <p>This application demonstrates a clean MVC structure, database-backed customer and user management, session-based authentication, and route protection through CodeIgniter filters.</p>
        <div class="tag-list"><span>CodeIgniter 4</span><span>PHP 8.2</span><span>MySQL</span><span>Responsive UI</span></div>
    </article>
    <article class="panel feature-panel">
        <h2>Core features</h2>
        <ul class="feature-list">
            <li><span>01</span><div><strong>Protected workspace</strong><small>Unauthenticated visitors are redirected to sign in.</small></div></li>
            <li><span>02</span><div><strong>Secure credentials</strong><small>Passwords use one-way hashing and verification.</small></div></li>
            <li><span>03</span><div><strong>Account management</strong><small>Create, update, search, and remove records.</small></div></li>
            <li><span>04</span><div><strong>Session logout</strong><small>Signing out destroys the active session safely.</small></div></li>
        </ul>
    </article>
</section>
<?= $this->endSection() ?>
