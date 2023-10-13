<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            [
                'name' => 'Dony García',
                'email' => 'donygarc20@gmail.com',
                'password' => 'password',
                'roles' => [1, 2],
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'password' => 'password',
                'roles' => [2],
            ],
        ];

        foreach ($users as $user) {
            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
            
            $newUser->roles()->sync($user['roles']);

            $newUser->wallet()->create([
                'credits' => 0,
                'user_id' => $newUser->id
            ]);
        }
    }
}
