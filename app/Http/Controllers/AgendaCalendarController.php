<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AgendaCalendarController extends Controller
{
    public function index(){
        $event = Event::all();
        return view('calendar-agenda.index', $event);
    }

    public function create(){
        return view('calendar-agenda.create');
    }

    public function getEvent(){
        return Event::where('users_id', Auth::id())->get()->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => Carbon::parse($event->start)->toDateString(),
                'end'   => Carbon::parse($event->end)->toDateString(),
                'color' => $event->color
            ];
        });
    }

    public function store(Request $request){
        $user = Auth::id();

        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'color' => 'nullable',
        ]);

        $data = [
            'title' => $request->title,
            'users_id' => $user,
            'start' => $request->start,
            'end' => $request->end,
            'color' => $request->color
        ];

        Event::create($data);
        return redirect()->route('manage_calender')->with('success', 'Berhasil tambah agenda');
    }

    public function destroy($id){
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['success' => true]);
    }
}
