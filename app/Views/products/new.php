
<?= $this->extend('layouts/app') ?>
<?= $this->section('content') ?>

<style>
.product-form-page {
    max-width: 850px;
    margin: 0 auto;
    padding: 12px 0 40px;
    color: #17243b;
}

.product-form-heading {
    margin-bottom: 28px;
}

.product-form-heading h1 {
    margin: 0 0 8px;
    font-size: 30px;
    font-weight: 700;
}

.product-form-heading p {
    margin: 0;
    color: #687386;
}

.product-form-card {
    padding: 30px;
    background: #fff;
    border: 1px solid #e6e9ef;
    border-radius: 14px;
    box-shadow: 0 8px 24px rgba(23, 36, 59, 0.05);
}

.product-form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 22px;
}

.product-form-field {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.product-form-field.full-width {
    grid-column: 1 / -1;
}

.product-form-field label {
    font-size: 14px;
    font-weight: 600;
}

.product-form-field input,
.product-form-field select {
    width: 100%;
    box-sizing: border-box;
    padding: 12px 14px;
    border: 1px solid #d8dee8;
    border-radius: 8px;
    font: inherit;
    background: #fff;
    color: #17243b;
}

.product-form-field input:focus,
.product-form-field select:focus {
    outline: 2px solid #d5d7da;
    outline-offset: 1px;
}

.product-form-help {
    color: #687386;
    font-size: 12px;
}

.product-form-actions {
    display: flex;
    justify-content: flex-end;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 28px;
}

.product-form-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 12px 20px;
    border: 1px solid #d8dadd;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    cursor: pointer;
    font: inherit;
}

.product-form-button.primary {
    background: #eeeeeb;
    color: #292929;
    border-color: #e0e0dc;
}

.product-form-button.primary:hover {
    background: #e2e2de;
}

.product-form-button.secondary {
    background: #fff;
    color: #292929;
}

.product-form-errors {
    margin-bottom: 20px;
    padding: 14px 18px;
    border-radius: 8px;
    background: #fff1f0;
    color: #a12622;
}

@media (max-width: 600px) {
    .product-form-grid {
        grid-template-columns: 1fr;
    }

    .product-form-field.full-width {
        grid-column: auto;
    }

    .product-form-card {
        padding: 20px;
    }
}
</style>

<div class="product-form-page">
    <div class="product-form-heading">
        <h1>Add Product</h1>
        <p>Add a clothing item to The Daily Fit inventory.</p>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="product-form-errors">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <?php if (! empty($errors)): ?>
        <div class="product-form-errors">
            <strong>Please correct the following:</strong>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="product-form-card">
        <form action="<?= site_url('products') ?>" method="post">
            <?= csrf_field() ?>

            <div class="product-form-grid">
                <div class="product-form-field full-width">
                    <label for="name">Product Name *</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="<?= esc(old('name', ''), 'attr') ?>"
                        maxlength="255"
                        required
                    >
                </div>

                <div class="product-form-field full-width">
                    <label for="category">Category *</label>
                    <?php
                    $categories = [
                        'Outerwear',
                        'T-shirts, Sweats & Fleece',
                        'Shirts, Blouses & Polo Shirts',
                        'Sweaters & Knitwear',
                        'Bottoms',
                        'Dresses & Skirts',
                    ];
                    $selectedCategory = old('category', 'Outerwear');
                    ?>
                    <select id="category" name="category" required>
                        <?php foreach ($categories as $category): ?>
                            <option
                                value="<?= esc($category, 'attr') ?>"
                                <?= $selectedCategory === $category ? 'selected' : '' ?>
                            >
                                <?= esc($category) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="product-form-field">
                    <label for="price">Price (₱) *</label>
                    <input
                        type="number"
                        id="price"
                        name="price"
                        min="0"
                        step="0.01"
                        value="<?= esc(old('price', ''), 'attr') ?>"
                        required
                    >
                </div>

                <div class="product-form-field">
                    <label for="stock_quantity">Stock Quantity *</label>
                    <input
                        type="number"
                        id="stock_quantity"
                        name="stock_quantity"
                        min="0"
                        step="1"
                        value="<?= esc(old('stock_quantity', '0'), 'attr') ?>"
                        required
                    >
                </div>

                <div class="product-form-field full-width">
                    <label for="image">Product Image URL</label>
                    <input
                        type="url"
                        id="image"
                        name="image"
                        value="<?= esc(old('image', ''), 'attr') ?>"
                        maxlength="2048"
                        placeholder="https://example.com/product.jpg"
                    >
                    <span class="product-form-help">
                        Optional. Enter a direct image URL.
                    </span>
                </div>
            </div>

            <div class="product-form-actions">
                <a
                    href="<?= site_url('products') ?>"
                    class="product-form-button secondary"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="product-form-button primary"
                >
                    Save Product
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
