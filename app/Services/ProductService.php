<?php

namespace App\Services;

use App\Models\Product;
use App\Utils\ResponseBody;
use App\Utils\ProductStockOverview;
use App\Utils\ResponseType;

class ProductService {
    public function fetchAllProducts() {
        return Product::all();
    }

    private function findProductByName(string $name): ?Product {
        return Product::firstWhere(['name'=>$name]);
    }

    public function getProductById(int $id) {
        return Product::firstWhere(['id'=>$id]); 
    }

    public function createProduct(string $p_name, float $p_price, int $p_quantity) {
        try {
            $result = Product::updateOrInsert(['name'=>$p_name], fn ($exists) => $exists ? [
                'price' => $p_price,
                'quantity' => ($this->findProductByName($p_name)->quantity + $p_quantity),
            ] : [
                'price' => $p_price,
                'quantity' => $p_quantity,
            ]);

            if(!$result) {
                return new ResponseBody(errorMessage: 'Service was unable to find or create product');
            }

            $message = 'Successfully created product ' . $p_name;
            return new ResponseBody(ResponseType::SUCCESS, successMessage: $message);
            
        }catch(\Exception $e) {
            \Log::error('Product creation failed!' . $e->getMessage());
            return new ResponseBody(errorMessage: $e->getMessage());
        }
    }

    public function buyOrDecreseQuantityOfProduct(string $operation, string $p_name, int $quantity) {
        try {
            $product = $this->findProductByName($p_name);

            if(!$product) {
                return new ResponseBody(errorMessage: 'Product dosen\'t exist');
            }

            if($product->quantity < $quantity) {
                return new ResponseBody(errorMessage: 'There is not enough stock');
            }
            
            $product->quantity -= $quantity;

            $product->save();

            return new ResponseBody(ResponseType::SUCCESS, successMessage: $operation . ' successfull');
            
        }catch(\Exception $e) {
            \Log::error('Product quantity change failed! ' . $e->getMessage());
            return new ResponseBody(errorMessage: $e->getMessage());
        }
    }

    public function generateStockPage() {
        try {
            $products = $this->fetchAllProducts();

            $overview = new ProductStockOverview($products);

            return new ResponseBody(ResponseType::SUCCESS, responseBody: $overview);
            
        }catch(\Exception $e) {
            \Log::error('Stock Page generation failed! ' . $e->getMessage());
            return new ResponseBody(errorMessage: $e->getMessage());
        }
    }
}
