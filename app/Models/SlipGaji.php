<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlipGaji extends Model
{
    use HasFactory;
    protected $table = 'slipgaji';

    protected $fillable = [
        'users_id',
        'payroll_id',
        'file_pdf',
        'tanggal_generate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function payroll()
    {
        return $this->belongsTo(Payroll::class, 'payroll_id');
    }
}
