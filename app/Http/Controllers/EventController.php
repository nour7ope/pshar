<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('start_date', 'desc')->paginate(10);
        $stats = [
            'total' => Event::count(),
            'active' => Event::where('status', 'active')->count(),
            'upcoming' => Event::where('start_date', '>', Carbon::now())->count(),
            'completed' => Event::where('status', 'completed')->count(),
        ];

        return view('events.index', compact('events', 'stats'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'nullable|max:255',
            'max_attendees' => 'nullable|integer|min:1',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')
            ->with('success', 'تم إنشاء الفعالية بنجاح!');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'location' => 'nullable|max:255',
            'max_attendees' => 'nullable|integer|min:1',
            'status' => 'required|in:active,completed,cancelled',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')
            ->with('success', 'تم تحديث الفعالية بنجاح!');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'تم حذف الفعالية بنجاح!');
    }

    // الصفحة الرئيسية
    public function dash()
    {
        $upcomingEvents = Event::where('start_date', '>', Carbon::now())
            ->where('status', 'active')
            ->orderBy('start_date', 'asc')
            ->take(5)
            ->get();

        $recentEvents = Event::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $stats = [
            'total' => Event::count(),
            'active' => Event::where('status', 'active')->count(),
            'upcoming' => Event::where('start_date', '>', Carbon::now())->count(),
            'this_month' => Event::whereMonth('start_date', Carbon::now()->month)
                ->whereYear('start_date', Carbon::now()->year)
                ->count(),
        ];

        return view('dash', compact('upcomingEvents', 'recentEvents', 'stats'));
    }
}
