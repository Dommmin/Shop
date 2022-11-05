<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Person;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Brand::factory()->create(['name' => 'Adidas']);
        Brand::factory()->create(['name' => 'Nike']);
        Brand::factory()->create(['name' => 'Champion']);
        Brand::factory()->create(['name' => 'Emporio Armani']);
        Brand::factory()->create(['name' => 'Calvin Klein']);
        Brand::factory()->create(['name' => 'Tommy Jeans']);
        Brand::factory()->create(['name' => 'Levi\'s']);
        Brand::factory()->create(['name' => 'Diesel']);

        Person::factory()->create(['name' => 'Kobiety', 'subname' => 'Kobiece']);
        Person::factory()->create(['name' => 'Mężczyźni', 'subname' => 'Męskie']);
        Person::factory()->create(['name' => 'Dzieci', 'subname' => 'Dziecięce']);
    }
}
