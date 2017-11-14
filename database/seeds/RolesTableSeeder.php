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
            ['Guide', 'Know the trails, be the trails'],
            ['Chef', 'Cook the food and feed us'],
            ['Fire Starter', 'Only you can prevent forest fires']
            ['Musician', 'Bring your guitar!'],
            ['Designated Driver', 'Or pay for the Uber']
        ];

        $count = count($roles);
        
        foreach ($roles as $key => $role) {
            Role::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $role[0],
                'description' => $role[1]
            ]);
            $count--;
        }
    }
}
