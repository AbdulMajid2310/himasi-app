<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    //     'username'
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $with = ['student'];



    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'nim', 'nim');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($user) {

    //         $username = preg_replace('/[^a-zA-Z0-9]/', '', strtolower($user->student->name));
    //         $count = static::where('username', 'LIKE', "$username%")->count();
    //         $user->username = $count ? $username . $count : $username;
    //     });
    // }
}
