<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\City;
use App\Models\User;
use App\Models\Response;
use App\Models\File;

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

    public function responses() {
        return $this->hasMany(Response::class);
    }

    public function files() {
        return $this->hasMany(File::class);
    }
}
