<?php

use Illuminate\Database\Seeder;
use App\Task;

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
            ['Sneeks', 'Get new sneakers'],
            ['Watah', 'Bring water'],
            ['Playlist', 'Set up a new running playlist'],
            ['Cooking Supplies', 'Burner, grill, charcol/wood chips, lighter, tin foil'],
            ['Food', 'Steaks, Veggies']
            ['Alcohol', 'Beer and wine'],
            ['Champagne', 'Just in case ;)'],
            ['Phone charger', 'Just in case']
        ];

        $count = count($tasks);
        
        foreach ($tasks as $key => $task) {
            Book::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $task[0],
                'description' => $task[1]
            ]);
            $count--;
        }
    }
}
