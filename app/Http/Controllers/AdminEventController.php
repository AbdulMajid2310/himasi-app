<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Event::all());
        return view('dashboard.event.index', [
            'events' => Event::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.event.create', [
            'categories' => Event_Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'thumbnail' => 'required|image|file|max:1024',
            'poster' => 'required|image|file|max:1024',
            'id_event_category' => 'required',
            'time' => 'required',
            'date' => 'required',
            'vanue' => 'required',
            'htm' => 'required',
        ]);
        if ($request->file('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('event_images');
        }
        if ($request->file('poster')) {
            $validatedData['poster'] = $request->file('poster')->store('event_images');
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->description), 100);
        $validatedData['code'] = "125.265.262";


        Event::create($validatedData);
        return redirect('dashboard/events')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('dashboard.event.show', [
            'event' => $event,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if ($event->poster) {
            Storage::delete($event->poster);
        }
        if ($event->thumbnail) {
            Storage::delete($event->thumbnail);
        }
        Event::destroy($event->id);
        return redirect('dashboard/events')->with('success', 'A Post has been deletted!');
    }
}
