<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Absen;
use Carbon\Carbon;

class AuthenticateController extends Controller
{
    public function create()
    {
        $absen = Absen::all();
        return view('auth.login',[
            'absen' => $absen,
        ]);
    }

    public function store(Request $request)
    {
        $status = $request->status;
        session(['status' => $status]);
        $keterangan = $request->keterangan;
        session(['keterangan' => $keterangan]);

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('face');
        }

        return back()->with('loginError', 'login failed');
    }

    public function logout(Request $request)
    {
       $user = Auth::id();

       $absen = Absen::where('users_id', $user)
                    ->where('tanggal', date('Y-m-d'))
                    ->latest()
                    ->first();

        if ($absen) {
            $absen->logout_kerja = Carbon::now()->toTimeString();
            $absen->save();
        }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
