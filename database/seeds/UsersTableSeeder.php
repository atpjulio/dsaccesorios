<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Initial users
        $initialUsers = [
            [
                'first_name' => 'Cindy',
                'last_name' => 'Orozco',
                'email' => 'admin@dsaccesorios365.com',
                'password' => bcrypt('123456'),
                'user_type' => config('constants.userRoles.admin'),
            ],
            [
                'first_name' => 'Usuario',
                'last_name' => 'Número 1',
                'email' => 'usuario1@dsaccesorios365.com',
                'password' => bcrypt('123456'),
                'user_type' => config('constants.userRoles.user'),
            ],
            [
                'first_name' => 'Usuario',
                'last_name' => 'Número 2',
                'email' => 'usuario2@dsaccesorios365.com',
                'password' => bcrypt('123456'),
                'user_type' => config('constants.userRoles.user'),
            ]
        ];

        foreach ($initialUsers as $currentUser) {
            $user = User::create($currentUser);
            $user->assignRole(config('constants.userRolesString')[$currentUser['user_type']]);
        }
    }
}
