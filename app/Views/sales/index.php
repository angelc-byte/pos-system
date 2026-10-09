
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<?php
$oldProductId = old('product_id', $selectedProductId ?? '');
$oldCustomerId = old('customer_id', '');
$oldQuantity = old('quantity', '1');
?>

<style>

.sales-dashboard {
    width: 100%;
    max-width: 1450px;
    margin: 0 auto;
    color: #142238;
    padding: 55px 0 40px;
    position: relative;
    box-sizing: border-box;
}

.sales-titlebar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    flex-wrap: wrap;
    margin: 4px 0 30px;
}
.sales-titlebar h1 {
    margin: 0 0 7px;
    font-size: 32px;
    font-weight: 750;
    letter-spacing: -.7px;
}
.sales-titlebar p {
    margin: 0;
    color: #6c788a;
    font-size: 16px;
}
.sales-breadcrumb {
    color: #6c788a;
    font-size: 14px;
}
.sales-layout {
    display: grid;
    grid-template-columns: minmax(0, 1.2fr) minmax(0, .95fr);
    gap: 22px;
    align-items: start;
}
.sales-panel {
    background: rgba(255,255,255,.94);
    border: 1px solid #e8e7e4;
    border-radius: 13px;
    box-shadow: 0 5px 22px rgba(23,35,52,.035);
    overflow: hidden;
    min-width: 0;
}
.sales-panel-heading {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 22px 24px;
    border-bottom: 1px solid #eceef1;
}
.sales-heading-icon {
    width: 42px;
    height: 42px;
    display: grid;
    place-items: center;
    border-radius: 10px;
    background: #f0f3f7;
    color: #17365e;
    font-size: 23px;
    flex-shrink: 0;
}
.sales-panel-heading h2 {
    margin: 0 0 5px;
    font-size: 20px;
    letter-spacing: -.3px;
}
.sales-panel-heading p {
    margin: 0;
    color: #6d788a;
    font-size: 13px;
    line-height: 1.5;
}
.sales-form-body {
    padding: 23px 24px 24px;
}
.sales-form-grid {
    display: grid;
    grid-template-columns: repeat(2,minmax(0,1fr));
    gap: 20px 22px;
}
.sales-field {
    min-width: 0;
}
.sales-field label {
    display: block;
    margin-bottom: 9px;
    font-size: 13px;
    font-weight: 700;
    color: #18263b;
}
.sales-required {
    color: #dc4545;
}
.sales-field input,
.sales-field select {
    width: 100%;
    box-sizing: border-box;
    height: 46px;
    border: 1px solid #d9dee6;
    border-radius: 9px;
    background: #fff;
    color: #17263d;
    padding: 0 13px;
    font: inherit;
    font-size: 14px;
}
.sales-field input:focus,
.sales-field select:focus {
    outline: 0;
    border-color: #829ab9;
    box-shadow: 0 0 0 3px rgba(32,61,96,.09);
}
.sales-field input[readonly] {
    background: #f1f2f4;
    color: #657186;
}
.sales-help {
    display: block;
    color: #788497;
    font-size: 12px;
    line-height: 1.5;
    margin-top: 7px;
}
.sales-product-details {
    display: grid;
    grid-template-columns: minmax(0,1fr) minmax(0,1fr);
    gap: 16px;
    margin-top: 20px;
}
.sales-summary {
    display: grid;
    grid-template-columns: minmax(0,1.15fr) minmax(0,.85fr);
    gap: 18px;
    padding: 20px;
    margin-top: 22px;
    border: 1px solid #eee5d8;
    border-radius: 10px;
    background: #fcfaf6;
}
.sales-summary-details {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 15px;
}
.sales-summary-line {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    font-size: 13px;
    color: #586579;
}
.sales-summary-line strong {
    color: #1c2a3f;
    font-size: 14px;
    text-align: right;
    overflow-wrap: anywhere;
}
.sales-summary-total {
    border-left: 1px solid #e8dfd2;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    background: rgba(238,235,229,.6);
    border-radius: 9px;
    padding: 17px 10px;
}
.sales-summary-total span {
    font-size: 13px;
    color: #556276;
}
.sales-summary-total strong {
    display: block;
    font-size: clamp(22px,2.2vw,32px);
    color: #111e31;
    margin-top: 7px;
    overflow-wrap: anywhere;
}
.sales-actions {
    display: grid;
    grid-template-columns: minmax(110px,.7fr) minmax(0,1.3fr);
    gap: 15px;
    margin-top: 24px;
}
.sales-button {
    min-height: 48px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    border-radius: 9px;
    padding: 11px 16px;
    border: 1px solid #d6dce5;
    background: white;
    color: #152b49;
    text-decoration: none;
    font: inherit;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
}
.sales-button-primary {
    color: white;
    border-color: #193453;
    background: #193453;
}
.sales-button-primary:hover {
    background: #24476e;
    color: white;
}
.sales-button-secondary:hover {
    background: #f6f7f9;
}
.sales-button:disabled {
    opacity: .48;
    cursor: not-allowed;
}
.sales-right-column {
    display: flex;
    flex-direction: column;
    gap: 22px;
    min-width: 0;
}
.sales-view-all {
    margin-left: auto;
    white-space: nowrap;
    border: 1px solid #d8dde5;
    border-radius: 9px;
    padding: 10px 13px;
    text-decoration: none;
    color: #1c2b40;
    font-size: 13px;
    font-weight: 650;
}
.sales-view-all:hover {
    background: #f5f7fa;
}
.sales-table-wrap {
    overflow-x: auto;
    padding: 0 20px 20px;
}
.sales-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 12px;
    min-width: 560px;
}
.sales-table thead {
    background: #f4f5f7;
}
.sales-table th {
    text-align: left;
    padding: 13px 10px;
    color: #26354b;
    font-weight: 700;
    white-space: nowrap;
}
.sales-table th:first-child {
    border-radius: 7px 0 0 7px;
}
.sales-table th:last-child {
    border-radius: 0 7px 7px 0;
}
.sales-table td {
    padding: 12px 10px;
    border-bottom: 1px solid #eceef1;
    color: #29374b;
    vertical-align: middle;
}
.sales-table tbody tr:last-child td {
    border-bottom: 0;
}
.sales-table-product {
    display: flex;
    align-items: center;
    gap: 9px;
    min-width: 130px;
}
.sales-product-thumb {
    width: 39px;
    height: 43px;
    flex-shrink: 0;
    display: grid;
    place-items: center;
    border-radius: 7px;
    overflow: hidden;
    background: #f0efeb;
    color: #8b735d;
}
.sales-product-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.sales-table-product strong {
    font-size: 12px;
    line-height: 1.4;
    font-weight: 650;
}
.sales-table-amount {
    white-space: nowrap;
    font-weight: 750;
    color: #17263c !important;
}
.sales-table-date {
    white-space: nowrap;
    line-height: 1.6;
}
.sales-table-date span {
    color: #7c8798;
}
.sales-empty {
    margin: 0 20px 20px;
    padding: 27px 15px;
    border: 1px dashed #d9dee5;
    border-radius: 9px;
    text-align: center;
    color: #6b788a;
    font-size: 13px;
    line-height: 1.7;
}
.sales-empty strong {
    display: block;
    color: #25354a;
    font-size: 15px;
    margin-bottom: 3px;
}
.sales-empty a {
    color: #193453;
    font-weight: 700;
}
.sales-metrics {
    display: grid;
    grid-template-columns: repeat(4,minmax(0,1fr));
    gap: 12px;
    padding: 0 20px 22px;
}
.sales-metric {
    min-width: 0;
    background: #f5f5f6;
    border-radius: 9px;
    padding: 17px 9px 15px;
    text-align: center;
}
.sales-metric-icon {
    font-size: 21px;
    color: #173b66;
    margin-bottom: 9px;
}
.sales-metric strong {
    display: block;
    font-size: clamp(14px,1.3vw,19px);
    color: #17263b;
    overflow-wrap: anywhere;
    margin-bottom: 6px;
}
.sales-metric span {
    display: block;
    font-size: 11px;
    color: #6b788a;
}
.sales-flash-note {
    padding: 12px 15px;
    border-radius: 9px;
    background: #fffbeb;
    border: 1px solid #f4dfa1;
    color: #97520c;
    font-size: 13px;
    margin-bottom: 18px;
}
.sales-empty-products {
    padding: 24px;
    margin: 0 0 20px;
    border-radius: 10px;
    background: #fffbef;
    border: 1px solid #f2dfaa;
    color: #8c5413;
    font-size: 14px;
    line-height: 1.6;
}
.sales-empty-products a {
    color: #193453;
    font-weight: 700;
}
@media (max-width: 1100px) {
    .sales-layout {
        grid-template-columns: 1fr;
    }
    .sales-right-column {
        display: grid;
        grid-template-columns: 1fr;
    }
}
@media (max-width: 600px) {
    .sales-titlebar h1 {
        font-size: 27px;
    }
    .sales-titlebar p {
        font-size: 14px;
    }
    .sales-breadcrumb {
        display: none;
    }
    .sales-panel-heading {
        padding: 18px;
    }
    .sales-form-body {
        padding: 18px;
    }
    .sales-form-grid,
    .sales-product-details {
        grid-template-columns: 1fr;
    }
    .sales-summary {
        grid-template-columns: 1fr;
    }
    .sales-summary-total {
        border-left: 0;
        border-top: 1px solid #e8dfd2;
    }
    .sales-actions {
        grid-template-columns: 1fr;
    }
    .sales-metrics {
        grid-template-columns: repeat(2,minmax(0,1fr));
    }
    .sales-panel-heading h2 {
        font-size: 17px;
    }
    .sales-view-all {
        padding: 9px 10px;
        font-size: 12px;
    }
}
</style>

