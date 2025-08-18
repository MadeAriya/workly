<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Absen extends Model
{
    use HasFactory;
    protected $table= 'absen';

    protected $dates = ['tanggal'];

    protected $fillable = [
        'users_id',
        'tanggal',
        'login_kerja',
        'logout_kerja',
        'gambar_wajah',
        'status',
        'keterangan'
    ];

    public function getStatusKerjaLabelAttribute()
    {
        return match ($this->status) {
            'wfo' => 'WFO - Kerja di kantor',
            'wfh' => 'WFH - Kerja dari rumah',
            'sakit' => 'Sakit - Tidak bekerja',
            'izin' => 'Sakit - Tidak bekerja',
            default => 'Status tidak diketahui',
        };
    }

    public function getWorkingHoursAttribute(){
        if (!$this->login_kerja || !$this->logout_kerja) {
            return 0;
        }

        $start = Carbon::parse($this->login_kerja);
        $end = Carbon::parse($this->logout_kerja);

        return $start->diffInMinutes($end);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
