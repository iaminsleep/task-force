<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\City;
use App\Models\User;
use App\Models\Feedback;

class Task extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task';

    public $timestamps = false;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function feedbacks() {
        return $this->hasMany(Feedback::class);
    }
}
