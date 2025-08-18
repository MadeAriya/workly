<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Agenda;
use Carbon\Carbon;

class KinerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = 5; 
        $jumlahKegiatan = 10;

        for ($i = 1; $i <= $jumlahKegiatan; $i++) {
            $tanggal = Carbon::parse('2025-06-01')->addDays($i);

            Agenda::create([
                'users_id'              => $userId,
                'waktu'                 => $tanggal->format('Y-m-d H:i:s'),
                'nama'                  => "Kegiatan Ke-$i",
                'tempat'                => "Ruang Rapat $i",
                'agenda'                => "Agenda kegiatan nomor $i",
                'pelaksanaan_kegiatan'  => "Pelaksanaan berjalan lancar untuk kegiatan ke-$i.",
                'hasil_kegiatan'        => "Hasil: sukses dan sesuai rencana.",
                'dokumentasi_1'         => "foto$i-1.jpg",
                'dokumentasi_2'         => "foto$i-2.jpg",
                'dokumentasi_3'         => "foto$i-3.jpg",
                'skor'                  => rand(70, 100), // contoh skor
                'created_at'            => now(),
                'updated_at'            => now(),
            ]);
        }
    }
}
