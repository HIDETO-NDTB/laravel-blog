<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Sample',
            'email' => 'sample@gmail.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avatar' => asset('uploads/avatar/sample.jpeg'),
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum',
            'facebook' => 'http://www.facebook.com/sample',
            'linkedin' => 'http://www.linkedin.com/sample',
        ]);
    }
}
