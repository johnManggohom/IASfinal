<x-admin-layout>
    <div class="py-12 w-2/3 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                   <div class="flex justify-start p-2">
                  <div  class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white"> <a  href="{{ route('admin.services.index') }}"><i class="fas fa-chevron-left text-lg"></i></a></div>
                       
                </div>
               <div class="flex flex-col">
               <!-- component -->
<div class="bg-white  rounded px-5 pt-3 pb-4 mb-4 flex flex-col my-2">

  <div class="text-center text-lg font-bold">Create Service </div>
     <form method="POST" action="{{ route('admin.services.store') }}">
                            @csrf
                          <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Service Name </label>
                            <div class="mt-1">
                              <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>
                           <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Price </label>
                            <div class="mt-1">
                              <input type="text" id="name" name="price" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                            @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                          </div>

                          
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md text-white">Create Service</button>
                          </div>
                        </form>
               </div>
            </div>
        </div>
    </div>
</x-admin-layout>
