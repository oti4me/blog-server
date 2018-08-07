<?php

namespace Test\App\Http\Controllers;

use App\Models\User;

class UsersControllerTest extends \TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserSignupSuccess()
    {
        $this->post('api/v1/signup', [
          "firstName" => "Henry",
          "lastName" => "Otighe",
          "email" => "testmail@gmail.com",
          "password" => "jsonbourn",
          "phone" => "07067143161",
          "password_confirmation" => "jsonbourn"
        ]);

        $response = json_decode($this->response->getContent());

        $this->assertEquals(
            $response->user->email, "testmail@gmail.com"
        );
    }
}
