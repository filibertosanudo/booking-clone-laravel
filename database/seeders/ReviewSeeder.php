<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Listing;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $listings = Listing::all();

        foreach ($listings as $listing) {
            foreach ($users->random(rand(1, 3)) as $user) {
                Review::create([
                    'user_id' => $user->id,
                    'listing_id' => $listing->id,
                    'rating' => rand(1, 5),
                    'comment' => "Esta es la review de {$user->name} para {$listing->title}.",
                ]);
            }
        }
    }
}
