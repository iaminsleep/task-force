<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use App\Models\Task;
use App\Models\Response;
use App\Models\Feedback;
use App\Models\Message;
use App\Models\City;

use Eloquent;
class User extends Eloquent implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AuthenticableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'city_id',
        'avatar',
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
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value); //automatically bcrypts the password on register
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function responses() {
        return $this->hasMany(Response::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function receivedFeedbacks()
    {
        return $this->hasMany(Feedback::class, 'receiver_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
