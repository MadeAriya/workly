<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Weekly;
use App\Models\User;

class WeeklyController extends Controller
{
    public function index(){
        $weekly = Weekly::where('users_id', Auth::id())->get();
        return view('weekly.index', [
            'weekly' => $weekly
        ]);
    }

    public function create(){
        return view('weekly.create');
    }

    public function store(Request $request){
        $jabatan = Auth::user()->jabatan;
        $request->validate([
            'minggu' => ['required'],
            'tanggalMulai' => ['required'],
            'tanggalSelesai' => ['required'],
            'target' => ['required', 'array'],
        ]);

        $data = [
            'users_id' => Auth::id(),
            'jabatan' => $jabatan,
            'minggu' => $request->minggu,
            'tanggalMulai' => $request->tanggalMulai,
            'tanggalSelesai' => $request->tanggalSelesai,
            'target' => $request->target,
        ];

        Weekly::create($data);
        return redirect()->route('manage_weekly')->with('success' ,'Data berhasil disimpan');
    }

    public function show($id){
        $weekly = Weekly::find($id);
        $targets = explode(',', $weekly->target);
        return view('weekly.edit', compact('targets', 'weekly'));
    }

    public function update(Request $request, $id){
        $weekly = Weekly::find($id);
        $jabatan = Auth::user()->jabatan;
        $weekly->update([
            'users_id' => Auth::id(),
            'jabatan' => $jabatan,
            'minggu' => $request->minggu,
            'tanggalMulai' => $request->tanggalMulai,
            'tanggalSelesai' => $request->tanggalSelesai,
            'target' => $request->target,
        ]);
        return redirect()->route('manage_weekly')->with('success', 'Data berhasil diedit');
    }

    public function delete($id){
        $weekly = Weekly::find($id);
        $weekly->delete();
        return redirect()->route('manage_weekly')->with('success','Data berhasil dihapus');
    }

    public function detailWeekly($id){
        $user = User::find($id);
        $weekly = Weekly::where('users_id', $id)->get();
        return view('management.weekly', [
            'weekly' => $weekly,
            'user' => $user,
        ]);
    }
}
