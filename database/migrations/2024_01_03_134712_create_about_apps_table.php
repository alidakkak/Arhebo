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
        Schema::create('about_apps', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('phone');
            $table->string('email');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('whatsapp');
            $table->string('x');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_apps');
    }
};
