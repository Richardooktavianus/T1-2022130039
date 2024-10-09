<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Guest;
use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            Produk::create([
                'id' => $faker->unique()->regexify('[A-Z0-9]{12}'), // Unique ID (12 characters)
                'product_name' => $faker->word, // Name of the product
                'description' => $faker->sentence(10), // Product description
                'retail_price' => $faker->randomFloat(2, 10, 1000), // Random retail price between 10 and 1000
                'wholesale_price' => $faker->randomFloat(2, 5, 500), // Random wholesale price between 5 and 500
                'origin' => $faker->countryCode, // Country code as origin
                'quantity' => $faker->numberBetween(1, 100), // Random quantity between 1 and 100
                'product_image' => $faker->imageUrl(), // Random product image URL
                'created_at' => now(), // Current timestamp for created_at
                'updated_at' => now(), // Current timestamp for updated_at
            ]);
        }
    }
}

