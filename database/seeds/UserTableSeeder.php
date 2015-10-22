<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < Config::get('seeding.users'); $i++) {

            $user = User::create([
                'name' => $faker->name,
                'password' => bcrypt('password'),
                'email' => $faker->email,
                'active' => $i === 0 ? true : $faker->boolean,
                'gender' => $faker->randomElement(['male', 'female', 'other']),
                'timezone' => $faker->numberBetween(-10, 10),
                'birthday' => $faker->dateTimeBetween('-40 years', '-18 years'),
                'location' => $faker->boolean ? "{$faker->city}, {$faker->state}" : null,
                'had_feedback_email' => $faker->boolean,
                'sync_name_bio' => $faker->boolean,
                'bio' => $faker->sentence(100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
