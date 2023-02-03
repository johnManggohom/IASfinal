<x-admin-layout>


            {{-- <button x-data="{}" x-on:click="window.livewire.emitTo('custom-modal', 'show')">gaga</button> --}}

                <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
<div>
  
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

        <div class="table w-full p-2">
                   
             <div class="flex w-full">
                

                <div class="flex  justify-end w-full">
                    <div class="w-full"> <div class="flex justify-end p-2 space-x-4">
                    <a x-data="{}" x-on:click="window.livewire.emitTo('custom-modal', 'show')" class="w-14 flex items-center justify-center h-14 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas text-2xl fa-plus"></i></a>
                     
                </div></div>
                     
                </div>
             </div>

        
              

            

                    <table class="w-full border-separate border-spacing-y-3 ">
     
                        <thead class="border-b-4 border-dark-700 ">
                            <tr class=" border-b">
                            
                                <th class="p-2  cursor-pointer text-sm font-thin text-gray-500">
                                      <div class="flex space-x-14">
                                        <div>Expense</div>
                                         <span class="cursor-pointer" wire:click="sortBy('name','name')">
                                            <i class="fas fa-long-arrow-up"></i>
                                            <i class="fas fa-long-arrow-down"></i>
                                        </span>
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-sm font-thin text-gray-500">
                                      <div class="flex space-x-14">
                                        <div>Amount</div>
                                        <span class="cursor-pointer" wire:click="sortBy('name','dresser')">
                                            <i class="fas fa-long-arrow-up"></i>
                                            <i class="fas fa-long-arrow-down"></i>
                                        </span>
                                    </div>
                                </th>
                              
                                  <th class="p-2  cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex space-x-14">
                                        <div>Date</div>
                                        
                                         <span class="cursor-pointer" wire:click="sortBy('start_time','start_time')">
                                            <i class="fas fa-long-arrow-up"></i>
                                            <i class="fas fa-long-arrow-down"></i>
                                        </span>
                                    </div>
                                </th>
                              
                            </tr>
                        </thead>
                        <tbody> 
            
                         @foreach ($expenses as  $expense)
                                <tr class="bg-white text-left border-b text-sm text-gray-600 py-5">
                                <td class="p-3 ">{{  $expense->expense_type}}</td>
                                <td class="p-3 ">{{  $expense->amount}}</td>
                                  <td class="p-3 ">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $expense->created_at)->format('M d Y g:i A')}}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                  
            </div>
        </div>
    </div>
</div>
 </div>
        </div>
    </div>


</x-admin-layout>
