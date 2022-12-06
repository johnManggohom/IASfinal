<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Services;
use Livewire\Component;

class ServiceTable extends Component
{     

    // public  $services;

    public $cartProducts = [];

    // public function mount(){

    //     $this->services = Services::all();
    //     foreach($this->services as $service){
    //         $this->quantity[$service->id]= 1;
    //     }


    // }
    public function render()
    {
        
    // $cart = Cart::all();
    // $services= Services::all();
        return view('livewire.service-table', ['services'=>Services::all()]);
    }


    public function addToCart($service_id){
        $cart = Cart::where('service_id', $service_id)->first();
        $service = Services::where('id', $service_id)->first();
       
        if(!$cart){

            Cart::create(['service_id'=> $service->id, 'price' => $service->prices, 'quantity'=>1]);
        }else{
            $cart->update(['quantity'=> $cart->quantity + 1]);
        }
        
        $this->emit('cart_updated');
    }

  

   
    
}
