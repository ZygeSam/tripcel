<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\TransactionStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esim_orders', function (Blueprint $table) {
            $table->id();
            $table->string('esimIccid');
            $table->string('transactionId')->default('TRC' . now());
            $table->string('eSimProductId');
            $table->string('eSimPlanName');
            $table->string('unlimitedData');
            $table->string('planType');
            $table->integer('price');
            $table->string('currrency');
            $table->string('countries_enabled');
            $table->string('planId');
            $table->string('purchasedData');
            $table->string('dataStartTime');
            $table->string('dataEndTime');
            $table->string('network_status');
            $table->string('paymentChannel');
            $table->enum('status', TransactionStatus::getConstants())->default('pending');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('esim_orders');
    }
};
