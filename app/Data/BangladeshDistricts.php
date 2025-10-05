<?php

namespace App\Data;

class BangladeshDistricts
{
    public static function getDistricts(): array
    {
        return [
            // Dhaka Division
            ['district' => 'Dhaka', 'division' => 'Dhaka'],
            ['district' => 'Gazipur', 'division' => 'Dhaka'],
            ['district' => 'Narayanganj', 'division' => 'Dhaka'],
            ['district' => 'Tangail', 'division' => 'Dhaka'],
            ['district' => 'Kishoreganj', 'division' => 'Dhaka'],
            ['district' => 'Manikganj', 'division' => 'Dhaka'],
            ['district' => 'Munshiganj', 'division' => 'Dhaka'],
            ['district' => 'Narsingdi', 'division' => 'Dhaka'],
            ['district' => 'Rajbari', 'division' => 'Dhaka'],
            ['district' => 'Faridpur', 'division' => 'Dhaka'],
            ['district' => 'Gopalganj', 'division' => 'Dhaka'],
            ['district' => 'Madaripur', 'division' => 'Dhaka'],
            ['district' => 'Shariatpur', 'division' => 'Dhaka'],

            // Chittagong Division
            ['district' => 'Chittagong', 'division' => 'Chittagong'],
            ['district' => 'Cox\'s Bazar', 'division' => 'Chittagong'],
            ['district' => 'Rangamati', 'division' => 'Chittagong'],
            ['district' => 'Bandarban', 'division' => 'Chittagong'],
            ['district' => 'Khagrachari', 'division' => 'Chittagong'],
            ['district' => 'Feni', 'division' => 'Chittagong'],
            ['district' => 'Lakshmipur', 'division' => 'Chittagong'],
            ['district' => 'Comilla', 'division' => 'Chittagong'],
            ['district' => 'Noakhali', 'division' => 'Chittagong'],
            ['district' => 'Brahmanbaria', 'division' => 'Chittagong'],
            ['district' => 'Chandpur', 'division' => 'Chittagong'],

            // Rajshahi Division
            ['district' => 'Rajshahi', 'division' => 'Rajshahi'],
            ['district' => 'Bogra', 'division' => 'Rajshahi'],
            ['district' => 'Pabna', 'division' => 'Rajshahi'],
            ['district' => 'Sirajganj', 'division' => 'Rajshahi'],
            ['district' => 'Natore', 'division' => 'Rajshahi'],
            ['district' => 'Naogaon', 'division' => 'Rajshahi'],
            ['district' => 'Joypurhat', 'division' => 'Rajshahi'],
            ['district' => 'Chapainawabganj', 'division' => 'Rajshahi'],

            // Khulna Division
            ['district' => 'Khulna', 'division' => 'Khulna'],
            ['district' => 'Bagerhat', 'division' => 'Khulna'],
            ['district' => 'Satkhira', 'division' => 'Khulna'],
            ['district' => 'Jessore', 'division' => 'Khulna'],
            ['district' => 'Jhenaidah', 'division' => 'Khulna'],
            ['district' => 'Magura', 'division' => 'Khulna'],
            ['district' => 'Narail', 'division' => 'Khulna'],
            ['district' => 'Chuadanga', 'division' => 'Khulna'],
            ['district' => 'Kushtia', 'division' => 'Khulna'],
            ['district' => 'Meherpur', 'division' => 'Khulna'],

            // Barisal Division
            ['district' => 'Barisal', 'division' => 'Barisal'],
            ['district' => 'Patuakhali', 'division' => 'Barisal'],
            ['district' => 'Bhola', 'division' => 'Barisal'],
            ['district' => 'Pirojpur', 'division' => 'Barisal'],
            ['district' => 'Jhalokati', 'division' => 'Barisal'],
            ['district' => 'Barguna', 'division' => 'Barisal'],

            // Sylhet Division
            ['district' => 'Sylhet', 'division' => 'Sylhet'],
            ['district' => 'Moulvibazar', 'division' => 'Sylhet'],
            ['district' => 'Habiganj', 'division' => 'Sylhet'],
            ['district' => 'Sunamganj', 'division' => 'Sylhet'],

            // Rangpur Division
            ['district' => 'Rangpur', 'division' => 'Rangpur'],
            ['district' => 'Dinajpur', 'division' => 'Rangpur'],
            ['district' => 'Gaibandha', 'division' => 'Rangpur'],
            ['district' => 'Kurigram', 'division' => 'Rangpur'],
            ['district' => 'Lalmonirhat', 'division' => 'Rangpur'],
            ['district' => 'Nilphamari', 'division' => 'Rangpur'],
            ['district' => 'Panchagarh', 'division' => 'Rangpur'],
            ['district' => 'Thakurgaon', 'division' => 'Rangpur'],

            // Mymensingh Division
            ['district' => 'Mymensingh', 'division' => 'Mymensingh'],
            ['district' => 'Jamalpur', 'division' => 'Mymensingh'],
            ['district' => 'Netrokona', 'division' => 'Mymensingh'],
            ['district' => 'Sherpur', 'division' => 'Mymensingh'],
        ];
    }

    public static function getRandomDistrict(): array
    {
        $districts = self::getDistricts();
        return $districts[array_rand($districts)];
    }
}
