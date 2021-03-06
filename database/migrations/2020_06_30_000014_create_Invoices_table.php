<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('MarketplaceID');
            $table->unsignedBigInteger('UserID');
            $table->string('CustomerName')->nullable();
            $table->string('acc_number')->nullable();
            $table->double('Total');
            $table->double('Paid');
            $table->double('Rest');
            $table->unsignedBigInteger('PaymentTypeID');
            $table->boolean('IsRaw')->default(false);
            $table->string('RawFile')->nullable()->default('');
            $table->string('invoice_code')->nullable()->unique();
            $table->timestamps();
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('MarketplaceID')->references('id')->on('marketplaces')->onDelete('cascade');
            $table->foreign('PaymentTypeID')->references('id')->on('payment_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
