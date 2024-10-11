<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\On;
use Illuminate\Contracts\View\View;

class ProductList extends Component
{
    public function render(): View
    {
        return view('livewire.admin.products.product-list', [
            'products' => Product::all(),
        ]);
    }

    #[On('refresh-list')]
    public function refresh() {}
}
