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
        Schema::create('esims', function (Blueprint $table) {
            $table->id();
            $table->string('eSimCountryIso2');
            $table->string('eSimCountryIso3');
            $table->string('eSimCountryName');
            $table->string("esimIccid");
            $table->string("eSimState");
            $table->string("eSimManualCode");
            $table->string("eSimDateAssigned");
            $table->string("eSimNetworkStatus");
            $table->string("eSimActivationCode");
            $table->unsignedBigInteger("user_id");
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
        Schema::dropIfExists('esim');
    }
};
