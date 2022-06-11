<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Task;
use App\Models\User;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'author_id',
        'receiver_id',
        'comment',
        'rating',
    ];

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function task() {
        return $this->belongsTo(Task::class);
    }
}
