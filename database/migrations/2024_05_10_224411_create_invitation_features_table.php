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
        Schema::create('invitation_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->references('id')
                ->on('invitations')->onDelete('cascade');
            $table->foreignId('feature_id')->references('id')
                ->on('features')->onDelete('cascade');
            $table->text('value')->nullable();
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_features');
    }
};
