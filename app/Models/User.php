<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'user_code',
        'password',
        'role',
        'city_corporation',
        'jln',
        'thana',
        'district',
        'holding_no',
        'khotian_no',
        'owner_share',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    protected static function booted()
    {
        static::creating(static function ($user) {
            if (empty($user->user_code)) {
                $user->user_code = strtoupper(Str::random(12));
            }
        });
    }

    public function userLandInfo()
    {
        return $this->hasmany(UserLandInformation::class,'user_id','id');
    }

    public function userRevenueInfo()
    {
        return $this->hasmany(UserRevenueInformation::class,'user_id','id');
    }
}
