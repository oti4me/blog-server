<?php

namespace Test\App\Http\Controllers;

use App\Models\User;
use Faker\Factory as Faker;
use App\helpers\AuthHelpers;

class PostsControllerTest extends \TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testAddPostSuccess()
  {
    $faker = Faker::create();

    $user = factory(\App\Models\User::class)->create();

    $token = AuthHelpers::jwtEncode($user);

    $header = ['Authorization' => $token];

    $title = $faker->name;

    $this->post('api/v1/posts', [
      'title' => $title,
      'description' => $faker->sentence(),
      'content' => $faker->paragraph(rand(3, 5), true),
      'user_id' => 1,
      'image' => $faker->imageUrl($width = 640, $height = 480)
    ], $header);

    $response = json_decode($this->response->getContent());


    $this->assertEquals(
      $response->post->title,
      $title
    );
  }
}
