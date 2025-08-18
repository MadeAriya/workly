<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class AbsenController extends Controller
{
    public function index()
{
    $userId = Auth::id();

    $absens = Absen::where('users_id', $userId)
        ->orderBy('tanggal')
        ->get();

    $labels = [];
    $data = [];
    $groupedAbsens = [];

    foreach ($absens as $absen) {
        $tanggal = Carbon::parse($absen->tanggal)->format('Y-m-d');
        if (!isset($groupedAbsens[$tanggal])) {
            $groupedAbsens[$tanggal] = $absen;
        }
    }

    foreach ($groupedAbsens as $tanggal => $absen){
        $start = Carbon::parse($absen->login_kerja);
        $end = Carbon::parse($absen->logout_kerja);

        $duration = $end->diffInMinutes($start);
        $durationHours = round($duration / 60, 2);

        $labels[] = Carbon::parse($absen->tanggal)->format('Y-m-d');
        $data[] = $durationHours;
    }

    return view('absen.index', compact('absens', 'labels', 'data'));
}


    public function create()
    {
        return view('auth.face');
    }

    public function store(Request $request)
    {
        // Contoh codingan method store ngambil data pake ajax di face.blade.php
        $image = $request->image;
        $tanggal = date("Y-m-d");
        $waktu = date("H:i:s"); // Ditolak windows kalau disimpan ke filemanager jadi harus gunain - kalau ke database gunain :
        $waktuFileName = date("H-i-s");

        $folderPath = "absensi/"; // Reminder aja ini nyambung ke public path
        $formatName = $waktuFileName . "-" . $tanggal;
        $imageParts = explode(";base64,", $image); // Changed to properly handle base64 data
        $imageBase = base64_decode($imageParts[1]); // Base64 decoding

        $fileName = $formatName . ".png";
        $filePath = $folderPath . $fileName;
        $status = session('status');
        $keterangan = session('keterangan');
        $data = [
            'users_id' => Auth::id(),
            'tanggal' => $tanggal,
            'login_kerja' => $waktu,
            'gambar_wajah' => $fileName,
            'status' => $status,
            'keterangan' => $keterangan,
        ];

        Absen::create($data);
        Storage::put($filePath, $imageBase); // Save the file to storage (make sure the 'public' disk is configured in config/filesystems.php)

        // Contoh memasukan data kedalam json
            return response()->json([
                'success' => true,
                'redirectUrl' => Auth::user()->jabatan === 'admin'
            ? route('dashboard.admin')
            : route('dashboard')
            ]);
    }

    public function detailAbsence($id){
        $user = User::find($id);
        $absens = Absen::where('users_id', $id)
        ->orderBy('tanggal')
        ->get();

        $labels = [];
        $data = [];

        foreach($absens as $absen){
            $start = Carbon::parse($absen->login_kerja);
            $end = Carbon::parse($absen->login_kerja);

            $duration = $end->diffInMinutes($start);
            $durationHours = round($duration / 60,2);

            $labels[] = Carbon::parse($absen->tanggal)->format('Y-m-d');
            $data[] = $durationHours;
        }

        return view('management.absen', compact('absens', 'labels', 'data', 'user'));
    }
}
