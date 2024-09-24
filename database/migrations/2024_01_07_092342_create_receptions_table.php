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
        Schema::create('receptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreignId('invitation_id')->nullable()->references('id')
                ->on('invitations')->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->boolean('flag')->default(false);
            $table->enum('type', ['1', '2']);  /// 1 => reception , 2 => co-host
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receptions');
    }
};
