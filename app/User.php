<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use DateTimeInterface;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $guarded = ['id'];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */

    public function today_check_in()
    {
        return $this->hasOne('App\Attendance')->whereDate('created_at', date('Y-m-d'))->where('status', 'check in');
    }

    public function today_check_out()
    {
        return $this->hasOne('App\Attendance')->whereDate('created_at', date('Y-m-d'))->where('status', 'check out');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
