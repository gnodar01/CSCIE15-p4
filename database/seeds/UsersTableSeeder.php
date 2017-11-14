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
            ['Billy Bob', 'Billy@gmail.com', 'billyisawesome', 'billysavatar.avatarsrus.com'],
            ['Craig Church', 'Craig@gmail.com', '123pass', 'craigatar.avatarsrus.com'],
            ['Saylly Sue', 'Sally@gmail.com', 'tiemyshoe'],
            ['Kelly Klarkson', 'Kelly@gmail.com', 'keller!', 'klarkatar.avatarsrus.com'],
            ['Lucy Lee', 'Lucy@gmail.com', 'lucylovesu@', 'lucyluvatar.avatarsrus.com'],
            ['Yin Yang', 'YangYin@gmail.com', 'yingyangyo'],
            ['Yonny Yoman', 'Yoman@gmail.com', 'yo_man', 'yovatar.avatarsrus.com'],
            ['Zak Zebra', 'Zebra@gmail.com', 'ilikestripes', 'zebratar.avatarsrus.com']
        ];

        $count = count($users);
        
        foreach ($users as $key => $user) {
            User::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $user[0],
                'email' => $user[1],
                'password' => $user[2],
                'avatar' => $user[3] ? $user[3] : ''
            ]);
            $count--;
        }
    }
}
