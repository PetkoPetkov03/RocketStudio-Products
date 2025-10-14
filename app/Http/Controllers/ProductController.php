<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\ProductService;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function post_create(Request $request) {
        $p_name = $request->input('pname');
        $p_price = $request->input('pprice');
        $p_quantity = $request->input('pquantity');

        $response = $this->productService->createProduct($p_name, $p_price, $p_quantity);

        return redirect("/");
    }
    
    public function show_create(): View {
        return view("products.create");
    }
    
    public function show_index(): View {
        $products = $this->productService->fetchAllProducts();
        return view("products.index", ['products' => $products]);
    }
}
