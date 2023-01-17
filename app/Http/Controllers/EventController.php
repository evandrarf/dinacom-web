<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $event = new Event();

        $event->name = $request->name;
        $event->estimated_cost = $request->estimated_cost;
        $event->date = $request->date;
        $event->user_id = $request->user()->id;


        $event->save();

        return redirect()->route('dashboard.actions');
    }
}
