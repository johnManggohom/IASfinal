<x-admin-layout>
    <div class="py-12 w-2/3 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                   <div class="flex justify-start p-2">
                  <div  class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white"> <a  href="{{ route('admin.appointment.index') }}"><i class="fas fa-chevron-left text-lg"></i></a></div>
                       
                </div>
               <div class="flex flex-col">
               <!-- component -->
<div class="bg-white  rounded px-5 pt-3 pb-4 mb-4 flex flex-col my-2">

  <div class="text-center text-lg font-bold">Create Appointment </div>
      <h3 class="py-3">Client Name:  {{ $user->name }}</h3>
     <form method="POST" action="{{ route('admin.appointment.store') }}">
                            @csrf
                        <div class="py-3">
                            <div>
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Hair Dresser</label>
                                <select id="permission" name="dresser_id" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($hairDressers as $hairDresser)
                                        <option value="{{ $hairDresser->id }}">{{ $hairDresser->name }}</option>
                                    @endforeach
                     
                                </select>
                            </div>
                    </div>
                       <div class="py-3">
                            <div>
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Service</label>
                                <select id="permission" name="service_id" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                   
                                        @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }} | Price: {{ $service->prices }}</option>
                                    @endforeach
                     
                                </select>
                            </div>
                    </div>

                     <div class="bg-white py-3 rounded  mb-4 flex flex-col my-2">

                            {{-- <div class="flex justify-center">
                        <div class="timepicker relative form-floating mb-3 xl:w-96">
                            <input type="text" name= "time"
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Select a date" />
                            <label for="floatingInput" class="text-gray-700">Select a time</label>
                        </div>
                        </div>

                        <div class="flex items-center justify-center">
                        <div class="datepicker relative form-floating mb-3 xl:w-96">
                            <input type="text" name = 'date'
                            class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Select a date" />
                            <label for="floatingInput" class="text-gray-700">Select a date</label>
                        </div>
                        </div> --}}

                                                    <div class="sm:col-span-6">
                                    <label for="res_date" class="block text-sm font-medium text-gray-700"> Reservation
                                        Date
                                    </label>
                                    <div class="mt-1">
                                        <input type="datetime-local" id="start_time" name="start_time"
                                            value=""
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    </div>
                                    <span class="text-xs">Please choose the time between 10:00 A.M - 8:00 P.M.</span>
                                    @error('start_time')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md text-white">Submit</button>
                          </div>
                        </form>
                   </div>
            </div>
        </div>
    </div>
</x-admin-layout>
