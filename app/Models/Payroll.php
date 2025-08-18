<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $table = 'payroll';

    protected $fillable = [
        'users_id',
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'bonus',
        'potongan',
        'bpjs',
        'pajak',
        'gaji_bersih',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
