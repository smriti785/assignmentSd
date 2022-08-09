<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;
use Faker\Factory as Faker;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fake = Faker::create();
        for($i= 1; $i <= 100; $i++)  {
            $profile = new Profile();
            $profile->name = $fake->name;
            $profile->profile = $fake->paragraph;
            $profile->images = $fake->imageUrl(640, 480, 'people');
            $profile->gender = $fake->numberBetween(0,1);
            $profile->location = $fake->city;
            $profile->save();
        }
    }
}
