<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset;
use App\Models\User;
use App\Models\Category;
use App\Models\Room;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Asset::factory(20)->create();
        Category::factory(5)->create();
        Room::factory(10)->create();
    }
}
