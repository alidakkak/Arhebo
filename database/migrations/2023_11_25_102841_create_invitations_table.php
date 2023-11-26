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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained("categories")->cascadeOnDelete();
            $table->foreignId('package_id')->constrained("packages")->cascadeOnDelete();
            $table->foreignId('template_id')->constrained("templates")->cascadeOnDelete();
            $table->string("image");
            $table->string("islamic_date");
            $table->string("gregorian_date");
            $table->string("from");
            $table->string("to");
            $table->string("event_name");
            $table->string("longitude");
            $table->string("latitude");
            $table->string("invitation_text");
            $table->string("prohibited_thing");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
