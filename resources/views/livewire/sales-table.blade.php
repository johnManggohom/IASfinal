<div>
  
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">

                 
                   

             
        <div class="table w-full p-2">


           
                   
             <div class="flex w-full">
                
                <div class="flex w-1/2  items-center">
                      <div class="w-full">
                    <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                        <button class="btn inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                        </svg>
                    </button>
                    <input type="search" wire:model.debounce.300ms="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search Name, Service, Price" aria-label="Search" aria-describedby="button-addon2">
                    
                    </div>
                </div>
                </div>

                <div class="flex  justify-end w-1/2">
                    <div class="w-full"> <div class="flex justify-end p-2 space-x-4">
                    <a href="{{ route('admin.appointment.create') }}" class="w-14 flex items-center justify-center h-14 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas text-2xl fa-plus"></i></a>
                      <button wire:click="export()" class="w-14 flex items-center justify-center h-14 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas fa-print text-2xl"></i></button>
                </div></div>
                     
                </div>
             </div>
 <div class="flex w-full space-x-5  item-center">
  

                        <div class="flex items-center justify-center space-x-2">
                              <div>From:</div>
                             <input type="datetime-local" id="start_time" name="start_time" wire:model="from"
                        value=""
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />

                        </div>
                        
                    <div class="flex items-center justify-center space-x-2">
                                <div>To:</div>
                        <input type="datetime-local" id="start_time" name="start_time" wire:model.lazy="to"
                        value=""
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                    </div>
                    

                                 
                            <select wire:model="status"  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            
                                         <option value=""> Day</option>
                                        <option value="weeks"> weeks</option>
                                         <option value="months">months</option>
                                         
                                    </select>
                                    {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div> --}}

                        <button wire:click="month() class="p-2 bg-blue-500 text-white">This Month</button>
                      
            </div>
        
              
<div class="flex w-1/2">
                  


            <div class="flex w-full mb-10">
                
                
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
                    <table class="w-full border-separate border-spacing-y-3 ">
     
                        <thead class="border-b-4 border-dark-700 ">
                            <tr class=" border-b">
                            
                                <th class="p-2  cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-around">

                                        <div>Date </div>
                                         <span class="cursor-pointer" wire:click="sorting('date')">
                                            <i class="fas fa-long-arrow-up {{ $sortColumnName === 'date'  && $sortDirection === true ? '' : 'text-muted'}}"></i>
                                            <i class="fas fa-long-arrow-down  {{ $sortColumnName === 'date'  && $sortDirection === false ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                         
                                        Hair Dresser
                                      
                                    </div>
                                </th>
                                <th class="p-2  cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                      Service
                                    </div>
                                </th>
                                <th class="p-2  cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Price
                                    </div>
                                </th>
                                  <th class="p-2  cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-around">
                                        Date and Time
                                         
                                    </div>
                                </th>
                                  <th class="p-2 cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Status
                                    </div>
                                </th>
                                 <th class="p-2  cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Actions
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

              @foreach ($transactions  as  $transaction)
                         <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                
                                   <td class="p-2 border-r">{{ $transaction['date']}}</td>
                                    <td class="p-2 border-r">{{   $transaction['wage']}}</td>
                                  <td class="p-2 border-r">{{   $transaction['total']  + (  $transaction['total'] * .12) }}</td>
                                   <td class="p-2 border-r">{{   $transaction['total']}}</td>
                                   
                                 {{-- @foreach ($expense as $exp )

                                 <td>{{ $exp['expense'] }}</td>
                                     
                                 @endforeach --}}
                                </tr>
                                           
                            @endforeach
                        <tr><td colspan="5"> {{ $total }}</td></tr>
                        <tr><td colspan="5"> {{ $totalExpense }}</td></tr>
                        </tbody>
                    </table>
                </div>
                  
            </div>
        </div>
    </div>
</div>
