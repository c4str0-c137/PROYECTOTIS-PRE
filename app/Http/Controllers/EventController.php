<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('calendar.index');
    }

    public function fetchEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        $event = Event::create($request->all());
        return response()->json($event);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Event deleted']);
    }
}
