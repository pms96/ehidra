<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $products;
    public $name;
    public $description;
    public $price;
    public $selectedProduct;

    public function render()
    {
        $this->products = Product::all();

        return view('livewire.products');
    }

    public function createProduct()
    {
        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        $this->resetInputs();
    }

    public function editProduct(Product $product)
    {
        $this->selectedProduct = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
    }

    public function updateProduct()
    {
        $this->selectedProduct->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        $this->resetInputs();
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
    }

    private function resetInputs()
    {
        $this->name = '';
        $this->description = '';
        $this->price = null;
        $this->selectedProduct = null;
    }
}
