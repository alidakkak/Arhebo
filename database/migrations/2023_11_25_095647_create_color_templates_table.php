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
        Schema::create('color_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId("template_id")->constrained("templates")->cascadeOnDelete();
            $table->foreignId("color_id")->constrained("colors")->cascadeOnDelete();
            $table->string("template");
            $table->string('descriptions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color_templates');
    }
};
