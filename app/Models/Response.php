<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Task;

class Response extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'response';

    protected $fillable = [
        'user_id',
        'task_id',
        'payment',
        'comment'
    ];

    public function task() {
        return $this->belongsTo(Task::class)->select([
            'id',
            'status_id',
            'performer_id',
        ]);
    }

    public function user() {
        return $this->belongsTo(User::class)->select([
            'id',
            'name',
            'avatar',
            'rating',
        ]);
    }
}
