<?php

use Illuminate\Database\Seeder;
use App\Activity;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
            ['Fun Run', '12-1-2017', '12-1-2017', '8:00am', '3:00pm', 'A Fun Run in the sun (but cold)', 'Da Trak', 'images.com/runningfun'],
            ['Camping Trip', '4-8-2018', '4-10-2018', '8:00am', '10:00pm', 'Just friends and nature', 'nature'],
            ['New Years Celebration', '12-31-2017', '1-1-2018', '8:00pm', '2:00am', 'Celebrate the new year!', 'Around downtown', 'images.com/newyear']
        ];

        $count = count($activities);
        
        foreach ($activities as $key => $activity) {
            Book::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $activity[0],
                'date_start' => $activity[1],
                'date_end' => $activity[2],
                'time_start' => $activity[3],
                'time_end' => $activity[4],
                'description' => $activity[5],
                'location' => $activity[6],
                'image' => $activity[7] ? $activity[7] : ''
            ]);
            $count--;
        }
    }
}
