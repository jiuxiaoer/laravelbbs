<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $avatars = [
            '/uploads/images/avatars/202110/29/1_1635522470_nB050EcW8c.jpg',
            '/uploads/images/avatars/202110/29/1_1635522470_nB050EcW8c.jpg',
            '/uploads/images/avatars/202110/29/1_1635522470_nB050EcW8c.jpg',
            '/uploads/images/avatars/202110/29/1_1635522470_nB050EcW8c.jpg',
            '/uploads/images/avatars/202110/29/1_1635522470_nB050EcW8c.jpg',
            '/uploads/images/avatars/202110/29/1_1635522470_nB050EcW8c.jpg',
        ];

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('123456'), // password
            'remember_token' => Str::random(10),
            'introduction' => $this->faker->sentence(),
            'avatar' => $this->faker->randomElement($avatars),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
