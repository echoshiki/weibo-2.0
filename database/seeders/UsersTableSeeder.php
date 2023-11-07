<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(50)->create();

        foreach (['spring', 'summer', 'autumn', 'winter'] as $k => $v) {
            $user = User::find($k + 1);
            $user->name = $v;
            $user->email = $v.'@qq.com';
            $user->password = bcrypt('123123');
            $user->save();
        }
    }
}
