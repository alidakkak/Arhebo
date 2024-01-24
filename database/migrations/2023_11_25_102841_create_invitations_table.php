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
            $table->foreignId('package_detail_id')->constrained('package_details')->cascadeOnDelete();
            $table->foreignId('template_id')->constrained('templates')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('hijri_date');
            $table->string('miladi_date');
            $table->string('from');
            $table->string('to');
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('event_name');
            $table->string('location_link')->nullable();
            $table->string('location_name');
            $table->string('inviter');
            $table->string('invitation_text');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_with_qr');
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
