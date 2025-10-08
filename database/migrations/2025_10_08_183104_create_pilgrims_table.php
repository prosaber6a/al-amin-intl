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
        Schema::create('pilgrims', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id')->nullable();
            $table->integer('group_id')->nullable(); // Optional grouping of pilgrims
            $table->integer('package_id')->nullable(); // Travel package reference
            $table->enum('type', ['Hajj', 'Umrah'])->default('umrah'); // Type of pilgrimage
            $table->string('given_name');
            $table->string('sure_name');
            $table->date('dob');
            $table->enum('sex', ['Male', 'Female']);
            $table->string('place_of_birth')->nullable();
            $table->string('passport_no');
            $table->date('p_issue_date');
            $table->date('p_expiry_date');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->text('files')->nullable(); // JSON array of file paths

            // Hajj Pre-Registration Information
            $table->string('pre_registration_no')->nullable()->unique(); // Govt. issued pre-registration ID
            $table->string('mofa_no')->nullable(); // Ministry of Foreign Affairs number
            $table->enum('registration_status', ['Pending', 'Approved', 'Rejected'])->nullable(); // Pending / Approved / Rejected
            $table->date('registration_date')->nullable();
            $table->string('mahrem_name')->nullable(); // For female pilgrims
            $table->string('mahrem_relation')->nullable(); // Relation (Father, Husband, etc.)
            $table->boolean('is_first_time')->default(true); // First time performing Hajj
            $table->string('medical_certificate_no')->nullable(); // Health clearance reference
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilgrims');
    }
};
