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
use App\Models\Favourite;

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
        'description',
        'birth_date',
        'specialization',
        'phone',
        'skype',
        'notification_settings',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
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
        if($value != "") {
            $this->attributes['password'] = bcrypt($value); //automatically bcrypts the password on register
        }
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function performing_tasks() {
        return $this->hasMany(Task::class, 'performer_id');
    }

    public function responses() {
        return $this->hasMany(Response::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function received_feedbacks()
    {
        return $this->hasMany(Feedback::class, 'receiver_id');
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
