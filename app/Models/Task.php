<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\City;
use App\Models\User;
use App\Models\Response;
use App\Models\File;
use App\Models\Status;
use App\Models\Message;

class Task extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task';

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'user_id',
        'city_id',
        'budget',
        'deadline',
        'location',
        'performer_id',
        'status'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function performer() {
        return $this->belongsTo(User::class, 'performer_id')->select([
            'id',
            'name',
            'avatar',
            'rating',
        ]);
    }

    public function responses() {
        return $this->hasMany(Response::class);
    }

    public function files() {
        return $this->hasMany(File::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
