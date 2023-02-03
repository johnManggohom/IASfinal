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
    

    <div style="text-align: center; font-size: 2rem">Sales</div>
    <table class="styled-table">
    <thead>
        <tr>
            <th>Date </th>
            <th> Gross Sales</th>
            <th> Net Sales</th>
            <th> Commission</th>
            <th> Sales Return</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($transactions  as  $transaction)
        <tr>
            <td>{{ $transaction['date']}}</td>
                                  <td >{{   $transaction['total']  + (  $transaction['total'] * .12) }}</td>
                                   <td >{{   $transaction['total'] }}</td>
                                    <td >{{   $transaction['wage']}}</td>
                                    <td >{{   $transaction['total']- $transaction['wage']}}</td>
        </tr>
    @endforeach
       
      
    </tbody>
</table>
           <div style="text-align: center; font-size: 2rem">Expenses</div>

               <table class="styled-table">
    <thead>
        <tr>
            <th>Date </th>
            <th>  Expense</th>
        </tr>
    </thead>
    <tbody>
  @foreach ($expense  as  $exp)
        <tr>

        <td >{{ $exp['date']}}</td>
            <td >{{   $exp['expense'] }}</td>
        </tr>
    @endforeach
       
                        <tr><td colspan="2">Gross Sale:  {{ $total + ($total * .12) }} </td></tr>
                         <tr><td colspan="2" >Net Sale:  {{ $total  }}</td></tr>
                          <tr><td colspan="2">Commission:  {{ $totalWage }}</td></tr> 
                        <tr><td colspan="2">Expenses: {{ $totalExpense }}</td></tr>       
                         <tr><td colspan="2"> Total Sales: {{ $total-$totalWage-$totalExpense }} </td></tr>
    </tbody>
</table>


