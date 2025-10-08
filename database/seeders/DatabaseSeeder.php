<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Flight;
use App\Models\Group;
use App\Models\Hotel;
use App\Models\Package;
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

        Agent::factory(5)->create();
        Hotel::factory(5)->create();
        Flight::factory(5)->create();
        Package::factory(5)->create();
        Group::factory(5)->create();
    }
}
