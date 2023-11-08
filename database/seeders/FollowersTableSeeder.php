<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();      
        $user = $users->find(2);
        $followers = $users->forget(1);
        
        $user->follow($followers->pluck('id')->toArray());
        
        foreach ($followers as $follower) {
            $follower->follow($user->id);
        }
    }
}
