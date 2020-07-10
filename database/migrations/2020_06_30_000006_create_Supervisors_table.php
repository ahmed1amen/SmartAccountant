<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('UserID');
            $table->unsignedBigInteger('MarketplaceID');

            $table->string('PhoneNumber');
            $table->timestamps();

            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('MarketplaceID')->references('id')->on('marketplaces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supervisors');
    }
}
