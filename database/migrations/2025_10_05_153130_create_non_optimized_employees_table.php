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
        Schema::create('non_optimized_employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('title', 255);
            $table->string('email', 255);
            $table->string('phone', 20);
            $table->string('district', 100); 
            $table->string('division', 50);
            $table->date('record_date');
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['active', 'inactive', 'pending', 'completed']);
            $table->text('description');
            $table->string('category', 100);
            $table->integer('priority');
            $table->boolean('is_verified')->default(false);
            $table->string('reference_code', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('non_optimized_employees');
    }
};
