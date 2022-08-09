<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Factory as Faker;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i= 1; $i <= 100; $i++)  {
            $profile = new Post();
            $profile->profile_id = $faker->numberBetween(1,100);
            $profile->title = $faker->sentence;
            $profile->description = $faker->paragraph;
            $profile->status = $faker->numberBetween(0,1);
            $profile->tags = $faker->word;
            $profile->save();

        }
    }
}
