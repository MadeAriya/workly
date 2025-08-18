<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluasi;
use App\Models\Agenda;
use App\Models\Absen;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class EvaluasiController extends Controller
{
    public function index(){
        $evaluasi = Evaluasi::with('user')->get();
        return view('evaluasi.index', [
            'evaluasi' => $evaluasi
        ]);
    }

    public function create(){
        $user = User::select('id', 'username')->get();
        return view('evaluasi.create',[
            'user' => $user
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'users_id' => 'required',
            'bulan' => 'required',
            'evaluasi_admin' => 'nullable',
            'catatan' => 'nullable',
        ]);

        $users = User::select('id', 'username')->get();

        $userId = $request->users_id;
        $bulanInput = $request->bulan;

        $jumlahHadir = null;
        $avgSkor = null;
        $bulan = null;
        $tahun = null;

        if ($userId && $bulanInput) {
            $carbon = Carbon::createFromFormat('Y-m', $bulanInput);
            $bulan = $carbon->month;
            $tahun = $carbon->year;

            $jumlahHadir = Absen::where('users_id', $userId)
                ->whereMonth('tanggal', $bulan)
                ->whereYear('tanggal', $tahun)
                ->whereIn('status', ['wfh', 'wfo'])
                ->count();

            $avgSkor = Agenda::where('users_id', $userId)
                ->whereMonth('waktu', $bulan)
                ->whereYear('waktu', $tahun)
                ->avg('skor') ?? 0;
        }

        $data = [
            'users_id' => $request->users_id,
            'bulan' => $request->bulan,
            'kehadiran' => $jumlahHadir,
            'kinerja' => $avgSkor,
            'evaluasi_admin' => $request->evaluasi_admin,
            'catatan' => $request->catatan,
        ];

        Evaluasi::create($data);
        return redirect()->route('manage_evaluasi');
    }
}
