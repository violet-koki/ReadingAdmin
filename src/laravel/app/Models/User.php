<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Consts\Gender;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nickName',
        'name',
        'mail',
        'gender',
        'password',
    ];

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
        'password' => 'hashed',
        'gender' => Gender::class
    ];

    /**
     * ユーザインスタンス生成
     */
    public static function create(
        string $nickName,
        string $name,
        string $mail,
        Gender $gender,
        string $password
    ): self {
        return (new self())->fill([
            'nick_name' => $nickName,
            'name' => $name,
            'mail' => $mail,
            'gender' => $gender,
            'password' => $password,
        ]);
    }
}
