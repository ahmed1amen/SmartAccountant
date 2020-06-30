<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProductSubCategory', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->unsignedBigInteger('ProductCategoryID');
            $table->unsignedBigInteger('Name');
            $table->timestamps();



            $table->foreign('ProductCategoryID')->references('ID')->on('ProductCategories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ProductSubCategory');
    }
}
