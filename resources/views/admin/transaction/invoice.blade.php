<!DOCTYPE html>
<html>
<head>
	<title>Invoice Template Design</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;900&display=swap');

:root {
  --primary: #c2283a;
  --secondary: #3d3d3d; 
  --white: #fff;
}

*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Lato', sans-serif;
}

body{
	background: var(--secondary);
	color: var(--secondary);
	display: flex;
	align-items: center;
	justify-content: center;
	font-size: 14px;
}

.bold{
	font-weight: 900;
}

.light{
	font-weight: 100;
}

.wrapper{
	background: var(--white);
	padding: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

  table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }

.invoice_wrapper{
	border: 3px solid var(--primary);
	width: 700px;
	max-width: 100%;
}


.invoice_wrapper .header .logo_invoice_wrap,
.invoice_wrapper .header .bill_total_wrap{
	display: flex;
	justify-content: space-between;
	padding: 30px;
}

.invoice_wrapper .header .logo_sec{
	display: flex;
	align-items: center;
}

.invoice_wrapper .header .logo_sec .title_wrap{
	margin-left: 5px;
}

.invoice_wrapper .header .logo_sec .title_wrap .title{
	text-transform: uppercase;
	font-size: 18px;
	color: blue;
}

.invoice_wrapper .header .logo_sec .title_wrap .sub_title{
	font-size: 12px;
}

.invoice_wrapper .header .invoice_sec,
.invoice_wrapper .header .bill_total_wrap .total_wrap{
	text-align: right;
}

.invoice_wrapper .header .invoice_sec .invoice{
	font-size: 28px;
	color: var(--primary);
}

.invoice_wrapper .header .invoice_sec .invoice_no,
.invoice_wrapper .header .invoice_sec .date{
	display: flex;
	width: 100%;
}

.invoice_wrapper .header .invoice_sec .invoice_no span:first-child,
.invoice_wrapper .header .invoice_sec .date span:first-child{
	width: 70px;
	text-align: left;
}

.invoice_wrapper .header .invoice_sec .invoice_no span:last-child,
.invoice_wrapper .header .invoice_sec .date span:last-child{
	width: calc(100% - 70px);
}

.invoice_wrapper .header .bill_total_wrap .total_wrap .price,
.invoice_wrapper .header .bill_total_wrap .bill_sec .name{
	color: var(--primary);
	font-size: 20px;
}

.invoice_wrapper .body .main_table .table_header{
	background: var(--primary);
}

.invoice_wrapper .body .main_table .table_header .row{
	color: var(--white);
	font-size: 18px;
	border-bottom: 0px;	
}

.invoice_wrapper .body .main_table .row{
	display: flex;
	border-bottom: 1px solid var(--secondary);
}

.invoice_wrapper .body .main_table .row .col{
	padding: 10px;
}
.invoice_wrapper .body .main_table .row .col_no{width: 5%;}
.invoice_wrapper .body .main_table .row .col_des{width: 45%;}
.invoice_wrapper .body .main_table .row .col_price{width: 20%; text-align: center;}
.invoice_wrapper .body .main_table .row .col_qty{width: 10%; text-align: center;}
.invoice_wrapper .body .main_table .row .col_total{width: 20%; text-align: right;}

.invoice_wrapper .body .paymethod_grandtotal_wrap{
	display: flex;
	justify-content: flex-end;
	padding: 5px 0 30px;
	align-items: flex-end;
}

.invoice_wrapper .body .paymethod_grandtotal_wrap .paymethod_sec{
	padding-left: 30px;
}

.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec{
	width: 30%;
}

.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p{
	display: flex;
	width: 100%;
	padding-bottom: 5px;
}

.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span{
	padding: 0 10px;
}

.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:first-child{
	width: 60%;
}

.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:last-child{
	width: 40%;
	text-align: right;
}

.invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p:last-child span{
	background: var(--primary);
	padding: 10px;
	color: #fff;
}

.invoice_wrapper .footer{
	padding: 30px;
}

.invoice_wrapper .footer > p{
	color: var(--primary);
	text-decoration: underline;
	font-size: 18px;
	padding-bottom: 5px;
}

.invoice_wrapper .footer .terms .tc{
	font-size: 16px;
}
    </style>

</head>
<body>

<div class="wrapper">
	<div class="invoice_wrapper">
		<div class="header">
			<div class="logo_invoice_wrap">
				<div class="logo_sec">
					<div class="title_wrap">
						<p class="title bold">Samantha Love</p>
						<p class="sub_title">Salon</p>
					</div>
				</div>
				<div class="invoice_sec">
					<p class="invoice bold">INVOICE</p>
					<p class="invoice_no">
						<span class="bold">Invoice</span>
						<span>{{$transaction->invoice_number}}</span>
					</p>
					<p class="date">
						<span class="bold">Date</span>
						<span> {{ \Carbon\Carbon::now()->format('M d Y g:i A') }}</span>
					</p>
				</div>
			</div>
			<div class="bill_total_wrap">
				<div class="bill_sec">
                
                     @if(is_null($transaction->user_id))
					<p>Bill To</p> 
	          		<p class="bold name"> {{ 'walk in client'}}</p>
			        <span>
			           
			        </span>
                        @else
                        <p>Bill To</p> 
	          		<p class="bold name">   {{  $transaction->user->name }}</p>
			        <span>
			           {{ $transaction->user->email }}<br/>
                    </span>

                         @endif
				</div>
				<div class="total_wrap">
					<p>Dresser:</p> 
	          		<p class="bold name">  {{  $transaction->dresser->name }}</p>
				</div>
			</div>
		</div>
		<div class="body">
			<table class="main_table">
				<th  >
					<tr>
						<td>NO.</td>
						<td>Service</td>
						<td >PRICE</td>
						<td>QTY</td>
						<td >TOTAL</td>
					</tr>
				</th>
				<tbody >
                    @foreach ($transaction->services as $key=>$service )
					<tr >
						<td>
							<p> {{ ++$key }}</p>
						</td>
						<td >
							<p class="bold">  {{ $service->name }}</p>
						</td>
						<td >
							<p>{{ $service->pivot->price }}</p>
						</td>
						<td >
							<p>  {{ $service->pivot->quantity }}</p>
						</td>
						<td >
							<p>  {{ $service->pivot->price *  $service->pivot->quantity}}   </p>
						</td>
					</tr>
                @endforeach
				</tbody>
			</table>
			<div class="paymethod_grandtotal_wrap">
				<div class="grandtotal_sec">
			        <p class="bold">
			            <span>SUB TOTAL</span>
			            <span>{{ $transaction->appointment_price }}</span>
			        </p>
			        <p>
			            <span>Tax Vat 12%</span>
			            <span>{{ $transaction->appointment_price * .12 }}</span>
                    </p>
			       	<p class="bold">
			            <span>Grand Total</span>
			            <span>{{ $transaction->appointment_price + ( $transaction->appointment_price * .12)  }}</span>
			        </p>
				</div>
			</div>
		</div>
		<div class="footer">
			<p>Thank you and Best Wishes</p>
		</div>
	</div>
</div>


</body>
</html>
