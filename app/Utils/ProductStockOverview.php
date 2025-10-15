<?php
namespace App\Utils;

use Illuminate\Database\Eloquent\Collection;

class ProductStockOverview {
    private Collection $products;
    private array $overall_price;

    private float $stock_value = 0;

    public function __construct(Collection $products) {
        $this->products = $products;

        foreach ($products as $product) {
            $this->overall_price[$product->name] = $product->price * $product->quantity;

            $this->stock_value += $this->overall_price[$product->name];
        }
    }

    public function get_products(): Collection {
        return $this->products;
    }

    public function get_overall_price(string $name): float {
        return $this->overall_price[$name];
    }

    public function get_stock_value() {
        return $this->stock_value;
    }
}
