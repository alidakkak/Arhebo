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
        Schema::create('invitation_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->foreignId('invitation_id')->references('id')
                ->on('invitations')->onDelete('cascade');
            $table->foreignId('input_id')->references('id')
                ->on('inputs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_inputs');
    }
};
