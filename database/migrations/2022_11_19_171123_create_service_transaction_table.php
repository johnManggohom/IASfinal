<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_transaction', function (Blueprint $table) {

            $table->unsignedBigInteger('service_id')->nullable();
            $table->unsignedBigInteger('transaction_id')->nullable();
             $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
             $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_transaction');
    }
};
