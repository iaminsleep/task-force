<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Task;
use App\Models\User;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'city';

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }
}
