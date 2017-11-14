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
            ['Fun Run', '12-01-2017', '12-01-2017', '08:00:00', '15:00:00', 'A Fun Run in the sun (but cold)', 'Da Trak'],
            ['Camping Trip', '04-08-2018', '04-10-2018', '08:00:00', '22:00:00', 'Just friends and nature', 'nature'],
            ['New Years Celebration', '12-31-2017', '01-01-2018', '20:00:00', '02:00:00', 'Celebrate the new year!', 'Around downtown']
        ];

        $count = count($activities);

        foreach ($activities as $key => $activity) {
            Activity::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $activity[0],
                'date_start' => Carbon\Carbon::createFromFormat('m-d-Y', $activity[1])->toDateString(),
                'date_end' => Carbon\Carbon::createFromFormat('m-d-Y', $activity[2])->toDateString(),
                'time_start' => Carbon\Carbon::createFromFormat('H:i:s', $activity[3])->toTimeString(),
                'time_end' => Carbon\Carbon::createFromFormat('H:i:s', $activity[4])->toTimeString(),
                'description' => $activity[5],
                'location' => $activity[6]
            ]);
            $count--;
        }
    }
}
