<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Data\BangladeshDistricts;

class EmployeeSeeder extends Seeder
{
    private const BATCH_SIZE = 1000;
    private const TOTAL_RECORDS = 1000000;

    public function run(): void
    {
        $faker = Faker::create();
        $startTime = microtime(true);

        echo "Starting to seed " . number_format(self::TOTAL_RECORDS) . " records...\n";

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $categories = ['Electronics', 'Clothing', 'Food', 'Healthcare', 'Education', 'Transport', 'Agriculture', 'Technology', 'Finance', 'Real Estate'];
        $statuses = ['active', 'inactive', 'pending', 'completed'];

        $totalBatches = ceil(self::TOTAL_RECORDS / self::BATCH_SIZE);

        for ($batch = 0; $batch < $totalBatches; $batch++) {
            $records = [];

            for ($i = 0; $i < self::BATCH_SIZE; $i++) {
                $location = BangladeshDistricts::getRandomDistrict();

                $startDate = strtotime('2015-01-01');
                $endDate = strtotime('2025-12-31');
                $randomTimestamp = rand($startDate, $endDate);

                $record = [
                    'name' => $faker->name(),
                    'title' => $faker->jobTitle(),
                    'email' => $faker->unique()->safeEmail(),
                    'phone' => $faker->phoneNumber(),
                    'district' => $location['district'],
                    'division' => $location['division'],
                    'record_date' => date('Y-m-d', $randomTimestamp),
                    'amount' => $faker->randomFloat(2, 100, 100000),
                    'status' => $statuses[array_rand($statuses)],
                    'description' => $faker->sentence(20),
                    'category' => $categories[array_rand($categories)],
                    'priority' => rand(1, 10),
                    'is_verified' => $faker->boolean(70),
                    'reference_code' => strtoupper($faker->bothify('REF-####-????')),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $records[] = $record;
            }

            DB::table('non_optimized_employees')->insert($records);
            // DB::table('records_optimized')->insert($records);


            $progress = ($batch + 1) / $totalBatches * 100;
            $recordsInserted = ($batch + 1) * self::BATCH_SIZE;
            $elapsed = round(microtime(true) - $startTime, 2);

            echo sprintf(
                "Progress: %.1f%% (%s / %s records) - Time: %s seconds\n",
                $progress,
                number_format(min($recordsInserted, self::TOTAL_RECORDS)),
                number_format(self::TOTAL_RECORDS),
                $elapsed
            );

            unset($records);
            if ($batch % 10 == 0) {
                usleep(100000);
            }
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $totalTime = round(microtime(true) - $startTime, 2);
        echo "\nSeeding completed in {$totalTime} seconds!\n";
        echo "Average: " . round(self::TOTAL_RECORDS / $totalTime, 2) . " records/second\n";
    }
}
