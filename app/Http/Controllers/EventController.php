<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events=Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required||string||max:255',
            'category'=> 'required||string||max:255',
            'date_event'=>'required||date',
            'places_available'=>'required||integer',
            'description'=>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
        ]);

        $imagePath=null;
        if($request->file('image')) {
            $imagePath = $request->file('image')->store('image','public');
        }

        Event::create([
            'name' => $request->name,
            'category'=>$request->category,
            'date_event'=>$request->date_event,
            'places_available'=>$request->places_available,
            'description' => $request->description,
            'image'=> $imagePath,
            'is_active' => $request->has('is_active')
        ]);
        return redirect()->route('events.index')->with('success', 'Evenement créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'date_event' => 'required|date',
            'places_available' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->file('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }
    
        $event->update($data);
    
        return redirect()->route('events.index')->with('success', 'Événement modifié avec succès.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
