<?php
namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\SaleModel;

class Sales extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $today = date('Y-m-d');


$products = (new ProductModel())
    ->orderBy('name', 'ASC')
    ->findAll();

$selectedProductId = (int) $this->request->getGet('product_id');

if ($selectedProductId > 0) {
    $productExists = false;

    foreach ($products as $product) {
        if ((int) $product['id'] === $selectedProductId) {
            $productExists = true;
            break;
        }
    }

    if (! $productExists) {
        $selectedProductId = 0;
    }
}


        $customers = (new CustomerModel())
            ->orderBy('full_name', 'ASC')
            ->findAll();

        $recentSales = $db->table('sales s')
            ->select(
                's.id, s.quantity, s.total_price, s.created_at,
                 p.name AS product_name, p.image AS product_image,
                 c.full_name AS customer_name'
            )
            ->join('products p', 'p.id = s.product_id')
            ->join('customers c', 'c.id = s.customer_id', 'left')
            ->orderBy('s.created_at', 'DESC')
            ->orderBy('s.id', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        $summary = $db->table('sales')
            ->select(
                'COUNT(id) AS total_sales,
                 COALESCE(SUM(quantity), 0) AS items_sold,
                 COALESCE(SUM(total_price), 0) AS total_revenue,
                 COUNT(DISTINCT customer_id) AS customers'
            )
            ->where('DATE(created_at)', $today)
            ->get()
            ->getRowArray();

        return view('sales/index', [
            'pageTitle' => 'Sales',
            'activePage' => 'sales',
            'products' => $products,
            'customers' => $customers,
            'recentSales' => $recentSales,
            'summary' => $summary,
        ]);
    }

    public function create()
    {
        $rules = [
            'product_id' => 'required|is_natural_no_zero',
            'customer_id' => 'permit_empty|is_natural_no_zero',
            'quantity' => 'required|is_natural_no_zero',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to('/sales')
                ->withInput()
                ->with('error', 'Please select a product and enter a valid quantity.');
        }

        $productId = (int) $this->request->getPost('product_id');
        $customerInput = $this->request->getPost('customer_id');
        $customerId = ($customerInput === '' || $customerInput === null)
            ? null
            : (int) $customerInput;
        $quantity = (int) $this->request->getPost('quantity');
        $staffId = (int) session('user_id');

        if ($staffId < 1) {
            return redirect()->to('/login')
                ->with('error', 'Please sign in again to record a sale.');
        }

        $db = \Config\Database::connect();
        $db->transBegin();

        try {
            $product = $db->query(
                'SELECT id, name, price, stock_quantity
                 FROM products
                 WHERE id = ?
                 FOR UPDATE',
                [$productId]
            )->getRowArray();

            if (! $product) {
                $db->transRollback();

                return redirect()->to('/sales')
                    ->withInput()
                    ->with('error', 'The selected product was not found.');
            }

            if ($customerId !== null &&
                ! (new CustomerModel())->find($customerId)) {
                $db->transRollback();

                return redirect()->to('/sales')
                    ->withInput()
                    ->with('error', 'The selected customer was not found.');
            }

            $availableStock = (int) $product['stock_quantity'];

            if ($availableStock < 1 || $quantity > $availableStock) {
                $db->transRollback();

                return redirect()->to('/sales')
                    ->withInput()
                    ->with(
                        'error',
                        $availableStock < 1
                            ? 'This product is out of stock.'
                            : "Only {$availableStock} item(s) are available for {$product['name']}."
                    );
            }

            $staffExists = $db->table('users')
                ->where('id', $staffId)
                ->countAllResults() > 0;

            if (! $staffExists) {
                $db->transRollback();

                return redirect()->to('/login')
                    ->with('error', 'Your staff account could not be verified. Please sign in again.');
            }

            $totalPrice = round((float) $product['price'] * $quantity, 2);

            $saleModel = new SaleModel();
            $saleModel->insert([
                'product_id' => $productId,
                'customer_id' => $customerId,
                'sold_by' => $staffId,
                'quantity' => $quantity,
                'total_price' => $totalPrice,
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            if (! $saleModel->getInsertID()) {
                throw new \RuntimeException('The sale record could not be created.');
            }

            $db->table('products')
                ->where('id', $productId)
                ->update([
                    'stock_quantity' => $availableStock - $quantity,
                ]);

            if ($db->transStatus() === false) {
                throw new \RuntimeException('The sale transaction failed.');
            }

            $db->transCommit();

            return redirect()->to('/sales')
                ->with('success', 'Sale recorded successfully. Total: ₱' . number_format($totalPrice, 2));
        } catch (\Throwable $e) {
            $db->transRollback();

            log_message('error', 'Sales transaction failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            return redirect()->to('/sales')
                ->withInput()
                ->with('error', 'The sale could not be recorded. Please check your database and try again.');
        }
    }

    public function history()
    {
        $db = \Config\Database::connect();

        $sales = $db->table('sales s')
            ->select(
                's.id, s.quantity, s.total_price, s.created_at,
                 p.name AS product_name,
                 c.full_name AS customer_name,
                 u.full_name AS staff_name'
            )
            ->join('products p', 'p.id = s.product_id')
            ->join('customers c', 'c.id = s.customer_id', 'left')
            ->join('users u', 'u.id = s.sold_by')
            ->orderBy('s.created_at', 'DESC')
            ->orderBy('s.id', 'DESC')
            ->get()
            ->getResultArray();

        return view('sales/history', [
            'pageTitle' => 'Sales History',
            'activePage' => 'sales',
            'sales' => $sales,
        ]);
    }
}
