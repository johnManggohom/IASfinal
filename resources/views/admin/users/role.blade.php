<x-admin-layout>
  
   <div class="py-12 w-2/3 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.user.index') }}"
                      class="w-10 flex items-center justify-center h-10 rounded-full  bg-green-700 hover:bg-green-500 rounded-md text-white "><i class="fas fa-chevron-left text-2xl"></i></a>
                </div>
                <div class="flex flex-col p-2 py-5  mt-5 bg-white">
                    
                     <div class="text-sm font-bold">User Details</div>
                    <div class="text-sm mt-4">User Name: {{ $user->name }}</div>
                    <div class="text-sm">Email: {{ $user->email }}</div>
                    
                </div>
                <div class="p-2 py-5  mt-2 bg-white">
                    <h2 class="text-sm font-bold">Assign Role</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)

                                @if ($user_role->name == 'user')
                                        <div class="px-2 py-1 bg-blue-300 text-white rounded-md relative" >
                                            <button  class=" py-2 cursor: not-allowed">{{ $user_role->name }}</button>
                                        </div>
                                @else
                                <form class="px-2 py-1 text-sm hover:bg-blue-700 text-white rounded-md  bg-blue-500 relative" method="POST"
                                    action="{{ route('admin.user.roles.remove', [$user->id, $user_role->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <div class="py-2">{{ $user_role->name }}</div>
                                    
                                    <div class="bg-red-500 rounded-md w-6 h-6  flex items-center justify-center rounded-full absolute" style="top: -15%; right: -5%;">
                                                  <button type="submit" class="">x</button>
                                    </div>
                                  
                                </form>
                                @endif
                               
                            @endforeach
                        @endif

                    
                    </div>
                    <div class="max-w-xl bg-white">
                        <form method="POST" action="{{ route('admin.user.roles', $user->id) }}">
                            @csrf
                            <div class="sm:col-span-6 pt-2">
                                <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                                <select id="role" name="role" autocomplete="role-name"
                                   class="form-select form-select-lg mb-3
      appearance-none
      block
      w-full
      px-4
      py-2
      text-sm
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label=".form-select-lg example">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="sm:col-span-6 pt-2">
                        <button type="submit"
                            class="px-1 py-1 bg-green-500 hover:bg-green-700 text-white font-bold text-sm rounded-md">Assign Role</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
</x-admin-layout>
