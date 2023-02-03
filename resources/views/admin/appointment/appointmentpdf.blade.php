  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}


.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
    </style>
</head>
<body>
    
  
  <table class="styled-table">

    <h3>Date: {{ \Carbon\Carbon::now() }}</h3> 
     
                        <thead>
                            <tr>
                            
                                <th>
                                   
                                        Name
                                </th>
                                  <th>
                                  
                                        Hair Dresser
                                   
                                </th>
                                <th >
                                   Service
                                </th>
                                <th>
                                    
                                        Price
                                   
                                </th>
                                  <th >
                                   
                                        Date and Time
                                   
                                </th>
                                  <th>
                                   
                                        Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>


            
                         @foreach ($appointments as  $appointment)
                                <tr>
                                <td >{{  $appointment->user->name}}</td>
                                <td >{{  $appointment->dresser->name}}</td>
                                  <td >{{  $appointment->service->name}}</td>
                                  <td >{{  $appointment->appointment_price}}</td>
                                  <td >{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $appointment->start_time)->format('M d Y g:i A')}}</td>

                                  @if ($appointment->status == 'finished')
                                                <td> {{ $appointment->status}}</td>                         
                                     @else

                                     
                                     
                                            @if ($appointment->status == 'pending')
                                            <td> {{ $appointment->status}}</td>
                                            @elseif ($appointment->status == 'rejected')
                                                <td > {{ $appointment->status}}</td>
                                                @elseif ($appointment->status == 'accepted')
                                                <td> {{ $appointment->status}}</td>
                                             @endif


                                    @endif
                                    

                                </tr>       
                            @endforeach
                        </tbody>
                    </table>

</body>
</html>
