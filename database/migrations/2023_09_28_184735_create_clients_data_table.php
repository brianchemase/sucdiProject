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
        Schema::create('clients_data', function (Blueprint $table) {
            $table->id();
            $table->string('client_names');
            $table->string('national_id')->unique();
            $table->date('DOB');
            $table->string('phone');
            $table->string('mobile_no');
            $table->string('email')->unique();
            $table->string('home_residence');
            $table->string('postal_address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('country');
            $table->string('nationality');
            $table->string('client_type');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_data1');
    }
};
