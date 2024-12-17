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
        Schema::create('accountdetails', function (Blueprint $table) {
            $table->increments('account_id');
            $table->biginteger('account_no');
            $table->string('ifsc_code');
            $table->string('bank_name');
            $table->string('branch_name');
            $table->timestamps();
            // $table->primary('account_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accountdetails');
    }
};
