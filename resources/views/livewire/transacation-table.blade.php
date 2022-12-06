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
           
                      <button wire:click="export()" class="w-14 flex items-center justify-center h-14 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas fa-print text-2xl"></i></button>
                </div></div>
                     
                </div>
             </div>

        
              


            <div class="flex w-full mb-10">
                <div class="flex w-1/2">
                    <div class="mx-1 w-1/2">
                    <input type="datetime-local" id="start_time" name="start_time" wire:model="from"
                        value=""
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" />
                </div>

                
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

             <div class=" w-1/2 relative mx-1">
                            <select wire:model="status"  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                                        <option value=""> All Status</option>
                                        <option value="finished"> Finished</option>
                                         <option value="reject">Rejected</option>
                                          <option value="pending"> Pending</option>
                                    </select>
                                    {{-- <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div> --}}
                                </div>


                
                </div>

            
            </div>
                
               <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-50 border-b">
                            
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                       <div>Name </div>
                                         <span class="cursor-pointer" wire:click="sortBy('invoice_number')">
                                            <i class="fas fa-long-arrow-up {{ $sortColumnName === 'invoice_number'  && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                            <i class="fas fa-long-arrow-down  {{ $sortColumnName === 'invoice_number'  && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Service 
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Price
                                    </div>
                                </th>
                                  <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                         <div>Email </div>
                                      
                                      <span class="cursor-pointer" wire:click="sortBy('created_at')">
                                            <i class="fas fa-long-arrow-up {{ $sortColumnName === 'created_at'  && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                            <i class="fas fa-long-arrow-down  {{ $sortColumnName === 'created_at'  && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                        </span>
                                    </div>
                                        
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
            
                         @foreach ($transactions  as  $transaction)
                         <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                               <td class="p-2 border-r">
                                @if (isset($transaction->user->name))
                                    {{ 
                                 $transaction->user->name}}

                                 @else
                                 walk-in client
                                @endif</td>
                                  <td class="p-2 border-r">{{  $transaction->invoice_number}}</td>
                                  <td class="p-2 border-r">{{  $transaction->service->prices}}</td>
                                  <td class="p-2 border-r">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->format('M d Y g:i A')}}</td>
                                  <td> <a href="{{ route('admin.transaction.getDetails', $transaction->id) }}">Details</a></td>
                                </tr>
                                           
                            @endforeach
                        </tbody>
                    </table>
</div>
                  
            </div>
        </div>
    </div>
</div>

