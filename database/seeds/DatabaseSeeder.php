<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GroupUserTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(RolesTableSeeder::class);
    }
}
