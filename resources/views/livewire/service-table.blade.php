<div class="flex-1 px-5 mt-32 ">

    <div class="">
                    <table class="w-full border bg-white p-11 rounded-lg overflow-hidden" >
                        <thead class="">
                            <tr class="border-b">
                            
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-dark-500">
                                    <div class="flex items-center justify-center text-base font-bold">
                                        Service Name
                                    </div>
                                </th>
                                 <th class="p-2 border-r cursor-pointer text-sm font-thin text-dark-500">
                                    <div class="flex items-center justify-center text-base font-bold">
                                        Price
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-dark-500">
                                    <div class="flex items-center justify-center text-base font-bold">
                                        Add
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                            @forelse ($services as  $service)
                                <tr class=" text-center  text-sm text-gray-600 hover:bg-cyan-50">
                                <td class="p-2">{{  $service->name}}</td>
                                 <td class="p-2">  ${{ ($service->prices) }}</td>
                                
                               <td class="px-6 py-4 whitespace-no-wrap border-gray-500 text-sm leading-5">
                            
                                <a wire:click.prevent='addToCart({{ $service->id }})' href="" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Avail</a>

                    
            </td>
        </tr> 
        
    @empty 
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5" colspan="3">No
                products found.
            </td>
        </tr> 
    @endforelse
    </tbody>
</table>
</div>
</div>
