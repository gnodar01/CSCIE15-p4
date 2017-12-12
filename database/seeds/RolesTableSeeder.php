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
            ['Guide', 'Billy Bob', 'Know the trails, be the trails'],
            ['Chef', 'Yin Yang', 'Cook the food and feed us'],
            ['Fire Starter', 'Sally Sue', 'Only you can prevent forest fires'],
            ['Musician', 'Yonny Yoman', 'Bring your guitar!'],
            ['Designated Driver', 'Craig Church', 'Or pay for the Uber'],
        ];

        $count = count($roles);
        
        foreach ($roles as $key => $role) {
            $username = $role[1];
            $user_id = User::where('name', '=', $username)->pluck('id')->first();

            Role::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $role[0],
                'user_id' => $user_id,
                'description' => $role[2]
            ]);
            $count--;
        }
    }
}
