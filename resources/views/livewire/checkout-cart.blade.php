<div>
<div class=" h-full shadow-md bg-white px-1">
         <livewire:cart-counter>
  <ul class="relative  mt-20 m-5">

    <li class="relative">
<table class="min-w-full">
          <thead class="border-b">
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-4 text-left font-bold text-center">
                Product Details
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-4 text-left font-bold text-center">
                Quantity    
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-4 text-left font-bold text-center">
                Price
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-3 py-4 text-left font-bold ">
                Total Price
              </th>
            </tr>
          </thead>
        @forelse ($carts as $cart )
            <tr class="border-b text-center">
                  <td>{{ $cart->name}}</td>
               <td><i class="fas fa-angle-down" wire:click='increaseQuantity({{ $cart->id }})'></i>{{ $cart->quantity }}<i class="fas fa-angle-up" wire:click='decreaseQuantity({{ $cart->id}},{{  $cart->quantity}})'></i></td>
              <td>{{ $cart->price }}</td> 
              <td>{{ $cart->total }}</td>
              <td><i class="fas fa-times" wire:click='removeToCart({{ $cart->id }})'></i></td>
            </tr>
            
          
            
        @empty
         empty 
        @endforelse
 </tbody>
        </table>
        
              @if ( $totalCartWithoutTax )
                 {{ $totalCartWithoutTax}}  
              @endif
       
              {{  $commision }}
 <select id="permission" name="dresser_id" wire:model="dresser_id" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Choose hair dresser</option>
                 @foreach ($hairDressers as $id=>$name)
                                       <option value="{{ $id }}">{{ $name }}</option>
                   @endforeach

                                           </select>
              <input type="number" wire:model="email" name="" id="">

         <button wire:click.prevent='checkout()'  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Add to cart</button>
        

             <div>{{ $successMessage }}</div>

       
    </li>
  </ul>
</div>
</div>
