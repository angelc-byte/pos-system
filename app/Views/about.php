
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<section class="page-heading">
    <div>
        <p class="eyebrow">System information</p>
        <h1>About The Daily Fit</h1>
        <p>A retail point-of-sale system for managing products, customers, staff, and sales.</p>
    </div>
</section>

<section class="about-grid">
    <article class="panel about-main">
        <span class="about-mark">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M4 7.5 12 3l8 4.5v9L12 21l-8-4.5v-9Z"/>
                <path d="m8 10 4 2.2 4-2.2M12 12.2V17"/>
            </svg>
        </span>

        <p class="eyebrow">The Daily Fit</p>
        <h2>Simple operations. Better management.</h2>

        <p>
            The Daily Fit is built with CodeIgniter 4 and follows the
            Model-View-Controller (MVC) architecture. It provides a
            centralized interface for managing customer accounts, staff
            accounts, products, and sales records.
        </p>

        <div class="tag-list">
            <span>CodeIgniter 4</span>
            <span>PHP</span>
            <span>MySQL</span>
            <span>Responsive UI</span>
        </div>
    </article>

    <article class="panel feature-panel">
        <h2>Core features</h2>

        <ul class="feature-list">
            <li>
                <span>01</span>
                <div>
                    <strong>Secure access</strong>
                    <small>Authentication and session-based access control.</small>
                </div>
            </li>

            <li>
                <span>02</span>
                <div>
                    <strong>Customer management</strong>
                    <small>Maintain customer records and profile information.</small>
                </div>
            </li>

            <li>
                <span>03</span>
                <div>
                    <strong>Product management</strong>
                    <small>Organize products and maintain catalog information.</small>
                </div>
            </li>

            <li>
                <span>04</span>
                <div>
                    <strong>Sales tracking</strong>
                    <small>Record transactions and review sales history.</small>
                </div>
            </li>
        </ul>
    </article>
</section>

<?= $this->endSection() ?>
