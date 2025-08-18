<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Absen;
use Carbon\Carbon;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = 5;
        $jumlahHari = 20;
        $mulaiTanggal = Carbon::parse('2025-06-01');

        for ($i = 0; $i < $jumlahHari; $i++) {
            $tanggal = $mulaiTanggal->copy()->addDays($i);

            if (in_array($tanggal->format('N'), [6, 7])) {
                continue;
            }

            $loginKerja  = $tanggal->copy()->setTime(8, rand(0, 30));
            $logoutKerja = $tanggal->copy()->setTime(17, rand(0, 15));

            Absen::create([
                'users_id'      => $userId,
                'tanggal'       => $tanggal->format('Y-m-d'),
                'login_kerja'   => $loginKerja->format('H:i:s'),
                'logout_kerja'  => $logoutKerja->format('H:i:s'),
                'gambar_wajah'  => 'dummy.jpg',
                'status'        => 'wfh',
                'keterangan'    => null,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
