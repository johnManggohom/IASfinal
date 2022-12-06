<?php

namespace App\Http\Livewire;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaction;

use Livewire\Component;

class TransactionDetails extends Component

{

public $transaction;
    public function render()


    {

    $transactions = Transaction::where('id', $this->transaction->id)->get();
 
        return view('livewire.transaction-details', compact('transactions'));
    }

        public function printInvoice($transaction_id){
                
            $order = Transaction::findOrFail($transaction_id);
            $data = ['transaction' => $order];
      $pdf = PDF::loadView('admin.transaction.invoice', $data)->setPaper('a4', 'portrait')->output(); //
return response()->streamDownload(
    fn() => print($pdf), 'export_protocol.pdf'
);


        }

}
