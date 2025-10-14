<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'price', 'quantity'];
    /**
     * integer index
     * @var int
     */
    protected int $id;

    /**
     * product name
     * @var string
    */
    protected string $name;

    /**
     * product price
     * @var float
    */
    protected float $price;

    /**
     * product quantity
     * @var int
    */
    protected int $quantity;
}
