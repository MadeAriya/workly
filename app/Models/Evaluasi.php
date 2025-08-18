<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;
    protected $table = 'evaluasi_kerja';

    protected $fillable = [
        'users_id',
        'bulan',
        'kehadiran',
        'kinerja',
        'evaluasi_admin',
        'catatan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
