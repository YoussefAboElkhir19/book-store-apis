<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // Using trait  HasApiTokens to can using fun createToken in class AuthControlller
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // columes can Send it  a request when store new data
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'roles',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'email_verified_at',
        'remember_token',
        'updated_at',
        'deleted_at'
    ];


    function roles(): Attribute
    {
        return Attribute::make(
            // convert array to string in DB
            set: fn($val) => implode(',', $val),
            get: fn($val) => explode(',', $val)

        );
    }
    function name(): Attribute
    {
        return Attribute::make(
            // first letter of name is Upper
            set: fn($val) => ucwords($val)
        );
    }
    function email(): Attribute
    {
        return Attribute::make(
            set: fn($val) => strtolower($val)
        );
    }
    // function id(): Attribute
    // {
    //     return Attribute::make(
    //         // convert number to string
    //         get: fn($val) => strval($val)
    //     );
    // }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // Relation
    function books()
    {
        return $this->hasMany(Book::class);
    }
}
