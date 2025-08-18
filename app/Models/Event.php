<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event';

    protected $fillable = [
        'users_id',
        'title',
        'start',
        'end',
        'color'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
