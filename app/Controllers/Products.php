<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    private function requireStaff()
    {
        if (session('role') !== 'staff') {
            return redirect()
                ->to('/products')
                ->with('error', 'You are not authorized to manage products.');
        }

        return null;
    }

    public function index()
    {
        $products = $this->productModel
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('products/index', [
            'title' => 'Products | The Daily Fit',
            'pageTitle' => 'Products',
            'activePage' => 'products',
            'products' => $products,
        ]);
    }

    public function new()
    {
        if ($response = $this->requireStaff()) {
            return $response;
        }

        return view('products/new', [
            'title' => 'Add Product | The Daily Fit',
            'pageTitle' => 'Add Product',
            'activePage' => 'products',
        ]);
    }

    public function create()
    {
        if ($response = $this->requireStaff()) {
            return $response;
        }

        $rules = [
            'name' => 'required|max_length[255]',
            'category' => 'required|max_length[100]',
            'price' => 'required|decimal|greater_than_equal_to[0]',
            'stock_quantity' => 'required|is_natural',
            'image' => 'permit_empty|max_length[2048]|valid_url_strict',
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $image = trim((string) $this->request->getPost('image'));

        $saved = $this->productModel->insert([
            'name' => trim((string) $this->request->getPost('name')),
            'category' => trim((string) $this->request->getPost('category')),
            'price' => (float) $this->request->getPost('price'),
            'stock_quantity' => (int) $this->request->getPost('stock_quantity'),
            'image' => $image !== '' ? $image : null,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if ($saved === false) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'The product could not be saved.');
        }

        return redirect()
            ->to('/products')
            ->with('success', 'Product added successfully.');
    }

    public function addToSales($id)
    {
        if ($response = $this->requireStaff()) {
            return $response;
        }

        $product = $this->productModel->find((int) $id);

        if (! $product) {
            return redirect()
                ->to('/products')
                ->with('error', 'Product not found in the database.');
        }

        if ((int) $product['stock_quantity'] < 1) {
            return redirect()
                ->to('/products')
                ->with('error', 'This product is out of stock.');
        }

        return redirect()->to(
            site_url('sales') . '?product_id=' . (int) $product['id']
        );
    }
}
