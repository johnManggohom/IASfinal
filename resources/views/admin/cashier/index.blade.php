<x-admin-layout>
    

    <div class="w-full flex space-between" >
 
                @if (session('message'))
                <div>{{ session('message') }}</div>
                    
                @endif

              


                            <livewire:service-table>
                        <livewire:checkout-cart>

            </div>

</x-admin-layout>
