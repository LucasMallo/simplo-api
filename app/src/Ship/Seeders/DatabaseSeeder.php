<?php

namespace App\Ship\Seeders;

use App\Ship\Seeders\GroupSeeder;
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
        $this->call([
            GroupSeeder::class
        ]);
    }
}
