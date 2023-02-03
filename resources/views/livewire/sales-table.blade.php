<div>
  
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

        <div class="table w-full p-2">


           
                   
             <div class="flex justify-end w-full">
                
                
                <div class="flex">
                    <div class="w-full"> <div class="flex justify-end p-2 space-x-4">
                    <a href="{{ route('admin.appointment.create') }}" class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas text-lg fa-plus"></i></a>
                      <button wire:click="export()" class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas fa-print text-lg"></i></button>
                </div></div>
                     
                </div>
             </div>
 <div class="flex w-full space-x-5  item-center">
  

                        <div class="flex items-center justify-center text-sm space-x-2">
                              <div>From:</div>
                             <input type="datetime-local" id="start_time" name="start_time" wire:model="from"
                        value=""
                        class="block text-sm appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />

                        </div>
                        
                    <div class="flex items-center justify-center  space-x-2">
                                <div class="text-sm">To:</div>
                        <input type="datetime-local" id="start_time" name="start_time" wire:model.lazy="to"
                        value=""
                        class="block text-sm appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                    </div>
                    

                                 
                            <select wire:model="status"  class="block text-sm appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            
                                         <option value=""> Day</option>
                                        <option value="weeks"> weeks</option>
                                         <option value="months">months</option>
                                         
                                    </select>
                                    {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div> --}}

                      
            </div>

            <div class="mt-3">
                        <button wire:click="month('month')" class="p-2 rounded-2xl bg-blue-500 text-white text-sm">This Month</button>
                        <button wire:click="month('week')" class="p-2 bg-blue-500 rounded-2xl text-white text-sm"> This Week</button>
                        <button wire:click="month('day')" class="p-2 bg-blue-500 rounded-2xl text-white text-sm">This Day</button>

                        <button wire:click="remove()" class=" p-2 bg-blue-500 rounded-2xl text-white text-sm">Reset Filters</button></div>
        
              
