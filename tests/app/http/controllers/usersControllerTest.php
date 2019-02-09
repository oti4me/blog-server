<?php

namespace Test\App\Http\Controllers;

use App\Models\User;
use Faker\Factory as Faker;

class UsersControllerTest extends \TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserSignupSuccess()
    {
        $faker = Faker::create();
        $email = $faker->email;

        $password = $faker->firstName;

        $this->post('api/v1/signup', [
          "firstName" => $faker->firstName,
          "lastName" => $faker->lastName,
          "email" => $email,
          "password" => $password,
          "phone" => $faker->phoneNumber,
          "password_confirmation" => $password
        ]);

        $response = json_decode($this->response->getContent());

        $this->assertEquals(
            $response->user->email,
            $email
        );
    }
}
