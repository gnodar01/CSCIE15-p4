<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\User;

class GroupUserTableSeeder extends Seeder
{
    public function run()
    {
        $users =[
            'Billy Bob' => ['Outside Activities', 'Happy Fun Time'],
            'Craig Church' => ['Happy Fun Time'],
            'Saylly Sue' => ['Outside Activities'],
            'Kelly Klarkson' => ['Outside Activities', 'Happy Fun Time'],
            'Lucy Lee' => ['Happy Fun Time'],
            'Yin Yang' => ['Outside Activities'],
            'Yonny Yoman' => ['Outside Activities', 'Happy Fun Time'],
            'Zak Zebra' => ['Happy Fun Time']
        ];

        foreach ($users as $username => $groups) {

            $user = User::where('name', 'like', $username)->first();

            foreach ($groups as $groupName) {
                $group = Group::where('name', 'LIKE', $groupName)->first();

                $user->groups()->save($group);
            }
        }
    }
}