<div class="sales-dashboard">
    <div class="sales-titlebar">
        <div>
            <h1>Sales</h1>
            <p>Create a transaction and automatically update your inventory.</p>
        </div>
        <div class="sales-breadcrumb">Home &nbsp; › &nbsp; Sales</div>
    </div>

    <?php if (empty($products)): ?>
        <div class="sales-empty-products">
            <strong>No products are available in the inventory database.</strong><br>
            Add products first, or check whether the Products page is saving items to the
            <code>pos_system.products</code> table.
            <br><a href="<?= base_url('/products') ?>">Open Products</a>
        </div>
    <?php endif; ?>

    <div class="sales-layout">
        <section class="sales-panel">
            <div class="sales-panel-heading">
                <div class="sales-heading-icon">🛒</div>
                <div>
                    <h2>Record Sale</h2>
                    <p>Select a product, enter the quantity, and complete the transaction.</p>
                </div>
            </div>

            <div class="sales-form-body">
                <?php if (! empty($products)): ?>
                    <form action="<?= base_url('/sales') ?>" method="post" id="saleForm">
                        <?= csrf_field() ?>

                        <div class="sales-form-grid">
                            <div class="sales-field">
                                <label for="product_id">Product <span class="sales-required">*</span></label>
                                <select name="product_id" id="product_id" required>
                                    <option value="">Search or select a product...</option>
                                    <?php foreach ($products as $product): ?>
                                        <option
                                            value="<?= esc($product['id']) ?>"
                                            data-name="<?= esc($product['name']) ?>"
                                            data-price="<?= esc($product['price']) ?>"
                                            data-stock="<?= esc($product['stock_quantity']) ?>"
                                            <?= (string) $oldProductId === (string) $product['id'] ? 'selected' : '' ?>
                                        >
                                            <?= esc($product['name']) ?>
                                            — ₱<?= number_format((float) $product['price'], 2) ?>
                                            (Stock: <?= (int) $product['stock_quantity'] ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="sales-help" id="productHelp">Choose a product from your inventory.</small>
                            </div>

                            <div class="sales-field">
                                <label for="customer_id">Customer (Optional)</label>
                                <select name="customer_id" id="customer_id">
                                    <option value="">Walk-in Customer</option>
                                    <?php foreach ($customers as $customer): ?>
                                        <option
                                            value="<?= esc($customer['id']) ?>"
                                            <?= (string) $oldCustomerId === (string) $customer['id'] ? 'selected' : '' ?>
                                        >
                                            <?= esc($customer['full_name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="sales-help">Leave as walk-in for an unregistered customer.</small>
                            </div>
                        </div>

                        <div class="sales-product-details">
                            <div class="sales-field">
                                <label for="unitPrice">Unit Price</label>
                                <input type="text" id="unitPrice" value="₱0.00" readonly>
                            </div>
                            <div class="sales-field">
                                <label for="availableStock">Available Stock</label>
                                <input type="text" id="availableStock" value="0" readonly>
                            </div>
                            <div class="sales-field" style="grid-column:1 / -1;">
                                <label for="quantity">Quantity <span class="sales-required">*</span></label>
                                <input
                                    type="number"
                                    name="quantity"
                                    id="quantity"
                                    min="1"
                                    step="1"
                                    value="<?= esc($oldQuantity) ?>"
                                    required
                                >
                                <small class="sales-help" id="quantityHelp">Enter a quantity no greater than the available stock.</small>
                            </div>
                        </div>

                        <div class="sales-summary">
                            <div class="sales-summary-details">
                                <div class="sales-summary-line">
                                    <span>♧ &nbsp; Product</span>
                                    <strong id="summaryProduct">—</strong>
                                </div>
                                <div class="sales-summary-line">
                                    <span>◇ &nbsp; Unit Price</span>
                                    <strong id="summaryUnitPrice">₱0.00</strong>
                                </div>
                                <div class="sales-summary-line">
                                    <span>☷ &nbsp; Quantity</span>
                                    <strong id="summaryQuantity">1</strong>
                                </div>
                            </div>
                            <div class="sales-summary-total">
                                <span>Total Amount</span>
                                <strong id="totalPrice">₱0.00</strong>
                            </div>
                        </div>

                        <div class="sales-actions">
                            <button type="reset" class="sales-button sales-button-secondary" id="clearSale">
                                ↻ &nbsp; Clear
                            </button>
                            <button type="submit" class="sales-button sales-button-primary" id="submitSale">
                                🛒 &nbsp; Record Sale
                            </button>
                        </div>
                    </form>
                <?php else: ?>
                    <p style="color:#6b788a;font-size:14px;margin:0;">
                        The sales form will be available when products are present in your inventory.
                    </p>
                <?php endif; ?>
            </div>
        </section>

        <div class="sales-right-column">
            <section class="sales-panel">
                <div class="sales-panel-heading">
                    <div class="sales-heading-icon">◷</div>
                    <div>
                        <h2>Recent Sales</h2>
                        <p>Latest transaction records.</p>
                    </div>
                    <a class="sales-view-all" href="<?= base_url('/sales/history') ?>">View All &nbsp; →</a>
                </div>

                <?php if (empty($recentSales)): ?>
                    <div class="sales-empty">
                        <strong>No sales recorded yet</strong>
                        Your actual transactions will appear here after you record a sale.
                    </div>
                <?php else: ?>
                    <div class="sales-table-wrap">
                        <table class="sales-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Customer</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recentSales as $sale): ?>
                                    <tr>
                                        <td><?= esc($sale['id']) ?></td>
                                        <td>
                                            <div class="sales-table-product">
                                                <div class="sales-product-thumb">
                                                    <?php
                                                    $image = basename((string) ($sale['product_image'] ?? ''));
                                                    $imagePath = FCPATH . 'uploads/products/' . $image;
                                                    ?>
                                                    <?php if ($image !== '' && is_file($imagePath)): ?>
                                                        <img src="<?= base_url('uploads/products/' . rawurlencode($image)) ?>" alt="">
                                                    <?php else: ?>
                                                        <span>♧</span>
                                                    <?php endif; ?>
                                                </div>
                                                <strong><?= esc($sale['product_name']) ?></strong>
                                            </div>
                                        </td>
                                        <td><?= esc($sale['customer_name'] ?: 'Walk-in') ?></td>
                                        <td><?= (int) $sale['quantity'] ?></td>
                                        <td class="sales-table-amount">₱<?= number_format((float) $sale['total_price'], 2) ?></td>
                                        <td class="sales-table-date">
                                            <?= esc(date('M j, Y', strtotime($sale['created_at']))) ?><br>
                                            <span><?= esc(date('h:i A', strtotime($sale['created_at']))) ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </section>

            <section class="sales-panel">
                <div class="sales-panel-heading">
                    <div class="sales-heading-icon">▥</div>
                    <div>
                        <h2>Today's Summary</h2>
                        <p><?= esc(date('F j, Y')) ?></p>
                    </div>
                </div>

                <div class="sales-metrics">
                    <div class="sales-metric">
                        <div class="sales-metric-icon">🛒</div>
                        <strong><?= number_format((int) ($summary['total_sales'] ?? 0)) ?></strong>
                        <span>Total Sales</span>
                    </div>
                    <div class="sales-metric">
                        <div class="sales-metric-icon">◇</div>
                        <strong><?= number_format((int) ($summary['items_sold'] ?? 0)) ?></strong>
                        <span>Items Sold</span>
                    </div>
                    <div class="sales-metric">
                        <div class="sales-metric-icon">₱</div>
                        <strong>₱<?= number_format((float) ($summary['total_revenue'] ?? 0), 2) ?></strong>
                        <span>Total Revenue</span>
                    </div>
                    <div class="sales-metric">
                        <div class="sales-metric-icon">♧</div>
                        <strong><?= number_format((int) ($summary['customers'] ?? 0)) ?></strong>
                        <span>Customers</span>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('saleForm');
    if (!form) return;

    const product = document.getElementById('product_id');
    const quantity = document.getElementById('quantity');
    const unitPrice = document.getElementById('unitPrice');
    const availableStock = document.getElementById('availableStock');
    const productHelp = document.getElementById('productHelp');
    const quantityHelp = document.getElementById('quantityHelp');
    const summaryProduct = document.getElementById('summaryProduct');
    const summaryUnitPrice = document.getElementById('summaryUnitPrice');
    const summaryQuantity = document.getElementById('summaryQuantity');
    const totalPrice = document.getElementById('totalPrice');
    const submitSale = document.getElementById('submitSale');
    const clearSale = document.getElementById('clearSale');

    const money = value => '₱' + Number(value || 0).toLocaleString('en-PH', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    function updateSalePreview() {
        const option = product.options[product.selectedIndex];
        const selected = option && option.value !== '';
        const name = selected ? option.dataset.name : '';
        const price = selected ? Number(option.dataset.price || 0) : 0;
        const stock = selected ? Number(option.dataset.stock || 0) : 0;
        const qty = Number(quantity.value || 0);
        const validQuantity = Number.isInteger(qty) && qty > 0;
        const validStock = selected && stock > 0 && validQuantity && qty <= stock;

        unitPrice.value = money(price);
        availableStock.value = selected ? stock : 0;
        summaryProduct.textContent = name || '—';
        summaryUnitPrice.textContent = money(price);
        summaryQuantity.textContent = String(qty);
        totalPrice.textContent = money(price * Math.max(0, qty));

        if (!selected) {
            productHelp.textContent = 'Choose a product from your inventory.';
            quantityHelp.textContent = 'Enter a quantity no greater than the available stock.';
        } else if (stock < 1) {
            productHelp.textContent = 'This item is currently out of stock.';
            quantityHelp.textContent = 'Choose another product with available stock.';
        } else if (!validQuantity) {
            productHelp.textContent = 'Available stock: ' + stock;
            quantityHelp.textContent = 'Enter a whole number greater than zero.';
        } else if (qty > stock) {
            productHelp.textContent = 'Available stock: ' + stock;
            quantityHelp.textContent = 'Insufficient stock. Only ' + stock + ' item(s) are available.';
        } else {
            productHelp.textContent = 'Available stock: ' + stock;
            quantityHelp.textContent = 'Quantity is within the available stock.';
        }

        submitSale.disabled = !validStock;
    }

    product.addEventListener('change', updateSalePreview);
    quantity.addEventListener('input', updateSalePreview);

    clearSale.addEventListener('click', function () {
        window.setTimeout(function () {
            quantity.value = '1';
            updateSalePreview();
        }, 0);
    });

    form.addEventListener('submit', function (event) {
        const option = product.options[product.selectedIndex];
        const stock = option && option.value ? Number(option.dataset.stock || 0) : 0;
        const qty = Number(quantity.value || 0);

        if (!option || !option.value || !Number.isInteger(qty) || qty < 1 || qty > stock) {
            event.preventDefault();
            updateSalePreview();
        }
    });

    updateSalePreview();
});
</script>

<?= $this->endSection() ?>
