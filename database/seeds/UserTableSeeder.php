<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('id_ID');

        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'member'.'@gmail.com',
            'password' => Hash::make('member1'),
        ]);

        for($i = 0; $i < 20; $i++) {
            App\User::create([
                'name' => $faker->name,
                'email' => $faker->freeEmail,
                'password' => Hash::make('memberx'),
            ]);
        }
    }
}
