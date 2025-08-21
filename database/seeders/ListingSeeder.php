<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listing;
use App\Models\Category;
use App\Models\User;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all(); // Asume que ya hay usuarios registrados
        $categories = Category::all();

        foreach (range(1, 10) as $i) {
            $listing = Listing::create([
                'user_id' => $users->random()->id,
                'title' => "Listing $i",
                'description' => "Descripción del listing $i",
                'price' => rand(50, 500),
                'location' => 'Ciudad ' . rand(1, 10),
            ]);

            // Asociar categorías aleatorias
            $listing->categories()->attach(
                $categories->random(rand(1, 2))->pluck('id')->toArray()
            );
        }
    }
}
