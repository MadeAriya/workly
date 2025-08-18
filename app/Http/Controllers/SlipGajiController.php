<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SlipGaji;
use App\Models\User;
use App\Models\Payroll;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SlipGajiController extends Controller
{
    public function index(){
        $slipgaji = SlipGaji::with('user')->get();
        return view('slip-gaji.index', [
            'slipgaji' => $slipgaji
        ]);
    }

    public function create(){
        $users = User::select('id', 'username')->get();
        return view('slip-gaji.create',[
            'users' => $users
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'users_id' => 'required',
            'bulan' => 'required',
        ]);

        $users = User::select('id', 'username')->get();
        $userId = $request->users_id;
        $bulanInput = $request->bulan;
        $payroll = Payroll::where('users_id', $userId)
                ->where('bulan', $bulanInput)
                ->first();

        $payroll = Payroll::where('users_id', $userId)
                ->where('bulan', $bulanInput)
                ->first();

        $now = Carbon::now();
        $html = view('slip-gaji.template', [
            'payroll' => $payroll,
            'users' => $users,
            'now' => $now
        ])->render();

        $pdf = PDF::loadHTML($html, 'UTF-8');

        $fileName = 'slip_gaji_'.$userId.'_'.$bulanInput.'.pdf';

        $directory = public_path('uploads/slipgaji');
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }

        $pdf->save($directory . '/' . $fileName);

        $data = [
            'users_id' => $userId,
            'payroll_id' => $payroll->id,
            'file_pdf' => $fileName,
            'tanggal_generate' => $now,
        ];
        SlipGaji::create($data);
        return redirect()->route('manage_slipgaji');
    }

    public function download($id){
        $slip = SlipGaji::findOrFail($id);
        if($slip->users_id !== Auth()->id()){
            abort('403', 'Tidak boleh akses');
        }
        return response()->download(public_path('uploads/slipgaji/'.$slip->file_pdf));
    }
}
