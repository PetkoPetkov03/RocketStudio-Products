<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\ProductService;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function post_create(StoreProductRequest $request) {
        $validated = $request->validated();
        
        $response = $this->productService->createProduct($validated['pname'], $validated['pprice'], $validated['pquantity']);

        if($response->error) {
            return redirect('/')->with('error', $response);
        }
        return redirect('/')->with('success', $response);
    }
    
    public function show_create(): View {
        return view("products.create");
    }

    public function buy_product(StoreProductRequest $request) {
        $validated = $request->validated();
        
        $response = $this->productService->buyOrDecreseQuantityOfProduct($validated['operation'], $validated['pname'], $validated['pquantity']);

        if($response->error) {
            return redirect('/products/buy')->with('error', $response);
        }
        
        return redirect('/products/buy')->with('success', $response);
    }

    public function show_buyform_product(): View {
        return view('products.buyform');
    }
    
    public function display_product(Request $request, int $id) {
        $product = $this->productService->getProductById($id);
        
        return view('products.display', ['product' => $product]);
    }
    
    public function show_index(): View {
        $products = $this->productService->fetchAllProducts();
        
        return view("products.index", ['products' => $products]);
    }

    public function show_overview(): View {
        $response = $this->productService->generateStockPage();

        return view('products.overview', ['response' => $response]);
    }
}
