<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $this->call(MovieSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(MovieGenreSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PaymentGatewaySeeder::class);
        $this->call(PurchaseSeeder::class);
        $this->call(PaymentSeeder::class);
    }
}
