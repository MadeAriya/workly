<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agenda;
use App\Models\User;

class AgendaController extends Controller
{
    public function index(){
        $agenda = Agenda::where('users_id', Auth::id())->get();
        return view('agenda.index', [
            'agenda' => $agenda
        ]);
    }

    public function create(){
        return view('agenda.create');
    }

    public function store(Request $request){
        $request->validate([
            'nama'  => ['required', 'string', 'max:255'],
            'tempat' => ['required'],
            'agenda' => ['required'],
            'pelaksanaan_kegiatan' => 'required',
            'hasil_kegiatan' => 'required',
        ]);

        $data = [
            'users_id' => Auth::id(),
            'waktu' => $request->waktu,
            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'agenda' => $request->agenda,
            'pelaksanaan_kegiatan' => $request->pelaksanaan_kegiatan,
            'hasil_kegiatan' => $request->hasil_kegiatan,
            'dokumentasi_1' => $request->file('dokumentasi_1')->store('dokumentasi/'),
            'dokumentasi_2' => $request->file('dokumentasi_2')->store('dokumentasi/'),
            'dokumentasi_3' => $request->file('dokumentasi_3')->store('dokumentasi/'),
            'skor' => $request->skor,
        ];

        Agenda::create($data);
        return redirect()->route('manage_agenda')->with('success', 'Data berhasil ditambahkan');
    }

    public function giveSkor(Request $request, $id){
        $request->validate([
            'skor' => 'required|numeric|min:0|max:100'
        ]);
        $agenda = Agenda::findOrFail($id);
        $agenda->skor = $request->input('skor');
        $agenda->save();
        return redirect()->route('manage_agenda')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id){
        $agenda = Agenda::find($id);
        return view('agenda.edit', [
            'agenda' => $agenda
        ]);
    }

    public function update(Request $request, $id){
        $agenda = Agenda::find($id);
        $agenda->update([
            'users_id' => Auth::id(),
            'waktu' => $request->waktu,
            'nama' => $request->nama,
            'tempat' => $request->tempat,
            'agenda' => $request->agenda,
            'pelaksanaan_kegiatan' => $request->pelaksanaan_kegiatan,
            'hasil_kegiatan' => $request->hasil_kegiatan,
            'dokumentasi_1' => $request->file('dokumentasi_1')->store('dokumentasi/'),
            'dokumentasi_2' => $request->file('dokumentasi_2')->store('dokumentasi/'),
            'dokumentasi_3' => $request->file('dokumentasi_3')->store('dokumentasi/'),
            'skor' => $request->skor,
        ]);
        return redirect()->route('manage_agenda')->with('success', 'Data berhasil diedit');
    }

    public function delete(string $id){
        $agenda = Agenda::find($id);
        $agenda->delete();
        return redirect()->route('manage_agenda')->with('success', 'Data berhasil dihapus');
    }

    public function detailAgenda($id){
        $user = User::find($id);
        $agenda = Agenda::where('users_id', $id)->get();
        return view('management.agenda', [
            'agenda' => $agenda,
            'user' => $user,
        ]);
    }
}
