<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\SlipGaji;
use App\Models\Weekly;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $slipgaji = SlipGaji::where('users_id', $userId)->first();
        $today = Carbon::today()->format('m/d/Y'); // "2025-06-03"
        $events = Event::where('users_id', Auth::id())
                    ->where('start', '<=', $today)
                    ->where('end', '>=', $today)
                    ->get();
        $soonEvents = Event::where('start', '>', $today)->get();
        $weeklies = Weekly::where('users_id', $userId)->where('tanggalMulai', '<=', Carbon::today())->where('tanggalSelesai', '>=', Carbon::today())->get();
        return view('dashboard', [
            'events' => $events,
            'soonEvents' => $soonEvents,
            'slipgaji'=> $slipgaji,
            'weeklies' => $weeklies
        ]);
    }

    public function dashboardAdmin(){
        $today = Carbon::today()->format('m/d/Y'); // "2025-06-03"
        $events = Event::where('users_id', Auth::id())
                    ->where('start', '<=', $today)
                    ->where('end', '>=', $today)
                    ->get();
        $soonEvents = Event::where('start', '>', $today)->get();
        return view('management.dashboard', [
            'events' => $events,
            'soonEvents' => $soonEvents
        ]);
    }
}
