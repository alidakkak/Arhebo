<?php

use App\Statuses\UserTypes;
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('country_code')->nullable();
            $table->string('country_name')->nullable();
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->integer('type')->default(UserTypes::USER);
            $table->integer('code')->nullable();
            $table->dateTime('expired_at')->nullable();
            $table->boolean('is_verified')->default(0);
            $table->boolean('isActive')->default(1);  // If User want to delete Account
            $table->rememberToken();
            $table->softDeletes();
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
