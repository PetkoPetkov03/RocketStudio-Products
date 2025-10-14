<?php

namespace App\Services;

use App\Models\Product;
use App\Utils\ResponseBody;

class ProductService {
    public function fetchAllProducts() {
        return Product::all();
    }

    public function createProduct(string $p_name, float $p_price, int $p_quantity) {
        try {
            $product = Product::create(['name'=>$p_name, 'price'=>$p_price, 'quantity'=>$p_quantity]); 
            if(!$product && !product->exists) {
                return new ResponseBody(true, null, 'product already exists');
            }

            return new ResponseBody(false, $product);
            
        }catch(\Exception $e) {
            echo $e->getMessage();
            \Log::error('Product creation failed!' . $e->getMessage());
        }
    }
}
