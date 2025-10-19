<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\ProductService;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function post_create(StoreProductRequest $request) {
        $validated = $request->validated();
        
        $response = $this->productService->createProduct($validated['pname'], $validated['pprice'], $validated['pquantity']);

        return redirect('/')->with($response->status->value, $response);
    }
    
    public function show_create(): View {
        return view("products.create");
    }

    public function buy_product(UpdateProductRequest $request) {
        $validated = $request->validated();
        
        $response = $this->productService->buyOrDecreseQuantityOfProduct($validated['operation'], $validated['pname'], $validated['pquantity']);
        
        return redirect('/products/buy')->with($response->status->value, $response);
    }

    public function show_buyform_product(): View {
        return view('products.buyform');
    }
    
    public function display_product(Request $request, string $id) {
        $idparsed = intval($id);
        $product = $this->productService->getProductById($idparsed);
        
        return view('products.display', ['product' => $product]);
    }
    
    public function show_index(): View {
        $products = $this->productService->fetchAllProducts();
        
        return view('products.index', ['products' => $products]);
    }

    public function show_overview(): View {
        $response = $this->productService->generateStockPage();

        return view('products.overview', ['response' => $response]);
    }
}
