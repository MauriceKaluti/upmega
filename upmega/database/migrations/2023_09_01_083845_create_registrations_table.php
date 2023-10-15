<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('phone')->nullable();
            $table->string('id_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('email')->unique();
            $table->string('amount')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('nationality')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('mpesa_transaction_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('medical_condition')->default(0);
            $table->string('experience')->default(0);
            $table->string('terms')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
