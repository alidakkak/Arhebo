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
        Schema::create('invitation_additional_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->references('id')->on('invitations')->onDelete('cascade');
            $table->foreignId('additional_package_id')->references('id')->on('additional_packages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_additional_packages');
    }
};
