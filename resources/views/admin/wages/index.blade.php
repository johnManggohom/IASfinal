<x-admin-layout>
    <div class="py-12 w-full">

      <div
	class='flex space-y-2 sm:space-x-10  w-full items-center   max-w-7xl m-auto'>
  @foreach ($revenues as  $revenue)
	<div
		class='flex flex-wrap flex-row sm:flex-col justify-center  w-full  p-5 bg-white rounded-md shadow-xl border-l-4 border-blue-300'>
		<div class="flex justify-between w-full">
			<div>
				<div class="p-2">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
						stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round"
							d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
					</svg>
				</div>
			</div>
			<div class="font-bold text-sm">
				      {{ $revenue->user->name }}
			</div>
		</div>
		<div>
			<div class="font-bold text-5xl">
				  {{ $revenue->daily_revenue  }}
			</div>
			<div class="font-bold text-sm">
				    Current Commision
			</div>

      <div class="font-bold mt-5 text-xs">
       
          <div class="flex justify-between">
             <div> <p class="text-green-500"> This Week: {{ $revenue->this_week }}</p> </div>
            <div> <p class="text-green-500"> Last Week: {{ $revenue->last_week }}</p> </div>
            <div> <p class="text-green-500">Month: {{ $revenue->monthly_revenue }}</p> </div>
            <div> <p class="text-green-500">Year: {{ $revenue->yearly_revenue }}</p> </div> 
           </div>
    
          <form  method="POST" action="{{ route('admin.wages.update', $revenue->user_id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                <button type="submit" class="bg-yellow-300 p-2 text-dark hover:shadow-lg text-xs font-thin mr-1"> {{  $revenue->user_id }}Finish</button>

		  </form>	
				  
          
           
          
			</div>
    
		</div>
	</div>
    @endforeach 
</div>
       

<livewire:wage-table>
    </div>
</x-admin-layout>
