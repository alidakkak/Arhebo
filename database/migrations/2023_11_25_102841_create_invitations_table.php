<?php

use App\Statuses\InvitationTypes;
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
            $table->foreignId('template_id')->nullable()->constrained('templates')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('hijri_date');
            $table->string('miladi_date');
            $table->string('from');
            $table->string('to');
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->text('event_name');
            $table->text('location_link');
            $table->string('inviter');
            $table->text('invitation_text')->nullable();
            $table->string('status')->default(InvitationTypes::active);
            $table->boolean('is_with_qr')->default(true);
            $table->string('image')->nullable();
            $table->string('text_message')->nullable();
            $table->double('number_of_invitees');
            $table->double('number_of_compensation')->default(0);
            $table->double('additional_package')->default(0);
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
