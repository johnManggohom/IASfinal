<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class CartCounter extends Component
{

    protected $listeners = ['cart_updated'=>'render'];

    public function render()
    {

        $cart_count =Cart::count(); 
        return view('livewire.cart-counter', compact('cart_count'));
    }
}
