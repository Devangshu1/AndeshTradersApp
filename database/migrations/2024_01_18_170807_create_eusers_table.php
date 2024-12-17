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
        Schema::create('eusers', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('e_email',50);
            $table->string('username',50);
            $table->bigInteger('phoneno')->nullable();
            $table->string('address',255)->nullable();
            $table->unsignedInteger('account_detail')->nullable();
            $table->string('e_passward',255);
            $table->timestamps();
            // $table->primary('user_id');
            $table->foreign('account_detail')->references('account_id')->on('accountdetails')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eusers');
    }
};
