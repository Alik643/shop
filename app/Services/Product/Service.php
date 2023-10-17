<?php
namespace App\Services\Product;

use App\Models\Product;

class Service
{
    public function store($data)
    {
        return Product::create($data);
    }
}
