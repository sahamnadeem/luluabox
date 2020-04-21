<?php

namespace App;

use App\Notifications\PasswordResetRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use LaratrustUserTrait, HasApiTokens;
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone_no','deleted_at','status_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'android_token', 'ios_token','otp', 'verification_code'
    ];

    protected $dates = ['deleted_at'];
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function status(){
        return $this->belongsTo(Status::class)->withDefault([
            'title' => 'Not Set'
        ]);
    }
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetRequest($token));
    }
}
