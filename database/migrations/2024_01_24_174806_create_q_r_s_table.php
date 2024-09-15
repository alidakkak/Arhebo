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
        Schema::create('q_r_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invitee_id')->references('id')
                ->on('invitees')->onDelete('cascade');
            $table->text('qr_code');
            $table->integer('number_of_people_without_decrease'); // Number Of Invitees
            $table->integer('number_of_people')->default(0); // Number Of Invitees
//            $table->boolean('status')->default(0);
//            $table->integer('InviteeNumber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('q_r_s');
    }
};
