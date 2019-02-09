<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Post extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
			'title', 
			'description', 
			'content', 
			'user_id', 
			'image',
    ];

          /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public static $validatePost = [
        'title' => 'required',
        'description' => 'required',
        'content' => 'required',
        'image' => 'required',
    ];

    public static $validateUpdate = [
        'title' => 'required',
        'description' => 'required',
        'content' => 'required',
        'image' => 'required',
    ];

      public function comment() {
      return $this->hasMany(\App\Models\Comment::class);
    }
}
