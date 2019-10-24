<?php

use App\Entities\Users\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Faker\Factory::create();

        $this->createUserClinicOwner();
    }

    private function createUserClinicOwner()
    {
        /**
         * @var $userClinic User
         */
        $userClinic = User::query()->create([
            'name' => 'K n P Clinic',
            'email' => 'knpclinic@gmail.com',
            'password' => bcrypt('password'),
            'role' => User::ROLE_CLINIC_OWNER,
        ]);

        $userClinic->clinic()->create([
            'name' => $userClinic->getAttribute('name'),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
        ]);
    }
}
