<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
			'email', 
			'phone', 
			'password', 
			'lastName', 
			'firstName',
			'profile_pic',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
      'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public static $siginupRules = [
        'firstName' => 'required|max:25|alpha',
        'lastName' => 'required|max:25|alpha',
        'password' => 'required|min:4|max:25|confirmed',
        'email' => 'required|email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public static $sigininRules = [
        'password' => 'required|min:4|max:25',
        'email' => 'required|email',
    ];

}
