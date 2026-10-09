
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<style>

.sales-history-page {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding-top: 46px;
    color: #17243b;
    position: relative;
    box-sizing: border-box;
}


.sales-history-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 24px;
}

.sales-history-heading h1 {
    margin: 0 0 6px;
    font-size: 28px;
}

.sales-history-heading p {
    margin: 0;
    color: #68758a;
}

.sales-history-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #142b50;
    color: #fff;
    padding: 12px 18px;
    border-radius: 9px;
    text-decoration: none;
    font-weight: 600;
}

.sales-history-button:hover {
    background: #203e6c;
    color: #fff;
}

.sales-history-card {
    background: #fff;
    border: 1px solid #e4e9f0;
    border-radius: 15px;
    padding: 22px;
    box-shadow: 0 5px 20px rgba(18, 38, 63, .04);
}

.sales-history-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.sales-history-top h2 {
    margin: 0;
    font-size: 19px;
}

.sales-history-count {
    font-size: 13px;
    color: #68758a;
    background: #f2f5f9;
    padding: 7px 11px;
    border-radius: 20px;
}

.sales-table-wrap {
    overflow-x: auto;
}

.sales-history-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 850px;
}

.sales-history-table th {
    padding: 14px 12px;
    text-align: left;
    background: #f5f7fb;
    color: #617087;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: .04em;
    white-space: nowrap;
}

.sales-history-table td {
    padding: 16px 12px;
    border-bottom: 1px solid #edf0f5;
    font-size: 14px;
    vertical-align: middle;
}

.sales-history-table tbody tr:hover {
    background: #fafbfd;
}

.sales-id {
    font-weight: 700;
    color: #203e6c;
}

.sales-product-name {
    font-weight: 600;
    color: #17243b;
}

.sales-muted {
    color: #7b879a;
}

.sales-amount {
    font-weight: 700;
    color: #142b50;
    white-space: nowrap;
}

.sales-history-empty {
    text-align: center;
    padding: 48px 18px;
    color: #68758a;
}

.sales-history-empty strong {
    display: block;
    font-size: 18px;
    color: #17243b;
    margin-bottom: 8px;
}

.sales-history-empty p {
    margin: 0 0 20px;
}

@media (max-width: 650px) {
    .sales-history-heading h1 {
        font-size: 24px;
    }

    .sales-history-card {
        padding: 14px;
    }
}
</style>

<div class="sales-history-page">
    <div class="sales-history-heading">
        <div>
            <h1>Sales History</h1>
            <p>Review recorded transactions and completed sales.</p>
        </div>

        <a href="<?= base_url('/sales') ?>" class="sales-history-button">
            + Record Sale
        </a>
    </div>

    <div class="sales-history-card">
        <div class="sales-history-top">
            <h2>Transaction Records</h2>

            <span class="sales-history-count">
                <?= count($sales) ?> transaction(s)
            </span>
        </div>

        <?php if (empty($sales)): ?>
            <div class="sales-history-empty">
                <strong>No sales recorded yet</strong>
                <p>Your transactions will appear here after a sale is recorded.</p>

                <a href="<?= base_url('/sales') ?>" class="sales-history-button">
                    Record Your First Sale
                </a>
            </div>
        <?php else: ?>
            <div class="sales-table-wrap">
                <table class="sales-history-table">
                    <thead>
                        <tr>
                            <th>Sale ID</th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Staff Member</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($sales as $sale): ?>
                            <tr>
                                <td class="sales-id">
                                    #<?= esc($sale['id']) ?>
                                </td>

                                <td class="sales-product-name">
                                    <?= esc($sale['product_name']) ?>
                                </td>

                                <td>
                                    <?= esc($sale['customer_name'] ?: 'Walk-in Customer') ?>
                                </td>

                                <td>
                                    <?= esc($sale['staff_name'] ?: 'Unknown Staff') ?>
                                </td>

                                <td>
                                    <?= (int) $sale['quantity'] ?>
                                </td>

                                <td class="sales-amount">
                                    ₱<?= number_format((float) $sale['total_price'], 2) ?>
                                </td>

                                <td>
                                    <?= esc(date('M d, Y h:i A', strtotime($sale['created_at']))) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
