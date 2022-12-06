<div>
    <div>


         <select wire:model="status"  class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">

            <option value="">Days</option>
                                        <option value="D">Days</option>
                                         <option value="W">Weeks</option>
                                          <option value="M">Month</option>
                                    </select>
  <canvas id="myChart"></canvas>
</div>
                    @push('child-scripts')
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>

                            var _ydata = JSON.parse('{!! json_encode($months) !!}');
                            var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');


                              const ctx = document.getElementById('myChart');

                                    new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                        labels: _ydata,
                                        datasets: [{
                                            label: '# of Votes',
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
                                                            </script>
                    @endpush
</div>
