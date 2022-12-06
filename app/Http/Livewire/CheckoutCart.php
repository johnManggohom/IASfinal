<?php

namespace App\Http\Livewire;

use App\Helpers\Helper;
use App\Models\Cart;
use App\Models\Services;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CheckoutCart extends Component
{

public $email;
    public $isDisabled;
    public $totalCartWithoutTax;
    public $dresser_id;
    public $commision;
       protected $listeners = ['cart_updated'=>'render'];

    public $successMessage = '';
    public function render()


    {

        $hairDressers =User::whereHas("roles", function($q){ $q->where("name", "cashier")->where('name', '!=' , 'admin'); })->get()->pluck('name', 'id');

        $carts = Cart::with('service')->get()->map(function (Cart $items){
            return (object)[
                'id'=> $items->service_id,
                'name' => $items->service->name,
                'price' => $items->service->prices,
                'quantity' => $items->quantity,
                'total' => ($items->quantity * $items->service->prices)

            ];
        });
   $this->totalCartWithoutTax = $carts->sum('total');
     

        return view('livewire.checkout-cart', compact('carts', 'hairDressers'));
    }

      public function increaseQuantity($service_id){
          $cart = Cart::where('service_id', $service_id)->first();
          if($cart){
             $cart->update(['quantity'=> $cart->quantity + 1]);
          }

    }



          public function decreaseQuantity($service_id, $quantity){
          if($quantity != 1){
              Cart::where('service_id', $service_id)->update(['quantity'=> $quantity-1]);
          }else{
              Cart::where('service_id', $service_id)->delete();
          }

                 $this->emit('cart_updated');

    }

    public function removeToCart($service_id){
        Cart::where('service_id', $service_id)->delete();
            $this->emit('cart_updated');
    }

     public function checkout(){
        $cart = Cart::with('service')->get();
       


        if($cart->count() >= 1){
        try{
        DB::transaction(function() use($cart){
        if($this->totalCartWithoutTax < $this->email && $this->dresser_id != ''){
            foreach ($cart  as $cartt) {
            $transaction_id = Helper::IDGenerator(new Transaction, 'invoice_number', 5, 'TRN');

            $order = Transaction::create([
            'dresser_id' => 1,
            'service_id' => $cartt->service_id,
            'invoice_number' => $transaction_id,
            'appointment_price'=>0,
            'start_time'=> Carbon::now(),
            'end_time'=>Carbon::now()->addHour()]
        );


        $commision = ($cartt->service->comission / 100) ;
            foreach($cart as $cartProduct){
      
            $order->services()->attach($cartProduct->service_id , [
                'quantity' => $cartProduct->quantity,
                'price' => $cartProduct->price
            ]);

            $order->increment('appointment_price',  $cartProduct->quantity  *  $cartProduct->price);
        }
            
        Wage::create([
            'user_id' => $this->dresser_id, 
            'service_id'=> $cartt->service_id,
            'invoice_number' => $transaction_id,
            'commission'=>  $cartProduct->quantity  *  $cartProduct->price  * $commision

        ]);
    }
        DB::table('cart')->delete();

         $this->email = 0;

        $this->successMessage = 'succesful';
        }else{
              $this->successMessage = 'error. not enough';
        }
      
        });
        }catch(\Exception $exception){
            $this->successMessage = 'error. try again'. $exception->getMessage ();
        }
        }else{
            $this->successMessage = 'error. empty cart';
        }


       
    }

    
}
