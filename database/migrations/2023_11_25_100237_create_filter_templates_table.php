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
        Schema::create('filter_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->nullable()->constrained('templates')->cascadeOnDelete();
            $table->foreignId('filter_id')->nullable()->constrained('filters')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_templates');
    }
};
