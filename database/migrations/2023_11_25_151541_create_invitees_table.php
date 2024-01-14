<?php

use App\Statuses\InviteeTypes;
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
        Schema::create('invitees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitation_id')->references('id')
                ->on('invitations')->onDelete('cascade');
            $table->string('name');
            $table->string('phone');
            $table->integer('number_of_people');
            $table->string('apology_message')->nullable();
            $table->string('status')->default(InviteeTypes::waiting);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitees');
    }
};
