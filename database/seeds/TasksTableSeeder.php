<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\User;
use App\Activity;

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
            ['Sneeks', 'Billy Bob', 'Fun Run', 'Get new sneakers'],
            ['Watah', 'Sally Sue', 'Hiking', 'Bring water'],
            ['Playlist', 'Kelly Klarkson', 'Fun Run', 'Set up a new running playlist'],
            ['Cooking Supplies', 'Yin Yang', 'Camping Trip', 'Burner, grill, charcol/wood chips, lighter, tin foil'],
            ['Food', 'Yonny Yoman', 'Camping Trip', 'Steaks, Veggies'],
            ['Alcohol', 'Billy Bob', 'Camping Trip', 'Beer and wine'],
            ['Champagne', 'Craig Church', 'New Years Celebration', 'Just in case ;)'],
            ['Phone charger', 'Lucy Lee', 'New Years Celebration', 'Just in case'],
            ['Poppers', 'Zak Zebra', 'New Years Celebration', 'Those things that shoot confetti when you pull the string']
        ];

        $count = count($tasks);
        
        foreach ($tasks as $key => $task) {
            $username = $task[1];
            $user_id = User::where('name', '=', $username)->pluck('id')->first();

            $activity = $task[2];
            $activity_id = Activity::where('name', '=', $activity)->pluck('id')->first();

            Task::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $task[0],
                'user_id' => $user_id,
                'activity_id' => $activity_id,
                'description' => $task[3]
            ]);
            $count--;
        }
    }
}
