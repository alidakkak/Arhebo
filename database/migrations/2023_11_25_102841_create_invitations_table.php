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
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('package_id')->constrained('packages')->cascadeOnDelete();
            $table->foreignId('template_id')->constrained('templates')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained("users")->cascadeOnDelete();
            $table->string("hijri_date");//3
            $table->string("miladi_date");//4
            $table->string("from");//5
            $table->string("to");//6
            $table->string("event_name");//1
            $table->string("location_link");//8
            $table->string("location_name");//7
            $table->string('sponsor_name');//2
            $table->string("invitation_text");//9
            $table->string("prohibited_thing");//10
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
