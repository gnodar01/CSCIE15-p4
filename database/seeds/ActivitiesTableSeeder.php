<?php

use Illuminate\Database\Seeder;
use App\Activity;
use App\Group;

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
            ['Hiking', 'Outside Activities', '11-07-2017', '11-07-2017', '08:00:00', '14:00:00', 'Hike before thanksgiving', 'pre-turkey hike'],
            ['Fun Run', 'Outside Activities', '12-01-2017', '12-01-2017', '08:00:00', '15:00:00', 'A Fun Run in the sun (but cold)', 'Da Trak'],
            ['Camping Trip', 'Outside Activities', '04-08-2018', '04-10-2018', '08:00:00', '22:00:00', 'Just friends and nature', 'nature'],
            ['New Years Celebration', 'Happy Fun Time', '12-31-2017', '01-01-2018', '20:00:00', '02:00:00', 'Celebrate the new year!', 'Around downtown']
        ];

        foreach ($activities as $key => $activity) {
            $group = $activity[1];
            $group_id = Group::where('name', '=', $group)->pluck('id')->first();

            $count = count($activities);

            Activity::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $activity[0],
                'date_start' => Carbon\Carbon::createFromFormat('m-d-Y', $activity[2])->toDateString(),
                'date_end' => Carbon\Carbon::createFromFormat('m-d-Y', $activity[3])->toDateString(),
                'time_start' => Carbon\Carbon::createFromFormat('H:i:s', $activity[4])->toTimeString(),
                'time_end' => Carbon\Carbon::createFromFormat('H:i:s', $activity[5])->toTimeString(),
                'description' => $activity[6],
                'location' => $activity[7],
                'group_id' => $group_id
            ]);
            $count--;
        }
    }
}
