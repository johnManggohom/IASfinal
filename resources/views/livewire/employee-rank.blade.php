<div>
    <div class="mt-10">

         {{-- @foreach ($monthCount as $month )
                {{ $month}}
            @endforeach --}}

         {{-- <select wire:model="status"  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">

           

            <option value="">Days</option>
                                        <option value="">Days</option>
                                         <option value="weeks">Weeks</option>
                                          <option value="months">Month</option>
                                    </select> --}}


        <div id="chartBox"  class="w-2/3"  >
             <canvas id="myChart2"></canvas>
        </div>

          <div id="chartBox"  class="w-2/3"  >
             <canvas id="myChart2"></canvas>
        </div>
 
        
        

</div>

                        <script>    

                        document.addEventListener('livewire:load', function(){

                             var _ydata = JSON.parse('{!! json_encode($months) !!}');
                            var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');


                              const ctx = document.getElementById('myChart2');

                                    new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                        labels: _ydata,
                                        datasets: [{
                                            label: 'Sales',
                                            data: _xdata,
                                            borderWidth: 1
                                        }]
                                        },
                                        options: {
                                        scales: {
                                            y: {
                                            beginAtZero: true
                                            }
                                        }
                                        }
                                    });

                                     document.addEventListener('livewire:update', function () {
                                 chart.update({labels: _ydata, data: _xdata})
    })
                        })

                           
                                                            </script>
                                                            

                                                            
          
</div>
