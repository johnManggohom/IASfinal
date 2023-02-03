<x-admin-layout>
    <div class="py-12 w-full">

 <div
	class='flex space-y-2 sm:space-x-10  w-4/5 items-center   max-w-7xl m-auto'>
  @foreach ($revenues as  $revenue)
	<div
		class='flex flex-wrap flex-row sm:flex-col justify-center  w-full  p-3 bg-white rounded-md shadow-xl border-l-4 border-blue-300'>
		<div class="flex justify-between w-full">
			<div>
					
			</div>
			<div class="font-bold text-sm">
				      {{ $revenue->user->name }}
			</div>
		</div>
		<div>
			<div class="font-bold text-2xl">
				  {{ $revenue->daily_revenue  }}
			</div>
			<div class="font-bold text-xs">
				    Current Commision
			</div>

      <div class="font-bold mt-2 text-xs">
       
          <div class="flex justify-between">
             <div> <p class="text-green-500 text-xs"> This Week: {{ $revenue->this_week }}</p> </div>
            <div> <p class="text-green-500 text-xs"> Last Week: {{ $revenue->last_week }}</p> </div>
            <div> <p class="text-green-500 text-xs">Month: {{ $revenue->monthly_revenue }}</p> </div>
            <div> <p class="text-green-500 text-xs">Year: {{ $revenue->yearly_revenue }}</p> </div> 
           </div>
    
          <form  method="POST" action="{{ route('admin.wages.update', $revenue->user_id) }}" onsubmit="return confirm('are you sure')">
                                                    @csrf
                                                <button type="submit" class="bg-yellow-300 mt-2 p-2 text-dark hover:shadow-lg text-xs font-thin mr-1 rounded-sm">Claim</button>

		  </form>	
				  
          
           
          
			</div>
    
		</div>
	</div>
    @endforeach 
</div>
       

<livewire:wage-table>
    </div>
</x-admin-layout>
