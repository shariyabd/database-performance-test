<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {

        Schema::dropIfExists('optimized_employees');

        Schema::create('optimized_employees', function (Blueprint $table) {

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

            $table->primary(['id', 'record_date']);

            // Indexes
            $table->index('district', 'idx_district');
            $table->index('record_date', 'idx_record_date');
            $table->index('status', 'idx_status');
            $table->index('is_verified', 'idx_is_verified');
            $table->index('division', 'idx_division');
            $table->index(['district', 'record_date'], 'idx_district_date');
            $table->index(['record_date', 'status'], 'idx_date_status');
            $table->index(['district', 'status', 'record_date'], 'idx_district_status_date');
            $table->index(['name', 'title']);
            $table->index(['created_at', 'id'], 'idx_created_at_id');
        });

        DB::statement("
        ALTER TABLE optimized_employees
        PARTITION BY RANGE (YEAR(record_date)) (
            PARTITION p2015 VALUES LESS THAN (2016),
            PARTITION p2016 VALUES LESS THAN (2017),
            PARTITION p2017 VALUES LESS THAN (2018),
            PARTITION p2018 VALUES LESS THAN (2019),
            PARTITION p2019 VALUES LESS THAN (2020),
            PARTITION p2020 VALUES LESS THAN (2021),
            PARTITION p2021 VALUES LESS THAN (2022),
            PARTITION p2022 VALUES LESS THAN (2023),
            PARTITION p2023 VALUES LESS THAN (2024),
            PARTITION p2024 VALUES LESS THAN (2025),
            PARTITION p2025 VALUES LESS THAN (2026),
            PARTITION p_future VALUES LESS THAN MAXVALUE
        )
    ");
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('optimized_employees');
    }
};
