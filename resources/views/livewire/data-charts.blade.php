<div>
    <div class="mt-10">





    <div class="flex w-full space-x-4"> 
          <div id="chartBox"  class="w-1/2"  >
             <canvas id="myChart"></canvas>
        </div>

        <div id="chartBox2" class="w-1/2"  >
             <canvas id="myChart2"></canvas>
        </div>
    </div>
      
 
</div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>    

                        document.addEventListener('livewire:load', function(){

                             var _ydata = JSON.parse('{!! json_encode($months) !!}');
                            var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');


                              const ctx = document.getElementById('myChart');

                                    new Chart(ctx, {
                                        type: 'line',
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


                        })

                           
                                                            </script>


<script>    

                        document.addEventListener('livewire:load', function(){

                             var _ydata = JSON.parse('{!! json_encode($commission) !!}');
                            var _xdata = JSON.parse('{!! json_encode($commissionCount) !!}');


                              const ctx = document.getElementById('myChart2');

                                    new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                        labels: _ydata,
                                        datasets: [{
                                            label: 'Top Performers',
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
