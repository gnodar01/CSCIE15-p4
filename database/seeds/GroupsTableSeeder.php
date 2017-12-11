<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            ['Outside Activities', 'We love to run, hike, camp, and play outside!'],
            ['Happy Fun Time', 'Mostly drinking...']
        ];

        $count = count($groups);
        
        foreach ($groups as $key => $group) {
            Group::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $group[0],
                'description' => $group[1]
            ]);
            $count--;
        }
    }
}
