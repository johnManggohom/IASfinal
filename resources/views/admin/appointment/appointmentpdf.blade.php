  <table class="w-full border">

    <h1>{{ \Carbon\Carbon::now() }}</h1> 
     
                        <thead>
                            <tr class="bg-gray-50 border-b">
                            
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Name
                                    </div>
                                </th>
                                  <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Hair Dresser
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                      
                                    </div>
                                </th>
                                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Price
                                    </div>
                                </th>
                                  <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Date and Time
                                    </div>
                                </th>
                                  <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                    <div class="flex items-center justify-center">
                                        Status
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>


            
                         @foreach ($appointments as  $appointment)
                                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">{{  $appointment->user->name}}</td>
                                <td class="p-2 border-r">{{  $appointment->dresser->name}}</td>
                                  <td class="p-2 border-r">{{  $appointment->service->name}}</td>
                                  <td class="p-2 border-r">{{  $appointment->appointment_price}}</td>
                                  <td class="p-2 border-r">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start_time)->format('M d Y g:i A')}}</td>

                                  @if ($appointment->status == 'finished')
                                                <td class="p-2 border-r bg-cyan-100 "> {{ $appointment->status}}</td>                         
                                     @else

                                     
                                     
                                            @if ($appointment->status == 'pending')
                                            <td class="p-2 border-r bg-amber-100 "> {{ $appointment->status}}</td>
                                            @elseif ($appointment->status == 'rejected')
                                                <td class="p-2 border-r bg-orange-100 "> {{ $appointment->status}}</td>
                                                @elseif ($appointment->status == 'accepted')
                                                <td class="p-2 border-r bg-yellow-100 "> {{ $appointment->status}}</td>
                                             @endif


                                    @endif
                                    

                                </tr>       
                            @endforeach
                        </tbody>
                    </table>