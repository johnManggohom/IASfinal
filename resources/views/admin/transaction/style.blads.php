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

main{
width: 80%;
margin: 0 auto;
display: flex;
align-items: center;
justify-content: center;
padding-top: 4rem;      
}

.button{
    display: flex;
    justify-content: flex-end;
    width: 700px;
	max-width: 100%;
}
.wrapper{
	background: var(--white);
	padding: 0 30px 30px 30px;
 
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
	color: var(--primary);
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

.button-58 {
    margin-bottom: 1rem;
  align-items: center;
  background-color: #06f;
  border: 2px solid #06f;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-flex;
  fill: #000;
  font-family: Inter,sans-serif;
  font-size: 16px;
  font-weight: 600;
  height: 48px;
  justify-content: center;
  letter-spacing: -.8px;
  line-height: 24px;
  min-width: 140px;
  outline: 0;
  padding: 0 10px;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-58:focus {
  color: #171e29;
}

.button-58:hover {
  background-color: #3385ff;
  border-color: #3385ff;
  fill: #06f;
}


@media (min-width: 768px) {
  .button-58 {
    min-width: 170px;
  }
}
    </style>