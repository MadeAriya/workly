<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda';

    protected $dates = ['waktu'];

    protected $casts = [
        'waktu' => 'datetime',
    ];

    protected $fillable = [
      'users_id',
      'nama',
      'waktu',
      'tempat',
      'agenda',
      'pelaksanaan_kegiatan',
      'hasil_kegiatan',
      'dokumentasi_1',
      'dokumentasi_2',
      'dokumentasi_3',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
