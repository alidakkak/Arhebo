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
        Schema::create('attribute_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->references('id')
                ->on('invitations')->onDelete('cascade');
            $table->foreignId('attribute_id')->references('id')
                ->on('attributes')->onDelete('cascade');
            $table->boolean('value')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_invitations');
    }
};
