<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['Jill Harvard', 'jill@harvard.edu', Hash::make('helloworld')],
            ['Jamal Harvard', 'jamal@harvard.edu', Hash::make('helloworld')],
            ['Billy Bob', 'Billy@gmail.com', Hash::make('billyisawesome')],
            ['Craig Church', 'Craig@gmail.com', Hash::make('123pass')],
            ['Sally Sue', 'Sally@gmail.com', Hash::make('tiemyshoe')],
            ['Kelly Klarkson', 'Kelly@gmail.com', Hash::make('keller!')],
            ['Lucy Lee', 'Lucy@gmail.com', Hash::make('lucylovesu@')],
            ['Yin Yang', 'YangYin@gmail.com', Hash::make('yingyangyo')],
            ['Yonny Yoman', 'Yoman@gmail.com', Hash::make('yo_man')],
            ['Zak Zebra', 'Zebra@gmail.com', Hash::make('ilikestripes')]
        ];

        $count = count($users);
        
        foreach ($users as $key => $user) {
                User::insert([
                    'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                    'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                    'name' => $user[0],
                    'email' => $user[1],
                    'password' => $user[2]
                ]);
            $count--;
        }
    }
}
