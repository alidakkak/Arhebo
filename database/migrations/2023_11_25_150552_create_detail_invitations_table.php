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
        Schema::create('detail_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("invitation_id")->nullable()->constrained("invitations")->nullOnDelete();
            $table->foreignId("detail_id")->nullable()->constrained("details")->nullOnDelete();
            $table->string("value");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_invitations');
    }
};
