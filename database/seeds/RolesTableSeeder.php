<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['Guide', 'Billy Bob', 'Hiking', 'Know the trails, be the trails'],
            ['Chef', 'Yin Yang', 'Camping Trip', 'Cook the food and feed us'],
            ['Fire Starter', 'Camping Trip', 'Sally Sue', 'Only you can prevent forest fires'],
            ['Musician', 'Camping Trip', 'Yonny Yoman', 'Bring your guitar!'],
            ['Designated Driver', 'New Years Celebration', 'Craig Church', 'Or pay for the Uber'],
        ];

        $count = count($roles);
        
        foreach ($roles as $key => $role) {
            $username = $role[1];
            $user_id = User::where('name', '=', $username)->pluck('id')->first();

            $activity = $role[2];
            $activity_id = Activity::where('name', '=', $activity)->pluck('id')->first();

            Role::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $role[0],
                'user_id' => $user_id,
                'activity_id' => $activity_id,
                'description' => $role[3]
            ]);
            $count--;
        }
    }
}
