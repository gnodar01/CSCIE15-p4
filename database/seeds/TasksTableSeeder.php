<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\User;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            ['Sneeks', 'Billy Bob', 'Get new sneakers'],
            ['Watah', 'Sally Sue', 'Bring water'],
            ['Playlist', 'Kelly Klarkson', 'Set up a new running playlist'],
            ['Cooking Supplies', 'Yin Yang', 'Burner, grill, charcol/wood chips, lighter, tin foil'],
            ['Food', 'Yonny Yoman', 'Steaks, Veggies'],
            ['Alcohol', 'Billy Bob', 'Beer and wine'],
            ['Champagne', 'Craig Church', 'Just in case ;)'],
            ['Phone charger', 'Lucy Lee', 'Just in case'],
            ['Poppers', 'Zak Zebra', 'Those things that shoot confetti when you pull the string']
        ];

        $count = count($tasks);
        
        foreach ($tasks as $key => $task) {
            $username = $task[1];
            $user_id = User::where('name', '=', $username)->pluck('id')->first();

            Task::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $task[0],
                'user_id' => $user_id,
                'description' => $task[2]
            ]);
            $count--;
        }
    }
}
