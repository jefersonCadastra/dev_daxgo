<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function all()
    {
        return $this->product->all();
    }

    public function create($data)
    {
        return $this->product->create($data);
    }

    public function update($data, $id)
    {
        return $this->product->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->product->find($id)->delete();
    }
}
