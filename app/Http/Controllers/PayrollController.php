<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Payroll;
use App\Models\Evaluasi;
use App\Models\Absen;

class PayrollController extends Controller
{
    public function index(){
        $payrolls = Payroll::with('user')->get();
        return view('payrolls.index', [
            'payrolls' => $payrolls
        ]);
    }

    public function create(){
        $users = User::select('id', 'username')->get();
        return view('payrolls.create',[
            'users' => $users
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'users_id' => 'required',
            'bulan' => 'required',
            'status' => 'required'
        ]);

        $userId = $request->users_id;
        $bulanInput = $request->bulan;
        $hariKerja = 22;

        if ($userId && $bulanInput) {
            $evaluasi = Evaluasi::where('users_id', $userId)
                ->where('bulan', $bulanInput)
                ->first();
            $jumlahHadir = $evaluasi->kehadiran;

            $absen = $hariKerja - $jumlahHadir;
            $gajiPokok = $request->gaji_pokok;
            $tunjangan = $request->tunjangan;
            $bonus = $request->bonus;
            $bpjs = $request->bpjs;
            $pajak = $request->pajak;

            $potonganAbsen = ($gajiPokok / $hariKerja) * $absen;

            $gajiBersih = $gajiPokok + $tunjangan + $bonus - $potonganAbsen - $bpjs - $pajak;
        }

        $data = [
            'users_id' => $request->users_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $gajiPokok,
            'tunjangan' => $tunjangan,
            'bonus' => $bonus,
            'potongan' => $potonganAbsen,
            'bpjs' => $bpjs,
            'pajak' => $pajak,
            'gaji_bersih' => $gajiBersih,
            'status' => $request->status,
        ];

        Payroll::create($data);
        return redirect()->route('manage_payrolls');
    }
}
