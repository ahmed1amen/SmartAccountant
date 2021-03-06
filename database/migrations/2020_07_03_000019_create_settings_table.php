<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('UserID')->nullable();             ;
            $table->boolean('IsSiteActive')->default(true); //حالة الموقع
            $table->boolean('MessageEn')->default(true);
            $table->boolean('messageAr')->default(true);
            $table->boolean('ProgramStatus')->default(true);
            $table->date('ProgramEndDate')->default(now());
            $table->bigInteger('Capital')->default(0);  // رأس مال المؤسسة
            $table->string('AppName')->default("");
            $table->string('Email')->default("");
            $table->string('PhoneNumber')->default("");
            $table->string('Website')->default("");   // موقع الكتروني
            $table->string('SerialNumber')->default("");  // رمز التفعيل
            $table->string('Logo')->default("");  // شعار المؤسسة
            $table->string('Stamp')->default("");     // صورة ختم المؤسسة
            $table->double('VAT')->default(15);  // ضريبه القيمة المضافة .. نسبه مؤيه
            $table->string('Currency')->default('SAR');  // ضريبه القيمة المضافة .. نسبه مؤيه
            $table->boolean('EnableVAT')->default(true);  // تفعيل حساب الضرائب علي الاسعار.
            $table->unsignedFloat('AbsenceDiscountValue')->default("100");
            $table->string('AbsenceDiscountType')->default("Value");
            $table->timestamps();

            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');

        });
        \App\Models\Settings::query()->create();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
