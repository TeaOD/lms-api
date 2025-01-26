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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');   // required, links to courses table, on delete cascade
            $table->foreignId('student_id')->constrained()->onDelete('cascade');   // required, links to students table, on delete cascade
            $table->timestamps(precision: 0);   // created_at and updated_at columns, precision: 0 means the timestamps will be stored with no fractional seconds 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
