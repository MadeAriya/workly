<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekly extends Model
{
    use HasFactory;
    protected $table = 'weekly';

    protected $fillable = [
        'users_id',
        'jabatan',
        'minggu',
        'tanggalMulai',
        'tanggalSelesai',
        'target',
    ];

    protected $casts = [
        'target' => 'array',
        'tanggalMulai' => 'date',
        'tanggalSelesai' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