<div class="flex w-1/2">
                  


            <div class="flex w-full ">
                
                
                {{-- <select wire:model="orderBy" class="block appearance-none  bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            
                        <option value="user_id">Client</option>
                        <option value="dresser_id">Dresser</option>
                        <option value="appointment_price">Sign Up Date</option>
                        <option value="start_time">Time</option>
              </select>

               <div class="w-1/6 relative mx-1">
                        <select wire:model="orderAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            <option value="1">Ascending</option>
                            <option value="0">Descending</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>  
             </div> --}}

    


                
                </div>

            
            </div>
                

            
          {{-- <div class="mt-1">
                                        <input type="datetime-local" wire:model.debounce.300ms="search" id="start_time" name="start_time"
                                            value=""
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div> --}}
                                      <div class="text-center mt-3 font-bold">Sales</div>
                    <table class="w-full border-separate border-spacing-y-1 ">
     
                        <thead class="border-b-4 border-dark-700 ">
                            <tr class=" border-b">
                            
                                <th class="p-1  cursor-pointer text-sm font-thin text-gray-500  text-xs ">
                                    <div class="flex  justify-center space-x-3">

                                        <div class="">Date </div>
                                         <span class="cursor-pointer" wire:click="sorting('date')">
                                            <i class="fas fa-long-arrow-up {{ $sortColumnName === 'date'  && $sortDirection === true ? '' : 'text-muted'}}"></i>
                                            <i class="fas fa-long-arrow-down  {{ $sortColumnName === 'date'  && $sortDirection === false ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </div>
                                </th>
                                <th class="p-1  cursor-pointer text-sm font-thin text-gray-500 text-xs ">
                                    <div class="flex items-center justify-center">
                                      Gross Sales
                                    </div>
                                </th>
                                <th class="p-1  cursor-pointer text-sm font-thin text-gray-500 text-xs">
                                    <div class="flex items-center justify-center">
                                        Net Sales
                                    </div>
                                </th>
                                  <th class="p-1  cursor-pointer text-sm font-thin text-gray-500 text-xs">
                                    <div class="flex items-center justify-around">
                                        Commission
                                         
                                    </div>
                                </th>
                                  <th class="p-1 cursor-pointer text-sm font-thin text-gray-500 text-xs">
                                    <div class="flex items-center justify-center">
                                        Sales Return
                                    </div>
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>

              @foreach ($transactions  as  $transaction)
                         <tr class="bg-white text-center border-b text-sm text-gray-600 py-3 text-xs">
                                
                                   <td class="p-2">{{ $transaction['date']}}</td>
                                  <td class="p-2">{{   $transaction['total']  + (  $transaction['total'] * .12) }}</td>
                                   <td class="p-2">{{   $transaction['total'] }}</td>
                                    <td class="p-2">{{   $transaction['wage']}}</td>
                                    <td class="p-2">{{   $transaction['total']- $transaction['wage']}}</td>
                                  
                                 {{-- @foreach ($expense as $exp )

                                 <td>{{ $exp['expense'] }}</td>
                                     
                                 @endforeach --}}
                                </tr>
                                           
                            @endforeach
                       
                        </tbody>
                    </table>
                    

                     {{ $transactions->links() }}
                    
                    <div class="w-full h-0.5 bg-gray-200 my-2"></div>
                    <div class="text-center  font-bold">Expenses</div>
                    <table class="w-full border-separate border-spacing-y-1 ">
     
                        <thead class="border-b-4 border-dark-700 ">
                            <tr class=" border-b">
                            
                                <th class="p-1  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex  justify-center space-x-3">

                                        <div>Date </div>
                                         <span class="cursor-pointer" wire:click="sorting('date')">
                                            <i class="fas fa-long-arrow-up {{ $sortColumnName === 'date'  && $sortDirection === true ? '' : 'text-muted'}}"></i>
                                            <i class="fas fa-long-arrow-down  {{ $sortColumnName === 'date'  && $sortDirection === false ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </div>
                                </th>
                                <th class="p-1  cursor-pointer text-xs font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                     Expense
                                    </div>
                                </th>        
                            </tr>
                        </thead>
                        <tbody>

              @foreach ($expense  as  $exp)
                         <tr class="bg-white text-center border-b text-sm text-gray-600 text-xs">
                                
                                   <td class="p-2">{{ $exp['date']}}</td>
                                  <td class="p-2">{{   $exp['expense'] }}</td>
                                   
                                  
                                 {{-- @foreach ($expense as $exp )

                                 <td>{{ $exp['expense'] }}</td>
                                     
                                 @endforeach --}}
                                </tr>
                                           
                            @endforeach
                        <tr class=" text-end border-b  text-gray-600"><td class="p-1" colspan="2"><div class="flex justify-end space-x-3 text-sm font-bold"><div>Gross Sale:</div><div>{{ $total + ($total * .12) }}</div></div></td></tr>
                         <tr class="text-end border-b text-gray-600"><td class="px-1" colspan="2"><div class="flex justify-end space-x-3 text-sm font-bold"><div>Net Sale:</div><div>{{ $total  }}</div></div></td></tr>
                          <tr class="text-end border-b text-gray-600"><td class="px-1" colspan="2"><div class="flex justify-end space-x-3 text-sm font-bold"><div>Commission:</div><div>{{ $totalWage }}</div></div></td></tr> 
                              <tr class="text-end border-b text-gray-600"><td class="px-1" colspan="2"><div class="flex justify-end space-x-3 text-sm font-bold"><div>Expenses:</div><div>{{ $totalExpense }}</div></div></td></tr>       
                         <tr class="text-end border-b text-gray-600"><td class="px-1" colspan="2"><div class="flex justify-end space-x-3 text-base font-sm text-orange-500"><div>Total Sales:</div><div>{{ $total-$totalWage-$totalExpense }}</div></div></td></tr>
                        {{-- <tr><td colspan="5"> /td></tr> --}}
                        </tbody>
                    </table>


                </div>
                  
            </div>
        </div>
    </div>
</div>
