<?php

namespace App\Ship\Seeders;

use Illuminate\Database\Seeder;
use App\Containers\Group\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::insert(
            [
                [
                    'name' => 'VIP',
                ],
                [
                    'name' => 'Gold',
                ],
                [
                    'name' => 'Silver',
                ],
                [
                    'name' => 'Bronze',
                ],
                [
                    'name' => 'Classic',
                ],
            ]
        );

    }
}