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
    width: 100vw;
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
    
  
        <h3 style="margin-top: 1rem; margin-bottom: 1rem">Date: {{ \Carbon\Carbon::now() }}</h3> 
         <h3 style="margin-top: 1rem; margin-bottom: 1rem">Transaction Table</h3> 
  <table class="styled-table w-full">



     
                        <thead>
                            <tr>
                            
                                <th>
                                   
                                        Transaction Number
                                </th>
                                  <th>
                                  
                                       Price
                                   
                                </th>
                                <th >
                                   Date
                                </th>
                             
                                 
                            </tr>
                        </thead>
                        <tbody>


            
                         @foreach ($transactions as  $transaction)
                                <tr>
                               <td>{{  $transaction->invoice_number}}</td>
                                  <td>{{  $transaction->service->prices}}</td>
                                  <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $transaction->created_at)->format('M d Y g:i A')}}</td>
                                </tr>       
                            @endforeach
                        </tbody>
                    </table>

</body>
</html>
