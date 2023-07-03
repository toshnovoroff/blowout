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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName', 50);
            $table->string('lastName', 50);
            $table->char('email', 70)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('password');
            $table->rememberToken();
            $table->string('sex', 10)->nullable();
            $table->date('birthDate')->nullable();
            $table->integer('visitCount')->nullable();
            $table->boolean('isAdmin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
