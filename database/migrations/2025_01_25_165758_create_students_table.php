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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('title', length: 250);   // required, string, max 250 characters.
            $table->decimal('price', total: 8, places: 2);  // required, decimal with 8 digits in total and 2 digits after the decimal point
            $table->date('start_date'); // required, date
            $table->date('end_date');   // required, date
            $table->text('details')->nullable();    // nullable means the column can be null .i.e optional
            $table->string('instructor_name', length: 250);   // required, string, max 250 characters.
            $table->timestamps(precision: 0);   // created_at and updated_at columns, precision: 0 means the timestamps will be stored with no fractional seconds 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
