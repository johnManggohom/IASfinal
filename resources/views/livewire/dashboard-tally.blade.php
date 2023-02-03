<div>
 <div class="flex flex-wrap mb-2">
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2">
        <div class="bg-green-600 border rounded shadow p-2">
            <div class="flex flex-row items-center">
               
                <div class="flex-1 text-right">
                    <h5 class="text-white">Sales Today</h5>
                    <h3 class="text-white text-3xl">
                    @if(isset($day[0]))
                            {{ $day[0] }}
                    @else
                    {{ 0 }}
                    @endif</span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2">
        <div class="bg-blue-600 border rounded shadow p-2">
            <div class="flex flex-row items-center">
        
                <div class="flex-1 text-right">
                    <h5 class="text-white">This Week Sales</h5>
                        <h3 class="text-white text-3xl"> @if(isset($week[0]))
                                {{ $week[0] }}
                        @else
                        {{ 0 }}
                        @endif</span></h3></i></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pr-3 xl:pl-1">
        <div class="bg-orange-600 border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-1 text-right pr-1">
                    <h5 class="text-white">This Month Sale</h5>
                   <h3 class="text-white text-3xl"> @if(isset($month[0]))
                            {{ $month[0] }}
                    @else
                    {{ 0 }}
                    @endif</span></h3></i></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2 xl:pl-3 xl:pr-2">
        <div class="bg-purple-600 border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-1 text-right">
                    <h5 class="text-white">Total Sales</h5>
                       <h3 class="text-white text-3xl"> @if(isset($all))
                            {{ $all}}
                    @else
                    {{ 0 }}
                    @endif</span></h3></i></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pr-2 xl:pl-2 xl:pr-3">
        <div class="bg-red-600 border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-1 text-right">
                    <h5 class="text-white">New Users</h5>
                    <h3 class="text-white text-3xl"> @if(isset($newUsers))
                            {{ $newUsers}}
                    @else
                    {{ 0 }}
                    @endif</span></h3></i></span></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 xl:w-1/3 pt-3 px-3 md:pl-2 xl:pl-1">
        <div class="bg-pink-600 border rounded shadow p-2">
            <div class="flex flex-row items-center">
                <div class="flex-1 text-right">
                    <h5 class="text-white">Users</h5>
                     <h3 class="text-white text-3xl"> @if(isset($user))
                            {{ $user}}
                    @else
                    {{ 0 }}
                    @endif</span></h3></i></span></h3>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
